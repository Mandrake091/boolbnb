<template>
    <div id="map" ref="mapRef"></div>
</template>

<script>
import { onMounted, ref } from "vue";

export default {
    name: "MapComponent",
    props: {
        latitude: Number,
        longitude: Number,
    },
    data() {
        console.log(this.latitude);
        return {
            geolat: this.latitude,
        };
    },

    setup({ latitude, longitude }) {
        const mapRef = ref(null);
        const GOLDEN_GATE_BRIDGE = { lng: longitude, lat: latitude };
        onMounted(() => {
            const tt = window.tt;
            var map = tt.map({
                key: "HnmOys7lX8qXGsZCcgH6WXEgs8UWaSAh",
                container: mapRef.value,
                center: GOLDEN_GATE_BRIDGE,
                zoom: 16,
            });
            var marker = new tt.Marker()
                .setLngLat([longitude, latitude])
                .addTo(map);
        });
        return {
            mapRef,
        };
    },
};
</script>

<style>

#map {
    
    width: 100%;
    height: 80%;
}
</style>
