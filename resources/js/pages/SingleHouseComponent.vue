<template>
    <section>
        <div v-if="house" class="main-container">
            <h1>{{ house.title }}</h1>
            <img :src="`/storage/${house.image}`" alt="" />
            <div class="row">
                <div class="col-7">
                    <h2>{{ house.type.name }} - Host: {{ house.user.name }}</h2>
                    <hr />
                    <div class="info">
                        <div>
                            <i class="fa-solid fa-person-shelter"></i> Numero di
                            stanze: <span>{{ house.n_room }}</span>
                        </div>
                        <div class="mid-dot">&middot;</div>
                        <div>
                            <i class="fa-solid fa-bed"></i> Numero di letti:
                            <span>{{ house.n_bed }}</span>
                        </div>
                        <div class="mid-dot">&middot;</div>
                        <div>
                            <i class="fa-solid fa-bath"></i> Numero di bagni:
                            <span>{{ house.n_bathroom }}</span>
                        </div>
                        <div class="mid-dot">&middot;</div>
                        <div>
                            <i class="fa-solid fa-house"></i> Metri quadrati:
                            <span>{{ house.square_meters }}</span>
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
                        Prezzo per notte: <span>{{ house.night_price }}€</span>
                    </div>
                    <h4>
                        Disponibile dal {{ house.check_in }} al
                        {{ house.check_out }}
                    </h4>
                </div>
                <div class="col-5">
                    <MapComponent :longitude="longitude" :latitude="latitude" />
                </div>
            </div>
        </div>

        <div>
            <form @submit.prevent="sendMessage()">
                <label for="name">Inserisci il tuo nome:</label>
                <input v-model="formData.name" type="text" class="my-input" />
                <label for="surname">Inserisci il tuo cognome:</label>
                <input
                    v-model="formData.surname"
                    type="text"
                    class="my-input"
                />
                <label for="email">Inserisci la tua email:</label>
                <input v-model="formData.email" type="text" class="my-input" />
                <label for="text">Inserisci il tuo messaggio:</label>
                <input v-model="formData.text" type="text" class="my-input" />
                <button type="submit">Invia</button>
            </form>
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
</style>
