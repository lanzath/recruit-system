<template>
  <div class="container">
    <div class="auth">
      <form @submit.prevent="login">
        <h1>Fazer Login</h1>

        <span class="input">
          <input
            v-model="email"
            name="email"
            type="email"
            required
            autocomplete="off"
          />
          <label for="email">Email</label>
        </span>

        <span class="input">
          <input
            v-model="password"
            name="password"
            type="password"
            required
            autocomplete="off"
          />
          <label for="password">Senha</label>
        </span>

        <span class="input">
          <input type="submit" value="Entrar" />
        </span>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Login',

  data() {
    return {
      email: '',
      password: '',
    }
  },

  methods: {}
};
</script>

<style scoped>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100vw;
  height: 100vh;
}

.container .auth {
  height: 320px;
  width: 600px;
  background-color: #fff;
  border: none;
  border-radius: 16px;
}

.auth > form {
  padding: 2rem;
  background-color: #fff;
  box-shadow: 0 1rem 4rem black;
  border-radius: 0.5rem;
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}

h1 {
  text-align: center;
  width: 100%;
  font-size: 2rem;
  font-weight: 600;
  margin: 0.8rem 0.8rem 1.5rem;
}

.input {
  display: flex;
  width: 70%;
  flex-direction: column;
  margin: 1.25rem 1rem;
}

.input label {
  font-style: italic;
  position: absolute;
  margin: 0.8rem 0 0 0.8rem;
  transition: all 150ms ease-in-out;
  opacity: 0.7;
}

input {
  padding: 0.75rem;
  border: 0.05rem solid silver;
  border-radius: 0;
  outline: 0 solid transparent;
  transition: all 150ms ease-in-out;
}

input:valid {
  border-color: #80c42f;
}

input:focus {
  outline: 0.4em solid rgba(0, 125, 255, 0.25);
  border-color: transparent;
}

input:focus + label,
input:valid + label {
  font-style: normal;
  margin: -1.25rem 0 0 0;
  font-size: 0.75rem;
  opacity: 1;
  font-weight: 600;
}

input:valid + label::before {
  content: '\f058';
  margin-right: 0.25rem;
  color: #80c42f;
}

input[type=submit],
button {
  padding: 0.75rem;
  height: 3rem;
  background-color: dodgerblue;
  color: white;
  border: none;
  border-radius: 0;
  font-family: var(--font);
  font-weight: 600;
  outline: 0 solid transparent;
  display: block;
}

input[type=submit]:hover,
button:hover {
  opacity: 0.75;
  cursor: pointer;
}

input[type=submit]:disabled,
button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}
</style>
