<template>
    <div class="container home">
        <div class="row p-2 justify-content-center align-items-center text-center">
           <div class="col-12 jumbotron">
            <input
                type="search"
                v-model="indirizzo"
                @change="getFilteredApartments"
                id="s"
                name="s"
                placeholder="Cerca un appartamento" />
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
           </div>
        </div>
        <!-- <div
            ref="search"
            id="search"
            class="search"
            @change="getFilteredApartments"
        >
            Inserisci il tuo indirizzo completo
        </div> -->
        <div class="row pt-2">
            <div class="col-2">
                <h5>Altri filtri</h5>
                <label for="services" class="my-label">Servizi</label>
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
            
        
                <label for="room" class="pt-2 my-label">Numero stanze</label>
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
                <br>
                <label for="bed" class="pt-2 my-label">Numero di letti</label>
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
                <div class="container-card">
                    <div class="box">
                    <div class="card" v-for="(house,index) in filteredHousesRoom"
                    :key="index">
                        <div class="card-header">
                        <img :src="`/storage/${house.image}`">
                        </div>
                        <div class="card-body">
                        <span class="tag tag-header">{{ house.type.name }}</span>
                        <h4>
                            {{ house.title }}
                        </h4>
                        <p class="card-text">
                           {{ house.description }}
                        </p>
                        <div class="user">
                            <!-- <img src="/images/host3.png" alt=""> -->
                            <div class="user-info">
                            <p class="price-night">
                            {{ house.night_price }}€ a notte 
                            </p>
                            <h5>Host: {{ house.user.name }}</h5>
                            <small><a :href="`/house/${house.slug}`" class="card-link"
                            >Visualizza</a></small>
                            </div>
                        </div>
                        </div>
                    </div>
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
            variabileServizi : [],
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
            this.variabileServizi = [];
            if (this.selectedServices.length > 0) {
                          for(let i = 0; i < this.selectedServices.length; i++) {
            this.variabileServizi.push(`&servicesToSearch[]=${this.selectedServices[i]}`)
            }
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
                    this.textBed +
                    this.variabileServizi.join(' ')                    
                    
                    //     })
                    // } 
                    // "&servicesToSearch[]=" +
                    //     this.selectedServices
                        
                       
                        
                )
                .then((response) => {
                    this.filteredHousesRoom = response.data;
                    console.log(this.variabileServizi);
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

</style>
