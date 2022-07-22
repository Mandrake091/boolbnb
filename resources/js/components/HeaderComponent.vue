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
ul{
    list-style: none;
    display: flex;
    flex-flow: row nowrap;
    justify-content: center;
    align-items: center;
    padding: 1.2em 0;
    li a{
        text-decoration: none;
        padding-right: 3em;
        position: relative;
        color: black;
    }
    li a::after{
        content:'';
        position: absolute;
        display: block;
        height: 0.1em;
        width: 0%;
        background-color: #FF385C;
        bottom: -0.3em;
        transition: all ease-in-out 400ms;
    }
        
    li a:hover::after{
        text-decoration: none;
        width: 50%;
    }
}

img{
    width: 35%;
}

</style>