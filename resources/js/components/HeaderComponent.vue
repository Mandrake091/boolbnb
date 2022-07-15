<template>
    <section>

    </section>
</template>

<script>
export default {
    name: 'HeaderComponent',
    data(){
        return {
        menuItem: [
        {
            label: 'Home',
            routeName: 'home'
        },
        {
            label: 'Posts',
            routeName: 'posts'
        },
        {
            label: 'Chi Siamo',
            routeName: 'about'
        },
        {
            label: 'Contatti',
            routeName: 'contact',
        }
        ],
        }
    },
}
</script>