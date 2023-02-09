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
        border-b
        border-fourth-color/60
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
          <div class="grid grid-cols-12 gap-10">
    <div class="xl:col-span-8 lg:col-span-7 col-span-12 lg:order-1 order-2">
      <div class="bg-white shadow-lg p-[30px] rounded">
        <div class="border-b border-secondary-color/50 pb-5 mb-5">
          <h3 class="text-secondary-color font-worksans-bold">Description</h3>
        </div>
        <div v-html="competition.description"></div>
      </div>
    </div>
    <div class="xl:col-span-4 lg:col-span-5 col-span-12 lg:order-2 order-1">
      <div class="bg-white shadow-lg p-[30px] rounded">
        <div class="border-b border-secondary-color/50 pb-5 mb-5">
          <img
            :src="`/storage/${competition.competition_img}`"
            class="rounded"
            alt="competition cover image"
          />
        </div>
        <div class="flex mb-4">
          <p>Competition Name :</p>
          <p class="font-worksans-semibold ml-1">{{ competition.name }}</p>
        </div>
        <div class="flex mb-4">
          <p>Competition Date :</p>
          <p class="font-worksans-semibold ml-1">
            {{
              competitionDateFormat(
                competition.date_start,
                competition.date_end
              )
            }}
          </p>
        </div>
        <div class="flex mb-4">
          <p>Competitor Limit :</p>
          <p class="font-worksans-semibold ml-1">
            {{ competition.competitor_limit }} Competitors
          </p>
        </div>
        <div class="flex mb-4">
          <p>Type :</p>
          <p class="font-worksans-semibold capitalize ml-1">
            {{ competition.type }}
          </p>
        </div>
        <div class="flex mb-4">
          <p>Registration Fee :</p>
          <p class="font-worksans-semibold ml-1">
            Rp. {{ rupiah_format(competition.fee) + ',00' ?? '0,00' }}
          </p>
        </div>
        <div class="flex mb-4">
          <p>Using Password :</p>
          <p class="font-worksans-semibold ml-1">
            {{ competition.password ? "Yes" : "No" }}
          </p>
        </div>
        <div class="flex mb-4">
          <p>Status :</p>
          <p class="font-worksans-semibold ml-1">
            {{
              checkCompetitionDate(competition.date_start, competition.date_end)
            }}
          </p>
        </div>
        <div
          class="flex mt-10"
          v-if="$page.props.auth.user.level.role === 'Cuber'"
        >
          <button
            v-if="
              competition.competitor_limit -
              competition.cuber_competitions.length > 0
            "
            data-bs-toggle="modal"
            data-bs-target="#registerCompetitionModal"
            class="
              w-full
              btn
              text-white
              px-6
              py-2.5
              font-worksans-regular
              text-sm
            "
            :class="
              cuber_competition
                ? 'bg-gray-500 pointer-events-none'
                : 'bg-secondary-color'
            "
          >
          {{ cuber_competition ? "Already Registered" : "Register" }}
          </button>
          <button
            v-else-if="checkCompetitionDate(competition.date_start, competition.date_end) !== 'Closed'"            
            class="
              w-full
              btn
              text-white
              px-6
              py-2.5
              font-worksans-regular
              text-sm
              bg-gray-500 pointer-events-none
            "
          >
            {{ checkCompetitionDate(competition.date_start, competition.date_end) === 'Opened' ? 'The competition has started' : 'The competition is over' }}
          </button>
          <button
            v-else            
            class="
              w-full
              btn
              text-white
              px-6
              py-2.5
              font-worksans-regular
              text-sm
              bg-red-500 pointer-events-none
            "
          >
            Participants have reached the limit
          </button>
        </div>
      </div>
    </div>
  </div>
      </div>
      <div
        class="tab-pane fade"
        id="tabs-competitors"
        role="tabpanel"
        aria-labelledby="tabs-competitors-tab"
      >
        Tab 2 content
      </div>
      <div
        class="tab-pane fade"
        id="tabs-results"
        role="tabpanel"
        aria-labelledby="tabs-competitors-tab"
      >
        Tab 3 content
      </div>
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
    competition: Object,
  },

  setup() {},
};
</script>

<style scoped>
.custom-tabs {
  @apply block font-medium text-sm leading-tight border-x-0 border-t-0 border-b-2 border-transparent px-4 py-2.5 my-2 mr-3 hover:border-transparent hover:bg-gray-100 focus:border-transparent;
}

.custom-tabs.active {
    @apply bg-fourth-color/70 text-secondary-color rounded;
}
</style>