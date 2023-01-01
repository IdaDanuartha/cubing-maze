<template>
  <Head>
    <title>Competitions - CubingMaze</title>
    <meta name="description" description="Halaman competition management untuk administrator cubingmaze">
        <meta name="keywords" description="competition management page cubingmaze, halaman competition management cubingmaze, competition management administrator">
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