<template>
  <div class="w-full bg-gray-100 ">
    <div class="flex justify-between items-center h-[50px]">
      <div class="inline-block md:hidden p-4 cursor-pointer hover:bg-gray-50" @click="$emit('openSidebar')">
        <i class="fa-solid fa-bars"></i>
      </div>
      <div class="flex space-x-3 items-center justify-center px-3">
        <div class="text-md">Admin</div>
      </div>
    </div>
  </div>
</template>

<script setup>
const emit = defineEmits(['openSidebar'])
</script>

<style>

</style>