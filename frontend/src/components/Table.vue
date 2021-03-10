<template>
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
            <tr v-on:click="clicked" v-for="candidate in data" :key="candidate.id">
              <td>
                <router-link class="link" :to="`/candidate/${candidate.id}`">
                  {{ candidate.name }}
                </router-link>
              </td>
              <td>{{ candidate.email }}</td>
              <td>{{ candidate.candidate_technologies.toString() }}</td>
              <td>{{ candidate.linkedin_url }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Table',
  props: {
    data: Array,
  },

  data() {
    return {}
  },

  methods: {
    clicked() {
      console.log(this.$props)
    }
  },

  mounted() {
    console.log(this.$props.data)
  }
}
</script>

<style>
thead {
  background-color: #ccc;
}

tbody tr {
  cursor: pointer;
}

.link {
  text-decoration: none;
  color: inherit;
}

.link:hover {
  text-decoration: none;
  color: inherit;
}

tbody tr:hover {
  background-color: #bbb;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>