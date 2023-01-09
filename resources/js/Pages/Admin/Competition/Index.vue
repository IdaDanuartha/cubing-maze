<template>
  <Head>
    <title>Competitions - CubingMaze</title>
    <meta
      name="description"
      description="competitions management page for administrator cubingmaze"
    />
    <meta
      name="keywords"
      description="competition management page cubingmaze, halaman competition management cubingmaze, competition management administrator"
    />
  </Head>
  <div class="container-fluid mb-16">
    <div class="alert-success" v-if="session.success">
      <p class="alert-label-success">{{ session.success }}</p>
    </div>
    <div class="table-container">
      <div class="flex justify-between">
        <h2 class="font-worksans-medium text-lg dark:text-gray-100">
          Table Competitions
        </h2>
        <Link href="/admin/competitions/create" class="flex btn btn-create">
          <div>
            <i class="fa-solid fa-plus mr-2"></i>
          </div>
          <span>Add Competition</span></Link
        >
      </div>
      <SearchGroup
        v-model:search_query="search_query"
        @handle-search="handleSearch"
      />
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
                    {{
                      ++i +
                      (competitions.current_page - 1) * competitions.per_page
                    }}
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
                    <TableDropdown>
                      <template v-slot:dropdown_item>
                        <Link
                          :href="'/admin/competitions/' + comp.id"
                          class="dropdown-item"
                        >
                          <i class="fa-solid mr-2 relative top-0.5 fa-eye"></i>
                          <span>Detail</span>
                        </Link>
                        <Link
                          :href="'/admin/competitions/' + comp.id + '/edit'"
                          class="dropdown-item"
                        >
                          <i
                            class="fa-solid mr-2 relative top-0.5 fa-pencil"
                          ></i>
                          <span>Edit</span>
                        </Link>
                        <a href="#" class="dropdown-item">
                          <i
                            class="fa-solid mr-2 relative top-0.5 fa-trash"
                          ></i>
                          <span>Remove</span>
                        </a>
                      </template>
                    </TableDropdown>
                    <Link
                      :href="'/admin/competitions/' + comp.id"
                      class="hidden sm:inline-block icon detail-icon mr-4"
                    >
                      <img src="/assets/img/icon/detail.svg" alt="" />
                    </Link>
                    <Link
                      :href="'/admin/competitions/' + comp.id + '/edit'"
                      class="hidden sm:inline-block icon edit-icon mr-4"
                    >
                      <img src="/assets/img/icon/edit.svg" alt="" />
                    </Link>
                    <div class="hidden sm:inline-block icon delete-icon" data-bs-toggle="modal" data-bs-target="#deleteCompetitionModal">
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

      <Pagination :data="competitions" />
    </div>
  </div>

</template>

<script>
import LayoutAdmin from "../../../Layouts/Admin.vue";
import Table from "../../../Components/Admin/TableComponent.vue";
import Pagination from "../../../Components/PaginationComponent.vue";
import SearchGroup from "../../../Components/Admin/SearchGroupComponent.vue";
import TableDropdown from "../../../Components/Admin/TableDropdownComponent.vue";
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
    Pagination,
    TableDropdown,
  },

  //props
  props: {
    session: Object,
    competitions: Object,
  },

  setup() {
    const search_query = ref(
      "" || new URL(document.location).searchParams.get("search_query")
    );

    //define method search
    const handleSearch = () => {
      Inertia.get("/admin/competitions", {
        //send params "q" with value from state "search"
        search_query: search_query.value,
      });
    };

    return {
      search_query,
      handleSearch,
    };
  },
};
</script>

<style scoped>
</style>