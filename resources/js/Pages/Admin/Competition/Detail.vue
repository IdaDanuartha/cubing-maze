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
    <div class="alert-success" v-if="session.success">
      <p class="alert-label-success">{{ session.success }}</p>
    </div>

    <!-- Table Competition Rounds -->
    <div class="table-container">
      <div class="flex justify-between items-center">
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
          Table Competition Rounds
        </h2>
        <button
          data-bs-toggle="modal"
          data-bs-target="#createCompRoundModal"
          class="flex btn btn-create"
        >
          <div>
            <i class="fa-solid fa-plus mr-2 md:text-lg text-sm"></i>
          </div>
          <span class="md:text-lg text-sm">Add Round</span>
        </button>
      </div>
      <SearchGroup
        v-model:search_query="search_query"
        @handle-search="handleSearch"
      />
      <Table>
        <template v-slot:columns>
          <div class="data-head col-span-2 md:col-span-1 pl-[1.125rem]">No</div>
          <div class="data-head col-span-6 md:col-span-3">Round</div>
          <div class="data-head col-span-5 hidden md:inline-block">Event</div>
          <div class="data-head col-span-4 md:col-span-3 text-end"></div>
        </template>
        <template v-slot:rows>
          <div v-if="competition_rounds.data.length">
            <TransitionGroup name="table">
              <div
                class="table-body"
                v-for="(comp, i) in competition_rounds.data"
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
                      (competition_rounds.current_page - 1) *
                        competition_rounds.per_page
                    }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-6
                      md:col-span-3
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    {{ comp.round_name }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-5
                      dark:text-gray-200 dark:font-light
                      hidden
                      md:inline-block
                    "
                  >
                    <span
                      v-for="(category, index) in comp.competition_event_rounds"
                      :key="index"
                    >
                      {{
                        index == comp.competition_event_rounds.length - 1
                          ? category.cube_category.short_name
                          : category.cube_category.short_name + ", "
                      }}
                    </span>
                  </div>
                  <div
                    class="
                      data-column
                      col-span-4
                      md:col-span-3
                      dark:text-gray-200 dark:font-light
                      flex
                      justify-end
                    "
                  >
                    <TableDropdown>
                      <template v-slot:dropdown_item>
                        <Link
                          :href="'/admin/competitions/' + comp.id + '/edit'"
                          class="dropdown-item"
                        >
                          <i
                            class="fa-solid mr-2 relative top-0.5 fa-pencil"
                          ></i>
                          <span>Edit</span>
                        </Link>
                        <a
                          href="#"
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
                      :href="'/admin/competitions/' + comp.id + '/edit'"
                      class="hidden sm:inline-block icon edit-icon mr-4"
                    >
                      <img src="/assets/img/icon/edit.svg" alt="" />
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
              Competition round data not found
            </div>
          </div>
        </template>
      </Table>

      <Pagination :data="competition_rounds" />
    </div>

    <!-- Table Competition Items -->
    <div class="table-container my-10">
      <div class="flex justify-between items-center">
        <h2
          class="
            font-worksans-medium
            md:text-lg
            text-md
            hidden
            xs:inline-block
            dark:text-gray-100
          "
        >
          Table Competition Scrambles
        </h2>
        <Link href="/admin/competitions/create" class="flex btn btn-create">
          <div>
            <i class="fa-solid fa-plus mr-2 md:text-lg text-sm"></i>
          </div>
          <span class="md:text-lg text-sm">Add Scramble</span></Link
        >
      </div>
      <SearchGroup
        v-model:search_query="search_query"
        @handle-search="handleSearch"
      />
      <Table>
        <template v-slot:columns>
          <div class="data-head col-span-2 md:col-span-1 pl-[1.125rem]">No</div>
          <div class="data-head col-span-8 sm:col-span-4 md:col-span-3">
            Scramble Image
          </div>
          <div
            class="data-head md:col-span-3 col-span-4 hidden sm:inline-block"
          >
            Round
          </div>
          <div class="data-head col-span-3 hidden md:inline-block">Event</div>
          <div class="data-head col-span-2 text-end"></div>
        </template>
        <template v-slot:rows>
          <div v-if="competition_items.data.length">
            <TransitionGroup name="table">
              <div
                class="table-body"
                v-for="(comp, i) in competition_items.data"
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
                      (competition_items.current_page - 1) *
                        competition_items.per_page
                    }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-8
                      sm:col-span-4
                      md:col-span-3
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    <img
                      :src="`/storage/${comp.scramble_img}`"
                      width="40"
                      alt=""
                    />
                  </div>
                  <div
                    class="
                      data-column
                      col-span-4
                      md:col-span-3
                      hidden
                      sm:inline-block
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    {{ comp.competition_round.round_name }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-6
                      md:col-span-3
                      hidden
                      md:inline-block
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    {{ comp.cube_category.name }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-2
                      dark:text-gray-200 dark:font-light
                      flex
                      justify-end
                    "
                  >
                    <TableDropdown>
                      <template v-slot:dropdown_item>
                        <Link
                          :href="'/admin/competitions/' + comp.id + '/edit'"
                          class="dropdown-item"
                        >
                          <i
                            class="fa-solid mr-2 relative top-0.5 fa-pencil"
                          ></i>
                          <span>Edit</span>
                        </Link>
                        <a
                          href="#"
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
                      :href="'/admin/competitions/' + comp.id + '/edit'"
                      class="hidden sm:inline-block icon edit-icon mr-4"
                    >
                      <img src="/assets/img/icon/edit.svg" alt="" />
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
              Competition scramble data not found
            </div>
          </div>
        </template>
      </Table>

      <Pagination :data="competition_rounds" />
    </div>

    <!-- Table Cuber Competitions -->
    <div class="table-container my-10">
      <h2 class="font-worksans-medium md:text-lg text-md dark:text-gray-100">
        Table Competitors
      </h2>
      <SearchGroup
        v-model:search_query="search_query"
        @handle-search="handleSearch"
      />
      <Table>
        <template v-slot:columns>
          <div
            class="
              data-head
              col-span-2
              md:col-span-1
              pl-[1.125rem]
              2xs:col-span-2
              xs:text-lg
              text-xs
            "
          >
            No
          </div>
          <div
            class="
              data-head
              col-span-6
              md:col-span-4
              2xs:col-span-8
              xs:text-lg
              text-xs
            "
          >
            Competitor name
          </div>
          <div class="data-head col-span-4 hidden md:inline-block">Event</div>
          <div
            class="data-head col-span-4 md:col-span-3 2xs:col-span-2 text-end"
          ></div>
        </template>
        <template v-slot:rows>
          <div v-if="cuber_competitions.data.length">
            <TransitionGroup name="table">
              <div
                class="table-body"
                v-for="(comp, i) in cuber_competitions.data"
                :key="comp.id"
              >
                <div class="grid grid-cols-12">
                  <div
                    class="
                      data-column
                      2xs:col-span-2
                      xs:text-lg
                      text-xs
                      col-span-2
                      md:col-span-1
                      pl-[1.125rem]
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    {{
                      ++i +
                      (cuber_competitions.current_page - 1) *
                        cuber_competitions.per_page
                    }}
                  </div>
                  <div
                    class="
                      2xs:col-span-8
                      xs:text-lg
                      text-xs
                      data-column
                      col-span-6
                      md:col-span-4
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    {{ comp.cuber.name }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-4
                      dark:text-gray-200 dark:font-light
                      hidden
                      md:inline-block
                    "
                  >
                    <span
                      class="text-white"
                      v-for="(
                        category, index
                      ) in comp.cuber_competition_categories"
                      :key="index"
                    >
                      {{
                        index == comp.cuber_competition_categories.length - 1
                          ? category.cube_category.short_name
                          : category.cube_category.short_name + ", "
                      }}
                    </span>
                  </div>
                  <div
                    class="
                      data-column
                      col-span-4
                      2xs:col-span-2
                      md:col-span-3
                      dark:text-gray-200 dark:font-light
                      flex
                      justify-end
                    "
                  >
                    <TableDropdown>
                      <template v-slot:dropdown_item>
                        <Link
                          :href="'/admin/competitions/' + comp.id + '/edit'"
                          class="dropdown-item"
                        >
                          <i
                            class="fa-solid mr-2 relative top-0.5 fa-pencil"
                          ></i>
                          <span>Edit</span>
                        </Link>
                        <a
                          href="#"
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
                      :href="'/admin/competitions/' + comp.id + '/edit'"
                      class="hidden sm:inline-block icon edit-icon mr-4"
                    >
                      <img src="/assets/img/icon/edit.svg" alt="" />
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
              Competitor data not found
            </div>
          </div>
        </template>
      </Table>

      <Pagination :data="competition_rounds" />
    </div>

    <ModalBase modalId="createCompRound" modalTitle="Add New Round" btnName="Add Round" @submit="storeRound">
      <template v-slot:body>
        <div class="relative">
          <input
            type="text"
            v-model="payloadCompRound.name"
            id="name"
            :class="{ error: errors.name }"
            class="custom-input peer"
            placeholder=" "
          />
          <label for="name" class="custom-label" :class="{ error: errors.name }"
            >Round Name</label
          >
        </div>
        <div v-if="errors.name">
          <p class="text-error">{{ errors.name }}</p>
        </div>
        <div class="flex justify-between mt-6 mb-3">
          <p>Select the event :</p>
          <a href="#" class="font-worksans-medium underline text-secondary-color">Select all</a>
        </div>
        <div class="flex flex-wrap">
          <button type="button" class="px-3 py-1 flex hover:opacity-80 hover:bg-main-color/5 transition-all duration-300 justify-between mr-2.5 mb-2.5 outline outline-1 outline-main-color/60 rounded-full" v-for="(cube, index) in cube_categories" :key="index" @click="addCubeCategory(cube.id)">
            <span class="mr-3 text-main-color/80 text-sm relative top-0.5">{{ cube.short_name }}</span>
            <div><i class="fa-solid fa-plus text-[8px] bg-main-color/80 text-white rounded-full p-0.5 relative -top-0.5"></i></div>
          </button>
        </div>
      </template>
    </ModalBase>
  </div>
</template>

<script>
import LayoutAdmin from "../../../Layouts/Admin.vue";
import Table from "../../../Components/Admin/TableComponent.vue";
import Pagination from "../../../Components/PaginationComponent.vue";
import SearchGroup from "../../../Components/Admin/SearchGroupComponent.vue";
import TableDropdown from "../../../Components/Admin/TableDropdownComponent.vue";
import ModalBase from "../../../Components/Admin/ModalBaseComponent.vue";
import ModalDelete from "../../../Components/Admin/ModalDeleteComponent.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref, reactive } from "@vue/runtime-core";
import { Inertia } from "@inertiajs/inertia";
import vClickOutside from "click-outside-vue3";

export default {
  //layout
  layout: LayoutAdmin,

  directives: {
    clickOutside: vClickOutside.directive,
  },

  //register components
  components: {
    Head,
    Link,
    Table,
    SearchGroup,
    Pagination,
    TableDropdown,
    ModalBase,
    ModalDelete,
  },

  //props
  props: {
    session: Object,
    errors: Object,
    cube_categories: Object,
    competition_rounds: Object,
    competition_items: Object,
    cuber_competitions: Object,
  },

  setup() {
    const search_query = ref(
      "" || new URL(document.location).searchParams.get("search_query")
    );

    let cube_categories_arr = ref([])

    let payloadCompRound = reactive({
      competition_round_id: "",
      name: "",
      cube_categories: cube_categories_arr,
    });

    const addCubeCategory = (cube_id) => {
      cube_categories_arr.value.push(cube_id)
    }

    //define method search
    const handleSearch = () => {
      Inertia.get("/admin/competitions", {
        search_query: search_query.value,
      });
    };

    const storeRound = () => {
      Inertia.post("/admin/competitions ", payloadCompRound);
    };

    return {
      search_query,
      handleSearch,
      payloadCompRound,
      addCubeCategory,
      storeRound,
      cube_categories_arr
    };
  },
};
</script>

<style scoped>
</style>