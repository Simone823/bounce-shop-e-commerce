require("./bootstrap");

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

window.Vue = require("vue");

// import app
import App from "./views/App.vue";

//importo il router
import router from "./router";

const app = new Vue({
    el: "#root",
    render: (h) => h(App),
    router,
});
