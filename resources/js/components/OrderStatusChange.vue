<template>
	<div>
		<div>
			<span
				class="status status--new"
				:class="[status != 'new' ? 'inactive' : '']"
				@click="changeStatus('new')"
				>New</span
			>
			<span
				class="status status--cooking"
				:class="[status != 'cooking' ? 'inactive' : '']"
				@click="changeStatus('cooking')"
				>Cooking</span
			>
			<span
				class="status status--done"
				:class="[status != 'done' ? 'inactive' : '']"
				@click="changeStatus('done')"
				>Done</span
			>
		</div>
		<div v-if="submitting">
			<div class="animated flash infinite slow text-center">
				...Loading...
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: ["order_status", "order_id"],
	data: function() {
		return {
			status: this.order_status,
			submitting: false
		};
	},
	methods: {
		changeStatus: function(newStatus) {
			this.submitting = true;
			let s = newStatus.toUpperCase();
			let message = "Change status to " + s + " ?";
			if (confirm(message)) {
				console.log(newStatus);
				console.log(this.order_id);
				const vm = this;
				axios
					.put("/admin/orders/" + this.order_id, {
						order_id: this.order_id,
						status: newStatus
					})
					.then(function(response) {
						console.log(response);
						vm.status = response.data.status;
						submitting = false;
					})
					.catch(function(error) {
						console.log(error);
						vm.submitting = false;
					});
			}
		}
	}
};
</script>
<style lang="scss" scoped>
.inactive {
	opacity: 0.5;
	filter: grayscale(0.66);
}
.status {
	cursor: pointer;
}
</style>