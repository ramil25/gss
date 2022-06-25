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
                <UserModal></UserModal>
                
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    <h2>Users List</h2>
                     <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newModal">
                    Add New User
                    </button>

                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Administrator</td>
                                    <td>Admin</td>
                                    <td>Lorem</td>
                                    <td>Ipsum</td>
                                    <td>Admin@gmail.com</td>
                                    <td><span>📝</span> <span>❎</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
    </body>
</template>

<script>
    import Sidebar from "../components/layout/Sidebar.vue";
    import UserModal from "../components/modals/User-modal.vue";

    export default {
        name: "Users",
        mounted() {
            console.log("Component mounted.");
        },
        data: () => ({

        }),
        methods:{
          
        },
        components: {
            Sidebar,
            UserModal
        },
    };

</script>

<style>
    nav.sidebar {
        min-height: 100vh;
    }

</style>
