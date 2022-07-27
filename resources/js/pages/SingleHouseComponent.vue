<template>
    <section>
        <div v-if="house" class="main-container">
            <h1>{{ house.title }}</h1>
            <img :src="`/storage/${house.image}`" alt="" />
            <div class="row">
                <div class="col-12 col-md-7 text-center text-md-left">
                    <h2>{{ house.type.name }} - Host: {{ house.user.name }}</h2>
                    <hr />
                    <div class="info flex-column flex-md-row">
                        <div>
                            <i class="fa-solid fa-person-shelter"></i> <span>{{ house.n_room }} stanze</span>
                        </div>

                        <div>
                            <i class="fa-solid fa-bed"></i> 
                            <span>{{ house.n_bed }} letti</span>
                        </div>

                        <div>
                            <i class="fa-solid fa-bath"></i>
                            <span>{{ house.n_bathroom }} bagni</span>
                        </div>

                        <div>
                            <i class="fa-solid fa-house"></i>
                            <span>{{ house.square_meters }} mq</span>
                        </div>
                    </div>
                    <hr />
                    <p v-html="house.description"></p>
                    <div>
                        <h3>Servizi:</h3>
                        <ul v-if="house.services">
                            <li
                                v-for="service in house.services"
                                :key="service.id"
                            >
                                {{ service.name }}
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3>Prezzo per notte:</h3>
                        <p>{{ house.night_price }}€</p>
                    </div>
                    <div>
                        <h3>Disponibilità:</h3>
                        <p>dal {{ house.check_in }} al {{ house.check_out }}</p>
                    </div>
                </div>
                <div class="col-5 align-items-center d-flex">
                    <MapComponent :longitude="longitude" :latitude="latitude" />
                </div>
            </div>
            <hr>
            <div class="row flex-column pt-3 w-100">
                <div>
                    <form @submit.prevent="sendMessage()">
                        <div
                            class="input-group-text p-3 flex-column w-50 mx-auto"
                        >
                            <h3>Contattami qui:</h3>
                            <label for="name">Inserisci il tuo nome:</label>
                            <input
                                v-model="formData.name"
                                type="text"
                                class="my-input w-75 form-control"
                            />

                            <label for="surname"
                                >Inserisci il tuo cognome:</label
                            >
                            <input
                                v-model="formData.surname"
                                type="text"
                                class="my-input w-75 form-control"
                            />
                            <label for="email">Inserisci la tua email:</label>
                            <input
                                v-model="formData.email"
                                type="text"
                                class="my-input w-75 form-control"
                            />
                            <label for="text"
                                >Inserisci il tuo messaggio:</label
                            >
                            <textarea
                                v-model="formData.text"
                                type="text"
                                class="my-input form-control w-75"
                                rows="4"
                                cols="50"
                            />
                            <button class="btn btn-primary mt-3" type="submit">
                                Invia
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import MapComponent from "./MapComponent.vue";
export default {
    name: "SingleHouseComponent",
    components: {
        MapComponent,
    },

    data() {
        return {
            house: null,
            formData: {
                name: "",
                surname: "",
                email: "",
                text: "",
                house_id: "",
                latitude: "",
                longitude: "",
            },
        };
    },
    methods: {
        sendMessage() {
            axios
                .post("/api/messages", this.formData)
                .then((response) => {
                    this.formData.name = "";
                    this.formData.surname = "";
                    this.formData.email = "";
                    this.formData.text = "";
                    // this.house.messages.push(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
    created() {},
    mounted() {
        const slug = this.$route.params.slug;
        axios
            .get(`/api/houses/${slug}`)
            .then((response) => {
                this.house = response.data;
                this.latitude = this.house.latitude;
                this.longitude = this.house.longitude;
                console.log(this.latitude);
                console.log(this.longitude);
                this.formData.house_id = this.house.id;
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
    h2 {
        margin-top: 40px;
    }
    img {
        width: 100%;
    }
    .info {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
        margin-top: 30px;
        .mid-dot {
            line-height: 1rem;
            font-size: 2rem;
        }
    }
   
}

// MEDIA QUERY
@media only screen and (max-width: 797px) {
    .input-group-text {
        width: 100% !important;
    }
}
</style>
