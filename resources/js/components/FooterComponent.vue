<template>
    <footer>

    </footer>
</template>

<script>
export default {
    name: 'FooterComponent',
    data(){
        return {
        copyright : [
            {
            "title" : "© Copyright 2022 |"
            },
            {
            "title" : "All Rights Reserved |"
            },
            {
            "title" : "Powered by Team 4"
            },
        ],
        footer: [
        {
            label: 'Home',
            routeName: 'landing-page'
        },
        {
            label: 'Case',
            routeName: 'home'
        },
        {
            label: 'Cerca',
            routeName: 'search'
        },
        {
            label: 'Dettaglio',
            routeName: 'detail',
        },
        {
            label: 'Accedi',
            routeName: ''
        }
        ],
        }
    }
}
</script>

<style lang="scss">

</style>