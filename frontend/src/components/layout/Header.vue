<template>
  <div class="header-container">
    <ul class="menu">
      <li><router-link to="/login">Home</router-link></li>
      <li><router-link to="/">Candidatos</router-link></li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'Header',
}
</script>

<style scoped>
 .header-container {
   height: 60px;
   width: 100%;
   display: flex;
   background-color: #1485ee;
 }

 .header-container ul.menu {
   display: flex;
   width: 100vw;
   gap: 20px;
   align-items: center;
   justify-content: center;
   list-style: none;
 }

 .header-container ul.menu li a {
   text-decoration: none;
   font-size: 20px;
   color: white;
 }
</style>