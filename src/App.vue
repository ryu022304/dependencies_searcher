<template>
  <div id="app">
    <Header />
    <Description />
    <InputForm />
    <PackageTable />
    <CardArea />
  </div>
</template>

<script>
import Header from './components/Header.vue'
import Description from './components/Description.vue'
import InputForm from './components/InputForm.vue'
import PackageTable from './components/PackageTable.vue'
import CardArea from './components/CardArea.vue'

export default {
  name: 'app',
  components: {
    Header,
    Description,
    InputForm,
    CardArea,
    PackageTable
  }
}
</script>

<style>
</style>