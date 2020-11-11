const { default: VueRouter } = require("vue-router")

import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import Index from "./views/Index";
import Football from "./views/Football";

const routes = [
    {
        path: "/",
        component: Index
    },
    {
        path: "/football",
        component: Football
    }
]


export default new vueRouter({
    mode: "history",
    routes
})