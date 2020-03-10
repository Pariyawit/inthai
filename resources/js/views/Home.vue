<template>
	<div class="container home">
		<div class="heading pt-3">
			<h1 class="font-weight-bold">
				<img src="img/inthai-logo.gif" class="rounded-circle" /> In Thai Style
				Restaurant
			</h1>
		</div>
		<div class="row pt-3">
			<div class="col-2 d-none d-xl-block">
				<div class="card pt-1">
					<div class="card-body categories">
						<h5 class="card-title">Categories</h5>
						<div
							v-for="category in categories"
							class="category-item pb-3"
							:key="category.id"
						>
							<a href="#">
								<span class="text-dark">{{ category.title }}</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-xl-7 col-12">
				<div class="card pt-1">
					<div class="card-body menu">
						<h5 class="card-title">Menu</h5>
						<div
							class="category pb-5"
							v-for="category in categories"
							:key="category.id"
						>
							<h3>{{ category.title }}</h3>
							<div v-for="item in category.items" :key="item.id">
								<restaurant-item
									:item="item"
									v-on:addItem="onItemAdd"
								></restaurant-item>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-xl-3 col-12 ">
				<div class="card basket-total pt-1">
					<div class="card-body">
						<h5 class="card-title">
							Total <span class="float-right">${{ total }}</span>
						</h5>
						<div class="text-center py-3">
							<transition
								enter-active-class="animated fadeIn fast"
								leave-active-class="animated fadeOut fast"
								tag="div"
							>
								<div class="pb-1" v-if="35 - total > 0">
									Spend ${{ 35 - total }} more for delivery
								</div>
							</transition>
							<button
								@click="createOrder"
								class="btn btn-accent w-100 order-now"
								:disabled="total >= 35 ? false : true"
							>
								Order Now
							</button>
						</div>
						<!-- <hr> -->
						<div class="order-item-list">
							<transition-group
								enter-active-class="animated fadeInUp fast"
								leave-active-class="animated fadeOut faster"
								tag="div"
							>
								<div
									v-for="order in orders"
									class="order-item py-1"
									v-bind:key="order.item_id"
								>
									<div class="d-flex">
										<div>
											<button
												@click="removeItem(order.item_id)"
												class="btn btn-outline-success btn-remove-item"
											>
												<i class="fas fa-minus"></i>
											</button>
										</div>
										<div class="mr-1 quantity">{{ order.quantity }}x</div>
										<div class="mr-1 flex-shrink-1">
											<em>{{ order.title }}</em>
										</div>
										<div class="ml-auto price">
											$ {{ order.price * order.quantity }}
										</div>
									</div>
								</div>
							</transition-group>
						</div>
						<hr />
						<div class="">
							<div class="calculation">
								<div>
									<!-- Subtotal <span class="float-right">$21.80</span> -->
								</div>
								<div>
									<!-- Discount applied <span class="float-right">$21.80</span> -->
								</div>
								<div>
									<!-- Delivery fee <span class="float-right">$21.80</span> -->
								</div>
								<div>
									<strong>
										Total
										<span class="float-right">${{ total }}</span>
									</strong>
								</div>
							</div>
							<hr />
							<div class="note">
								<p>
									<strong>Leave a note</strong> for the restaurant with anything
									they need to know. Do not include details about any allergies.
								</p>

								<textarea
									v-model="note"
									type="textarea"
									rows="5"
									class="w-100"
									placeholder="e.g. the doorbell doesn't work"
								></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="col-12 d-lg-none bottom-div">
				<div class="card basket-total pt-1">
					<div class="card-body">
						<h5 class="card-title">
							Total <span class="float-right">${{ total }}</span>
						</h5>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</template>

<script>
export default {
	// props: ['categories','items'],
	data() {
		return {
			orders: [],
			total: 0,
			note: "",
			items: "",
			categories: ""
		};
	},

	methods: {
		onItemAdd(id) {
			let orders = this.orders;
			for (let i = 0; i < orders.length; i++) {
				if (orders[i].item_id == id) {
					orders[i].quantity++;
					this.calculateTotal();
					return;
				}
			}
			this.orders.push({
				item_id: id,
				title: this.getItemById(id).title,
				price: this.getItemById(id).price,
				quantity: 1
			});
			this.calculateTotal();
		},
		removeItem(item_id) {
			let orders = this.orders;
			for (let i = 0; i < orders.length; i++) {
				if (orders[i].item_id == item_id) {
					orders[i].quantity--;
					if (orders[i].quantity == 0) {
						orders = orders.splice(i, 1);
					}
					this.calculateTotal();
					return;
				}
			}
		},
		calculateTotal() {
			let orders = this.orders;
			let total = 0;
			for (let i = 0; i < orders.length; i++) {
				total += this.getItemById(orders[i].item_id).price * orders[i].quantity;
			}
			this.total = total;
		},
		getItemById(id) {
			let items = this.items;
			for (var i = 0; i < items.length; i++) {
				if (items[i].id === id) {
					return items[i];
				}
			}
			return null;
		},
		createOrder() {
			let orderRequest = {
				orders: this.orders,
				note: this.note,
				total: this.total
			};
			sessionStorage.orderRequest = JSON.stringify(orderRequest);
			this.$router.push("delivery");
		}
	},
	mounted() {
		console.log(this.categories);
		console.log(this.items);
	},
	created() {
		sessionStorage.clear();
		axios
			.get("/items")
			.then(res => (this.items = res.data))
			.catch(err => console.log(err));

		axios
			.get("/categories")
			.then(res => (this.categories = res.data))
			.catch(err => console.log(err));
	}
};
</script>

<style>
.order-item-list {
	transition: height 0.5s;
}
.order-item-list .price {
	min-width: 50px;
	text-align: right;
}
button.order-now:disabled {
	background: lightgray;
	border: none;
}
button.order-now {
	font-size: 1.25rem;
	height: 3rem;
}
.home .order-item {
	font-size: 0.8rem;
}
.order-item .quantity {
	min-width: 20px;
}
.basket-total {
	position: sticky;
	top: 25px;
	color: white;
}
.bottom-div {
	z-index: 100;
	position: sticky;
	bottom: 0px;
}
</style>
