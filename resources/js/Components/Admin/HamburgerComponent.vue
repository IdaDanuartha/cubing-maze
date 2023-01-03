<template>
  <div
    class="
      z-[99]
      hamburger
      fixed
      inline-block
      lg:hidden
      rounded-full
      cursor-pointer
      bg-[rgba(187,225,250,.7)]
      px-2.5
      py-2.5
      bottom-5
      right-5
      transition
      duration-200
      hover:opacity-75
    "
    :class="{ active: active }"
    @click="$emit('openSidebar')"
  >
    <div class="bar-line"></div>
    <div class="bar-line"></div>
    <div class="bar-line"></div>
    <!-- <i class="fa-solid fa-bars fa-sm text-[#0F4C75] dark:text-gray-100"></i> -->
  </div>
</template>

<script setup>
const props = defineProps({
  active: Boolean,
});

const emit = defineEmits(["openSidebar"]);
</script>

<style scoped>
.hamburger .bar-line {
    transform: translateX(0) translateY(0) rotate(0);
    transition: all .2s;
}

.hamburger.active .bar-line:nth-child(1) {
    transform: rotate(45deg) translateY(3.5px) translateX(3px);
}

.hamburger.active .bar-line:nth-child(2) {
    opacity: 0;
}

.hamburger.active .bar-line:nth-child(3) {
    transform: rotate(-45deg) translateY(-3.5px) translateX(3px);
}

.bar-line {
  width: 15px;
  height: 2px;
  border-radius: 20px;
  background-color: #0f4c75;
  margin-bottom: 3px;
}
</style>