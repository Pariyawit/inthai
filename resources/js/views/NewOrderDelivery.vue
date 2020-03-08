<template>
	<div class="container">
		<div class="row pt-5 justify-content-center m-0">
			<div class="card col-12 col-sm-10 col-md-6">
				<div class="card-body">
					<h3 class="pb-3">Delivery Details</h3>
					<ValidationObserver v-slot="{ invalid }">
						<form class="create-order-form" @submit.prevent="onSubmit">
							<div class="form-group row">
								<label for="name" class="col-md-12 col-form-label"
									>Full Name</label
								>
								<div class="col-md-12">
									<ValidationProvider rules="required" v-slot="{ errors }">
										<input
											id="name"
											type="text"
											class="form-control"
											v-model="name"
											name="name"
											value
											autocomplete="name"
											autofocus
										/>
										<span class="error">{{ errors[0] }}</span>
									</ValidationProvider>
								</div>
							</div>
							<div class="form-group row">
								<label for="mobile" class="col-md-12 col-form-label"
									>Mobile phone</label
								>
								<div class="col-md-12">
									<ValidationProvider
										rules="required|numeric|min:10"
										v-slot="{ errors }"
									>
										<input
											id="mobile"
											type="tel"
											class="form-control"
											v-model="mobile"
											name="mobile"
											value
											autocomplete="mobile"
											placeholder
										/>
										<span class="error">{{ errors[0] }}</span>
									</ValidationProvider>
								</div>
							</div>
							<hr class="py-1" />
							<div class="form-group row">
								<label for="address" class="col-md-12 col-form-label"
									>Street address</label
								>
								<div class="col-md-12">
									<ValidationProvider rules="required" v-slot="{ errors }">
										<input
											id="address"
											type="text"
											class="form-control"
											v-model="address"
											name="address"
											value
											autocomplete="address"
										/>
										<span class="error">{{ errors[0] }}</span>
									</ValidationProvider>
								</div>
							</div>
							<div class="form-group row">
								<label for="address2" class="col-md-12 col-form-label"
									>Level or unit number (Optional)</label
								>
								<div class="col-md-12">
									<ValidationProvider rules v-slot="{ errors }">
										<input
											id="address2"
											type="text"
											class="form-control"
											v-model="address2"
											name="address2"
											value
											autocomplete="address2"
										/>
										<span class="error">{{ errors[0] }}</span>
									</ValidationProvider>
								</div>
							</div>
							<div class="form-group row">
								<label for="suburb" class="col-md-12 col-form-label"
									>Town/Suburb</label
								>
								<div class="col-md-12">
									<ValidationProvider rules="required" v-slot="{ errors }">
										<input
											id="suburb"
											type="text"
											class="form-control"
											v-model="suburb"
											name="suburb"
											value
											autocomplete="suburb"
										/>
										<span class="error">{{ errors[0] }}</span>
									</ValidationProvider>
								</div>
							</div>
							<div class="form-group row">
								<label for="state" class="col-md-12 col-form-label"
									>State</label
								>
								<div class="col-md-12">
									<ValidationProvider rules="required" v-slot="{ errors }">
										<input
											id="state"
											type="text"
											class="form-control"
											v-model="state"
											name="state"
											value
											autocomplete="state"
										/>
										<span class="error">{{ errors[0] }}</span>
									</ValidationProvider>
								</div>
							</div>
							<div class="form-group row">
								<label for="postcode" class="col-md-12 col-form-label"
									>Postcode</label
								>
								<div class="col-md-12">
									<ValidationProvider
										rules="required|numeric"
										v-slot="{ errors }"
									>
										<input
											id="postcode"
											type="text"
											class="form-control"
											v-model="postcode"
											name="postcode"
											value
											autocomplete="postcode"
										/>
										<span class="error">{{ errors[0] }}</span>
									</ValidationProvider>
								</div>
							</div>
							<div class="form-group row mb-0">
								<div class="col-md-12">
									<button
										type="submit"
										class="btn btn-success w-100"
										:disabled="invalid"
									>
										Continue
									</button>
								</div>
							</div>
						</form>
					</ValidationObserver>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import {
	ValidationProvider,
	ValidationObserver
} from "vee-validate/dist/vee-validate.full";

export default {
	props: ["categories", "items"],
	data() {
		return {
			name: "",
			mobile: "",
			address: "",
			address2: "",
			suburb: "",
			state: "",
			postcode: ""
		};
	},

	methods: {
		onSubmit() {
			let deliveryRequest = {
				name: this.name,
				mobile: this.mobile,
				address: this.address,
				address2: this.address2,
				suburb: this.suburb,
				state: this.state,
				postcode: this.postcode
			};
			sessionStorage.deliveryRequest = JSON.stringify(deliveryRequest);
			this.$router.push("time");
		}
	},
	mounted() {},
	created() {
		if (sessionStorage.orderRequest == undefined) {
			this.$router.push("/");
		}
	},
	components: {
		ValidationProvider,
		ValidationObserver
	}
};
</script>

<style>
span.error {
	color: #c13838;
	font-weight: bolder;
	font-size: 0.8rem;
	/*position: absolute;*/
}
</style>
