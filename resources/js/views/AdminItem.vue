<template>
	<div class="container">
		<div v-for="category in categories" :key="category.id">
			<h3>{{ category.title }}</h3>
			<li class="list__item list__item--head">
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
			<ul class="list">
				<div v-for="item in category.items" :key="item.id">
					<admin-list-item :item="item"></admin-list-item>
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