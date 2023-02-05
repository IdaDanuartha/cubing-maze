<template>
  <Navbar />
  <div class="flex justify-center items-center pt-[150px] mb-[150px]">
  <div v-if="$page.url === '/'" class="w-full h-full top-0 -z-10 absolute bg-gradient-to-b from-[rgba(176,224,255,0.5)] to-white"></div>
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