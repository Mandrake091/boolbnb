<template>
    <jumbotron>
        <div class="wallpaper"></div>

        <div class="container align-items-center">
            <!-- <div class="row pt-2">
                <img src="/images/logo.png" alt="" />
            </div> -->
            <div
                class="row h-100 align-items-center justify-content-center text-center"
            >
                <div class="col-6">
                    <div>
                        <h1
                            data-aos="fade-down"
                            data-aos-offset="200"
                            data-aos-delay="150"
                            data-aos-duration="2000"
                        >
                            Voglia di viaggiare?
                        </h1>
                        <button
                            class="btn btn-success"
                            data-aos="fade-up"
                            data-aos-offset="200"
                            data-aos-delay="200"
                            data-aos-duration="2000"
                        >
                            Clicca qui
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </jumbotron>
</template>

<script>
import AOS from "aos";
import "aos/dist/aos.css"; // You can also use <link> for styles
// ..
AOS.init();
// import { Carousel, Slide } from "vue-carousel";

export default {
    name: "LandingPageComponent",
    components: {},
    data() {
        return {
            houses: [],
            // posts: [],
        };
    },
    mounted() {
        // axios
        //     .get("/api/houses/")
        //     .then((res) => {
        //         this.houses = res.data;
        //         console.log(this.houses);
        //     })
        //     .catch((err) => {
        //         console.log(err);
        //     });
        // axios.get("/api/posts/").then((res) => {
        //     this.posts = res.data.slice(0, 3);
        //     console.log(this.posts);
        // });
    },
};
</script>
<style lang="scss" scoped>
.wallpaper {
    background-image: url("https://img.wallpapersafari.com/desktop/1536/864/9/32/YF5sBZ.jpg");
    background-repeat: no-repeat;
    width: 100%;
    height: 100vh;
    background-position: center center;
    background-size: cover;
    filter: brightness(80%) contrast(105%);
    position: absolute;
    z-index: -1;
}
.container {
    height: 100vh;
    width: 100vw;
    h1 {
        font-size: 5em;
        color: white;
        filter: drop-shadow(5px 0px 5px black);
    }
}
</style>
