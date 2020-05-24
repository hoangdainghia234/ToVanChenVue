import Vue from "vue";
import Vuex from "vuex";
import user from "./modules/user";
import room from "./modules/room";
Vue.use(Vuex);
const store = new Vuex.Store({
    mutations: {
        // cleanUpPageData() {
        //     for (var key in this._mutations) {
        //         if (key.endsWith("/cleanUpPageData")) {
        //             this.commit(key);
        //         }
        //     }
        // }
    },
    modules: {
        user,
        room
    }
});
export default store;