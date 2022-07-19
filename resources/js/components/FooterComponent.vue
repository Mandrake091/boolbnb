<template>
    <footer>
        <div class="container">
            <div class="row">     
                <div class="col-4 col-md-2">
                    <img src="/images/logo.png" alt="logo">
                </div>
                <div class="col-8 col-md-4 justify-content-start pt-3">
                    <ul>
                        <li v-for="(link,index) in footer" :key="index" @click="activeIndex = index"> 
                            <a :href="link.routeName">{{link.label}}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-8 col-md-4 justify-content-center pt-4">
                    <ul class="copyright">
                        <li v-for="(items,index) in copyright" :key="index">{{items.title}}</li>
                    </ul>
                </div>
                <div class="col-4 col-md-2 justify-content-end pt-3">
                    <ul>
                        <li><i class="fa-brands fa-instagram"></i></li>
                        <li><i class="fa-brands fa-twitter"></i></li>
                        <li><i class="fa-brands fa-facebook-f"></i></li>
                        <li><i class="fa-brands fa-pinterest-p"></i></li>
                    </ul>
                </div>
            </div>
        </div>
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

<style lang="scss" scoped>
img{
    width: 100%;
}
li{
  list-style-type: none;
  display: inline;
  padding-right: 10px;
  color: #ffaf62;
  cursor: pointer;
  a{
    color: black;
    font-size: 12px;
    text-decoration: none;
    transition: all 0.2s;
    &:hover{
        color: #ffaf62;
    }
  }
}


.copyright{
    font-size: 8px;
    li{
        color: grey;
    }
}

</style>