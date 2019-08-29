<template>
  <div role="tablist">
    <b-card no-body class="mb-1">
      <b-card-header header-tag="header" class="p-1" role="tab">
        <b-button block href="#" v-b-toggle.accordion-1 variant="info">Description</b-button>
      </b-card-header>
      <b-collapse id="accordion-1" visible accordion="my-accordion" role="tabpanel">
        <b-card-body>
          <b-card-text>{{ text }}</b-card-text>
          <ul>
              <li v-for="os in os_list" :key="os.id" >
                {{ os.name }}
              </li>
          </ul>
        </b-card-body>
      </b-collapse>
    </b-card>
  </div>
</template>

<script>
export default {
    data() {
      return {
        text: `
          導入したいパッケージが依存しているパッケージを検索します。現在対応しているOSは下記です。
        `,
        os_list: [
            {id: 1, name: 'CentOS 6'},
            {id: 2, name: 'RHEL 6'}
        ]
      }
    }
}
</script>