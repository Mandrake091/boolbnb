latitude = latitude.innerHTML.substring(12, 23);
longitude = longitude.innerHTML.substring(11, 23);


console.log(latitude);
console.log(longitude);

const API_KEY = "HnmOys7lX8qXGsZCcgH6WXEgs8UWaSAh";
const APPLICATION_NAME = "My Application";
const APPLICATION_VERSION = "1.0";

tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION);
const GOLDEN_GATE_BRIDGE = { lng: longitude, lat: latitude };

var map = tt.map({
    key: API_KEY,
    container: "map-div",
    center: GOLDEN_GATE_BRIDGE,
    zoom: 16,
});
var marker = new tt.Marker().setLngLat([longitude, latitude]).addTo(map);
