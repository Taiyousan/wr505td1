<script setup>
import { useRoute } from "vue-router";
import { computed, ref, onMounted, toRaw } from "vue";
import data from "../curl/countries.json";

const route = useRoute();
const paysName = computed(() => route.params.id);

let country = ref("");

onMounted(() => {
  country.value = data.find(
    (pays) => pays.cca2 === paysName.value.toUpperCase()
  );
  console.log(toRaw(country.value));
});
</script>

<template>
  <div class="fiche-pays">
    <h1>Fiche pays :</h1>
    <ul v-if="country">
      <!-- <li>{{ country.name.common }}</li>
      <li>{{ country.name.common }}</li>
      <li>{{ country.name.common }}</li>
      <li>{{ country.name.common }}</li> -->
      <li>{{ country.name.common }}</li>
    </ul>
  </div>
</template>

<style scoped>
.fiche-pays {
  color: white;
  background-color: #252525;
  width: 80%;

  padding: 1em;
  margin: 0 auto;
  border-radius: 8px;
}
</style>
