<template>
    <div role="tablist">
    <b-card no-body class="mb-1">
      <b-card-header header-tag="header" class="p-1" role="tab">
        <b-button block href="#" v-b-toggle.collapse-res variant="info" class="text-left">Result</b-button>
      </b-card-header>
      <b-collapse id="collapse-res" role="tabpanel">
        <b-card-body>
          <b-card-text>{{ text }}</b-card-text>
          <ul>
              <li v-for="pack in packageList" v-bind:key="pack.id">{{ pack.data }}</li>
          </ul>
        </b-card-body>
      </b-collapse>
    </b-card>
  </div>
</template>

<script>
import store from '../store';
export default {
    data() {
        return {
            text: `
            選択したパッケージが依存するパッケージを表示します。
            `
        }
    },
    computed: {
        packageList(){
            console.log(this.$store.getters.getPackages);
            return this.$store.getters.getPackages;
        }
    },
    watch: {
        packageList(newVal, oldVal){
            //console.log('watch', newVal);
        }
    }
}
</script>
