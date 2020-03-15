<template>
	<li class="list__item">
		<div class="row">
			<div class="list__field col-3">
				<input
					type="text"
					v-model="item.title"
					:disabled="disabled"
					class="list__input"
					:class="{ disabled: disabled }"
				/>
			</div>
			<div class="list__field col-4">
				<input
					type="text"
					v-model="item.description"
					:disabled="disabled"
					class="list__input"
				/>
			</div>
			<div
				class="list__field col-1 d-flex justify-content-center align-items-center"
			>
				<input
					type="checkbox"
					v-model="item.vegetarian"
					:disabled="disabled"
					class="list__input"
				/>
			</div>
			<div
				class="list__field col-1 d-flex justify-content-center align-items-center"
			>
				<input
					type="checkbox"
					v-model="item.soldout"
					:disabled="disabled"
					class="list__input"
				/>
			</div>
			<div class="list__field col-1">
				<input
					type="text"
					v-model="item.price"
					:disabled="disabled"
					class="list__input text-right pr-1"
				/>
			</div>
			<div class="list__field col-2 d-flex justify-content-center">
				<button class="list__button"><i class="fa fa-edit"></i></button>
				<button class="list__button"><i class="fa fa-trash"></i></button>
			</div>
		</div>
	</li>
</template>

<script>
export default {
	props: ["item"],
	data: function() {
		return {
			disabled: true
		};
	}
};
</script>

<style>
</style>