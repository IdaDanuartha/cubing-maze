<template>
  <Head>
    <title>My Competitions - CubingMaze</title>
    <meta
      name="description"
      description="my competitions page for user cubingmaze"
    />
    <meta
      name="keywords"
      description="my competitions page cubingmaze, halaman daftar kompetisi saya, my competitions page"
    />
  </Head>
  <div class="container-fluid mb-16">
    <div class="alert-success" v-if="session.success">
      <p class="alert-label-success">{{ session.success }}</p>
    </div>
    <div class="table-container">
      <div class="flex items-center">
        <h2
          class="
            font-worksans-medium
            md:text-lg
            hidden
            xs:inline-block
            text-md
            dark:text-gray-100
          "
        >
          Table My Competitions
        </h2>
      </div>
      <SearchGroup
        v-model:search_query="search_query"
        @handle-search="handleSearch"
      />
      <Table>
        <template v-slot:columns>
          <div class="data-head col-span-2 md:col-span-1 pl-[1.125rem]">No</div>
          <div class="data-head col-span-6 md:col-span-4 xl:col-span-4">
            Name
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
          <div v-if="my_competitions.data.length">
            <TransitionGroup name="table">
              <div
                class="table-body"
                v-for="(comp, i) in my_competitions.data"
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
                      (my_competitions.current_page - 1) *
                        my_competitions.per_page
                    }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-6
                      md:col-span-4
                      xl:col-span-4
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    {{ comp.competition.name }}
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
                    {{
                      competitionDateFormat(
                        comp.competition.date_start,
                        comp.competition.date_end
                      )
                    }}
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
                    {{
                      checkCompetitionDate(
                        comp.competition.date_start,
                        comp.competition.date_end
                      )
                    }}
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
                          :href="
                            '/dashboard/my-competitions/' +
                            comp.competition.slug
                          "
                          class="dropdown-item"
                        >
                          <i class="fa-solid mr-2 relative top-0.5 fa-eye"></i>
                          <span>Detail</span>
                        </Link>
                        <a
                          href="#"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteCompetitionModal"
                          @click="detail(comp.id)"
                          class="dropdown-item"
                        >
                          <i
                            class="fa-solid mr-2 relative top-0.5 fa-trash"
                          ></i>
                          <span>Remove</span>
                        </a>
                      </template>
                    </TableDropdown>
                    <Link
                      :href="
                        '/dashboard/my-competitions/' + comp.competition.slug
                      "
                      class="hidden sm:inline-block icon detail-icon mr-4"
                    >
                      <img src="/assets/img/icon/detail.svg" alt="" />
                    </Link>
                    <div
                      class="hidden sm:inline-block icon delete-icon"
                      data-bs-toggle="modal"
                      data-bs-target="#deleteCompetitionModal"
                      @click="detail(comp.id)"
                    >
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

      <Pagination :data="my_competitions" />
    </div>
  </div>

  <ModalDelete
    modalId="deleteCompetition"
    modalTitle="Competition"
    :modalData="payload.name"
    @destroy="destroy"
  />
</template>

<script>
import LayoutAdmin from "../../../Layouts/Admin.vue";
import Table from "../../../Components/Admin/TableComponent.vue";
import Pagination from "../../../Components/PaginationComponent.vue";
import SearchGroup from "../../../Components/Admin/SearchGroupComponent.vue";
import TableDropdown from "../../../Components/Admin/TableDropdownComponent.vue";
import ModalDelete from "../../../Components/Admin/ModalDeleteComponent.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref, reactive } from "@vue/runtime-core";
import { Inertia } from "@inertiajs/inertia";
import vClickOutside from "click-outside-vue3";

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
    ModalDelete,
  },

  directives: {
    clickOutside: vClickOutside.directive,
  },

  //props
  props: {
    session: Object,
    my_competitions: Object,
  },

  setup() {
    let payload = reactive({
      cuber_competition_id: "",
      name: "",
    });

    const detail = (id) => {
      $.ajax({
        method: "GET",
        url: `/dashboard/my-competitions/${id}/edit`,
        success: (response) => {
          console.log(response)
          payload.cuber_competition_id = response.id;
          payload.name = response.competition.name;
        },
      });
    };

    const destroy = () => {
      Inertia.delete(`/dashboard/my-competitions/${payload.cuber_competition_id}`, {
        onSuccess: () => {
          $("#deleteCompetitionModal").modal("hide");
        },
      });
    };

    return {
      payload,
      detail,
      destroy,
    };
  },
};
</script>

<style scoped>
</style>