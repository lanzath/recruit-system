<template>
  <div id="app">
    <Header />
    <router-view class="main" />
  </div>
</template>

<script>
import Header from '@/components/layout/Header'
export default {
  name: 'App',
  components: {
    Header
  }
}
</script>

<style>
#app {
  height: 100vh;
  text-align: center;
  color: #2c3e50;
}
</style>
