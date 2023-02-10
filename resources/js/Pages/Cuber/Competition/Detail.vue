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
    <ul
      class="
        nav nav-tabs
        flex flex-col
        md:flex-row
        flex-wrap
        list-none
        border-b border-fourth-color/60
        pb-1
        pl-0
        mb-4
      "
      id="tabs-tab"
      role="tablist"
    >
      <li class="nav-item" role="presentation">
        <a
          href="#tabs-general-info"
          class="custom-tabs active"
          id="tabs-general-info-tab"
          data-bs-toggle="pill"
          data-bs-target="#tabs-general-info"
          role="tab"
          aria-controls="tabs-general-info"
          aria-selected="true"
          >General Info</a
        >
      </li>
      <li class="nav-item" role="presentation">
        <a
          href="#tabs-competitors"
          class="custom-tabs"
          id="tabs-competitors-tab"
          data-bs-toggle="pill"
          data-bs-target="#tabs-competitors"
          role="tab"
          aria-controls="tabs-competitors"
          aria-selected="false"
          >Competitors</a
        >
      </li>
      <li class="nav-item" role="presentation">
        <a
          href="#tabs-results"
          class="custom-tabs"
          id="tabs-results-tab"
          data-bs-toggle="pill"
          data-bs-target="#tabs-results"
          role="tab"
          aria-controls="tabs-results"
          aria-selected="false"
          >Live Results</a
        >
      </li>
    </ul>
    <div class="tab-content" id="tabs-tabContent">
      <div
        class="tab-pane fade show active"
        id="tabs-general-info"
        role="tabpanel"
        aria-labelledby="tabs-general-info-tab"
      >
        <DetailCompetition :competition="competition" />
      </div>
      <div
        class="tab-pane fade"
        id="tabs-competitors"
        role="tabpanel"
        aria-labelledby="tabs-competitors-tab"
      >
        <TableCompetitors :competitors="competitors" />
      </div>
      <div
        class="tab-pane fade"
        id="tabs-results"
        role="tabpanel"
        aria-labelledby="tabs-competitors-tab"
      >
        Results not found
      </div>
    </div>
  </div>
</template> 

<script>
import LayoutAdmin from "../../../Layouts/Admin.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import DetailCompetition from "../../../Components/Cuber/DetailCompComponent.vue";
import TableCompetitors from "../../../Components/Cuber/TableCompetitorsComponent.vue";

export default {
  //layout
  layout: LayoutAdmin,

  //register components
  components: {
    Head,
    Link,
    DetailCompetition,
    TableCompetitors,
  },

  //props
  props: {
    session: Object,
    competition: Object,
    competitors: Object,
  },

  setup() {},
};
</script>

<style scoped>
.custom-tabs {
  @apply block font-worksans-medium text-sm leading-tight border-x-0 border-t-0 border-b-2 border-transparent px-4 py-2.5 my-2 mr-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent;
}

.custom-tabs.active {
  @apply bg-fourth-color/70 text-secondary-color rounded;
}
</style>