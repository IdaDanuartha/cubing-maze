<template>
  <div class="flex">
    <Sidebar :active="active" @open-sidebar="openSidebar" />
    <div class="md:ml-[256px] ml-0 md:w-[calc(100vw-256px)] w-full">
      <Header :active="active" @open-sidebar="openSidebar" />
      <div class="md:mx-10 mx-5">
        <slot />
      </div>
    </div>
  </div>
</template>

<script setup>
import Header from "../Components/Admin/HeaderComponent.vue";
import Sidebar from "../Components/Admin/SidebarComponent.vue";
import { ref } from 'vue'

let active = ref(false);

const openSidebar = () => {
  active.value = !active.value
}
</script>

<style>
.table-head {
    padding: 1rem 1.125rem;
    border-radius: 4px;
}

.table-body {
  padding: 1rem 0;
}

.table-head {
    background-color: rgb(187,225,250, 0.5);
}

.data-head {
    color: #0F4C75;
}

.data-head span {
    color: inherit;
}

.table-body:nth-child(odd) {
    background-color: rgba(255,255,255, 0.02);
}

.data-head {
    font-size: 0.938rem;
}

.data-column {
    font-size: 0.875rem;
    padding-bottom: 10px;
    border-bottom: 1px solid rgba(27,38,44,.2);
}
</style>