<template>
    <div class="container-fluid p-0">
        <div class="row" v-if="!isLoginTrigger">
            <div class="col-md-12">
                <nav
                    class="navbar fixed-top navbar-expand-lg navbar-light bg-warning"
                >
                    <a class="navbar-brand" href="#"
                        ><h1>Guidance Services System</h1></a
                    >
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target=".navbarNav"
                        aria-controls=".navbarNav"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div
                        class="collapse navbar-collapse navbar-right navbarNav"
                    >
                        <ul class="navbar-nav navbar-right">
                            <li class="nav-item mr-sm-2">
                                <a class="nav-link" href="#"
                                    >Home
                                    <span class="sr-only">(current)</span></a
                                >
                            </li>
                            <li class="nav-item mr-sm-2 navbar-right">
                                <a class="nav-link" href="#program">Programs</a>
                            </li>
                            <li class="nav-item mr-sm-2 navbar-right">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item mr-sm-2 navbar-right">
                                <a class="nav-link" href="#">Contacts</a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse navbar-collapse navbarNav">
                        <div class="ml-auto">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="#login"
                                        @click="loginClicked"
                                        >Login</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div v-if="isLoginTrigger"><Login></Login></div>
    </div>
</template>

<script>
import Login from "../components/Login.vue";
export default {
    mounted() {
        console.log("Component mounted.");
    },
    components: { Login },
    data() {
        return {
            isLoginTrigger: false,
        };
    },
    methods: {
        loginClicked() {
            this.isLoginTrigger = true;
        },
    },
};
</script>

<style>
.container-fluid {
    overflow-x: hidden;
}
.col-md-12 {
    padding-left: 0;
    padding-right: 0;
}
</style>
