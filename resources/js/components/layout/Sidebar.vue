<template>
    <nav class="col-md-2 d-none d-md-block bg-warning sidebar">
        <div class="sidebar-sticky">
            <div class="row d-flex align-items-center">
                <b-icon-person-circle class="mb-0 ml-3 h3" />
                <p class="h4 my-0 ml-2 py-3">Name</p>
            </div>
            <hr class="m-0 p-0" />
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <router-link
                        to="/dashboard"
                        class="nav-link d-flex align-items-center"
                    >
                        <b-icon-speedometer2 />
                        &nbsp;Dashboard</router-link
                    >
                </li>
                <li class="nav-item">
                    <router-link
                        to="/users"
                        class="nav-link d-flex align-items-center"
                    >
                        <b-icon-person />&nbsp;Users</router-link
                    >
                </li>
                <li class="nav-item">
                    <router-link
                        to="/students"
                        class="nav-link active d-flex align-items-center"
                    >
                        <b-icon-file-earmark-person />
                        <span data-feather="file"></span>
                        &nbsp;Students
                    </router-link>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link active d-flex align-items-center"
                        href="#"
                    >
                        <b-icon-file-earmark />
                        <span data-feather="file"></span>
                        &nbsp;Documents
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</template>
<script>
import {
    BIconSpeedometer2,
    BIconPerson,
    BIconFileEarmarkPerson,
    BIconFileEarmark,
    BIconPersonCircle,
} from "bootstrap-icons-vue";

export default {
    mounted() {
        console.log("Component mounted.");
    },
    components: {
        BIconSpeedometer2,
        BIconPerson,
        BIconFileEarmarkPerson,
        BIconFileEarmark,
        BIconPersonCircle,
    },
};
</script>

<style scoped>
.nav-link {
    color: rgba(0, 0, 0, 0.5);
}

.nav-link:hover {
    color: rgba(0, 0, 0, 0.9);
}
</style>
