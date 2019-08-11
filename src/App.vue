<template>
  <div id="app">
    <Header />
    <InputForm />
    <CardArea />
  </div>
</template>

<script>
import Header from './components/Header.vue'
import InputForm from './components/InputForm.vue'
import CardArea from './components/CardArea.vue'

export default {
  name: 'app',
  components: {
    Header,
    InputForm,
    CardArea
  }
}
</script>

<style>
</style>