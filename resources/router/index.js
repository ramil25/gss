import { createRouter, createWebHistory } from "vue-router";
import Home from "../js/components/Home.vue";
import Login from "../js/components/Login.vue";
import Dashboard from "../js/components/Dashboard.vue"
import Users from "../js/components/Users.vue"

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
    {
        path: "/dashboard",
        name: "Dashboard",
        component: Dashboard,
    },
    {
        path: "/users",
        name: "Users",
        component: Users,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
