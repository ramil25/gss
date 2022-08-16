<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="editStudent"
        tabindex="-1"
        aria-labelledby="studentModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newModalLabel">Edit Student</h5>
                    <button
                        type="button"
                        class="close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        @click="isClose"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editStudentForm">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="first_name" class="form-label"
                                    >First Name</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="first_name"
                                    name="first_name"
                                    placeholder="Enter first name"
                                    v-model="student.first_name"
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="middle_initial" class="form-label">
                                    Middle Initial (optional)</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="middle_initial"
                                    name="middle_initial"
                                    placeholder="Enter middle initial"
                                    v-model="student.middle_name"
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="last_name" class="form-label">
                                    Last Name</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="last_name"
                                    name="last_name"
                                    placeholder="Enter last name"
                                    v-model="student.last_name"
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="student_id" class="form-label">
                                    Student ID</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="student_id"
                                    name="student_id"
                                    placeholder="Enter student ID"
                                    v-model="student.student_id"
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="gender" class="form-label"
                                    >Gender</label
                                >
                                <select
                                    class="form-control"
                                    name="gender"
                                    v-model="student.gender"
                                >
                                    <option disabled selected>
                                        Select . . .
                                    </option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="birthday" class="form-label">
                                    Birthday</label
                                >
                                <Datepicker
                                    v-model="student.birth_day"
                                    :format="format"
                                ></Datepicker>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="address" class="form-label">
                                    Address</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="address"
                                    name="address"
                                    placeholder="Enter address"
                                    v-model="student.address"
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="civil_status" class="form-label"
                                    >Civil Status</label
                                >
                                <select
                                    class="form-control"
                                    name="civil_status"
                                    v-model="student.civil_status"
                                >
                                    <option disabled selected>
                                        Select . . .
                                    </option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="religion" class="form-label">
                                    Religion</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="religion"
                                    name="religion"
                                    placeholder="Enter religion"
                                    v-model="student.religion"
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="contact-num" class="form-label">
                                    Contact Number</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="contact_num"
                                    name="contact_num"
                                    placeholder="Enter contact number"
                                    v-model="student.contact_number"
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email" class="form-label">
                                    Email Address</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Enter email address"
                                    v-model="student.email_address"
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="picture" class="form-label">
                                    Student Photo Preview</label
                                >
                                <img
                                    v-if="imgPreview"
                                    :src="imgPreview"
                                    class="img-thumbnail student-pic"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="guardian_name" class="form-label">
                                    Guardian Name</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="guardian_name"
                                    name="guardian_name"
                                    placeholder="Enter guardian name"
                                    v-model="student.guardian_name"
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="relationship" class="form-label">
                                    Relationship</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="relationship"
                                    name="relationship"
                                    placeholder="Enter guardian relationship"
                                    v-model="student.relationship"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="guardian_num" class="form-label">
                                    Guardian Contact Number</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="guardian_num"
                                    name="guardian_num"
                                    placeholder="Enter guardian number"
                                    v-model="student.guardian_contact_number"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="remarks" class="form-label">
                                    Remarks</label
                                >
                                <textarea
                                    class="form-control"
                                    id="remarks"
                                    v-model="student.remarks"
                                    rows="3"
                                ></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-danger"
                        @click.prevent="deleteRecord"
                    >
                        Delete
                    </button>
                    <!--<button class="btn btn-info">Upload Photo</button>-->
                    <form @submit.prevent="upload" id="uploadForm">
                        <input
                            type="file"
                            id="edit_photo_file"
                            @change="onFileChange"
                            ref="doc"
                        />
                    </form>
                    <label
                        for="edit_photo_file"
                        class="btn btn-info"
                        style="margin: auto 8px auto 0"
                        >Change Photo</label
                    >
                    <button
                        @click.prevent="editStudent"
                        type="submit"
                        class="btn btn-primary"
                    >
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import { ref } from "vue";

export default {
    props: ["studentID", "imgFileName", "isOpen"],
    data() {
        return {
            imgFile: null,
            imgPreview: null,
            date: null,
            student: {},
            timer: "",
        };
    },
    methods: {
        onFileChange(e) {
            const file = e.target.files[0];
            const fileName = file.name; //file name

            this.imgFile = file; // file to clone in public folder
            this.imgPreview = URL.createObjectURL(file); // image preview
            this.student.picture = fileName; // data pass to db
        },
        upload() {
            let fd = new FormData();
            fd.append("img", this.imgFile);

            axios
                .post("http://127.0.0.1:8000/api/upload", fd)
                .then((res) => {
                    console.log("Response", res.data);
                })
                .catch((err) => console.log(err));
        },
        getStudent() {
            axios
                .get("http://127.0.0.1:8000/api/getStudent/" + this.studentID)
                .then((response) => {
                    this.student = response.data;
                })
                .catch((errors) => {
                    console.log(errors);
                });

            this.imgFile = this.imgFileName;
            this.imgPreview = "upload/img/" + this.imgFile;
        },
        editStudent() {
            const Swal = SweetAlert;

            axios
                .post(
                    "http://127.0.0.1:8000/api/update/" + this.studentID,
                    this.student
                )
                .then(async (response) => {
                    Swal.fire({
                        title: "Updated!",
                        text: "Student Successfully Updated",
                        icon: "success",
                        confirmButtonText: "Ok",
                    });

                    $("#editStudent").modal("hide");
                });

            this.upload();
            this.isClose();
            window.location.reload(); // automatic reload page
        },
        deleteRecord() {
            const Swal = SweetAlert;

            if (confirm("Do you want to delete this record?") == true) {
                axios
                    .delete(
                        "http://127.0.0.1:8000/api/delete/" + this.studentID
                    )
                    .then(async (response) => {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Student Successfully Deleted",
                            icon: "info",
                            confirmButtonText: "Ok",
                        });

                        $("#editStudent").modal("hide");
                    });
            }
            this.isClose();
            window.location.reload(); // automatic reload page
        },
        isClose() {
            this.$emit("modal", "false");
        },
    },
    setup() {
        const date = ref(new Date());

        const format = (date) => {
            const day = date.getDate();
            const month = date.getMonth() + 1;
            const year = date.getFullYear();

            return `${day}/${month}/${year}`;
        };
        return {
            format,
        };
    },
    watch: {
        isOpen(before, after) {
            this.getStudent();
        },
    },
    mounted() {},
    components: {
        Datepicker,
    },
};
</script>

<style scoped>
.student-pic {
    min-width: 235px;
    max-width: 235px;
    min-height: 210px;
    max-height: 210px;
    position: absolute;
    left: 16px;
    top: 32px;
}

#edit_photo_file {
    display: none;
}
</style>
