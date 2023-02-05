<template>
  <Head>
    <title>Detail Competition - Cubing Maze</title>
    <meta name="description" description="Halaman detail kompetisi cubingmaze" />
    <meta
      name="keywords"
      description="detail competition cubingmaze, halaman detail kompetisi cubingmaze, cubing, competitions, courses, blogs"
    />
  </Head>
  <div>
  </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import LayoutHome from "../../Layouts/Home.vue";
import Navbar from "../../Components/Home/NavbarComponent.vue";
import { ref } from "vue";

export default {
  layout: LayoutHome,
  components: {
    Head,
    Link,
    Inertia,
    Navbar,
  },

  props: {
    upcoming_competitions: Object,
  },

  setup() {

    return {
    };
  },
};
</script>

<style scoped>
.search-group-home {
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.08);
}
</style>