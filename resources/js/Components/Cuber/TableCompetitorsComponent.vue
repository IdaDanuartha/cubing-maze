<template>
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
        Table Competitors
      </h2>
    </div>
    <SearchGroup
      v-model:search_query="search_query"
      @handle-search="handleSearch"
      :filter="false"
    />
    <Table>
      <template v-slot:columns>
        <div class="data-head col-span-2 md:col-span-1 pl-[1.125rem]">No</div>
        <div
          class="
            data-head
            col-span-10
            xs:col-span-6
            md:col-span-4
            xl:col-span-4
          "
        >
          Name
        </div>
        <div class="data-head col-span-4 xl:col-span-3 hidden md:inline-block">
          Citizen Of
        </div>
        <div class="data-head col-span-2 hidden xl:inline-block">Event</div>
        <div
          class="
            data-head
            col-span-4
            md:col-span-3
            xl:col-span-2
            xs:inline-block
            hidden
          "
        >
          Total
        </div>
      </template>
      <template v-slot:rows>
        <div v-if="competitors.data.length">
          <TransitionGroup name="table">
            <div
              class="table-body"
              v-for="(comp, i) in competitors.data"
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
                    ++i + (competitors.current_page - 1) * competitors.per_page
                  }}
                </div>
                <div
                  class="
                    data-column
                    col-span-10
                    xs:col-span-6
                    md:col-span-4
                    xl:col-span-4
                    dark:text-gray-200 dark:font-light
                  "
                >
                  {{ comp.cuber.name }}
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
                  {{ comp.cuber.country + ", " + comp.cuber.province }}
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
                  <!-- <span class="flex" v-for="(event, index) in comp.cuber_competition_categories" :key="index"> -->
                  <img
                    class="inline-block mr-1.5"
                    v-for="(event, index) in comp.cuber_competition_categories"
                    :key="index"
                    :src="`/storage/${event.cube_category.icon_img}`"
                    :alt="event.cube_category.short_name"
                    width="15"
                  />
                  <!-- </span> -->
                </div>
                <div
                  class="
                    data-column
                    col-span-4
                    md:col-span-3
                    xl:col-span-2
                    dark:text-gray-200 dark:font-light
                    xs:inline-block
                    hidden
                  "
                >
                  {{ comp.cuber_competition_categories.length }}
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

      <Pagination :data="competitors" />
  </div>
</template>

<script setup>
import Table from "../Admin/TableComponent.vue";
import Pagination from "../PaginationComponent.vue";
import SearchGroup from "../Admin/SearchGroupComponent.vue";

const props = defineProps({
  competitors: Object
})
</script>

<style>
</style>