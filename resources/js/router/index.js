import Vue from "vue";

// importo l'istanza router esportata da index.js
import VueRouter from "vue-router";

Vue.use(VueRouter);

// import pages home
import home from "../pages/home.vue";

// import pages products category
import productsCategory from '../pages/productsCategory.vue';

// array che rotte vue
const routes = [
    {
        path: "/",
        name: "home",
        component: home,
    },

    {
        path: '/products-category/:id',
        name: 'products-category',
        component: productsCategory,
    }
];

//istanza del router
const router = new VueRouter({
    mode: "history",
    routes: routes,
});

//esporto il router
export default router;
