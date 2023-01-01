<template>
  <Head>
    <title>Statistics - CubingMaze</title>
  </Head>
  <div class="container-fluid mb-5">
    
  </div>
</template>

<script>
import LayoutAdmin from "../../../Layouts/Admin.vue";
import { Head } from "@inertiajs/inertia-vue3";

export default {
  //layout
  layout: LayoutAdmin,

  //register components
  components: {
    Head,
  },

  //props
  props: {
    competitions: Array
  },
};
</script>

<style scoped>

</style>