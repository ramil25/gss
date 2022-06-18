<template>
    <body>
        <div
            class="row d-flex align-items-center justify-content-around login-form"
        >
            <img
                src="../../assets/PSBC-eagle.png"
                alt="animal_logo"
                class="animal-logo animate fadeInLeft"
            />
            <div class="col-sm-4">
                <div class="card animate fadeInRight">
                    <div class="card-body">
                        <p class="h5 text-center text-muted pt-2">
                            Welcome to PSBC<br />
                            Guidance Services System
                        </p>
                        <div class="text-center">
                            <img
                                src="../../assets/PSBC-logo-darker.png"
                                class="rounded"
                                alt="school_logo"
                            />
                        </div>
                        <hr />
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1"
                                    >Email address</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    placeholder="Enter email"
                                />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"
                                    >Password</label
                                >
                                <input
                                    v-if="showPassword"
                                    type="text"
                                    class="form-control"
                                    v-model="password"
                                    placeholder="Password"
                                />
                                <input
                                    v-else
                                    type="password"
                                    class="form-control"
                                    v-model="password"
                                    placeholder="Password"
                                />
                            </div>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="showPassword"
                                    @click="togglePassword"
                                />
                                <label
                                    class="form-check-label"
                                    for="exampleCheck1"
                                    >Show password</label
                                >
                            </div>
                            <router-link to="/" class="home-link"
                                >Back to home</router-link
                            >

                            <button type="submit" class="btn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            showPassword: false,
            password: null,
        };
    },
    methods: {
        togglePassword() {
            this.showPassword = !this.showPassword;
        },
    },
};
</script>

<style scoped>
body {
    height: 100vh;
    background: url("../../assets/PSBC-bg.png") no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    overflow-x: hidden;
}

img {
    width: 80px;
    height: 80px;
}

.animal-logo {
    width: 100px;
    height: 100px;
}

.home-link {
    margin-top: 17px;
    float: left;
    color: #7e5a29;
}
.btn {
    background-color: rgb(19, 19, 19);
    color: white;
    border-color: rgb(19, 19, 19);
    margin-top: 10px;
    float: right;
    width: 100px;
}

.card-body {
    padding-top: 5px;
}

p {
    font-family: "Seoge UI";
}

@media (min-width: 570px) {
    .login-form {
        position: relative;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .animal-logo {
        width: 60vh;
        height: 60vh;
    }

    @-webkit-keyframes fadeInLeft {
        from {
            opacity: 0;
            -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0);
        }
        to {
            opacity: 1;
            -webkit-transform: none;
            transform: none;
        }
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0);
        }
        to {
            opacity: 1;
            -webkit-transform: none;
            transform: none;
        }
    }

    @-webkit-keyframes fadeInRight {
        from {
            opacity: 0;
            -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
        }
        to {
            opacity: 1;
            -webkit-transform: none;
            transform: none;
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
        }
        to {
            opacity: 1;
            -webkit-transform: none;
            transform: none;
        }
    }

    .animate {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        animation-fill-mode: both;
        -webkit-animation-fill-mode: both;
    }

    .fadeInLeft {
        -webkit-animation-delay: 0.5s;
        -moz-animation-delay: 0.5s;
        animation-delay: 0.5s;
        -webkit-animation-name: fadeInLeft;
        animation-name: fadeInLeft;
    }

    .fadeInRight {
        -webkit-animation-delay: 0.5s;
        -moz-animation-delay: 0.5s;
        animation-delay: 0.5s;
        -webkit-animation-name: fadeInRight;
        animation-name: fadeInRight;
    }
}
</style>
