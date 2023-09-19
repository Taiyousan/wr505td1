<script setup>
import { ref, computed } from "vue";
import { useRoute } from "vue-router";

const route = useRoute();
const routeName = computed(() => route.name);
</script>

<template>
  <div id="app">
    <div class="app-navbar">
      <h1>Route : {{ routeName }}</h1>
      <router-link to="/">Accueil</router-link>
      <router-link to="/about">A propos</router-link>
      <router-link to="/pays">Liste pays</router-link>
    </div>
    <router-view></router-view>
  </div>
</template>
<style scoped>
.app-navbar {
  background-color: rgb(231, 231, 231);
  display: flex;
  align-items: center;
  flex-direction: column;

  padding: 1em;
}

.app-navbar > * {
  text-decoration: none;
  color: black;
}
</style>
