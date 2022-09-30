<template>
    <body>
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
            <router-link to="/" class="navbar-brand col-sm-3 col-md-2 mr-0"
                >GSS</router-link
            >

            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="#">Sign out</a>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <Sidebar></Sidebar>
                <UserModal
                    :isEditOpen="isToEdit"
                    :userID="userID"
                    @isEditClose="isEditFalse"
                ></UserModal>

                <main
                    role="main"
                    class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"
                >
                    <h2>Users List</h2>
                    <!-- Button trigger modal -->
                    <button
                        type="button"
                        class="btn btn-success"
                        data-bs-toggle="modal"
                        data-bs-target="#userModal"
                    >
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
                                <tr v-for="user in users" :key="user.id">
                                    <td>{{ user.id }}</td>
                                    <td v-if="user.user_level == 1">
                                        Super Admin
                                    </td>
                                    <td v-else>Admin</td>
                                    <td>{{ user.user_name }}</td>
                                    <td>{{ user.first_name }}</td>
                                    <td>{{ user.last_name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>
                                        <button
                                            type="button"
                                            class="borderless-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#userModal"
                                            v-on:click="isEditTrigger(user)"
                                        >
                                            📝
                                        </button>
                                        <button
                                            class="borderless-btn"
                                            v-on:click="deleteUser(user)"
                                        >
                                            ❎
                                        </button>
                                    </td>
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
        this.getUsers();
    },
    data: () => ({
        users: [],
        isToEdit: false,
        userID: null,
    }),
    methods: {
        getUsers() {
            let url = "http://127.0.0.1:8000/api/users";
            axios.get(url).then((response) => (this.users = response.data));
        },
        isEditTrigger(user) {
            this.userID = user.id;
            this.isToEdit = true;
        },
        isEditFalse(value) {
            this.isToEdit = value;
        },
        deleteUser(user) {
            const Swal = SweetAlert;

            if (confirm("Do you want to delete this record?") == true) {
                axios
                    .delete("http://127.0.0.1:8000/api/userDelete/" + user.id)
                    .then(async (response) => {
                        Swal.fire({
                            title: "Deleted!",
                            text: "User Successfully Deleted",
                            icon: "info",
                            confirmButtonText: "Ok",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $("#userModal").modal("hide");
                                window.location.reload();
                            }
                        });
                    });
            }
        },
    },
    components: {
        Sidebar,
        UserModal,
    },
};
</script>

<style scoped>
nav.sidebar {
    min-height: 100vh;
}

.borderless-btn {
    padding: 3px;
    border: none;
    outline: none;
    cursor: pointer;
}
</style>
