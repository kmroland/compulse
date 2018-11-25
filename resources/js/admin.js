import "./bootstrap";
import autosize from "autosize";
//import axios from "axios";
import Vue from "vue";
import mixin from "./mixin";
import "./tables";

// axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// let token = document.head.querySelector('meta[name="csrf-token"]');

// if (token) {
//     axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
// }

// window.axios = axios;

window.Vue = Vue;

autosize($("textarea"));

Vue.component("articles-table", require("./components/ArticlesTable.vue"));

new Vue({
    el: "#app",
    mixins: [mixin]
});
