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
                        <th scope="col">Student ID</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Encoded By</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="counsel in counselResults" :key="counsel.id">
                        <td>{{ counsel.student_id }}</td>
                        <td>
                            {{ counsel.students.first_name }}
                            {{ counsel.students.middle_name }}
                            {{ counsel.students.last_name }}
                        </td>
                        <td>{{ counsel.description }}</td>
                        <td>{{ counsel.remarks }}</td>
                        <td>{{ counsel.encoded_by }}</td>
                        <td>{{ counsel.created_at }}</td>
                        <td>{{ counsel.updated_at }}</td>
                        <td class="p-0 text-center align-middle">
                            <button
                                type="button"
                                class="btn btn-primary mr-1"
                                id="btnEdit"
                                data-bs-toggle="modal"
                                data-bs-target="#counselModal"
                                v-on:click="isEditTrigger(counsel)"
                            >
                                <b-icon-pencil />
                            </button>
                            <button
                                type="button"
                                class="btn btn-primary"
                                id="btnDel"
                                v-on:click="deleteCounsel(counsel)"
                            >
                                <b-icon-trash />
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
                id="btnAddResult"
                data-bs-toggle="modal"
                data-bs-target="#counselModal"
            >
                Add Result
            </button>
        </div>
        <counsel-modal
            :isEdit="isToEdit"
            :counselID="counselID"
            @isEditFalse="isEditFalse"
        ></counsel-modal>
    </body>
</template>

<script>
import { BIconSearch, BIconPencil, BIconTrash } from "bootstrap-icons-vue";
import Datepicker from "@vuepic/vue-datepicker";
import CounselModal from "../modals/CResultsModal.vue";
import "@vuepic/vue-datepicker/dist/main.css";
import { ref } from "vue";

export default {
    data() {
        return {
            counselResults: [],
            isToEdit: false,
            counselID: null,
            keyword: null,
        };
    },
    methods: {
        getRecords() {
            let url = "http://127.0.0.1:8000/api/councelling_results";
            axios
                .get(url)
                .then((response) => (this.counselResults = response.data));
        },
        isEditTrigger(counsel) {
            this.counselID = counsel.id;
            this.isToEdit = true;
        },
        isEditFalse(value) {
            this.isToEdit = value;
        },
        deleteCounsel(counsel) {
            const Swal = SweetAlert;

            if (confirm("Do you want to delete this record?") == true) {
                axios
                    .delete(
                        "http://127.0.0.1:8000/api/counselDelete/" + counsel.id
                    )
                    .then(async (response) => {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Counsel Result Successfully Deleted",
                            icon: "info",
                            confirmButtonText: "Ok",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    });
            }
        },
        searchData() {
            axios
                .get("http://127.0.0.1:8000/api/counselSearch", {
                    params: { keyword: this.keyword },
                })
                .then((response) => (this.counselResults = response.data))
                .catch((error) => {});
        },
    },
    components: {
        BIconSearch,
        BIconPencil,
        BIconTrash,
        CounselModal,
        Datepicker,
    },
    mounted() {
        this.getRecords();
    },
    watch: {
        keyword(after, before) {
            this.searchData();
        },
    },
};
</script>

<style scoped>
body {
    background-color: #ffffff;
}

th,
td {
    max-width: auto;
    min-width: 250px;
}

th:nth-last-of-type(1),
td:nth-last-of-type(1) {
    min-width: 100px;
}

.table-container {
    height: 67vh;
    overflow: auto;
}

.footer {
    background-color: #f0f0f0;
}

.date-picker {
    background-color: #f0f0f0;
    justify-content: end;
}

.search-bar {
    background-color: #f0f0f0;
    justify-content: end;
}

#searchBar {
    width: 150px;
    box-shadow: none;
}

#btnAddResult {
    float: right;
}

#btnEdit,
#btnDel {
    background-color: transparent;
    border: none;
}

#btnEdit {
    color: #0275d8;
}

#btnDel {
    color: #ff4444;
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
