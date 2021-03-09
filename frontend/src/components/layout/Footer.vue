<template>
  <div class="container">
    <p class="copy">Feito com <span>&hearts;</span> por Thiago Lanza</p>
  </div>
</template>

<script>
export default {
  name: 'Footer',
}
</script>

<style scoped>
 .container {
   position: fixed;
   bottom: 0;
   height: 50px;
   width: 100vw;
   display: flex;
   justify-content: center;
   align-items: center;
   background-color: #1485ee;
 }
 p.copy {
   font-size: 14px;
   color: white;
   font-weight: bold;
 }
</style>