<template>
    <section>
        <div v-if="house" class="main-container">
            <h1>{{ house.title }}</h1>
            <img :src="`/storage/${house.image}`" alt="" />
            <h2>{{ house.type.name }} - Host: {{house.user.name}}</h2>
            <hr>
            <div class="info">
                <div>
                    <i class="fa-solid fa-person-shelter"></i> Numero di stanze: <span>{{ house.n_room }}</span>
                </div><div class="mid-dot">&middot;</div>
                <div>
                    <i class="fa-solid fa-bed"></i> Numero di letti: <span>{{ house.n_bed }}</span>
                </div><div class="mid-dot">&middot;</div>
                <div>
                    <i class="fa-solid fa-bath"></i> Numero di bagni: <span>{{ house.n_bathroom }}</span>
                </div><div class="mid-dot">&middot;</div>
                <div>
                    <i class="fa-solid fa-house"></i> Metri quadrati: <span>{{ house.square_meters }}</span>
                </div>
            </div>
            <hr>
            <p v-html="house.description"></p>
            <div>
                <h3>Servizi:</h3>
                <ul v-if="house.services">
                    <li v-for="service in house.services" :key="service.id">
                        {{ service.name }}
                    </li>
                </ul>
            </div>
            <div>
                Prezzo per notte: <span>{{ house.night_price }}€</span>
            </div>
            <h4>
                Disponibile dal {{ house.check_in }} al {{ house.check_out }}
            </h4>
        </div>
    </section>
</template>

<script>
export default {
    name: "SingleHouseComponent",
    components: {},
    data() {
        return {
            house: null,
            // formData:(
            //     {
            //         'username':'',
            //         'comment': '',
            //         'post_id': '',
            //     }
            // )
        };
    },
    methods: {
        // addComment() {
        //     axios
        //         .post("/api/comments", this.formData)
        //         .then((response) => {
        //             this.formData.username = "";
        //             this.formData.comment = "";
        //             this.post.comments.push(response.data);
        //         })
        //         .catch((error) => {
        //             console.log(error);
        //         });
        // },
    },
    mounted() {
        const slug = this.$route.params.slug;
        axios
            .get(`/api/houses/${slug}`)
            .then((response) => {
                console.log(response);
                this.house = response.data;
                // this.formData.post_id = this.post.id;
            })
            .catch((error) => {
                this.$router.push({ name: "page-404" });
            });
    },
};
</script>
<style lang="scss" scoped>
.main-container {
    margin: 20px auto;
    width: 80vw;
    h2{
        margin-top: 40px;
    }
    img {
        width: 90%;
    }
    .info {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
        margin-top: 30px;
        .mid-dot{
            line-height: 1rem;
            font-size: 2rem;
        }
    }
}
</style>
