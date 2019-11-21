// app.js

require("./bootstrap");

window.Vue = require("vue");

import VueRouter from "vue-router";
Vue.use(VueRouter);

import VueAxios from "vue-axios";
import axios from "axios";

import App from "./App.vue";
Vue.use(VueAxios, axios);

import HomeComponent from "./components/HomeComponent.vue";
import CreateTaskComponent from "./components/CreateTaskComponent.vue";
import EditTaskComponent from "./components/EditTaskComponent.vue";

const routes = [
    {
        name: "home",
        path: "/home",
        component: HomeComponent
    },
    {
        name: "create",
        path: "/create",
        component: CreateTaskComponent
    },
    {
        name: "edit",
        path: "/edit",
        component: EditTaskComponent
    }
];

const router = new VueRouter({ mode: "history", routes: routes });
const app = new Vue(Vue.util.extend({ router }, App)).$mount("#todo");
