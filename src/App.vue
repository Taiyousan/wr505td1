<script setup>
import { ref } from "vue";
const symfony = 18;
const integration = 16;
const reseau = 13;

const awesome = ref(true);
</script>

<template>
  <h1>VUE exo 1</h1>
  <ul>
    <li>Note sur Symfony : {{ symfony }}</li>
    <li>Note en intégration : {{ integration }}</li>
    <li>Note en réseau : {{ reseau }}</li>
    <p v-if="test">ok</p>
    <p v-else>pas ok</p>
    <img src="./assets/logo.png" alt="logo" />
  </ul>

  <button @click="awesome = !awesome">Basculer</button>

  <h1 v-if="awesome">Vue est magnifique!</h1>
  <h1 v-else>Oh non 😢</h1>
</template>

<style scoped></style>
