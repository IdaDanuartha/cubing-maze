<template>
  <Head>
    <title>Statistics - CubingMaze</title>
    <meta name="description" description="Halaman dashboard cuber cubingmaze" />
    <meta
      name="keywords"
      description="dashboard page cubingmaze, halaman dashboard cubingmaze, dashboard cuber"
    />
  </Head>
  <div class="container-fluid mb-16">
    <div class="grid xl:grid-cols-4 lg:grid-cols-2 grid-cols-1 gap-4">
      <div class="flex px-5 py-4 rounded-lg dashboard-card dark:bg-[#202F37]">
        <img
          class="mr-3 bg-blue-400 px-4 py-4 h-16 rounded-lg"
          src="/assets/img/dashboard/cuber-registered.svg"
          alt="Cuber registered icon"
        />
        <div class="flex flex-col justify-center">
          <h6 class="text-sm text-gray-500 dark:text-gray-400">
            Cubers Registered (Monthly)
          </h6>
          <h2 class="font-semibold text-2xl dark:text-gray-100">0</h2>
        </div>
      </div>
      <div class="flex px-5 py-4 rounded-lg dashboard-card dark:bg-[#202F37]">
        <img
          class="mr-3 bg-red-500 px-4 py-4 h-16 rounded-lg"
          src="/assets/img/dashboard/reports.svg"
          alt="Reports icon"
        />
        <div class="flex flex-col justify-center">
          <h6 class="text-sm text-gray-500 dark:text-gray-400">
            Reports (Weekly)
          </h6>
          <h2 class="font-semibold text-2xl dark:text-gray-100">0</h2>
        </div>
      </div>
      <div class="flex px-5 py-4 rounded-lg dashboard-card dark:bg-[#202F37]">
        <img
          class="mr-3 bg-amber-500 px-4 py-4 h-16 rounded-lg"
          src="/assets/img/dashboard/course-students.svg"
          alt="Course students icon"
        />
        <div class="flex flex-col justify-center">
          <h6 class="text-sm text-gray-500 dark:text-gray-400">
            Course Students (All time)
          </h6>
          <h2 class="font-semibold text-2xl dark:text-gray-100">0</h2>
        </div>
      </div>
      <div class="flex px-5 py-4 rounded-lg dashboard-card dark:bg-[#202F37]">
        <img
          class="mr-3 bg-green-500 px-4 py-4 h-16 rounded-lg"
          src="/assets/img/dashboard/course-revenue.svg"
          alt="Course revenue icon"
        />
        <div class="flex flex-col justify-center">
          <h6 class="text-sm text-gray-500 dark:text-gray-400">
            Course Revenue (All time)
          </h6>
          <h2 class="font-semibold text-2xl dark:text-gray-100">0</h2>
        </div>
      </div>
    </div>
    <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 mt-10">
      <div class="col-span-2">
        <div>
          <BarChart :chartData="chartData" />
        </div>
        <div class="mt-10">
          <h5 class="font-semibold dark:text-gray-400 mb-5">
            Most Favorite Events
          </h5>
          <Table>
            <template v-slot:columns>
              <div class="data-head col-span-2 pl-[1.125rem]">No</div>
              <div class="data-head col-span-6 md:col-span-4">
                Category Name
              </div>
              <div class="data-head col-span-4 md:col-span-3">Total Cuber</div>
              <div class="data-head col-span-3 hidden md:inline-block">
                Total Competitions
              </div>
            </template>
            <template v-slot:rows>
              <div class="table-body" v-for="(item, i) in 5" :key="i">
                <div class="grid grid-cols-12">
                  <div
                    class="
                      data-column
                      col-span-2
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
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    3x3x3 cube
                  </div>
                  <div
                    class="
                      data-column
                      col-span-4
                      md:col-span-3
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    120
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
                    5
                  </div>
                </div>
              </div>
            </template>
          </Table>
        </div>
      </div>
      <div>
        <div class="p-3">
          <div class="flex justify-between mb-4">
            <h4 class="font-semibold dark:text-gray-400">
              Recent Single Records
            </h4>
            <a href="#" class="text-sm text-[#3282B8]">See all</a>
          </div>
          <div class="flex justify-between mb-4" v-for="item in 5" :key="item">
            <div class="flex">
              <div class="p-2 bg-blue-200 rounded">
                <img
                  src="/assets/img/cube-categories/3x3.svg"
                  width="20"
                  alt="Icon cube category"
                />
              </div>
              <div class="ml-3">
                <h6 class="text-sm dark:text-gray-500">
                  3x3x3 Cube single of
                  <strong class="dark:text-gray-400">5.85</strong>
                </h6>
                <p class="text-xs text-gray-400 dark:text-gray-700">
                  Danuartha from Indonesia, Bali
                </p>
              </div>
            </div>
            <div>
              <a class="bg-blue-100 rounded px-1.5 py-1" href="#"
                ><i
                  class="fa-solid fa-magnifying-glass text-[#0F4C75] fa-xs"
                ></i
              ></a>
            </div>
          </div>
        </div>
        <div class="p-3">
          <div class="flex justify-between mb-4">
            <h4 class="font-semibold dark:text-gray-400">
              Recent Average Records
            </h4>
            <a href="#" class="text-sm text-[#3282B8]">See all</a>
          </div>
          <div class="flex justify-between mb-4" v-for="item in 5" :key="item">
            <div class="flex">
              <div class="p-2 bg-blue-200 rounded">
                <img
                  src="/assets/img/cube-categories/3x3.svg"
                  width="20"
                  alt="Icon cube category"
                />
              </div>
              <div class="ml-3">
                <h6 class="text-sm dark:text-gray-500">
                  3x3x3 Cube average of
                  <strong class="dark:text-gray-400">5.85</strong>
                </h6>
                <p class="text-xs text-gray-400 dark:text-gray-700">
                  Danuartha from Indonesia, Bali
                </p>
              </div>
            </div>
            <div>
              <a class="bg-blue-100 rounded px-1.5 py-1" href="#"
                ><i
                  class="fa-solid fa-magnifying-glass text-[#0F4C75] fa-xs"
                ></i
              ></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LayoutAdmin from "../../../Layouts/Admin.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BarChart from "../../../Components/Admin/BarChartComponent.vue";
import Table from "../../../Components/Admin/TableComponent.vue";
import Vue3ChartJs from "@j-t-mcc/vue3-chartjs";

export default {
  //layout
  layout: LayoutAdmin,

  //register components
  components: {
    Head,
    BarChart,
    Table,
  },

  //props
  props: {},

  setup() {
    const chartData = {
      labels: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "Mei",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Okt",
        "Nov",
        "Dec",
      ],
      datasets: [
        {
          label: "Data Cubers",
          data: [12, 34, 12, 53, 23, 56, 68, 12, 34, 12, 53, 23],
          backgroundColor: "#3282b8",
          maxBarThickness: 40,
          borderRadius: 3,
        },
      ],
    };

    return {
      chartData,
    };
  },
};
</script>

<style scoped>
.dashboard-card {
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.08);
}
</style>