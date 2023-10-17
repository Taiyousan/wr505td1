<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";
import CardPays from "../components/CardPays.vue";

let data = ref("");
let search = ref("");
let searchResult = ref("");

onMounted(async () => {
  const response = await axios.get("src/curl/countries.json");
  data.value = response.data;
  searchResult.value = data.value;
});

const searching = () => {
  searchResult.value = data.value.filter((pays) => {
    return pays.name.common.toLowerCase().includes(search.value.toLowerCase());
  });
};

// à finir
function searchSuggestions(pays) {
  searchResult.value = [pays];
}
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

    <div>
      <div class="search-container">
        <input type="text" v-model="search" v-on:keyup="searching" />
        <div v-if="search && searchResult.length" class="suggestions">
          <div
            v-for="pays in searchResult"
            :key="pays.cca3"
            class="suggestion-item"
            @click="searchSuggestions(pays)"
          >
            {{ pays.name.common }}
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div v-for="pays in searchResult">
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

.suggestion-item {
  cursor: pointer;
}
</style>
