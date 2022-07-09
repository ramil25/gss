<template>
    <body>
        <div class="date-picker d-flex pb-1">
            <p class="mb-0 align-self-center">Filter by:</p>
            &nbsp;
            <Datepicker v-model="month" monthPicker></Datepicker>
        </div>
        <div class="table-container">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Student ID</th>
                        <th scope="col">Description</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Encoded By</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Description</td>
                        <td>Remarks</td>
                        <td>Name</td>
                        <td>01/01/2001</td>
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
                id="btnAddResult"
                data-bs-toggle="modal"
                data-bs-target=""
            >
                Add Result
            </button>
        </div>
        <add-student-modal></add-student-modal>
    </body>
</template>

<script>
import { BIconSearch, BIconPencil } from "bootstrap-icons-vue";
import AddStudentModal from "../modals/AddStudentModal.vue";
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import { ref } from "vue";

export default {
    data() {
        return {
            month: null,
        };
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
        AddStudentModal,
        Datepicker,
    },
};
</script>

<style scoped>
body {
    background-color: #ffffff;
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

#btnAddResult {
    float: right;
}

#btnEdit {
    width: 100%;
    height: 49px;
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
