<template>
  <Head>
    <title>Detail Competitions - CubingMaze</title>
    <meta
      name="description"
      description="detail competitions page for user cubingmaze"
    />
    <meta
      name="keywords"
      description="detail competitions page cubingmaze, halaman daftar kompetisi saya, detail competitions page"
    />
  </Head>
  <div class="container-fluid mb-16">
    <div class="alert-success" v-if="session.success">
      <p class="alert-label-success">{{ session.success }}</p>
    </div>
  </div>
</template>

<script>
import LayoutAdmin from "../../../Layouts/Admin.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
  //layout
  layout: LayoutAdmin,

  //register components
  components: {
    Head,
    Link,
  },

  //props
  props: {
    session: Object,
  },

  setup() {},
};
</script>

<style scoped>
</style>