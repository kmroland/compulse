<template>
    <tr :class="{clickable:rowClickable}" @click="onClick">
        <td><slot></slot></td>
        <table-cell
            v-for="(column,index) in visibleColumns"
            :row="row"
            :column="column"
            :key="index"
        ></table-cell>
    </tr>
</template>

<script>
import TableCell from "./tableCell";

export default {
    props: ["columns", "row", "rowClickable"],

    components: {
        TableCell
    },

    computed: {
        visibleColumns() {
            return this.columns.filter(column => !column.hidden);
        }
    },
    methods: {
        onClick() {
            if (this.rowClickable) {
                this.$emit("clicked", this.row);
            }
        }
    }
};
</script>

<style>
tr.clickable {
    cursor: pointer;
}
</style>
