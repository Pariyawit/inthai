<template>
    <div class="container">
        <div class="row pt-5 m-0">
            <div class="col-12 text-center animated fadeInUp fast">
                <h1>Thank you for your order</h1>
                <h3>Order number is: {{ order_id }}</h3>
            </div>
            <div class="col-12 col-sm-8 col-md-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <h4>Delivery Detail</h4>
                        <strong>Name</strong>
                        <p>{{ deliveryRequest.name }}</p>
                        <strong>Mobile</strong>
                        <p>{{ deliveryRequest.mobile }}</p>
                        <strong>Address</strong>
                        <p>
                            {{ deliveryRequest.address }}
                            <br />
                            {{ deliveryRequest.address2 }}
                        </p>
                        <strong>Suburb</strong>
                        <p>{{ deliveryRequest.suburb }}</p>
                        <strong>State</strong>
                        <p>{{ deliveryRequest.state }}</p>
                        <strong>Postcode</strong>
                        <p>{{ deliveryRequest.postcode }}</p>
                        <hr />
                        <div>
                            <h4>Delivery Time</h4>
                            <div>{{ time_text }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-8 col-md-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <h4>Your order</h4>
                        <div class="order-item-list">
                            <div
                                v-for="order in orderRequest.orders"
                                class="order-item py-1"
                                v-bind:key="order.item_id"
                            >
                                <div class="d-flex">
                                    <div class="mr-1 quantity">
                                        {{ order.quantity }}x
                                    </div>
                                    <div class="mr-1 flex-shrink-1">
                                        <em>{{ order.title }}</em>
                                    </div>
                                    <div class="ml-auto price">
                                        $
                                        {{
                                            (
                                                order.price * order.quantity
                                            ).toFixed(2)
                                        }}
                                    </div>
                                </div>
                            </div>
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
                                        <span class="float-right"
                                            >${{
                                                orderRequest.total.toFixed(2)
                                            }}</span
                                        >
                                    </strong>
                                </div>
                            </div>
                            <hr />
                            <div class="note">
                                <strong>Note to Restaurant</strong>
                                <textarea
                                    disabled="disabled"
                                    v-model="orderRequest.note"
                                    type="textarea"
                                    class="w-100"
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
    data() {
        return {
            orderRequest: "",
            deliveryRequest: "",
            timeRequest: "",
            orders: [],
            items: [],
            total: 0,
            time_text: "",
            order_id: ""
        };
    },
    methods: {},
    mounted() {},
    created() {
        this.order_id = sessionStorage.order_id;
        let days = [
            "Sunday",
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday"
        ];

        if (
            sessionStorage.orderRequest === undefined ||
            sessionStorage.deliveryRequest === undefined ||
            sessionStorage.timeRequest === undefined
        ) {
            this.$router.push("/");
        } else {
            this.orderRequest = JSON.parse(sessionStorage.orderRequest);
            this.deliveryRequest = JSON.parse(sessionStorage.deliveryRequest);
            this.timeRequest = JSON.parse(sessionStorage.timeRequest);

            if (this.timeRequest.time == null) {
                this.time_text = "As soon as posible";
            } else {
                let date = new Date(this.timeRequest.time);
                let hh = date.getHours();
                hh = hh < 10 ? "0" + hh : hh;
                let mm = date.getMinutes();
                mm = mm < 10 ? "0" + mm : mm;
                this.time_text = days[date.getDay()] + " " + hh + ":" + mm;
            }
            sessionStorage.clear();
        }
    }
};
</script>
<style></style>
