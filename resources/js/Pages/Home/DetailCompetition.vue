<template>
  <Head>
    <title>Detail Competition - Cubing Maze</title>
    <meta
      name="description"
      description="Halaman detail kompetisi cubingmaze"
    />
    <meta
      name="keywords"
      description="detail competition cubingmaze, halaman detail kompetisi cubingmaze, cubing, competitions, courses, blogs"
    />
  </Head>
  <div class="grid grid-cols-12 gap-10">
    <div class="xl:col-span-8 lg:col-span-7 col-span-12 lg:order-1 order-2">
      <div class="bg-white shadow-md p-[30px] rounded">
        <div class="border-b border-secondary-color/50 pb-5 mb-5">
          <h3 class="text-secondary-color font-worksans-bold">Description</h3>
        </div>
        <div v-html="competition.description"></div>
      </div>
    </div>
    <div class="xl:col-span-4 lg:col-span-5 col-span-12 lg:order-2 order-1">
      <div class="bg-white shadow-md p-[30px] rounded">
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
          <p>Competition Limit :</p>
          <p class="font-worksans-semibold ml-1">{{ competition.competitor_limit }} Competitors</p>
        </div>
        <div class="flex mb-4">
          <p>Type :</p>
          <p class="font-worksans-semibold capitalize ml-1">{{ competition.type }}</p>
        </div>
        <div class="flex mb-4">
          <p>Registration Fee :</p>
          <p class="font-worksans-semibold ml-1">{{ competition.fee ?? '-' }}</p>
        </div>
        <div class="flex mb-4">
          <p>Using Password :</p>
          <p class="font-worksans-semibold ml-1">{{ competition.password ? 'Yes' : 'No' }}</p>
        </div>
        <div class="flex mb-4">
          <p>Status :</p>
          <p class="font-worksans-semibold ml-1">{{ checkCompetitionDate(competition.date_start, competition.date_end) }}</p>
        </div>
        <div class="flex mt-10"  v-if="$page.props.auth.user.level.role === 'Cuber'">
            <button class="w-full btn bg-secondary-color text-white px-6 py-2.5 font-worksans-regular text-sm">Register</button>
        </div>
      </div>
    </div>
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
    competition: Object,
  },

  setup() {
    return {};
  },
};
</script>

<style scoped>
.search-group-home {
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.08);
}
</style>