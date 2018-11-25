import Vue from "vue";
export default Vue.mixin({
    filters: {
        currency(value) {
            const number = +value;
            return number
                ? Number(value).toLocaleString(undefined, {
                      maximumFractionDigits: 3
                  })
                : value;
        }
    }
});
