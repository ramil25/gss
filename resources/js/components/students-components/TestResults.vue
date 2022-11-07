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
                        <th scope="col">Test Type</th>
                        <th scope="col">Test Result</th>
                        <th scope="col">Encoded By</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="test in testResults" :key="test.id">
                        <td>{{ test.student_id }}</td>
                        <td>
                            {{ test.students.first_name }}
                            {{ test.students.middle_name }}
                            {{ test.students.last_name }}
                        </td>
                        <td>{{ test.test_type }}</td>
                        <td>{{ test.test_result }}</td>
                        <td>User ID: {{ test.encoded_by }}</td>
                        <td>{{ test.created_at }}</td>
                        <td>{{ test.updated_at }}</td>
                        <td class="p-0 text-center align-middle">
                            <button
                                type="button"
                                class="btn btn-primary mr-1"
                                id="btnEdit"
                                data-bs-toggle="modal"
                                data-bs-target="#testModal"
                                v-on:click="isEditTrigger(test)"
                            >
                                <b-icon-pencil />
                            </button>
                            <button
                                type="button"
                                class="btn btn-primary"
                                id="btnDel"
                                v-on:click="deleteTest(test)"
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
                data-bs-target="#testModal"
            >
                Add Record
            </button>
        </div>
        <add-test-modal
            :isEdit="isToEdit"
            :testID="testID"
            @isEditFalse="isEditFalse"
        ></add-test-modal>
    </body>
</template>

<script>
import { BIconSearch, BIconPencil, BIconTrash } from "bootstrap-icons-vue";
import AddTestModal from "../modals/AddTestModal.vue";
import { ref } from "vue";

export default {
    data() {
        return {
            testResults: [],
            isToEdit: false,
            testID: null,
            keyword: null,
        };
    },
    methods: {
        getRecords() {
            let url = "http://127.0.0.1:8000/api/test_results";
            axios
                .get(url)
                .then((response) => (this.testResults = response.data));
        },
        isEditTrigger(test) {
            this.testID = test.id;
            this.isToEdit = true;
        },
        isEditFalse(value) {
            this.isToEdit = value;
        },
        deleteTest(test) {
            const Swal = SweetAlert;

            if (confirm("Do you want to delete this record?") == true) {
                axios
                    .delete("http://127.0.0.1:8000/api/testDelete/" + test.id)
                    .then(async (response) => {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Test Successfully Deleted",
                            icon: "info",
                            confirmButtonText: "Ok",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $("#testModal").modal("hide");
                                window.location.reload();
                            }
                        });
                    });
            }
        },
        searchData() {
            axios
                .get("http://127.0.0.1:8000/api/testSearch", {
                    params: { keyword: this.keyword },
                })
                .then((response) => (this.testResults = response.data))
                .catch((error) => {});
        },
    },
    setup() {
        const month = ref({
            month: new Date().getMonth(),
            year: new Date().getFullYear(),
        });

        return {};
    },
    components: {
        BIconSearch,
        BIconPencil,
        BIconTrash,
        AddTestModal,
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
    min-width: 260px;
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

.student-img {
    width: 100%;
    height: 100%;
}

.search-bar {
    background-color: #f0f0f0;
    justify-content: end;
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

#searchBar {
    width: 150px;
    box-shadow: none;
}

#searchBar:focus {
    border-color: #000;
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
