import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

import HomeComponent from "./pages/HomeComponent.vue";
import AdvancedSearchComponent from "./pages/AdvancedSearchComponent.vue";
import ApartmentComponent from "./pages/ApartmentComponent.vue";
import SuccessSendComponent from "./pages/SuccessSendComponent.vue";
import NotFoundComponent from "./pages/NotFoundComponent.vue";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            meta: { nome: "" },
            component: HomeComponent,
        },
        {
            path: "/search",
            name: "search",
            component: AdvancedSearchComponent,
        },
        {
            path: "/detail",
            name: "detail",
            component: ApartmentComponent,
        },
        {
            path: "/message",
            name: "message",
            component: SuccessSendComponent,
        },

        // {
        //     path: "/posts/:slug",
        //     name: "single-post",
        //     component: SinglePostComponent,
        // },
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