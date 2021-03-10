<template>
    <main class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h3>Criar novo candidato</h3>
          <Form class="new-candidate" @res="createdCandidate" />
        </div>
      </div>

      <Table :data="data" />

    </main>
    <!-- <Footer /> -->
</template>

<script>
import Form from '@/components/Form'
import Table from '@/components/Table'

import axios from 'axios'

export default {
  components: {
    Form,
    Table,
  },
  name: 'Home',
  props: {},

  data() {
    return {
      data: null,
    }
  },

  methods: {
    createdCandidate(value) {
      this.data.push(value.data)
    }
  },

  async mounted() {
    await axios.get('http://127.0.0.1:8000/api/v1/candidates').then(response => (this.data = response.data.data))
    console.log(this.data)
  }
}
</script>

<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}

.new-candidate {
  margin-top: 2em;
}
</style>
