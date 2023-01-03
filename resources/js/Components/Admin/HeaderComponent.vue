<template>
  <header
    class="w-full bg-white dark:bg-[#202F37] md:px-5 md:py-4 p-2 mb-[30px]"
  >
    <div class="flex justify-between items-center h-[50px]">
      <div class="flex pl-3 py-6">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200">
          {{ $page.props.page_name }}
        </h2>
      </div>
      <div class="flex space-x-3 items-center justify-center">
        <div class="mr-3 cursor-pointer">
          <i class="fa-regular fa-bell fa-xl dark:text-gray-200"></i>
        </div>
        <div class="cursor-pointer" @click="toggleDarkMode">
          <i
            class="fa-solid fa-xl mr-3 dark:text-gray-200"
            :class="isDarkMode ? 'fa-sun' : 'fa-moon'"
          ></i>
        </div>
        <div class="hidden sm:flex border-l-2 pl-5">
          <div class="mr-3 text-end">
            <h5 class="text-md font-semibold dark:text-gray-200">
              {{ $page.props.auth.user.username }}
            </h5>
            <h5 class="text-sm text-gray-500 dark:text-gray-400 -mt-1">
              {{ $page.props.auth.user.level.role }}
            </h5>
          </div>
          <img
            src="https://picsum.photos/40"
            class="rounded-full"
            alt="User profile picture"
            width="40"
            height="40"
          />
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import { ref } from "vue";

export default {
  setup() {
    let isDarkMode = ref(false);
    let darkMode = localStorage.getItem("darkMode");

    const enabledDarkMode = () => {
      document.documentElement.classList.add("dark");
      localStorage.setItem("darkMode", "enabled");
    };

    const disabledDarkMode = () => {
      document.documentElement.classList.remove("dark");
      localStorage.setItem("darkMode", null);
    };

    if (darkMode === "enabled") {
      enabledDarkMode();
      isDarkMode.value = true;
    }

    const toggleDarkMode = () => {
      darkMode = localStorage.getItem("darkMode");
      if (darkMode != "enabled") {
        enabledDarkMode();
        isDarkMode.value = true;
      } else {
        disabledDarkMode();
        isDarkMode.value = false;
      }
    };

    return {
      isDarkMode,
      toggleDarkMode,
    }
  },
};
</script>

<style>
header {
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.06);
}
</style>