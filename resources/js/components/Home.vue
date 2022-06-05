<template>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <Nav></Nav>
                </div>
            </div>
            <!--div>
                <div
                    id="carouselExampleIndicators"
                    class="carousel slide"
                    data-ride="carousel"
                >
                    <ol class="carousel-indicators">
                        <li
                            data-target="#carouselExampleIndicators"
                            data-slide-to="0"
                            class="active"
                        ></li>
                        <li
                            data-target="#carouselExampleIndicators"
                            data-slide-to="1"
                        ></li>
                        <li
                            data-target="#carouselExampleIndicators"
                            data-slide-to="2"
                        ></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active carousel-container">
                            <div
                                class="carousel-side-text-left"
                                style="background-color: rgb(27, 27, 27)"
                            >
                                <p class="side-text-1">
                                    P<br />S<br />B<br />C
                                </p>
                            </div>
                            <div
                                class="carousel-side-text-right"
                                style="background-color: rgb(27, 27, 27)"
                            >
                                <p class="side-text-2">
                                    L<br />A<br />G<br />U<br />N<br />A
                                </p>
                            </div>
                            <img
                                class="d-block w-100"
                                src="https://img5.schoolandcollegelistings.com/584/158/359129785841582.jpg"
                                alt="First slide"
                            />
                        </div>
                        <div class="carousel-item carousel-container">
                            <div
                                class="carousel-side-text-left"
                                style="background-color: #143d59"
                            >
                                <p class="side-text-1">
                                    P<br />S<br />B<br />C
                                </p>
                            </div>
                            <div
                                class="carousel-side-text-right"
                                style="background-color: #143d59"
                            >
                                <p class="side-text-2">
                                    L<br />A<br />G<br />U<br />N<br />A
                                </p>
                            </div>
                            <img
                                class="d-block w-100"
                                src="https://iampsbc.com/storage/campus_img/120098453_2046427675489146_1692844677728555538_n_1641430691.jpg"
                                alt="Second slide"
                            />
                        </div>
                        <div class="carousel-item carousel-container">
                            <div
                                class="carousel-side-text-left"
                                style="background-color: #f4b41a"
                            >
                                <p class="side-text-1">
                                    P<br />S<br />B<br />C
                                </p>
                            </div>
                            <div
                                class="carousel-side-text-right"
                                style="background-color: #f4b41a"
                            >
                                <p class="side-text-2">
                                    L<br />A<br />G<br />U<br />N<br />A
                                </p>
                            </div>
                            <img
                                class="d-block w-100"
                                src="https://img3.schoolandcollegelistings.com/758/624/241683187586243.jpg"
                                alt="Third slide"
                            />
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="mt-5">
                            <h3>About</h3>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur
                                adipisicing elit. Tempora commodi, tempore
                                nostrum a quod neque illum soluta nulla numquam,
                                necessitatibus nemo! Amet quis odio numquam ut
                                recusandae eius labore fugiat! <br />
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Tenetur ratione molestiae quam
                                iusto cumque cupiditate atque, provident non
                                odit autem deserunt reiciendis impedit voluptas
                                doloremque pariatur quas repellat, maxime
                                possimus?
                                <br />
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Tenetur ratione molestiae quam
                                iusto cumque cupiditate atque, provident non
                                odit autem deserunt reiciendis impedit voluptas
                                doloremque pariatur quas repellat, maxime
                                possimus?
                            </p>
                        </div>
                    </div>
                </div>
            </div-->
        </div>
    </body>
</template>

<script>
import Nav from "../components/Nav.vue";

export default {
    mounted() {
        console.log("Component mounted.");
    },
    components: { Nav },
};
</script>

<style scoped>
body {
    /**padding-top: 85px;**/
}
.carousel-container {
    height: 60vh;
}

.carousel-container > img {
    height: 100%;
    object-fit: contain;
}

.carousel-side-text-left {
    position: absolute;
    height: 100%;
    width: 5em;
    left: 0;
}

.carousel-side-text-left .side-text-1 {
    color: white;
    text-align: center;
    font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
    font-size: 10vh;
}
.carousel-side-text-right {
    position: absolute;
    height: 100%;
    width: 5em;
    right: 0;
}

.carousel-side-text-right .side-text-2 {
    color: white;
    text-align: center;
    font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
    font-size: 6.5vh;
}

@media (max-width: 570px) {
    body {
        padding-top: 125px;
    }
}
</style>
