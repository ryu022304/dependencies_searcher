import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        packages:[]
    },
    getters: {
        getPackages: state => {
            return state.packages
        }
    },
    mutations: {
        updateList(state, packages){
            state.packages = packages
        }
    }
})