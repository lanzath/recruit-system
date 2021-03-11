<template>
  <div class="container">
    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
      <b-form-group id="input-group-1" label="Nome do Candidato:" label-for="input-1">
        <b-form-input
          id="input-2"
          v-model="form.name"
          placeholder="Nome"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group
        id="input-group-2"
        label="Email:"
        label-for="input-2"
      >
        <b-form-input
          id="input-2"
          v-model="form.email"
          type="email"
          placeholder="Email"
          required
        ></b-form-input>
      </b-form-group>
      <b-form-group

        id="input-group-3"
        label="linkedin:"
        label-for="input-3"
      >
        <b-form-input
          id="input-3"
          v-model="form.linkedin_url"
          type="url"
          placeholder="linkedin"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-4" label="Idade:" label-for="input-4">
        <b-form-input
          id="input-4"
          type="number"
          v-model="form.age"
          placeholder="Idade"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-5" label="Tecnologias:" label-for="checkboxes-5">
        <b-form-checkbox-group
          v-model="form.technology"
          id="checkboxes-5"
        >
          <b-form-checkbox value="C#">C#</b-form-checkbox>
          <b-form-checkbox value="Javascript">Javascript</b-form-checkbox>
          <b-form-checkbox value="NodeJS">NodeJS</b-form-checkbox>
          <b-form-checkbox value="Angular">Angular</b-form-checkbox>
          <b-form-checkbox value="React">React</b-form-checkbox>
          <b-form-checkbox value="Ionic">Ionic</b-form-checkbox>
          <b-form-checkbox value="Mensageria">Mensageria</b-form-checkbox>
          <b-form-checkbox value="PHP">PHP</b-form-checkbox>
          <b-form-checkbox value="Laravel">Laravel</b-form-checkbox>
        </b-form-checkbox-group>
      </b-form-group>

      <h5 class="error" v-for="(error, index) in this.errors" :key="index">{{ error }}</h5>

      <div class="buttons">
        <b-button type="submit" variant="primary">Enviar</b-button>
        <b-button type="reset" variant="danger">Limpar</b-button>
      </div>
    </b-form>
    <!-- <b-card class="mt-3" header="Form Data Result">
      <pre class="m-0">{{ form }}</pre>
    </b-card> -->
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'Form',
  props: {
    id: String
  },

  data() {
    return {
      form: {
        name: '',
        email: '',
        linkedin_url: '',
        age: null,
        technology: []
      },
      errors: [],
      show: true
    }
  },

  methods: {
    async onSubmit(event) {
      event.preventDefault()

      if (this.id) {
        const id = this.id
        this.handleTechnologies()
        try {
          await axios.put(`http://127.0.0.1:8000/api/v1/candidates/${id}`, this.form)
          this.$router.push('/')
          this.onReset(event)
        } catch (err) {
          this.errors.push('Email já cadastrado.')
        }
      } else {
        this.handleTechnologies()
        try {
          const response = await axios.post('http://127.0.0.1:8000/api/v1/candidates', this.form)
          this.$emit('res', response)
          this.onReset(event)
        } catch (err) {
          this.errors.push('Email já cadastrado.')
        }
      }
    },

    handleTechnologies() {
      const techs = this.form.technology
      this.form.technology = []

      techs.forEach(t => this.form.technology.push({ technology: t}))
    },

    onReset(event) {
      event.preventDefault()

      // Reset our form values
      this.form.email = ''
      this.form.name = ''
      this.form.age = ''
      this.form.linkedin_url = ''
      this.form.technology = []

      // Trick to reset/clear native browser form validation state
      this.show = false
      this.$nextTick(() => {
        this.show = true
      })
    }
  }
}
</script>

<style>
.buttons {
  display: flex;
  justify-content: center;
  gap: 12px
}

.error {
  text-align: center;
  color: red;
}
</style>