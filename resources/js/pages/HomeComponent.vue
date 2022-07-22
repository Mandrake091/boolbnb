<template>
    <div class="container">
        <div class="jumbotron">
            <img src="/images/sea.jpg" alt="" />
        </div>
        <!-- <div
            ref="search"
            id="search"
            class="search"
            @change="getFilteredApartments"
        >
            Inserisci il tuo indirizzo completo
        </div> -->
        <div class="searchhome">
            <input
                type="search"
                v-model="indirizzo"
                @change="getFilteredApartments"
                id="s"
                name="s"
                placeholder="Cerca un appartamento"
            />
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <div class="row justify-content-start pt-4">
            <div class="col-6">
                <label for="room">Numero di stanze</label>
                <select
                    class="form-select form-select-sm text-center m-auto"
                    @change="getFilteredApartments"
                    v-model="textRoom"
                >
                    <option value=""></option>
                    <option
                        :value="room"
                        v-for="(room, index) in numberMaxRooms"
                        :key="index"
                    >
                        {{ room }}
                    </option>
                </select>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-6">
                <label for="bed">Numero di letti</label>
                <select
                    class="form-select form-select-sm text-center m-auto"
                    @change="getFilteredApartments"
                    v-model="textBed"
                >
                    <option value=""></option>
                    <option
                        :value="bed"
                        v-for="(bed, index) in numberMaxRooms"
                        :key="index"
                    >
                        {{ bed }}
                    </option>
                </select>
            </div>
        </div>

        <div class="row pt-2">
            <div class="col-2">
                <p>Servizi:</p>
                <div
                    class="checkbox"
                    v-for="(service, index) in services"
                    :key="index"
                >
                    <input
                        type="checkbox"
                        :id="service.name"
                        v-model="selectedServices"
                        :value="service.name"
                        @change="getFilteredApartments"
                    />
                    <label for="service.name">{{ service.name }}</label>
                </div>
            </div>

            <div
                class="col-5"
                v-for="(house, index) in filteredHousesRoom"
                :key="index"
            >
                <div class="card" style="width: 24rem">
                    <img
                        :src="`/storage/${house.image}`"
                        class="card-img-top"
                        alt=""
                    />
                    <div class="card-body">
                        <h5 class="card-title">{{ house.title }}</h5>
                        <p class="card-text">
                            {{ house.description }}
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Città: {{ house.city }}</li>
                        <li class="list-group-item">
                            Prezzo a notte {{ house.night_price }}
                        </li>
                        <li class="list-group-item">
                            Tipo: {{ house.type.name }}
                        </li>
                    </ul>
                    <div class="card-body">
                        <a :href="`/house/${house.slug}`" class="card-link"
                            >Visualizza</a
                        >
                    </div>
                </div>

                <!-- <input
                    type="text"
                    placeholder="Inserisci Città o Indirizzo"
                    v-model="cityAddress"
                    @change="findGeocoding"
                /> -->
                <!-- <button @click="print" class="btn btn-primary">Cerca</button> -->
                <!-- <select
                    class="form-select form-select-sm text-center m-auto"
                    @change="changeSelect"
                >
                    <option value="">Città</option>
                    <option
                        :value="city"
                        v-for="(city, index) in cities"
                        :key="index"
                    >
                        {{ city }}
                    </option>
                </select> -->
            </div>
        </div>
    </div>
</template>

<script>
// import "../find.js";
import { services } from "@tomtom-international/web-sdk-services";
import SearchBox from "@tomtom-international/web-sdk-plugin-searchbox";
import ref from "vue";
let options = {
    minNumberOfCharacters: 0,
    searchOptions: {
        countrySet: "IT",
        key: "HnmOys7lX8qXGsZCcgH6WXEgs8UWaSAh",
        language: "it-IT",
    },
    autocompleteOptions: {
        countrySet: "IT",
        key: "HnmOys7lX8qXGsZCcgH6WXEgs8UWaSAh",
        language: "it-IT",
    },
    noResultsMessage: "No results found.",
};

