<template>
<div class="container">
	<div class="row pt-5 justify-content-center m-0">
		<div class="card col-12 col-sm-10 col-md-6">
			<div class="card-body">
				<h3 class="pb-3">Delivery Details</h3>
				<form action="/customer" class="create-order-form" method="post">
					<div class="form-group row">
                        <label for="name" class="col-md-12 col-form-label">Full Name</label>
                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control" name="name" value="" required autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobile" class="col-md-12 col-form-label">Mobile phone</label>
                        <div class="col-md-12">
                            <input id="mobile" type="tel" class="form-control" name="mobile" value="" required autocomplete="mobile">
                        </div>
                    </div>
                    <hr class="py-1">
                    <div class="form-group row">
                        <label for="address" class="col-md-12 col-form-label">Street address</label>
                        <div class="col-md-12">
                            <input id="address" type="text" class="form-control" name="address" value="" required autocomplete="address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address2" class="col-md-12 col-form-label">Level or unit number (Optional)</label>
                        <div class="col-md-12">
                            <input id="address2" type="text" class="form-control" name="address2" value="" autocomplete="address2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="suburb" class="col-md-12 col-form-label">Town/Suburb</label>
                        <div class="col-md-12">
                            <input id="suburb" type="text" class="form-control" name="suburb" value="" required autocomplete="suburb">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="state" class="col-md-12 col-form-label">State</label>
                        <div class="col-md-12">
                            <input id="state" type="text" class="form-control" name="state" value="" required autocomplete="state">
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="postcode" class="col-md-12 col-form-label">Postcode</label>
                        <div class="col-md-12">
                            <input id="postcode" type="text" class="form-control" name="postcode" value="" required autocomplete="postcode">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success w-100">
                                Continue
                            </button>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
</template>

<script>
    export default {
        props: ['categories','items'],
        data(){
            return {
            }
        },

        methods:{
        },
        mounted() {
        },
        created() {
            if(localStorage.orderRequest == undefined){
                this.$router.push('/');
            }
        }
    }
</script>

<style>

</style>
