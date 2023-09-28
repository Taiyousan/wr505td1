<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";
import CardPays from "../components/CardPays.vue";
const listePays = [
  "France",
  "Espagne",
  "Italie",
  "Allemagne",
  "Portugal",
  "Belgique",
  "Suisse",
  "Royaume-Uni",
  "Pays-Bas",
  "Autriche",
];

let data = ref("");

onMounted(async () => {
  const response = await axios.get("src/curl/countries.json");
  data.value = response.data;
});
</script>

<template>
  <main>
    <!-- <h2>Liste des pays :</h2>
    <div class="pays-links">
      <div v-for="pays in listePays">
        <div class="pays-link">
          <router-link :to="`/pays/${pays}`">
            {{ pays }}
          </router-link>
        </div>
      </div>
    </div> -->
    <div class="container">
      <div v-for="pays in data">
        <CardPays :pays="pays" />
      </div>
    </div>
  </main>
</template>

<style setup>
.pays-links {
  /* background-color: pink; */
  display: flex;
  flex-direction: column;
}

.pays-link {
  width: fit-content;
  background-color: #252525;

  margin: 10px;
  padding: 1em;
  border-radius: 8px;
}

.pays-link a {
  color: white;
  text-decoration: none;
}

.container {
  display: flex;
  flex-wrap: wrap;
}
</style>
