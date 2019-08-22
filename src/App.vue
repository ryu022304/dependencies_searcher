<template>
  <div id="app">
    <Header />
    <InputForm />
    <CardArea />
    <PackageTable />
  </div>
</template>

<script>
import Header from './components/Header.vue'
import InputForm from './components/InputForm.vue'
import CardArea from './components/CardArea.vue'
import PackageTable from './components/PackageTable.vue'

export default {
  name: 'app',
  components: {
    Header,
    InputForm,
    CardArea,
    PackageTable
  }
}
</script>

<style>
</style>