<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="studentModal"
        tabindex="-1"
        aria-labelledby="studentModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newModalLabel">New Student</h5>
                    <button
                        type="button"
                        class="close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="studentForm">
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
                            <select class="form-control" name="gender"
                            v-model="student.gender">
                                <option disabled selected>Select . . .</option>
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
                                v-model="student.birthday"
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
                            <select class="form-control" name="civil_status" 
                            v-model="student.civil_status">
                                <option disabled selected>Select . . .</option>
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
                                v-model="student.contact_num"
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
                                v-model="student.email"
                            />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="picture" class="form-label">
                                Student Photo Preview</label
                            >
                            <img
                                src=""
                                alt="..."
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
                                v-model="student.guardian_num"
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
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Close
                    </button>
                    <button class="btn btn-info">Upload Photo</button>
                    <button @click="addStudent" type="button" class="btn btn-primary">Save</button>
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
    data() {
        return {
            date: null,
            student:{
                first_name: '',
                middle_name: '',
                last_name: '',
                student_id:'',
                gender: '',
                birthday: '',
                address:'',
                civil_status: '',
                religion: '',
                contact_num: '',
                email:'',
                pic:'none',
                guardian_name:'',
                relationship:'',
                guardian_num:'',
                remarks:'',
                added_by: 0,
            },
        };
    },
    methods:{
        addStudent(){
            const Swal = SweetAlert;
            let url = 'http://127.0.0.1:8000/api/students';
            return axios.post(url,this.student).then(async()=>{
                
               Swal.fire({
                title: 'Added!',
                text: 'Student Successfully Added',
                icon: 'success',
                confirmButtonText: 'Ok'
                })
               
                $('#studentModal').modal('hide')
                
            })
        }
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
    components: {
        Datepicker,
    },
    mounted() {},
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
</style>
