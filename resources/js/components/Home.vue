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
                        <p class="text-justify">
                            Guidance Service System (GSS) is a system where
                            professional CTO staff members and peer counselors
                            are educated to help individuals or groups of
                            students gain a better awareness of themselves and
                            their environment.
                        </p>
                        <h5>Who we are</h5>
                        <p class="text-justify">
                            Paete Science and Business College, Inc. (formerly
                            Eastern Laguna Colleges, Inc.) is a private school
                            in Paete, Laguna. It was founded in 2009 and
                            currently has two campuses in the province—the Main
                            Campus, with programs from kindergarten to the
                            graduate level, and the Pagsanjan Annex, with a K-12
                            program. For Senior High School (SHS) students, PSBC
                            provides the ABM, GAS, HUMSS, STEM, and TVL-HE
                            strands.
                        </p>
                        <h5>Vision</h5>
                        <p class="text-justify">
                            The PSBC's sees itself in the not so distant future
                            as one of the leading learning centres in the fourth
                            district of Laguna that will provide quality and
                            relevant education.
                        </p>
                        <h5>Mission</h5>
                        <p class="text-justify">
                            We, the team PSBC, commit ourselves in maintaining a
                            peace-loving, student-friendly environment, but
                            academically proficient in Science, Mathematics,
                            Communication and Information Technology, and more
                            importantly, the curricula are all anchored on
                            Christian Values, that will ensure a happy yet
                            meaningful life to all.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 contact p-3" id="contacts">
            <h3 class="text-center text-light">Contacts</h3>
            <div class="container-fluid d-flex mt-3">
                <div class="col-md-6 text-light">
                    <h6 class="text-center">Paete</h6>
                    <span class="d-flex"
                        ><b-icon-geo-alt-fill
                            class="text-light d-flex align-self-center"
                        />
                        &nbsp; J.P. Rizal Street Paete Laguna</span
                    >
                    <span class="d-flex mt-1"
                        ><b-icon-envelope-fill
                            class="text-light d-flex align-self-center"
                        />
                        &nbsp; psbc.family.school@gmail.com</span
                    >
                    <span class="d-flex mt-1"
                        ><b-icon-telephone-fill
                            class="text-light d-flex align-self-center"
                        />
                        &nbsp; (049)557-0184</span
                    >
                </div>
                <div class="col-md-6 text-light">
                    <h6 class="text-center">Pagsanjan</h6>
                    <span class="d-flex"
                        ><b-icon-geo-alt-fill
                            class="text-light d-flex align-self-center"
                        />
                        &nbsp; Brgy. Sampaloc, Pagsanjan, Laguna</span
                    >
                    <span class="d-flex mt-1"
                        ><b-icon-envelope-fill
                            class="text-light d-flex align-self-center"
                        />
                        &nbsp; psbcpagsanjan@gmail.com</span
                    >
                    <span class="d-flex mt-1"
                        ><b-icon-telephone-fill
                            class="text-light d-flex align-self-center"
                        />
                        &nbsp; 09157593201</span
                    >
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
import {
    BIconGeoAltFill,
    BIconTelephoneFill,
    BIconEnvelopeFill,
} from "bootstrap-icons-vue";

export default {
    mounted() {
        console.log("Component mounted.");
    },
    data: () => ({
        slides: [carouselItem1, carouselItem2, carouselItem3],
    }),
    components: {
        Nav,
        Carousel,
        BIconGeoAltFill,
        BIconTelephoneFill,
        BIconEnvelopeFill,
    },
};
</script>

<style scoped>
body {
    padding-top: 85px;
}

.contact {
    width: 100%;
    height: 30%;
    background-color: #252525;
}

@media (max-width: 570px) {
    body {
        padding-top: 125px;
    }
}
</style>
