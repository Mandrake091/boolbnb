<template>
    <div class="container">
        <div class="row">
            <select
                class="form-select form-select-sm text-center m-auto"
                @change="changeSelect"
            >
                <option value="">Filter by Genre</option>
                <option
                    :value="city"
                    v-for="(city, index) in cities"
                    :key="index"
                >
                    {{ city }}
                </option>
            </select>
        </div>
        <div class="row pt-4">
            <div
                class="col-6"
                v-for="(house, index) in resultsApi"
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
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
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
import "../find.js";

import { services } from "@tomtom-international/web-sdk-services";
import SearchBox from "@tomtom-international/web-sdk-plugin-searchbox";

let options = {
    idleTimePress: 100,
    minNumberOfCharacters: 0,
    searchOptions: {
        key: "HnmOys7lX8qXGsZCcgH6WXEgs8UWaSAh",
        language: "it-IT",
    },
    autocompleteOptions: {
        key: "HnmOys7lX8qXGsZCcgH6WXEgs8UWaSAh",
        language: "it-IT",
    },
    noResultsMessage: "No results found.",
};

const ttSearchBox = new SearchBox(services, options);

let search = document.getElementsByClassName("search");
var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
document.body.appendChild(searchBoxHTML);
ttSearchBox.on("tomtom.searchbox.resultsfound", function (data) {
    console.log(data);
});

export default {
    name: "HomeComponent",
    components: {},
    data() {
        return {
            cities: [],
            cityAddress: "",
            // posts: [],
            resultsApi: [],

            searchBoxHTML: "",
            filterGeocode:
                "https://api.tomtom.com/search/2/geometryFilter.json?key=HnmOys7lX8qXGsZCcgH6WXEgs8UWaSAh&geometryList={geometryList}&poiList={poiList}",
        };
    },
    mounted: function () {},
    methods: {
        changeSelect() {
            this.$emit("performSearch", this.inputText);
            console.log(this.inputText);
        },
        print() {
            console.log(this.cityAddress);
        },
        findGeocoding() {
            axios
                .get(
                    "https://api.tomtom.com/search/2/autocomplete/" +
                        this.cityAddress +
                        ".json?key=HnmOys7lX8qXGsZCcgH6WXEgs8UWaSAh&language=it-IT&limit=10&=&&countrySet=IT"
                )
                .then((res) => {
                    results = res.data;
                    console.log(results);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },

    computed: {
        filteredHomeList() {
            if (this.searchText === "") {
                return this.albumList;
            }
            return this.albumList.filter((item) => {
                return (
                    item.author === this.searchText ||
                    item.genre === this.searchText
                );
            });
        },
    },
    mounted() {
        axios
            .get("/api/houses/")
            .then((res) => {
                this.resultsApi = res.data;
                console.log(this.resultsApi);
            })
            .catch((err) => {
                console.log(err);
            });
        // axios.get("/api/posts/").then((res) => {
        //     this.posts = res.data.slice(0, 3);
        //     console.log(this.posts);
        // });
    },
    created() {
        axios
            .get("/api/houses/")
            .then((res) => {
                res.data.forEach((el) => {
                    this.cities.push(
                        el.city.charAt(0).toUpperCase() + el.city.slice(1)
                    );
                });
                console.log(this.cities);
            })
            .catch((error) => {
                console.log(error);
            });
    },
};
</script>
