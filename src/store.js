import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        packages:[],
        searchList:[]
    },
    getters: {
        getPackages: state => {
            return state.packages
        },
        getSearchList: state => {
            return state.searchList
        }
    },
    mutations: {
        updateList(state, packages){
            state.packages = packages
        },
        searchList(state, search){
            state.searchList = search
        }
    }
})