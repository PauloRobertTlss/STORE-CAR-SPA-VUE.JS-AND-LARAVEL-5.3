import Vue from 'vue'
import Vuex from 'vuex'
import app from './modules/app'
import errorLog from './modules/errorLog'
import permission from './modules/permission'
import tagsView from './modules/tagsView'
import product from './modules/product'
import sale from './modules/sale'
import getters from './getters'

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        app,
        errorLog,
        permission,
        tagsView,
        product,
        sale
    },
    getters
});

export default store
