<script setup>
import { useRoute } from "vue-router";
import { computed, ref, onMounted, toRaw } from "vue";
import axios from "axios";

const route = useRoute();
const paysName = computed(() => route.params.id);

let data = ref("");

onMounted(async () => {
  const response = await axios.get(
    `https://restcountries.com/v3.1/name/${paysName.value}`
  );
  data.value = response.data;
  console.log(toRaw(data.value));
});
</script>

<template>
  <div class="fiche-pays">
    <h1>Fiche pays :</h1>
    <div v-for="pays in data">
      <ul>
        <li>{{ pays.name.common }}</li>
        <li>{{ pays.name.common }}</li>
        <li>{{ pays.name.common }}</li>
        <li>{{ pays.name.common }}</li>
      </ul>
    </div>
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
