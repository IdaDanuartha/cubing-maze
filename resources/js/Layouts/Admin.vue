<template>
  <div class="flex">
    <Sidebar :active="active" @open-sidebar="openSidebar"/>
    <div class="lg:ml-[256px] ml-0 lg:w-[calc(100vw-256px)] w-full">
      <Hamburger :active="active" @open-sidebar="openSidebar" />
      <Header />
      <div class="lg:mx-10 mx-5">
        <slot />
      </div>
    </div>
  </div>
</template>

<script setup>
import Header from "../Components/Admin/HeaderComponent.vue";
import Sidebar from "../Components/Admin/SidebarComponent.vue";
import Hamburger from "../Components/Admin/HamburgerComponent.vue";
import { ref } from "vue";

let active = ref(false);

const openSidebar = () => {
  active.value = !active.value
}
</script>