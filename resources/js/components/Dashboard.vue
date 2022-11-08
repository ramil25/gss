<template>
    <body>
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
            <router-link to="/" class="navbar-brand col-sm-3 col-md-2 mr-0"
                >GSS</router-link
            >

            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="" @click.prevent="logout"
                        >Sign out</a
                    >
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <Sidebar></Sidebar>

                <main
                    role="main"
                    class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"
                >
                    <h2>Dashboard</h2>

                    <!-- Dashboard sub-item cards -->
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body px-2 py-3">
                                    <p
                                        class="text-container font-weight-bold text-primary ml-2 my-0"
                                    >
                                        Users
                                    </p>
                                    <p
                                        class="text-container ml-2 my-0 text-secondary"
                                    >
                                        Total users
                                    </p>
                                    <p class="position-absolute">
                                        {{ userCount }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body px-2 py-3">
                                    <p
                                        class="text-container font-weight-bold text-success ml-2 my-0"
                                    >
                                        Students
                                    </p>
                                    <p
                                        class="text-container ml-2 my-0 text-secondary"
                                    >
                                        Total students
                                    </p>

                                    <p class="position-absolute">
                                        {{ studentCount }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body px-2 py-3">
                                    <p
                                        class="text-container font-weight-bold text-danger ml-2 my-0"
                                    >
                                        Test
                                    </p>
                                    <p
                                        class="text-container ml-2 my-0 text-secondary"
                                    >
                                        Total results
                                    </p>
                                    <p class="position-absolute">
                                        {{ testCount }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body px-2 py-3">
                                    <p
                                        class="text-container font-weight-bold text-warning ml-2 my-0"
                                    >
                                        Counsel
                                    </p>
                                    <p
                                        class="text-container ml-2 my-0 text-secondary"
                                    >
                                        Total results
                                    </p>
                                    <p class="position-absolute">
                                        {{ counselCount }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dashboard main items -->
                    <div class="container mt-4">
                        <div class="row g-2">
                            <div class="col-md-7 m-0 pl-0">
                                <div
                                    class="row-md-7 bg-light content-1 box-effect"
                                >
                                    <div
                                        class="content-1-header container-fluid d-flex justify-content-between"
                                    >
                                        <h5 class="m-0">My Chart</h5>
                                        <b-icon-pin-angle
                                            class="align-self-center"
                                        />
                                    </div>
                                    <div class="content-1-body container-fluid">
                                        <div class="chart-container">
                                            <canvas id="myChart"></canvas>
                                        </div>
                                        <p class="mt-3">
                                            The above chart is the
                                            representation of numbers of counsel
                                            results by gender. Pink-ish color
                                            represents the data of every female
                                            students. Blue-ish color represents
                                            the data of every male students.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row content-2 bg-light box-effect">
                                    <div class="container-fluid">
                                        <p
                                            class="py-2 m-0 font-weight-bold text-dark"
                                        >
                                            Documents
                                        </p>
                                        <p class="py-0 my-0 text-justify">
                                            For now, there is no available
                                            document.
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="row content-3 bg-light box-effect mt-2"
                                >
                                    <div class="container-fluid">
                                        <p
                                            class="py-2 m-0 font-weight-bold text-dark"
                                        >
                                            Downloadable Files
                                        </p>
                                        <p class="py-0 my-0 text-justify">
                                            For now, there is no available
                                            downloadable file.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
</template>

<script>
import { BIconPinAngle } from "bootstrap-icons-vue";
import Sidebar from "../components/layout/Sidebar.vue";
import Chart from "chart.js/auto";

export default {
    name: "Dashboard",
    mounted() {
        this.countUser();
        this.countStudent();
        this.countTest();
        this.countCounsel();
        this.countCounselFemale();
        this.countCounselMale();
        console.log(this.maleCounsel);

        const ctx = document.getElementById("myChart");

        const data = {
            labels: ["Counsel Results (Female)", "Counsel Results (Male)"],
            datasets: [
                {
                    label: "My First Dataset",
                    data: [this.femaleCounsel, this.maleCounsel],
                    backgroundColor: ["rgb(255, 99, 132)", "rgb(54, 162, 235)"],
                    hoverOffset: 4,
                },
            ],
        };

        const myChart = new Chart(ctx, {
            type: "pie",
            data: data,
        });
    },
    data() {
        return {
            userCount: 0,
            studentCount: 0,
            testCount: 0,
            counselCount: 0,
            maleCounsel: this.$storage.getStorageSync("maleCounsel"),
            femaleCounsel: this.$storage.getStorageSync("femaleCounsel"),
        };
    },
    beforeCreate() {
        const isLogin = this.$storage.getStorageSync("isLogin");
        if (isLogin == false || isLogin == null) {
            this.$router.push({ path: "/login" });
        }
    },
    methods: {
        logout() {
            this.$storage.clearStorageSync();
            this.$router.push({ path: "/" });
        },
        countUser() {
            let url = "http://127.0.0.1:8000/api/countUser";
            axios
                .post(url)
                .then((response) => (this.userCount = response.data));
        },
        countStudent() {
            let url = "http://127.0.0.1:8000/api/countStudent";
            axios
                .post(url)
                .then((response) => (this.studentCount = response.data));
        },
        countTest() {
            let url = "http://127.0.0.1:8000/api/countTest";
            axios
                .post(url)
                .then((response) => (this.testCount = response.data));
        },
        countCounsel() {
            let url = "http://127.0.0.1:8000/api/countCounsel";
            axios
                .post(url)
                .then((response) => (this.counselCount = response.data));
        },
        countCounselFemale() {
            let url = "http://127.0.0.1:8000/api/counselFemale";
            axios
                .post(url)
                .then((response) =>
                    this.$storage.setStorageSync("femaleCounsel", response.data)
                )
                .catch((error) => {
                    console.log(error);
                });
        },
        countCounselMale() {
            let url = "http://127.0.0.1:8000/api/counselMale";
            axios
                .post(url)
                .then((response) =>
                    this.$storage.setStorageSync("maleCounsel", response.data)
                )
                .catch((error) => {
                    console.log(error);
                });
        },
    },
    components: {
        Sidebar,
        BIconPinAngle,
    },
};
</script>

<style scoped>
body {
    background-color: #f0f0f0;
}
nav.sidebar {
    min-height: 100vh;
}

.card {
    box-shadow: 5px 5px #888888;
    margin-right: 5px;
}
.text-container {
    max-width: 70%;
}

.position-absolute {
    right: 15px;
    top: 50%;
    transform: translate(-50%, -50%);
    font-size: 20px;
}

.box-effect {
    box-shadow: 0 0 3px #b6b6b6;
    border-radius: 5px;
}

.content-1 {
    height: 26em;
}

.content-1-header {
    border-radius: 5px 5px 0 0;
    background-color: #ffebc6;
    padding-top: 5px;
    padding-bottom: 7px;
}

.content-1-header > h5 {
    color: rgb(61, 61, 61);
}

.sample-chart > img {
    width: 400px;
    min-width: 200px;
    margin-top: 10px;
}

.content-1-body > p {
    text-align: justify;
}

.content-2 {
    height: 12.8em;
    overflow-y: scroll;
}

.content-3 {
    height: 12.7em;
    overflow-y: scroll;
}

.chart-container {
    width: 265px;
    height: 265px;
    margin-left: auto;
    margin-right: auto;
}
</style>
