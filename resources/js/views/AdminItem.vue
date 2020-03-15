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
		<div v-for="category in categories" :key="category.id">
			<h3>{{ category.title }}</h3>
			<ul class="list">
				<div v-for="item in category.items" :key="item.id">
					<admin-list-item
						:item="item"
						:category="category"
						@destroyItem="destroyItem"
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
		axios
			.get("/categories")
			.then(res => (this.categories = res.data))
			.catch(err => console.log(err));
	}
};
</script>

<style>
</style>