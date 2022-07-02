<template>
    <body>
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
            <router-link to="/" class="navbar-brand col-sm-3 col-md-2 mr-0"
                >GSS</router-link
            >

            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="#">Sign out</a>
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
                                        Title
                                    </p>
                                    <p
                                        class="text-container ml-2 my-0 text-secondary"
                                    >
                                        Description
                                    </p>
                                    <p class="position-absolute">0</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body px-2 py-3">
                                    <p
                                        class="text-container font-weight-bold text-success ml-2 my-0"
                                    >
                                        Title
                                    </p>
                                    <p
                                        class="text-container ml-2 my-0 text-secondary"
                                    >
                                        Description
                                    </p>

                                    <p class="position-absolute">0</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body px-2 py-3">
                                    <p
                                        class="text-container font-weight-bold text-danger ml-2 my-0"
                                    >
                                        Title
                                    </p>
                                    <p
                                        class="text-container ml-2 my-0 text-secondary"
                                    >
                                        Description
                                    </p>
                                    <p class="position-absolute">0</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body px-2 py-3">
                                    <p
                                        class="text-container font-weight-bold text-warning ml-2 my-0"
                                    >
                                        Title
                                    </p>
                                    <p
                                        class="text-container ml-2 my-0 text-secondary"
                                    >
                                        Description
                                    </p>
                                    <p class="position-absolute">0</p>
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
                                        <h5 class="m-0">Lorem</h5>
                                        <b-icon-pin-angle
                                            class="align-self-center"
                                        />
                                    </div>
                                    <div class="content-1-body container-fluid">
                                        <div class="chart-container">
                                            <canvas id="myChart"></canvas>
                                        </div>
                                        <p class="mt-3">
                                            Lorem ipsum dolor sit amet
                                            consectetur adipisicing elit. Illo
                                            aliquid officia veniam commodi porro
                                            odio nihil natus exercitationem
                                            sapiente repellat laborum ipsum, hic
                                            quidem cumque quasi delectus facere
                                            placeat ullam?
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
                                            Lorem
                                        </p>
                                        <p class="py-0 my-0 text-justify">
                                            Lorem ipsum dolor, sit amet
                                            consectetur adipisicing elit. Nemo
                                            autem unde dolorum quidem mollitia
                                            culpa? Officiis neque error
                                            quibusdam praesentium nam
                                            necessitatibus eos commodi
                                            assumenda. Qui amet impedit hic
                                            cumque.
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
                                            Lorem
                                        </p>
                                        <p class="py-0 my-0 text-justify">
                                            Lorem ipsum dolor, sit amet
                                            consectetur adipisicing elit. Nemo
                                            autem unde dolorum quidem mollitia
                                            culpa? Officiis neque error
                                            quibusdam praesentium nam
                                            necessitatibus eos commodi
                                            assumenda. Qui amet impedit hic
                                            cumque.
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
        console.log("Component mounted.");

        const ctx = document.getElementById("myChart");

        const data = {
            labels: ["Red", "Blue", "Yellow"],
            datasets: [
                {
                    label: "My First Dataset",
                    data: [300, 50, 100],
                    backgroundColor: [
                        "rgb(255, 99, 132)",
                        "rgb(54, 162, 235)",
                        "rgb(255, 205, 86)",
                    ],
                    hoverOffset: 4,
                },
            ],
        };

        const myChart = new Chart(ctx, {
            type: "pie",
            data: data,
        });
    },
    data: () => ({}),
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
