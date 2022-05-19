<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                
                    <Nav></Nav>
                
            </div>
        </div>
    </div>
</template>

<script>

import Nav from '../components/Nav.vue';

    export default {
    mounted() {
        console.log("Component mounted.");
    },
    components: { Nav }
}
</script>
