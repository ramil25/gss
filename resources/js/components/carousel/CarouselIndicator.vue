<template>
    <div class="imp-carousel-indicators">
        <button
            class="imp-carousel-indicator-item"
            :class="{ active: currentIndex === index }"
            v-for="(item, index) in total"
            :key="index"
        ></button>
    </div>
</template>

<script>
export default {
    props: ["total", "currentIndex"],
};
</script>

<style scoped>
.imp-carousel-indicators {
    position: absolute;
    transform: translateX(-50%);
    left: 50%;
    bottom: 1em;
    z-index: 2;
}

.imp-carousel-indicator-item {
    width: 15px;
    height: 15px;
    border: none;
    background: #fff;
    margin: 0.2em;
    opacity: 0.5;
    border-radius: 50%;
}
.active {
    opacity: 1;
}
</style>
