<template>
	<div>
		{{ total }}
	</div>
</template>

<script>
    export default {
    	props: ['total'],
    	data(){
    		return {
    		}
    	},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

