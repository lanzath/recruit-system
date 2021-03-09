<template>
  <div class="">
    <main class="">
      <div class="row">
        <div class="col-md-12">
          <h3>Criar novo candidato</h3>
          <Form class="new-candidate" @res="createdCandidate" />
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 pt-4">
          <h1>Lista de candidatos</h1>

          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">nome</th>
                  <th scope="col">email</th>
                  <th scope="col">tecnologias</th>
                  <th scope="col">linkedin</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in data" :key="item.id">
                  <td>{{ item.name }}</td>
                  <td>{{ item.email }}</td>
                  <td>{{ item.candidate_technologies.toString() }}</td>
                  <td>{{ item.linkedin_url }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </main>
    <!-- <Footer /> -->
  </div>
</template>

<script>
import Form from '@/components/Form'

import axios from 'axios'

export default {
  components: {
    Form
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

  mounted() {
    axios.get('http://127.0.0.1:8000/api/v1/candidates').then(response => (this.data = response.data.data))
    console.log(this.data)
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
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

thead {
  background-color: #ccc;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.new-candidate {
  margin-top: 2em;
}
</style>
