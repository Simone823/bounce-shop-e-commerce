require("./bootstrap");

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

window.Vue = require("vue");

// import app
import App from "./views/App.vue";

import { ValidationProvider } from "vee-validate";
import { ValidationObserver } from "vee-validate";
import { extend } from "vee-validate";
import * as rules from "vee-validate/dist/rules";
import { messages } from "vee-validate/dist/locale/it.json";

Object.keys(rules).forEach((rule) => {
    extend(rule, {
        ...rules[rule],
        message: messages[rule],
    });
});

Vue.component("ValidationProvider", ValidationProvider);
Vue.component("ValidationObserver", ValidationObserver);

//importo il router
import router from "./router";

const app = new Vue({
    el: "#root",
    render: (h) => h(App),
    router,
});
