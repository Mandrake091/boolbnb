<template>
    <header>
        <nav>
            <div class="logo"><img src="/images/boolbnb.png" alt=""></div>
            <ul>
                <li v-for="(item, index) in menuItem" :key="index" :class="{'active' : index === activeIndex}" @click="activeIndex = index">
                    <router-link :to="{ name: item.routeName } " class="link">{{item.label}}</router-link>
                </li>
            </ul>
            <a href="/admin/houses"><div class="my-btn">Diventa un host</div></a>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'HeaderComponent',
    data(){
        return {
        menuItem: [
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
        activeIndex : 0,
        }
    },
}
</script>

<style lang="scss" scoped>

</style>