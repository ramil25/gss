import { createRouter, createWebHistory } from "vue-router";
import Home from "../js/components/Home.vue";
import Login from "../js/components/Login.vue";
import Dashboard from "../js/components/Dashboard.vue";
import Users from "../js/components/Users.vue";
import Students from "../js/components/Students.vue";
import Main from "../js/components/students-components/Main.vue";
import DFiles from "../js/components/students-components/DFiles.vue";
import TestResults from "../js/components/students-components/TestResults.vue";
import CResults from "../js/components/students-components/CResults.vue";

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
    {
        path: "/students",
        name: "Students",
        component: Students,
        children: [
            {
                name: "Default",
                path: "",
                component: Main,
            },
            {
                name: "DFiles",
                path: "d-files",
                component: DFiles,
            },
            {
                name: "TestResults",
                path: "test-results",
                component: TestResults,
            },
            {
                name: "CounselingResults",
                path: "counseling-results",
                component: CResults,
            },
        ],
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
