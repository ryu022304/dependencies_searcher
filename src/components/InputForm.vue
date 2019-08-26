<template>
  <div>
    <b-card class="text-left" header="Dependency Packages" >
      <b-card-text class="bg-default text-dark">
        <b-input-group
            v-for="size in ['']"
            :key="size"
            :size="size"
            class="mb-3"
            prepend="Package"
        >
            <b-form-input v-model="packageName"></b-form-input>
            <b-input-group-append>
            <b-button size="sm" text="Button" variant="success" @click="submit">Search</b-button>
            </b-input-group-append>
        </b-input-group>
      </b-card-text>
    </b-card>
  </div>
</template>

<script>
  import axios from 'axios';
  import store from '../store';
  const URL_BASE = 'http://192.168.33.10:8080/api/v1/search/';
  export default {
    data() {
      return {
          packageName: ''
      }
    },
    methods: {
        submit: function(){
            axios.get(URL_BASE+this.packageName).then((res) => {
              console.log(res.data);
                this.$store.commit('searchList', res.data.packages);
            })
        }
    }
  }
</script>

<style>

</style>
