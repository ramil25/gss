import { createRouter, createWebHistory } from "vue-router";
import Home from "../js/components/Home.vue";
import Login from "../js/components/Login.vue";

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
