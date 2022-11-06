<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="counselModal"
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
                        Edit Counseling Result
                    </h5>
                    <h5 v-else class="modal-title" id="newModalLabel">
                        New Counseling Result
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
                    <form id="counselModalForm">
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
                                    v-model="counselResult.student_id"
                                    :disabled="isEdit == true"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9 mb-3">
                                <label for="desc" class="form-label"
                                    >Description</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="desc"
                                    name="desc"
                                    placeholder="Enter description"
                                    v-model="counselResult.description"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="remarks" class="form-label"
                                    >Remarks</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="remarks"
                                    name="remarks"
                                    placeholder="Enter remarks"
                                    v-model="counselResult.remarks"
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
    props: ["isEdit", "counselID"],
    data() {
        return {
            counselResult: {
                student_id: "",
                description: "",
                remarks: "",
                encoded_by: 0,
            },
        };
    },
    methods: {
        checkValidation() {
            let url =
                "http://127.0.0.1:8000/api/getValidation/" +
                this.counselResult.student_id;
            axios.get(url).then((response) => {
                if (response.data == true) {
                    this.addCounselResult();
                } else {
                    alert(
                        "Student doesn't exist. Please double check your student ID if it is added to the database."
                    );
                }
            });
        },
        addCounselResult() {
            const Swal = SweetAlert;
            let url = "http://127.0.0.1:8000/api/councelling_results";
            return axios.post(url, this.counselResult).then(async () => {
                Swal.fire({
                    title: "Added!",
                    text: "Counseling Result Successfully Added",
                    icon: "success",
                    confirmButtonText: "Ok",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#counselModal").modal("hide");
                        window.location.reload();
                    }
                });
            });
        },
        editFalse() {
            this.$emit("isEditFalse", "false");
        },
        getCounselResult() {
            axios
                .get(
                    "http://127.0.0.1:8000/api/getCounselResult/" +
                        this.counselID
                )
                .then((response) => {
                    this.counselResult = response.data;
                })
                .catch((errors) => {
                    console.log(errors);
                });
        },
        updateTest() {
            const Swal = SweetAlert;

            axios
                .post(
                    "http://127.0.0.1:8000/api/counselUpdate/" + this.counselID,
                    this.counselResult
                )
                .then(async (response) => {
                    Swal.fire({
                        title: "Updated!",
                        text: "Counsel Result Successfully Updated",
                        icon: "success",
                        confirmButtonText: "Ok",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                });
        },
    },
    watch: {
        isEdit(before, after) {
            if (this.isEdit == true) {
                this.getCounselResult();
            } else {
                this.student_id = "";
                this.description = "";
                this.remarks = "";
                this.encoded_by = 0;
            }
        },
    },
};
</script>

<style scoped></style>
