import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

import LandingPageComponent from "./pages/LandingPageComponent.vue";
import HomeComponent from "./pages/HomeComponent.vue";
import ChiSiamoComponent from "./pages/ChiSiamoComponent.vue";
import ContactComponent from "./pages/ContactComponent.vue";
import NotFoundComponent from "./pages/NotFoundComponent.vue";
import SingleHouseComponent from "./pages/SingleHouseComponent.vue";


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "landing-page",
            meta: { nome: "" },
            component: LandingPageComponent,
        },
        {
            path: "/home",
            name: "home",
            meta: { nome: "" },
            component: HomeComponent,
        },
        {
            path: "/about",
            name: "about",
            component: ChiSiamoComponent,
        },
        {
            path: "/contact",
            name: "contact",
            component: ContactComponent,
        },
        // {
        //     path: "/message",
        //     name: "message",
        //     component: SuccessSendComponent,
        // },
        {
            path: "/house/:slug",
            name: "single-house",
            component: SingleHouseComponent,
         },
        // {
        //     path: "/categories/:slug",
        //     name: "category",
        //     component: CategoryComponent,
        // },
        {
            path: "*",
            name: "page-404",
            component: NotFoundComponent,
        },
    ],
});

export default router;