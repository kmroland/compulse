import pick from "lodash/pick";

export default class Column {
    constructor(columnComponent) {
        const properties = pick(columnComponent, [
            "dataKey",
            "label",
            "dataType",
            "hidden",
            "formatter",
            "filterable",
            "sortable",
            "cellClass"
        ]);

        Object.assign(this, properties);

        this.template = columnComponent.$scopedSlots.default;
    }

    isFilterable() {
        return this.filterable;
    }
    isSortable() {
        return this.sortable;
    }
}
