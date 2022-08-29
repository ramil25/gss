<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="testModal"
        tabindex="-1"
        aria-labelledby="testModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5
                        v-if="isEdit == true"
                        class="modal-title"
                        id="newModalLabel"
                    >
                        Edit Test Result
                    </h5>
                    <h5 v-else class="modal-title" id="newModalLabel">
                        New Test Result
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
                    <form id="testModalForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="student_id" class="form-label"
                                    >Student ID</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="student_id"
                                    name="student_id"
                                    placeholder="0"
                                    v-model="testResult.student_id"
                                    :disabled="isEdit == true"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9 mb-3">
                                <label for="test_type" class="form-label"
                                    >Test Type</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="test_type"
                                    name="test_type"
                                    placeholder="Enter test type"
                                    v-model="testResult.test_type"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="test_result" class="form-label"
                                    >Test Result</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="test_result"
                                    name="test_result"
                                    placeholder="Enter result"
                                    v-model="testResult.test_result"
                                />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button
                        @click.prevent="updateTest"
                        type="submit"
                        class="btn btn-primary"
                        v-if="isEdit == true"
                    >
                        Save
                    </button>
                    <button
                        @click.prevent="checkValidation"
                        type="submit"
                        class="btn btn-primary"
                        v-else
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
    props: ["isEdit", "testID"],
    data() {
        return {
            testResult: {
                student_id: "",
                test_type: "",
                test_result: "",
                encoded_by: 0,
            },
        };
    },
    methods: {
        addTestResult() {
            const Swal = SweetAlert;
            let url = "http://127.0.0.1:8000/api/test_results";
            return axios.post(url, this.testResult).then(async () => {
                Swal.fire({
                    title: "Added!",
                    text: "Test Result Successfully Added",
                    icon: "success",
                    confirmButtonText: "Ok",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });

                //this.onReset();
                $("#testModal").modal("hide");
            });
        },
        checkValidation() {
            let url =
                "http://127.0.0.1:8000/api/getValidation/" +
                this.testResult.student_id;
            axios.get(url).then((response) => {
                if (response.data == true) {
                    this.addTestResult();
                } else {
                    alert(
                        "Student doesn't exist. Please double check your student ID if it is added to the database."
                    );
                }
            });
        },
        editFalse() {
            this.$emit("isEditFalse", "false");
        },
        getTestResult() {
            axios
                .get("http://127.0.0.1:8000/api/getTestResult/" + this.testID)
                .then((response) => {
                    this.testResult = response.data;
                })
                .catch((errors) => {
                    console.log(errors);
                });
        },
        updateTest() {
            const Swal = SweetAlert;

            axios
                .post(
                    "http://127.0.0.1:8000/api/testUpdate/" + this.testID,
                    this.testResult
                )
                .then(async (response) => {
                    Swal.fire({
                        title: "Updated!",
                        text: "Test Result Successfully Updated",
                        icon: "success",
                        confirmButtonText: "Ok",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });

                    $("#editStudent").modal("hide");
                });
        },
    },
    watch: {
        isEdit(before, after) {
            if (this.isEdit == true) {
                this.getTestResult();
            } else {
                this.testResult.encoded_by = 0;
                this.testResult.student_id = "";
                this.testResult.test_type = "";
                this.testResult.test_result = "";
            }
        },
    },
};
</script>

<style scoped></style>
