<template>
	<div class="card  table-responsive card-table">
		<div 
		class="d-flex justify-content-between align-items-between mb-2 p-3 bg-white" v-if="title">
		<h4 class="card-title"  v-text="title">
		</h4>
		<span>
			<slot name="icons"></slot>
		</span>
	</div>

	<div class="d-flex align-items-center mb-2 justify-content-between">
		<!-- <slot></slot> -->

		<div class="d-flex justify-content-between align-items-center">
			<span class="mx-2  font-size-2 text-dark">Show</span>
			<select class="form-control form-control-sm" @change="changePerPage">
				<option selected>5</option>
				<option>10</option>
				<option >25</option>
				<option >50</option>
				<option>100</option>
			</select>
			<span class="mx-2 font-size-2 text-dark">entries</span>
		</div>
		<span class="font-size-2" v-if="results.totalItems">
			Page 
			<span class="text-primary">{{ results.currentPage|currency }}</span> of 
			<span class="text-primary">{{ results.lastPage|currency }}</span>
		</span>
		<input type="search" class="form-control col-3" 
		style="border-radius:25rem ;border-width:1px;" placeholder="search ....." v-model="query">
	</div>

	<div class="relative" :class="{'backdrop':searchText}">
		<table 
		class="table  table-sm" 
		:class="{'table-hover':rowClickable}"
		>
		<thead>
			<tr>
				<th>#</th>
				<template v-for="column in columns">
					<TableColumnHeader :column="column"></TableColumnHeader>
				</template>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr v-if="searchText">
			<td :colspan="columns.length+1" class="text-center">
				<i class="fa fa-spin fa-spinner"></i>  
				{{ searchText }} ............
			</td>
		</tr>
		<table-row
		v-for="(row,index) in results.collection"
		@clicked="$emit('rowClicked',row.data)"
		:key="index"
		:row="row"
		:columns="columns"
		:rowClickable="rowClickable"
		>
		<!-- pass the current numbering to the table row -->
		{{ results.startingIndex+index }}.
	</table-row>
	<tr v-if="results.isEmpty" class="bg-faded text-center p-1">
		<td :colspan="columns.length+1">
			No Items Were Found
		</td>
	</tr>
</tbody>
<tfoot v-if="$slots.foot">
	<slot name="foot"></slot>
</tfoot>
</table>
<div class="p-2 bg-white" v-if="!results.isEmpty">
	<pagination-links :paginator="results"></pagination-links>
</div>

<div style="display:none;">
	<slot></slot>
</div>
</div>
</div>
</template>

<script>
import debounce from "lodash/debounce";

import Paginator from "./Paginator";

import PaginationLinks from "./links";

import TableRow from "./tableRow";

import Column from "./Column";

import Row from "./Row";

import TableColumnHeader from "./TableColumnHeader";

export default {
	components: { PaginationLinks, TableRow, TableColumnHeader },

	props: {
		data: { required: true, type: [Array, Object] },
		title: { default: false },
		rowClickable: { default: false }
	},

	data() {
		return {
			searchText: false,
			results: new Paginator(this.data),
			query: "",
			columns: [],
			rows: []
		};
	},
	mounted() {
		let columns = this.$slots.default || [];
		this.columns = columns
			.filter(column => column.componentInstance)
			.map(column => new Column(column.componentInstance));

		//this.columns = columns;
		this.mapDatatoRows();
	},
	methods: {
		mapDatatoRows() {
			//ensure we reset the rows
			let rows = [];
			//just in case the data structure is an object
			for (let row in this.data) {
				rows.push(new Row(this.data[row], this.columns));
			}
			this.rows = rows;
			this.results.items = rows;

			//this.$set(this.results, "items", rows);
		},
		search: debounce(function() {
			this.searchText = false;
			this.results.items = this.rows.filter(row =>
				row.passesFilter(this.query)
			);
			//console.log(this.results.items);
		}, 300),

		changePerPage(event) {
			this.results.perPage = event.target.value;
		}
	},
	computed: {
		hasSomeData() {
			if (Array.isArray(this.data)) {
				return this.data.length > 0;
			}
			const keys = Object.keys(this.data);
			return keys && keys.length > 0;
		}
	},
	watch: {
		query(newValue) {
			if (!this.hasSomeData) {
				return;
			}
			if (newValue) {
				this.searchText = "Waiting for you to finish typing";
				this.search();
			} else {
				this.results.items = this.rows;
			}
		},
		data(newData) {
			this.data = newData;
			this.mapDatatoRows();
		}
	}
};
</script>
<style scoped lang="scss">
</style>
