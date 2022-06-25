<template>
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                   <router-link to="/dashboard" class="nav-link">Dashboard</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/users" class="nav-link">Users</router-link>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <span data-feather="file"></span>
                        Students
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</template>
<script>
    export default {
        mounted() {
            console.log("Component mounted.");
        },
    };

</script>