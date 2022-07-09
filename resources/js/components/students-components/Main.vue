<template>
    <body>
        <div class="search-bar d-flex pb-1">
            <input
                type="text"
                class="form-control"
                id="searchBar"
                placeholder="Search"
            />
            <button type="button" class="btn btn-warning" id="btnSearch">
                <b-icon-search />
            </button>
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
                    <tr>
                        <th scope="row" class="p-0">
                            <img
                                class="student-img"
                                src="data:image/jpeg;base64,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"
                                alt=""
                            />
                        </th>
                        <td>Otto</td>
                        <td>1</td>
                        <td>Male</td>
                        <td>01/01/2001</td>
                        <td>Laguna</td>
                        <td>Single</td>
                        <td>Catholic</td>
                        <td>0999999</td>
                        <td>@gmail.com</td>
                        <td>Robin</td>
                        <td>Inaanak</td>
                        <td>0999999</td>
                        <td>Makulit</td>
                        <td>00/00/0000</td>
                        <td>00/00/0000</td>
                        <td>00/00/0000</td>
                        <td class="p-0">
                            <button
                                type="button"
                                class="btn btn-primary border border-bottom-0"
                                id="btnEdit"
                            >
                                <b-icon-pencil />
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="p-0">
                            <img
                                class="student-img"
                                src="data:image/jpeg;base64,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"
                                alt=""
                            />
                        </th>
                        <td>Jacob</td>
                        <td>2</td>
                        <td>Male</td>
                        <td>01/01/2001</td>
                        <td>Laguna</td>
                        <td>Single</td>
                        <td>Catholic</td>
                        <td>0999999</td>
                        <td>@gmail.com</td>
                        <td>Robin</td>
                        <td>Inaanak</td>
                        <td>0999999</td>
                        <td>Makulit</td>
                        <td>00/00/0000</td>
                        <td>00/00/0000</td>
                        <td>00/00/0000</td>
                        <td class="p-0">
                            <button
                                type="button"
                                class="btn btn-primary border border-bottom-0"
                                id="btnEdit"
                            >
                                <b-icon-pencil />
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="p-0">
                            <img
                                class="student-img"
                                src="data:image/jpeg;base64,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"
                                alt=""
                            />
                        </th>
                        <td>Larry</td>
                        <td>3</td>
                        <td>Male</td>
                        <td>01/01/2001</td>
                        <td>Laguna</td>
                        <td>Single</td>
                        <td>Catholic</td>
                        <td>0999999</td>
                        <td>@gmail.com</td>
                        <td>Robin</td>
                        <td>Inaanak</td>
                        <td>0999999</td>
                        <td>Makulit</td>
                        <td>00/00/0000</td>
                        <td>00/00/0000</td>
                        <td>00/00/0000</td>
                        <td class="p-0">
                            <button
                                type="button"
                                class="btn btn-primary border border-bottom-0"
                                id="btnEdit"
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
    </body>
</template>

<script>
import { BIconSearch, BIconPencil } from "bootstrap-icons-vue";
import AddStudentModal from "../modals/AddStudentModal.vue";
export default {
    components: {
        BIconSearch,
        BIconPencil,
        AddStudentModal,
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
    min-width: 200px;
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
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    box-shadow: none;
}

#searchBar:focus {
    border-top-color: #000;
    border-bottom-color: #000;
    border-left-color: #000;
    border-right-color: transparent;
}

#searchBar:focus + #btnSearch {
    border-color: #000;
}

#btnSearch {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    box-shadow: none;
}

#btnAddStudent {
    float: right;
}

#btnEdit {
    width: 100%;
    height: 50px;
    border-radius: 0;
    box-shadow: none;
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
