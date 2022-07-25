// import services from "/@tomtom-international/web-sdk-services";

// import SearchBox from "/tomtom-international/web-sdk-plugin-searchbox";

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

// const ttSearchBox = new SearchBox(services, options);

let search = document.getElementById("search");
var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);

var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
search.append(searchBoxHTML);
console.log(search)
let searchBox = document.querySelector(".tt-search-box-input");
let searchBoxInput = document.querySelector(
    ".tt-search-box-result-list-container");

searchBoxInput.setAttribute("value", "Via Roma, Milano");
searchBox.setAttribute("name", "address");
searchBox.setAttribute("placeholder", "Inserisci una via");

console.log(searchBox);
ttSearchBox.on("tomtom.searchbox.resultsfound", function (data) {
    console.log(data);
});
