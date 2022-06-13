<template>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <Nav></Nav>
                </div>
            </div>
            <carousel :slides="slides"></carousel>
            <div class="container-fluid mt-5" id="about">
                <div class="row">
                    <div>
                        <h3>About</h3>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing
                            elit. Tempora commodi, tempore nostrum a quod neque
                            illum soluta nulla numquam, necessitatibus nemo!
                            Amet quis odio numquam ut recusandae eius labore
                            fugiat! <br />
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Tenetur ratione molestiae quam iusto cumque
                            cupiditate atque, provident non odit autem deserunt
                            reiciendis impedit voluptas doloremque pariatur quas
                            repellat, maxime possimus?
                            <br />
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Tenetur ratione molestiae quam iusto cumque
                            cupiditate atque, provident non odit autem deserunt
                            reiciendis impedit voluptas doloremque pariatur quas
                            repellat, maxime possimus?
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</template>

<script>
import Nav from "../components/Nav.vue";
import Carousel from "../components/carousel/Carousel.vue";
import carouselItem1 from "../../assets/carousel-item-1.jpg";
import carouselItem2 from "../../assets/carousel-item-2.jpg";
import carouselItem3 from "../../assets/carousel-item-3.jpg";

export default {
    mounted() {
        console.log("Component mounted.");
    },
    data: () => ({
        slides: [carouselItem1, carouselItem2, carouselItem3],
    }),
    components: { Nav, Carousel },
};
</script>

<style scoped>
body {
    padding-top: 85px;
}

@media (max-width: 570px) {
    body {
        padding-top: 125px;
    }
}
</style>
