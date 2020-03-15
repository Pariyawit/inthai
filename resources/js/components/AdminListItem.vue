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
							v-model="soldout"
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
							<button class="list__button list__button--icon">
								<i class="fa fa-trash"></i>
							</button>
						</div>
						<div v-else class="d-flex justify-content-around">
							<button
								class="list__button list__button--save"
								@click.prevent="save"
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
	props: ["item"],
	data: function() {
		return {
			isEditting: false,
			title: this.item.title,
			description: this.item.description,
			vegetarian: this.item.vegetarian,
			soldout: this.item.soldout,
			price: this.item.price
		};
	},
	methods: {
		edit: function() {
			this.isEditting = true;
		},
		save: function() {
			this.isEditting = false;
		},
		cancel: function() {
			this.title = this.item.title;
			this.description = this.item.description;
			this.vegetarian = this.item.vegetarian;
			this.soldout = this.item.soldout;
			this.price = this.item.price;
			this.isEditting = false;
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
</style>>
</style>