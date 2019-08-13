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
import store from '../store';
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
        console.log(this.selected);
      }
    },
    computed: {
        searchList(){
            console.log(this.$store.getters.getSearchList);
            return this.$store.getters.getSearchList;
            //this.items = this.$store.getters.getSearchList;
        }
    },
    watch: {
        searchList(newVal, oldVal){
            //console.log('watch', newVal);
        }
    }
}
</script>