<template>
	<div class="container home">
		<div class="heading pt-3">
			<h1>
				<img src="img/inthai-logo.gif" class="rounded-circle" /> In Thai Style
				Restaurant
			</h1>
		</div>
		<div class="row pt-3 no-gutters">
			<div class="col-2 pr-2 d-none d-lg-block">
				<h3>Categories</h3>
				<div class="card pt-3">
					<div class="card-body categories">
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
			<div class="col-lg-7 col-12 pr-2">
				<h3>Menu</h3>
				<div class="card pt-3">
					<div class="card-body menu">
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
			<div class="col-lg-3 col-12">
				<div class="pt-3 pt-lg-0">
					<h3>
						Basket total
						<span class="float-right">${{ total }}</span>
					</h3>
				</div>
				<div class="card basket-total">
					<div class="card-body">
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
								class="btn btn-success w-100 order-now"
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
												class="btn btn-outline-success"
											>
												-
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
						<div class="bottom-div">
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
.home .order-item {
	font-size: 0.8rem;
}
.order-item .quantity {
	min-width: 20px;
}
</style>
