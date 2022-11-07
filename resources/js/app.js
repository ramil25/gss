import { createApp } from "vue";
import App from "./components/App.vue";
import router from "../router/index.js";
import Vue3Storage from "vue3-storage";

require("./bootstrap");
createApp(App).use(router).use(Vue3Storage).mount("#app");
