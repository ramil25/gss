<template>

    <body>
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
            <router-link to="/" class="navbar-brand col-sm-3 col-md-2 mr-0">GSS</router-link>

            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="#">Sign out</a>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">

                <Sidebar></Sidebar>
                
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    <h2>Dashboard</h2>
                </main>
            </div>
        </div>
    </body>
</template>

<script>
    import Sidebar from "../components/layout/Sidebar.vue";

    export default {
        name: "Dashboard",
        mounted() {
            console.log("Component mounted.");
        },
        data: () => ({

        }),
        components: {
            Sidebar
        },
    };

</script>

<style>
    nav.sidebar {
        min-height: 100vh;
    }

</style>
