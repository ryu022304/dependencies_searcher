<template>
<div>
    <b-card class="text-left" header="Package List" >
        <b-table
            selectable
            :select-mode="selectMode"
            selectedVariant="success"
            :items="searchList"
            :fields="fields"
            @row-selected="rowSelected"
            responsive="sm"
            caption-top
        >
        <template slot="table-caption">
            Search Result
            <b-button class="float-lg-right" variant="primary" @click="getDepList">Get Dependent Packages</b-button>
        </template>
        <template slot="selected" slot-scope="{ rowSelected }">
            <span v-if="rowSelected">✔</span>
        </template>
        </b-table>
    </b-card>
</div>
</template>

<script>
import axios from 'axios';
import store from '../store';
const URL_BASE = 'http://192.168.33.10:8080/api/v1/repoquery/';
export default {
    data() {
      return {
        fields: ['selected', 'package', 'abstract'],
        selectMode: 'multi',
        selected: []
      }
    },
    methods: {
      rowSelected(items) {
        this.selected = items
      },
      getDepList() {
        let selectedPackages = [];
        for(let k of Object.keys(this.selected)){
          selectedPackages.push(this.selected[k]['package'].trim());
        }
        this.$store.commit('selectedList', selectedPackages);
        console.log(selectedPackages);
        console.log(URL_BASE+this.encodeURLplusOther(selectedPackages.join(' ')));
        axios.get(URL_BASE+this.encodeURLplusOther(selectedPackages.join(' '))).then((res) => {
          this.$store.commit('searchList', res.data.packages);
        })
        
      },
      encodeURLplusOther(url) {
        return encodeURIComponent(url).replace(/[.-]/g, function(c) {
          return '%' + c.charCodeAt(0).toString(16);
        });
      }
    },
    computed: {
        searchList(){
            return this.$store.getters.getSearchList;
        }
    },
    watch: {
        searchList(newVal, oldVal){
            //console.log('watch', newVal);
        }
    }
}
</script>