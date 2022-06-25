<template>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-warning">
                    <a class="navbar-brand" href="#">
                        <h1>Guidance Services System</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbarNav"
                        aria-controls=".navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse navbar-right navbarNav">
                        <ul class="navbar-nav navbar-right">
                            <li class="nav-item mr-sm-2">
                                <router-link to="/" class="nav-link">Home
                                    <span class="sr-only">(current)</span>
                                </router-link>
                            </li>
                            <li class="nav-item mr-sm-2 navbar-right">
                                <a class="nav-link" href="#about">Programs</a>
                            </li>
                            <li class="nav-item mr-sm-2 navbar-right">
                                <a class="nav-link" href="#about">About</a>
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
                                    <router-link to="/login" class="nav-link">Login</router-link>
                                </li>
                                 <li class="nav-item">
                                    <router-link to="/dashboard" class="nav-link">Dashboard</router-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log("Component mounted.");
        },
    };

</script>

<style></style>
