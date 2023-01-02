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
        <Link
          href=""
          class="flex btn btn-create dark:bg-third-color"
        >
          <div>
            <i class="fa-solid fa-plus mr-2 dark:text-gray-100"></i>
          </div>
          <span class="dark:text-gray-100">Add Competition</span></Link
        >
      </div>
      <SearchGroup />
      <Table>
        <template v-slot:columns>
          <div class="data-head col-span-1 pl-[1.125rem]">No</div>
          <div class="data-head col-span-6 md:col-span-3">Name</div>
          <div class="data-head col-span-4 md:col-span-1">Limit</div>
          <div class="data-head col-span-1 hidden md:inline-block">Type</div>
          <div class="data-head col-span-3 hidden md:inline-block">Date</div>
          <div class="data-head col-span-2 hidden md:inline-block">Status</div>
          <div class="data-head col-span-1"></div>
        </template>
        <template v-slot:rows>
          <div class="table-body" v-for="(item, i) in 5" :key="i">
            <div class="grid grid-cols-12">
              <div
                class="
                  data-column
                  col-span-1
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
                  md:col-span-3
                  dark:text-gray-200 dark:font-light
                "
              >
                Cubing Maze Competition I
              </div>
              <div
                class="
                  data-column
                  col-span-4
                  md:col-span-1
                  dark:text-gray-200 dark:font-light
                "
              >
                120
              </div>
              <div
                class="
                  data-column
                  col-span-1
                  dark:text-gray-200 dark:font-light
                  hidden
                  md:inline-block
                "
              >
                Free
              </div>
              <div
                class="
                  data-column
                  col-span-3
                  dark:text-gray-200 dark:font-light
                  hidden
                  md:inline-block
                "
              >
                31 March - 2 April 2023
              </div>
              <div
                class="
                  data-column
                  col-span-2
                  dark:text-gray-200 dark:font-light
                  hidden
                  md:inline-block
                "
              >
                Locked
              </div>
              <div
                class="
                  data-column
                  col-span-1
                  dark:text-gray-200 dark:font-light
                  hidden
                  md:flex
                "
              >
                <div class="icon detail-icon mr-4">
                  <img src="/assets/img/icon/detail.svg" width="20" alt="" />
                </div>
                <div class="icon edit-icon mr-4">
                  <img src="/assets/img/icon/edit.svg" width="20" alt="" />
                </div>
                <div class="icon delete-icon">
                  <img src="/assets/img/icon/delete.svg" width="20" alt="" />
                </div>
              </div>
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