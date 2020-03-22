<template>
	<li class="list__item">
		<ValidationObserver v-slot="{ invalid }">
			<form action="">
				<div class="row">
					<div class="list__field col-3">
						<ValidationProvider rules="required" v-slot="{ errors }">
							<input
								type="text"
								v-model="title"
								:disabled="!isEditting"
								class="list__input"
								:class="{ disabled: !isEditting }"
								name="Title"
								autofocus
							/>
							<span class="error">{{ errors[0] }}</span>
						</ValidationProvider>
					</div>
					<div class="list__field col-4">
						<input
							type="text"
							v-model="description"
							:disabled="!isEditting"
							class="list__input"
						/>
					</div>
					<div
						class="list__field col-1 d-flex justify-content-center align-items-center"
					>
						<input
							type="checkbox"
							v-model="vegetarian"
							:disabled="!isEditting"
							class="list__input"
						/>
					</div>
					<div
						class="list__field col-1 d-flex justify-content-center align-items-center"
					>
						<input
							type="checkbox"
							v-model="sold_out"
							:disabled="!isEditting"
							class="list__input"
						/>
					</div>

					<div class="list__field col-1">
						<ValidationProvider rules="required" v-slot="{ errors }">
							<input
								type="number"
								min="0"
								step="0.01"
								v-model="price"
								:disabled="!isEditting"
								class="list__input text-right pr-1"
							/>
						</ValidationProvider>
					</div>

					<div class="list__field col-2">
						<div v-if="!isEditting" class="d-flex justify-content-center">
							<button
								class="list__button list__button--icon"
								@click.prevent="edit"
							>
								<i class="fa fa-edit"></i>
							</button>
							<button
								class="list__button list__button--icon"
								@click.prevent="$emit('destroyItem', item, category)"
							>
								<i class="fa fa-trash"></i>
							</button>
						</div>
						<div v-else class="d-flex justify-content-around">
							<button
								class="list__button list__button--save"
								@click.prevent="save"
								:disabled="invalid"
							>
								Save
							</button>
							<button
								class="list__button list__button--cancel"
								@click.prevent="cancel"
							>
								Cancel
							</button>
						</div>
					</div>
				</div>
			</form>
		</ValidationObserver>
	</li>
</template>

<script>
import {
	ValidationProvider,
	ValidationObserver
} from "vee-validate/dist/vee-validate.full";

export default {
	props: ["item", "category", "newItem"],
	data: function() {
		return {
			isEditting: this.newItem,
			title: this.item.title,
			description: this.item.description,
			vegetarian: this.item.vegetarian,
			sold_out: this.item.sold_out,
			price: this.item.price,
			tmp: []
		};
	},
	methods: {
		edit: function() {
			this.isEditting = true;
			this.tmp.title = this.title;
			this.tmp.description = this.description;
			this.tmp.vegetarian = this.vegetarian;
			this.tmp.sold_out = this.sold_out;
			this.tmp.price = this.price;
		},
		save: function() {
			this.isEditting = false;
			let vm = this;
			//to always shows price in 2 decimal
			this.price = parseFloat(this.price).toFixed(2);

			if (this.newItem) {
				//create item
				console.log(this.newItem);
				axios
					.post("/admin/items", {
						category_id: this.category.id,
						title: this.title,
						description: this.description,
						vegetarian: this.vegetarian,
						sold_out: this.sold_out,
						price: this.price
					})
					.then(function(response) {
						let item = response.data;
						vm.category.items.push(item);
						console.log(item);

						vm.title = "";
						vm.description = "";
						vm.vegetarian = "";
						vm.sold_out = "";
						vm.price = "";
						vm.$emit("saved", vm.category);
					})
					.catch(err => console.log(err));
			} else {
				// update item
				axios
					.post("/admin/items/" + this.item.id, {
						title: this.title,
						description: this.description,
						vegetarian: this.vegetarian,
						sold_out: this.sold_out,
						price: this.price
					})
					.then(res => console.log(res))
					.catch(err => console.log(err));
			}
		},
		cancel: function() {
			this.title = this.tmp.title;
			this.description = this.tmp.description;
			this.vegetarian = this.tmp.vegetarian;
			this.sold_out = this.tmp.sold_out;
			this.price = this.tmp.price;
			this.isEditting = false;
			if (this.newItem) {
				this.$emit("cancel", this.category);
			}
		}
	},
	components: {
		ValidationProvider,
		ValidationObserver
	}
};
</script>

<style lang="scss" scoped>
.error {
	position: absolute;
	bottom: -1rem;
	left: 1rem;
	background: yellow;
	height: 1.25rem;
	line-height: 1.25rem;
}
</style>