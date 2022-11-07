<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="userModal"
        tabindex="-1"
        aria-labelledby="newModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5
                        class="modal-title"
                        id="userModalLabel"
                        v-if="isEditOpen == true"
                    >
                        Edit User
                    </h5>
                    <h5 class="modal-title" id="userModalLabel" v-else>
                        New User
                    </h5>
                    <button
                        type="button"
                        class="close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        @click="editFalse"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="userForm">
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select
                                class="form-control"
                                name="role"
                                v-model="user.user_level"
                            >
                                <option disabled selected>Select . . .</option>
                                <option value="1">Super Admin</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="first_name" class="form-label"
                                >First Name</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="first_name"
                                name="first_name"
                                placeholder="enter first name"
                                v-model="user.first_name"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="middle_name" class="form-label"
                                >Middle Name</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="middle_name"
                                name="middle_name"
                                placeholder="enter middle name"
                                v-model="user.middle_name"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label"
                                >Last Name</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="last_name"
                                name="last_name"
                                placeholder="enter last name"
                                v-model="user.last_name"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="enter email"
                                aria-describedby="emailHelp"
                                v-model="user.email"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="user_name" class="form-label"
                                >User Name</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="user_name"
                                name="user_name"
                                placeholder="enter user name"
                                v-model="user.user_name"
                                :disabled="isEditOpen == true"
                            />
                        </div>
                        <div class="mb-3">
                            <label
                                for="password"
                                class="form-label"
                                v-if="isEditOpen == true"
                                >New Password (Optional)</label
                            >
                            <label for="password" class="form-label" v-else
                                >Password</label
                            >
                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="enter password"
                                v-model="user.password"
                            />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                        @click="editFalse"
                    >
                        Close
                    </button>
                    <button
                        v-if="isEditOpen == true"
                        type="submit"
                        class="btn btn-primary"
                        @click.prevent="updateUser"
                    >
                        Save
                    </button>
                    <button
                        v-else
                        type="submit"
                        class="btn btn-primary"
                        @click.prevent="addUser"
                    >
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["isEditOpen", "userID"],
    data() {
        return {
            user: {
                last_name: "",
                first_name: "",
                middle_name: "",
                user_name: "",
                password: "",
                email: "",
                user_level: "",
                created_by: this.$storage.getStorageSync("user"),
            },
        };
    },
    methods: {
        addUser() {
            const Swal = SweetAlert;
            let url = "http://127.0.0.1:8000/api/users";

            return axios.post(url, this.user).then(async () => {
                Swal.fire({
                    title: "Added!",
                    text: "User Successfully Added",
                    icon: "success",
                    confirmButtonText: "Ok",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });

                $("#userModal").modal("hide");
            });
        },
        editFalse() {
            this.$emit("isEditClose", "false");
        },
        getUser() {
            axios
                .get("http://127.0.0.1:8000/api/getUser/" + this.userID)
                .then((response) => {
                    this.user = response.data;
                })
                .catch((errors) => {
                    console.log(errors);
                });
        },
        updateUser() {
            const Swal = SweetAlert;

            axios
                .post(
                    "http://127.0.0.1:8000/api/userUpdate/" + this.userID,
                    this.user
                )
                .then(async (response) => {
                    Swal.fire({
                        title: "Updated!",
                        text: "User Successfully Updated",
                        icon: "success",
                        confirmButtonText: "Ok",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });

                    $("#userModal").modal("hide");
                });
        },
    },
    mounted() {},
    watch: {
        isEditOpen(before, after) {
            if (this.isEditOpen == true) {
                this.getUser();
            } else {
                this.user.last_name = "";
                this.user.first_name = "";
                this.user.middle_name = "";
                this.user.user_name = "";
                this.user.password = "";
                this.user.email = "";
                this.user.user_level = "";
                this.user.created_by = this.$storage.getStorageSync("user");
            }
        },
    },
};
</script>
