<template>
	<div class="row menu-item py-3">
		<div class="col-12">
			<div class="title">{{ item.title }}
                <span class="vegetarian" v-if="item.vegetarian">
                    <i class="fas fa-leaf"></i>
                </span>
            </div>
		</div>
		<div class="col-md-9 col-12">
			<div class="description">{{ item.description }}</div>
		</div>
		<div class="col-md-3 col-12 text-right">
			<div class="price">${{ item.price }}<button class="btn btn-add btn-success ml-1" @click="addItem(item.id)">+</button></div>
		</div>
	</div>
</template>

<script>
    export default {
    	props: ['item'],
    	data(){
    		return {
    		}
    	},

    	methods:{
    		addItem(id){
                this.$emit('addItem', id);
    		}
    	},
        mounted() {
            // console.log(item)
        }
    }
</script>

<style>
</style>

