<template>
  <div>
    <b-input-group
        v-for="size in ['']"
        :key="size"
        :size="size"
        class="mb-3"
        prepend="Package"
    >
        <b-form-input v-model="packages"></b-form-input>
        <b-input-group-append>
        <b-button size="sm" text="Button" variant="success" @click="submit">Search</b-button>
        </b-input-group-append>
    </b-input-group>
  </div>
</template>

<script>
  import axios from 'axios';
  const URL_BASE = 'http://localhost:8080/api/v1/';
  export default {
    data() {
      return {
          packages: ''
      }
    },
    methods: {
        submit: function(){
            axios.get(URL_BASE+this.packages).then((res) => {
                console.log(res);
            })
        }
    }
  }
</script>

<style>

</style>
