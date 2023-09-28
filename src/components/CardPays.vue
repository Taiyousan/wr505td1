<script setup>
import { onMounted } from "vue";

const props = defineProps(["pays"]);
onMounted(() => {
  console.log(JSON.parse(JSON.stringify(props.pays)));
});
</script>

<template>
  <div class="card-pays">
    <p>{{ pays.name.common }}</p>
    <img :src="`/public/flags/${pays.cca2}.png`" alt="" />
    <router-link :to="`/pays/${pays.name.common}`">VOIR FICHE</router-link>
  </div>
</template>

<style scoped>
.card-pays {
  color: white;
  background-color: #252525;
  margin: 1em;
  padding: 1em;

  display: flex;
  justify-content: space-around;
  align-items: center;
  flex-direction: column;
  min-height: 10em;

  border-radius: 8px;
  box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;

  /* width: 30%; */
}

a {
  text-decoration: none;
  color: white;
}

.card-pays img {
  max-width: 5em;
}
</style>
