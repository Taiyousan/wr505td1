<script setup>
defineProps(["surnom", "age", "user"]);
</script>

<template>
  <div class="container">
    <h1>MON COMPOSANT EXAMPLE</h1>
    <p>Utilisateur : {{ user }}</p>
    <p>Age : {{ age }}</p>
    <p>Surnom : {{ surnom }}</p>
  </div>
</template>

<style scoped>
.container {
  background-color: pink;
}
</style>
