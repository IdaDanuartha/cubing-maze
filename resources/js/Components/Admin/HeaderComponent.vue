<template>
  <header class="w-full md:px-5 md:py-2 p-2 mb-[30px]">
    <div class="flex justify-between items-center h-[50px]">
      <div class="flex pl-3 py-6">
        <div
          class="inline-block md:hidden cursor-pointer mr-3 mt-0.5 hover:bg-gray-50"
          @click="$emit('openSidebar')"
        >
          <i class="fa-solid fa-bars"></i>
        </div>
        <h2 class="font-bold text-2xl text-gray-800">Statistics</h2>
      </div>
      <div class="flex space-x-3 items-center justify-center">
        <div class="text-md">Admin</div>
      </div>
    </div>
  </header>
</template>

<script setup>
const emit = defineEmits(["openSidebar"]);
</script>

<style>
header {
  box-shadow: 0 10px 10px rgba(0,0,0,.06);
}
</style>