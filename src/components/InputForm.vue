<template>
  <div role="tablist">
    <b-card no-body class="mb-1">
      <b-card-header header-tag="header" class="p-1" role="tab">
        <b-button block href="#" v-b-toggle.collapse-input variant="info" class="text-left">Input Package Name</b-button>
      </b-card-header>
      <b-collapse id="collapse-input" role="tabpanel">
        <b-card-text>{{ text }}</b-card-text>
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
      </b-collapse>
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
        text: `
            検索したいパッケージを入力してください。
            `,
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
