<script setup lang="ts">
import Footer from "./base/Footer.vue";
import Header from "./base/Header.vue";
</script>
<template>
  <Header/>
  <main>
    <slot/>
  </main>
  <Footer/>
</template>