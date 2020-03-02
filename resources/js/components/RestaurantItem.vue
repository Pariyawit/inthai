<template>
	<div class="row menu-item py-3">
		<div class="col-12">
			<div class="title">{{ item.title }} </div>
		</div>
		<div class="col-md-9 col-12">
			<div class="description">{{ item.description }}</div>
		</div>
		<div class="col-md-3 col-12 text-right">
			<div class="price">${{ item.price }}<button class="btn btn-add btn-success ml-1" @click="addItem">+</button></div>
		</div>
	</div>
</template>

<script>
    export default {
    	props: ['item'],
    	data(){
    		return {
                itemSelect: this.item
    		}
    	},

    	methods:{
    		addItem(){
    			console.log(this.itemSelect.id);
                this.$emit('addItem', this.itemSelect.id);
    		}
    	},
        mounted() {
            // console.log(item)
        }
    }
</script>

