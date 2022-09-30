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
                    class="col-md-9 ml-sm-auto col-lg-10 pt-2 px-4"
                >
                    <div class="tab-nav">
                        <ul class="row">
                            <router-link
                                class="router-link col-md-3"
                                :class="{ isActive: studentView }"
                                to="/students"
                                @click="isTabActive(1)"
                                >Students</router-link
                            >
                            <router-link
                                class="router-link col-md-3"
                                :class="{ isActive: filesView }"
                                to="/students/d-files"
                                @click="isTabActive(2)"
                                >Downloadable Files</router-link
                            >
                            <router-link
                                class="router-link col-md-3"
                                :class="{ isActive: testResultView }"
                                to="/students/test-results"
                                @click="isTabActive(3)"
                                >Test Results
                            </router-link>
                            <router-link
                                class="router-link col-md-3"
                                :class="{ isActive: counselResultView }"
                                to="/students/counseling-results"
                                @click="isTabActive(4)"
                            >
                                Counseling Results
                            </router-link>
                        </ul>
                    </div>

                    <div class="mt-3">
                        <router-view></router-view>
                    </div>
                </main>
            </div>
        </div>
    </body>
</template>

<script>
import Sidebar from "../components/layout/Sidebar.vue";
export default {
    data() {
        return {
            studentView: false,
            filesView: false,
            testResultView: false,
            counselResultView: false,
        };
    },
    methods: {
        isTabActive(tabNum) {
            if (tabNum == 1) {
                this.studentView = true;
                this.filesView = false;
                this.testResultView = false;
                this.counselResultView = false;
            } else if (tabNum == 2) {
                this.studentView = false;
                this.filesView = true;
                this.testResultView = false;
                this.counselResultView = false;
            } else if (tabNum == 3) {
                this.studentView = false;
                this.filesView = false;
                this.testResultView = true;
                this.counselResultView = false;
            } else if (tabNum == 4) {
                this.studentView = false;
                this.filesView = false;
                this.testResultView = false;
                this.counselResultView = true;
            }
        },
        currentTab() {
            if (this.$route.name == "Default") {
                this.studentView = true;
            } else if (this.$route.name == "DFiles") {
                this.filesView = true;
            } else if (this.$route.name == "TestResults") {
                this.testResultView = true;
            } else if (this.$route.name == "CounselingResults") {
                this.counselResultView = true;
            }
        },
    },
    components: { Sidebar },
    mounted() {
        this.currentTab();
    },
};
</script>

<style scoped>
body {
    background-color: #f0f0f0;
}

.tab-nav {
    background-color: aliceblue;
}

.tab-nav > ul {
    list-style-type: none;
    margin: 0;
    padding-left: 0;
}

.router-link {
    text-decoration: none;
    background-color: #3b3f46;
    border-right: 1px solid #f0f0f0;
    color: #f0f0f0;
    padding: 10px;
    text-align: center;
}

.router-link:hover,
.isActive {
    background-color: rgb(119, 119, 119);
}
</style>
