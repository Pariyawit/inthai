<template>
	<div class="container">
		<li class="list__item list__item--head mb-3">
			<div class="row">
				<div class="list__field col-3 pl-3">
					Item
				</div>
				<div class="list__field col-4 pl-1">
					Description
				</div>
				<div
					class="list__field col-1 d-flex justify-content-center align-items-center"
				>
					Veg
				</div>
				<div
					class="list__field col-1 d-flex justify-content-center align-items-center"
				>
					Sold out
				</div>
				<div class="list__field col-1 text-right pr-1">Price ($)</div>
			</div>
		</li>
		<div v-for="(category, index) in categories" :key="category.id">
			<div class="d-flex">
				<h3>{{ category.title }}</h3>
				<div class="mx-3">
					<button
						class="list__button list__button--icon mx-1"
						@click.prevent="editCategory(category)"
					>
						<i class="fa fa-edit"></i>
					</button>
					<button
						class="list__button list__button--icon mx-1"
						@click.prevent="destroyCategory(category)"
					>
						<i class="fa fa-trash"></i>
					</button>
				</div>
			</div>
			<ul class="list">
				<div v-for="item in category.items" :key="item.id">
					<admin-list-item
						:item="item"
						:category="category"
						:newItem="false"
						:key="item.id"
						@destroyItem="destroyItem"
					></admin-list-item>
				</div>
				<li
					class="list__item list__item--add"
					v-if="!category.addingItem"
					@click="addItem(category)"
				>
					+ New Item
				</li>

				<div v-if="category.addingItem">
					<admin-list-item
						:item="[]"
						:category="category"
						:newItem="true"
						@destroyItem="destroyItem"
						@cancel="cancel"
						@saved="saved"
					></admin-list-item>
				</div>
			</ul>
		</div>
	</div>
</template>

<script>
import AdminListItem from "../components/AdminListItem.vue";
export default {
	components: {
		AdminListItem
	},
	data: function() {
		return {
			categories: []
		};
	},
	methods: {
		addItem: function(category) {
			category.addingItem = true;
		},
		saved: function(category) {
			category.addingItem = false;
		},
		cancel: function(category) {
			category.addingItem = false;
		},
		destroyItem: function(item, category) {
			if (confirm("Delete " + item.title + " ?")) {
				axios
					.delete("/admin/items/" + item.id)
					.then(res => console.log(res))
					.catch(err => console.log(err));

				console.log(item);
				let items = category.items;
				for (let i = 0; i < items.length; i++) {
					if (items[i].id == item.id) {
						items = items.splice(i, 1);
						return;
					}
				}
			}
		}
	},
	created() {
		sessionStorage.clear();
		let vm = this;
		axios
			.get("/categories")
			.then(function(response) {
				vm.categories = response.data;
				vm.categories.forEach(category => {
					vm.$set(category, "addingItem", false);
				});
			})
			.catch(err => console.log(err));
	}
};
</script>

<style>
</style>