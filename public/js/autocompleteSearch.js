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

let search = document.getElementsByClassName("search");
var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
console.log(search)

var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
document.body.search.append(searchBoxHTML);
console.log(document.body)
ttSearchBox.on("tomtom.searchbox.resultsfound", function (data) {
    console.log(data);
});
