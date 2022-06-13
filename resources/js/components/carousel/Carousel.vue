<template>
    <div class="imp-carousel">
        <div class="carousel-side-text-left">
            <p class="side-text-1">P<br />S<br />B<br />C</p>
        </div>
        <div class="carousel-side-text-right">
            <p class="side-text-2">L<br />A<br />G<br />U<br />N<br />A</p>
        </div>
        <div class="imp-carousel-inner">
            <carousel-indicator
                :total="slides.length"
                :current-index="currentSlide"
            ></carousel-indicator>
            <carousel-item
                v-for="(slide, index) in slides"
                :slide="slide"
                :key="`item-${index}`"
                :current-slide="currentSlide"
                :index="index"
            ></carousel-item>
        </div>
    </div>
</template>

<script>
import CarouselItem from "./CarouselItem.vue";
import CarouselIndicator from "./CarouselIndicator.vue";

export default {
    props: ["slides"],
    components: { CarouselItem, CarouselIndicator },
    data: () => ({
        currentSlide: 0,
        slideInterval: null,
    }),
    methods: {
        setCurrentSlide(index) {
            this.currentSlide = index;
        },
    },
    mounted() {
        this.slideInterval = setInterval(() => {
            const index =
                this.currentSlide < this.slides.length - 1
                    ? this.currentSlide + 1
                    : 0;
            this.setCurrentSlide(index);
        }, 5000);
    },
    beforeUnmount() {
        clearInterval(this.slideInterval);
    },
};
</script>

<style scoped>
.imp-carousel {
    display: flex;
    justify-content: center;
    background-color: aliceblue;
}
.imp-carousel-inner {
    position: relative;
    width: 80%;
    height: 60vh;
    text-align: center;
    overflow: hidden;
}

carousel-side-text-left .side-text-1 {
    color: white;
    text-align: center;
    font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
    font-size: 10vh;
}
.carousel-side-text-left {
    position: absolute;
    height: 60vh;
    width: 5em;
    left: 15px;
    background-color: rgb(27, 27, 27);
}

.carousel-side-text-left .side-text-1 {
    color: white;
    text-align: center;
    font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
    font-size: 10vh;
}
.carousel-side-text-right {
    position: absolute;
    height: 60vh;
    width: 5em;
    right: 15px;
    background-color: rgb(27, 27, 27);
}

.carousel-side-text-right .side-text-2 {
    color: white;
    text-align: center;
    font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
    font-size: 6.5vh;
}
</style>
