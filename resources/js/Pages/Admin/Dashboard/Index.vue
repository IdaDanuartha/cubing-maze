<template>
  <Head>
    <title>Statistics - CubingMaze</title>
    <meta name="description" description="Halaman dashboard admin cubingmaze">
        <meta name="keywords" description="dashboard page cubingmaze, halaman dashboard cubingmaze, dashboard administrator">
  </Head>
  <div class="container-fluid mb-5">
    <div class="grid xl:grid-cols-4 lg:grid-cols-2 grid-cols-1 gap-4">
      <div class="flex px-5 py-4 rounded-lg dashboard-card dark:bg-[#202F37]">
        <img
          class="mr-3 bg-blue-400 px-4 py-4 h-16 rounded-lg"
          src="/assets/img/dashboard/cuber-registered.svg"
          alt="Cuber registered icon"
        />
        <div class="flex flex-col justify-center">
          <h6 class="text-sm text-gray-500 dark:text-gray-400">Cubers Registered (Monthly)</h6>
          <h2 class="font-semibold text-2xl dark:text-gray-100">{{ cubers_count }}</h2>
        </div>
      </div>
      <div class="flex px-5 py-4 rounded-lg dashboard-card dark:bg-[#202F37]">
        <img
          class="mr-3 bg-blue-400 px-4 py-4 h-16 rounded-lg"
          src="/assets/img/dashboard/cuber-registered.svg"
          alt="Cuber registered icon"
        />
        <div class="flex flex-col justify-center">
          <h6 class="text-sm text-gray-500 dark:text-gray-400">Reports (Weekly)</h6>
          <h2 class="font-semibold text-2xl dark:text-gray-100">{{ reports_count }}</h2>
        </div>
      </div>
      <div class="flex px-5 py-4 rounded-lg dashboard-card dark:bg-[#202F37]">
        <img
          class="mr-3 bg-blue-400 px-4 py-4 h-16 rounded-lg"
          src="/assets/img/dashboard/cuber-registered.svg"
          alt="Cuber registered icon"
        />
        <div class="flex flex-col justify-center">
          <h6 class="text-sm text-gray-500 dark:text-gray-400">Course Students (All time)</h6>
          <h2 class="font-semibold text-2xl dark:text-gray-100">{{ course_students_count }}</h2>
        </div>
      </div>
      <div class="flex px-5 py-4 rounded-lg dashboard-card dark:bg-[#202F37]">
        <img
          class="mr-3 bg-blue-400 px-4 py-4 h-16 rounded-lg"
          src="/assets/img/dashboard/cuber-registered.svg"
          alt="Cuber registered icon"
        />
        <div class="flex flex-col justify-center">
          <h6 class="text-sm text-gray-500 dark:text-gray-400">Course Revenue (All time)</h6>
          <h2 class="font-semibold text-2xl dark:text-gray-100">{{ course_revenue }}</h2>
        </div>
      </div>
    </div>    
  </div>
</template>

<script>
import LayoutAdmin from "../../../Layouts/Admin.vue";
import { Head } from "@inertiajs/inertia-vue3";

export default {
  //layout
  layout: LayoutAdmin,

  //register components
  components: {
    Head,
  },

  //props
  props: {
    cubers_count: Number,
    reports_count: Number,
    course_students_count: Number,
    course_revenue: Number,
  },
};
</script>

<style scoped>
.dashboard-card {
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.08);
}
</style>``