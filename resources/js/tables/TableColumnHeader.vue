<template>
	<th  
		v-text="column.label"
	   :class="column.cellClass"
	></th>
</template>
<script>
export default {
	props: {
		column: {}
	}
};
</script>
