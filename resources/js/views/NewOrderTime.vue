<template>
<div class="container">
	<div class="row pt-5 justify-content-center m-0">
		<div class="card col-12 col-sm-10 col-md-6">
			<div class="card-body">
				<h3 class="pb-3">Delivery Time</h3>
                <ValidationObserver v-slot="{ invalid }">
				<form class="create-order-form" @submit.prevent="onSubmit">
					<div class="form-group row">
                        <label for="time" class="col-md-12 col-form-label">Delivery Time</label>
                        <div class="col-md-12">
                            <ValidationProvider rules="required" v-slot="{ errors }">
                                <select id="time" class="form-control" v-model="time" name="time" autocomplete="time" autofocus>
                                    <option v-for="timeOption in timeOptions" :key="timeOption.id" :value="timeOption.id">{{ timeOption.text  }}</option>
                                </select>
                                <span class="error">{{ errors[0] }}</span>
                            </ValidationProvider>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <p>
                                <strong>Leave a note</strong> for the restaurant with anything they need to know. Do not include details about any allergies.
                            </p>
                            <textarea name="note" id="note" cols="30" rows="10" class="w-100" v-model="note"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success w-100" :disabled="invalid">
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
} from 'vee-validate/dist/vee-validate.full';

export default {
    data(){
        return {
            orderRequest : '',
            deliveryRequest : '',
            note : '',
            time : 0,
            timeOptions : [],
        }
    },
    mounted() {
    },
    created() {
        if(sessionStorage.orderRequest === undefined || sessionStorage.deliveryRequest === undefined){
            this.$router.push('/');
        }
        else {
            let days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

            this.orderRequest = JSON.parse(sessionStorage.orderRequest);
            this.deliveryRequest = JSON.parse(sessionStorage.deliveryRequest);
            this.note = this.orderRequest.note;

            let start_hour = 16;
            let end_hour = 22;
            let id=0;

            let option = {
                id : id++,
                value : (new Date()).getTime(),
                text : "As soon as posible"
            };

            this.timeOptions.push(option);
            let now = new Date();
            for(let h=start_hour ; h < end_hour; h++){
                let a = new Date();
                a.setHours(h);
                a.setMinutes(0);
                a.setSeconds(0);
                if(a.getTime() > now.getTime()){
                    let option = {
                        id : id++,
                        value : a.getTime(),
                        text : days[a.getDay()]+" "+h+":00"
                    };
                    this.timeOptions.push(option);
                }
                
                let b = new Date();
                b.setHours(h);
                b.setMinutes(30);
                b.setSeconds(0);
                if(b.getTime() > now.getTime()){
                    option = {
                        id : id++,
                        value : b.getTime(),
                        text : days[b.getDay()]+" "+h+":30"
                    };
                    this.timeOptions.push(option);
                }
            }

        }
    },
    components:{
        ValidationProvider,
        ValidationObserver
    }
}
</script>
<style>
  
</style>