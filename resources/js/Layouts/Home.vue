<template>
  <Navbar />
  <div class="flex justify-center items-center pt-[150px] mb-[150px] bg-gradient-to-b from-[rgb(176,224,255)] to-white">
    <div class="container">
      <slot />
    </div>
  </div>
</template>

<script setup>
import Navbar from "../Components/Home/NavbarComponent.vue";
</script>

<style>
</style>