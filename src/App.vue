<template>
  <div id="app">
    <Header />
    <InputForm />
  </div>
</template>

<script>
import Header from './components/Header.vue'
import InputForm from './components/InputForm.vue'

export default {
  name: 'app',
  components: {
    Header,
    InputForm
  }
}
</script>

<style>
</style>