console.log('ciao')
const API_KEY = "HnmOys7lX8qXGsZCcgH6WXEgs8UWaSAh";
const APPLICATION_NAME = "My Application";
const APPLICATION_VERSION = "1.0";

tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION);
const GOLDEN_GATE_BRIDGE = { lng: 11.318687, lat: 44.5213588 };

var map = tt.map({
    key: API_KEY,
    container: "map-div",
    center: GOLDEN_GATE_BRIDGE,
    zoom: 12,
});
console.log('bello')