export default {
    name: "HomeComponent",
    components: {},
    data() {
        return {
            selectedServices: [],
            textRoom: "",
            textBed: "",
            indirizzo: "",
            cities: [],
            services: [],
            numberMaxRooms: [1, 2, 3, 4, 5, 6],
            houses: [],
            queryService:[],
            filteredHousesRoom: [],
            // resultsApi: [],
            filterGeocode:
                "https://api.tomtom.com/search/2/geometryFilter.json?key=HnmOys7lX8qXGsZCcgH6WXEgs8UWaSAh&geometryList={geometryList}&poiList={poiList}",
        };
    },
    methods: {
        changeSelectRoom() {
            this.textRoom = 0;
            this.textRoom;
        },
        changeSelectBed() {
            this.textBed = 0;
            this.textBed;
        },
        changeAddress() {
            this.indirizzo;
        },
        getFilteredApartments() {
            this.filteredHousesRoom = [];
          for(let i = 0; i < this.selectedServices.length; i++) {
            this.queryService.push(`"&service="${this.selectedServices}`)
               console.log(this.queryService);
            }
            axios
                .get(
                    "/api/search?" +
                        "indirizzo=" +
                        this.indirizzo +
                        "&" +
                        "n_room=" +
                        this.textRoom +
                        "&n_bed=" +
                        this.textBed+ this.queryService
                       
                        
                )
                .then((response) => {
                    this.filteredHousesRoom = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },

    computed: {
        // filteredHousesRoom() {
        //     if (this.textBed === "" && this.textRoom === "") {
        //         return this.houses;
        //     }
        //     console.log(this.selectedServices);
        //     return this.houses.filter((item) => {
        //         return (
        //             item.n_room === this.textRoom ||
        //             item.n_bed === this.textBed ||
        //             item.services.forEach((el) =>
        //                 this.selectedServices.forEach((el2) => {
        //                     if (el.name === el2) {
        //                         console.log(item);
        //                         return item;
        //                     }
        //                 })
        //             )
        //             // this.selectedServices.forEach((el2)=>{
        //             //     console.log(el.name)
        //             //     if(el === el2){
        //             //         return item
        //             //     }
        //             // }))
        //         );
        //     });
        // },
    },
    mounted() {
        axios
            .get("/api/houses/")
            .then((res) => {
                this.filteredHousesRoom = res.data;
                // this.services = res.data;
            })
            .catch((err) => {
                console.log(err);
            });
        axios
            .get("/api/services/")
            .then((res) => {
                this.services = res.data;
                // this.services = res.data;
                // this.services = res.data;
            })
            .catch((err) => {
                console.log(err);
            });

        //     // let searchBox = this.$el.querySelector("#search");
        //     let searchBox = document.querySelector("#search");

        //     var ttSearchBox = new SearchBox(services, options);
        //     var searchBoxHTML = ttSearchBox.getSearchBoxHTML();

        //     searchBox.append(searchBoxHTML);
        //     let search = document.getElementsByClassName("tt-search-box-input").value;
        //     let inputBox = document.querySelector(".tt-search-box-input");
        //     let inputValue = document.getElementsByTagName("input")[0];
        //     console.log(search)
        //     inputBox.setAttribute("v-model", "indirizzo");

        //     // document.body.append(searchBoxHTML);
        //     // nodeSearch.append(searchBoxHTML);
        //     // searchBox.append(nodeSearch);

        //     // console.log(search)
        //     ttSearchBox.on("tomtom.searchbox.resultsfound", function (data) {
        //     });
    },
    created() {
        // axios
        //     .get("/api/houses/")
        //     .then((res) => {
        //         res.data.forEach((el) => {
        //             this.cities.push(
        //                 el.city.charAt(0).toUpperCase() + el.city.slice(1)
        //             );
        //         });
        //         console.log(this.cities);
        //     })
        //     .catch((error) => {
        //         console.log(error);
        //     });
    },
};
</script>
<style lang="scss">
.jumbotron {
    background-color: #f8fafc;
    img {
        position: relative;
        width: 100%;
        height: 300px;
    }
}

.searchhome {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    input {
        border: 0.5px solid #ff385c;
        padding: 0.2em;
    }
}

#s {
    -moz-border-radius: 14px;
    -webkit-border-radius: 14px;
    border-radius: 5px;
    -moz-box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2) inset;
    -webkit-box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2) inset;
    box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2) inset;
    font-size: 1.2em;
    width: 300px;
}

button {
    width: 50px;
    height: 40px;
    color: #ff385c;
    border: 2px solid #ff385c;
    border-radius: 5em;

    line-height: 35px;
    text-align: center;
    &:hover {
        background-color: #ff385c;
        color: white;
        transition: 0.8s;
    }
}
</style>
