<template>
    <body>
        <div class="search-bar d-flex pb-1">
            <input
                type="text"
                class="form-control"
                id="searchBar"
                placeholder="Search"
                v-model="keyword"
            />
        </div>
        <div class="table-container">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Address</th>
                        <th scope="col">Civil Status</th>
                        <th scope="col">Religion</th>
                        <th scope="col">Contact #</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Guardian Name</th>
                        <th scope="col">Relationship</th>
                        <th scope="col">Guardian Contact #</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Added By</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="student in students" :key="student.id">
                        <th scope="row" class="p-0">
                            <img
                                class="student-img"
                                :src="`/upload/img/${student.picture}`"
                                alt=""
                            />
                        </th>
                        <td>
                            {{ student.first_name }} {{ student.middle_name }}
                            {{ student.last_name }}
                        </td>
                        <td>{{ student.student_id }}</td>
                        <td>{{ student.gender }}</td>
                        <td>{{ student.birth_day }}</td>
                        <td>{{ student.address }}</td>
                        <td>{{ student.civil_status }}</td>
                        <td>{{ student.religion }}</td>
                        <td>{{ student.contact_number }}</td>
                        <td>{{ student.email_address }}</td>
                        <td>{{ student.guardian_name }}</td>
                        <td>{{ student.relationship }}</td>
                        <td>{{ student.guardian_contact_number }}</td>
                        <td>{{ student.remarks }}</td>
                        <td>{{ student.added_by }}</td>
                        <td>{{ student.created_at }}</td>
                        <td>{{ student.updated_at }}</td>
                        <td class="p-0">
                            <button
                                type="button"
                                class="btn btn-primary border border-bottom-0"
                                v-on:click="getStudentID(student)"
                                id="btnEdit"
                                data-bs-toggle="modal"
                                data-bs-target="#editStudent"
                            >
                                <b-icon-pencil />
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="footer mt-3">
            <button
                type="button"
                class="btn btn-success"
                id="btnAddStudent"
                data-bs-toggle="modal"
                data-bs-target="#studentModal"
            >
                Add Student
            </button>
        </div>
        <add-student-modal></add-student-modal>
        <edit-student-modal
            :studentID="studentSelectedID"
            :imgFileName="imgFileName"
            :isOpen="isToEdit"
            @modal="getModalState"
        ></edit-student-modal>
    </body>
</template>

<script>
import { BIconSearch, BIconPencil } from "bootstrap-icons-vue";
import AddStudentModal from "../modals/AddStudentModal.vue";
import EditStudentModal from "../modals/EditStudentModal.vue";
export default {
    data() {
        return {
            students: [],
            timer: "",
            isSearching: false,
            keyword: null,
            studentSelectedID: null,
            isToEdit: false,
            imgFileName: null,
        };
    },
    created() {
        this.fetchEventsList();
        this.timer = setInterval(this.fetchEventsList, 5000);
    },
    methods: {
        getStudents() {
            let url = "http://127.0.0.1:8000/api/students";
            axios.get(url).then((response) => (this.students = response.data));
        },
        fetchEventsList() {
            if (this.isSearching == false) {
                this.getStudents();
            } else {
                // function for searching
                //this.students.splice(0);
                clearInterval(this.timer);
            }
        },
        cancelAutoUpdate() {
            clearInterval(this.timer);
        },
        searchData() {
            this.isSearching = true;

            axios
                .get("http://127.0.0.1:8000/api/livesearch", {
                    params: { keyword: this.keyword },
                })
                .then((res) => (this.students = res.data))
                .catch((error) => {});

            if (this.keyword == "") {
                this.isSearching = false;
            }
        },
        getStudentID(student) {
            this.studentSelectedID = student.id; // student id to be send on edit modal
            this.imgFileName = student.picture; // student photo to be send on edit modal
            this.isToEdit = true;
        },
        getModalState(value) {
            this.isToEdit = value;
        },
    },
    watch: {
        keyword(after, before) {
            this.searchData();
        },
    },
    beforeDestroy() {
        this.cancelAutoUpdate();
    },
    components: {
        BIconSearch,
        BIconPencil,
        AddStudentModal,
        EditStudentModal,
    },
};
</script>

<style scoped>
body {
    background-color: #ffffff;
}

.table-container {
    height: 67vh;
    overflow-x: scroll;
    overflow-y: auto;
}

th {
    min-width: 300px;
}

th:nth-of-type(1) {
    min-width: 50px;
}

th:nth-of-type(18n) {
    min-width: 50px;
}

.footer {
    background-color: #f0f0f0;
}

.search-bar {
    background-color: #f0f0f0;
    justify-content: end;
}

.student-img {
    width: 100%;
    height: 100%;
}

#searchBar {
    width: 150px;
    box-shadow: none;
}

#searchBar:focus {
    border-color: #000;
}

#btnAddStudent {
    float: right;
}

#btnEdit {
    width: 100%;
    height: 50px;
    border-radius: 0;
    box-shadow: none;
    background-color: transparent;
    color: #0275d8;
}

::-webkit-scrollbar {
    -webkit-appearance: none;
    width: 7px;
}

::-webkit-scrollbar-thumb {
    border-radius: 2px;
    background-color: rgba(126, 126, 126, 0.5);
    box-shadow: 0 0 1px rgba(255, 255, 255, 0.5);
}
</style>
