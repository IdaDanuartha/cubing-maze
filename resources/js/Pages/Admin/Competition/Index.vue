<template>
  <Head>
    <title>Competitions - CubingMaze</title>
    <meta
      name="description"
      description="Halaman competition management untuk administrator cubingmaze"
    />
    <meta
      name="keywords"
      description="competition management page cubingmaze, halaman competition management cubingmaze, competition management administrator"
    />
  </Head>
  <div class="container-fluid mb-5">
    <div class="table-container">
      <div class="flex justify-between">
        <h2 class="font-worksans-medium text-lg dark:text-gray-100">
          Table Competitions
        </h2>
        <Link href="" class="flex btn btn-create dark:bg-third-color">
          <div>
            <i class="fa-solid fa-plus mr-2 dark:text-gray-100"></i>
          </div>
          <span class="dark:text-gray-100">Add Competition</span></Link
        >
      </div>
      <SearchGroup :searchQuery="search_query" @search-competition="searchCompetition"  />
      <Table>
        <template v-slot:columns>
          <div class="data-head col-span-2 md:col-span-1 pl-[1.125rem]">No</div>
          <div class="data-head col-span-6 md:col-span-4 xl:col-span-3">
            Name
          </div>
          <div
            class="data-head col-span-4 md:col-span-1 hidden xl:inline-block"
          >
            Limit
          </div>
          <div
            class="data-head col-span-4 xl:col-span-3 hidden md:inline-block"
          >
            Date
          </div>
          <div class="data-head col-span-2 hidden xl:inline-block">Status</div>
          <div
            class="data-head col-span-4 md:col-span-3 xl:col-span-2 text-end"
          ></div>
        </template>
        <template v-slot:rows>
          <div v-if="competitions.data.length">
            <TransitionGroup name="competitions">
              <div
                class="table-body"
                v-for="(comp, i) in competitions.data"
                :key="comp.id"
              >
                <div class="grid grid-cols-12">
                  <div
                    class="
                      data-column
                      col-span-2
                      md:col-span-1
                      pl-[1.125rem]
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    {{ i + 1 }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-6
                      md:col-span-4
                      xl:col-span-3
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    {{ comp.name }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-4
                      md:col-span-1
                      dark:text-gray-200 dark:font-light
                      hidden
                      xl:inline-block
                    "
                  >
                    {{ comp.competitor_limit }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-4
                      xl:col-span-3
                      dark:text-gray-200 dark:font-light
                      hidden
                      md:inline-block
                    "
                  >
                    {{ competitionDateFormat(comp.date_start, comp.date_end) }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-2
                      dark:text-gray-200 dark:font-light
                      hidden
                      xl:inline-block
                    "
                  >
                    {{ checkCompetitionDate(comp.date_start, comp.date_end) }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-4
                      md:col-span-3
                      xl:col-span-2
                      dark:text-gray-200 dark:font-light
                      flex
                      justify-end
                    "
                  >
                    <Link
                      :href="'/admin/competitions/' + comp.id"
                      class="icon detail-icon mr-4"
                    >
                      <img src="/assets/img/icon/detail.svg" alt="" />
                    </Link>
                    <Link
                      :href="'/admin/competitions/' + comp.id + '/edit'"
                      class="icon edit-icon mr-4"
                    >
                      <img src="/assets/img/icon/edit.svg" alt="" />
                    </Link>
                    <div class="icon delete-icon">
                      <img src="/assets/img/icon/delete.svg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </TransitionGroup>
          </div>
          <div class="table-body" v-else>
            <div
              class="
                data-column
                col-span-12
                text-center text-gray-600
                dark:text-gray-400
              "
            >
              Competition data not found
            </div>
          </div>
        </template>
      </Table>
    </div>
  </div>
</template>

<script>
import LayoutAdmin from "../../../Layouts/Admin.vue";
import Table from "../../../Components/Admin/TableComponent.vue";
import SearchGroup from "../../../Components/Admin/SearchGroupComponent.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref } from "@vue/runtime-core";
import { Inertia } from "@inertiajs/inertia";

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
    competitions: Object,
  },

  setup() {
    let search_query = ref("");

    const searchCompetition = () => {
      Inertia.get("/admin/competitions?search_query=" + search_query.value);
    };

    return {
      searchCompetition,
    };
  },
};
</script>

<style scoped>
</style>