<template>
  <Head>
    <title>Detail Competitions - CubingMaze</title>
    <meta
      name="description"
      description="competition detail management page for administrator cubingmaze"
    />
    <meta
      name="keywords"
      description="competition detail management page cubingmaze, halaman manajemen kompetisi detail cubingmaze, competition detail management administrator"
    />
  </Head>
  <div class="container-fluid mb-5">

  </div>
</template>

<script>
import LayoutAdmin from "../../../Layouts/Admin.vue";
import Table from "../../../Components/Admin/TableComponent.vue";
import SearchGroup from "../../../Components/Admin/SearchGroupComponent.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
  //layout
  layout: LayoutAdmin,

  //register components
  components: {
    Head,
    Link,
    Table,
    SearchGroup,
  },

  //props
  props: {
    competition: Object,
  },
};
</script>

<style scoped>
</style>