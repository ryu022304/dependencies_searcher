<template>
<div role="tablist">
  <b-card no-body class="mb-1">
    <b-card-header header-tag="header" class="p-1" role="tab">
      <b-button block href="#" v-b-toggle.collapse-list variant="info" class="text-left">Package List</b-button>
    </b-card-header>
    <b-collapse id="collapse-list" role="tabpanel">
        <b-card-text>{{ text }}</b-card-text>
        <b-table
            sticky-header="true"
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
            <b-button class="float-lg-right" variant="primary" @click="getDepList">Get Dependent Packages</b-button>
        </template>
        <template slot="selected" slot-scope="{ rowSelected }">
            <span v-if="rowSelected">✔</span>
        </template>
        </b-table>
    </b-collapse>
  </b-card>
</div>

</template>

<script>
import axios from 'axios';
import store from '../store';
const qs = require('qs');
const URL_BASE = 'http://192.168.33.10:8080/api/v1/repoquery';
export default {
    data() {
      return {
        text: `
            検索キーワードで該当したパッケージを表示します。
            `,
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
        
        // 選択されたパッケージ名の送付
        axios.get(URL_BASE,{
          params: {
            name: selectedPackages
          },
          paramsSerializer: params => {
            return qs.stringify(params)
          }
        }
        ).then((res) => {
          console.log(res.data);
          this.$store.commit('updateList', res.data.packages);
        })
        
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