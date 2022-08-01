import Vue from "vue";

// importo l'istanza router esportata da index.js
import VueRouter from "vue-router";

Vue.use(VueRouter);

// import pages home
import home from "../pages/home.vue";

// import products pages
import products from '../pages/products.vue';

// import pages products category
import productsCategory from '../pages/productsCategory.vue';

// import pages contact
import contact from '../pages/contact.vue';

// array che rotte vue
const routes = [
    {
        path: "/",
        name: "home",
        component: home,
    },

    {
        path: '/products',
        name: 'products',
        component: products,
    },

    {
        path: '/products-category/:id',
        name: 'products-category',
        component: productsCategory,
    },

    {
        path: '/contact',
        name: 'contact',
        component: contact,
    }
];

//istanza del router
const router = new VueRouter({
    mode: "history",
    routes: routes,
});

//esporto il router
export default router;
