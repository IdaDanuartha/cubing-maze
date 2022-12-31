<template>
  <Head>
    <title>Dashboard - Aplikasi Ujian Online</title>
  </Head>
  <div class="container-fluid mb-5">
    <div class="grid xl:grid-cols-4 lg:grid-cols-2 grid-cols-1 gap-4">
      <div class="flex px-5 py-4 rounded dashboard-card" v-for="(dashbard, index) in dashboard_datas" :key="index">
        <img
          class="mr-2 bg-blue-400 px-4 py-4 h-16 rounded-lg"
          src="/assets/img/dashboard/cuber-registered.svg"
          alt="Cuber registered icon"
        />
        <div class="flex flex-col">
          <h6 class="text-sm text-gray-500">Cubers Registered (Monthly)</h6>
          <h2 class="font-semibold text-2xl">{{ cubers_count }}</h2>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
//import layout Admin
import LayoutAdmin from "../../../Layouts/Admin.vue";

//import Header from Inertia
import { Head } from "@inertiajs/inertia-vue3";

const dashboard_datas = [
  {name: 'Cubers Registered (Monthly)', data: cubers_count, style: 'text-blue-400', icon: 'cuber-registered.svg'},
  {name: 'Cubers Registered (Monthly)', data: cubers_count, style: 'text-blue-400', icon: 'cuber-registered.svg'},
  {name: 'Cubers Registered (Monthly)', data: cubers_count, style: 'text-blue-400', icon: 'cuber-registered.svg'},
  {name: 'Cubers Registered (Monthly)', data: cubers_count, style: 'text-blue-400', icon: 'cuber-registered.svg'},
]
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