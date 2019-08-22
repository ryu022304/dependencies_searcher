import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        packages:[],
        searchList:[],
        selectedPackages:[]
    },
    getters: {
        getPackages: state => {
            return state.packages
        },
        getSearchList: state => {
            return state.searchList
        },
        getSelectedPackages: state => {
            return state.selectedPackages
        }
    },
    mutations: {
        updateList(state, packages){
            state.packages = packages
        },
        searchList(state, search){
            state.searchList = search
        },
        selectedList(state, packages){
            state.selectedPackages = packages
        }
    }
})