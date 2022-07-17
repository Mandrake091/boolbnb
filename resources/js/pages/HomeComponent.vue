<template>
    <section class="pt-5">
        <h1>Ciao</h1>
        <div v-for="(house, index) in houses" :key="index">
            {{house.title}}
        </div>
        
        <div class="container h-100 pt-5">
            <div class="row h-100 justify-content-center">
                <div class="col-3 text-white">
                    <h4>Appartamenti</h4>
                    <ul>
                        <li
                            v-for="(house, index) in houses"
                            :key="index"
                        >
                        </li>
                    </ul>
                </div>
                <div class="col-9">
                    <div v-if="houses.length > 0">
                            <div v-for="(house, index) in houses" :key="index">
                                <div class="card mx-auto" style="width: 18rem">
                                    <img
                                        class="img-fluid card-img-top"
                                        :src="`/storage/${house.image}`"

                                    />
                                    <div class="card-body">
                                        <h5 class="card-title">{{house.title}}</h5>
                                        <p class="card-text">
                                           {{house.content}}
                                        </p>
                                        <a href="#" class="btn btn-primary"
                                            >Go somewhere</a
                                        >
                                    </div>
                                </div>
                                <img />
                            </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>
</template>

<script>
// import { Carousel, Slide } from "vue-carousel";

export default {
    name: "HomeComponent",
    components: { 
    
    },
    data() {
        return {
            houses: [],
            // posts: [],
        };
    },
    mounted() {
        axios
            .get("/api/houses/")
            .then((res) => {
                this.houses = res.data;
                console.log(this.houses);
            })
            .catch((err) => {
                console.log(err);
            });
        // axios.get("/api/posts/").then((res) => {
        //     this.posts = res.data.slice(0, 3);
        //     console.log(this.posts);
        // });
    },
};
</script>