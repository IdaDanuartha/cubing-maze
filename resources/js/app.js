import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { InertiaProgress } from '@inertiajs/progress';
import moment from "moment";

createInertiaApp({
  resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
    .mixin({
      methods: {
        checkCompetitionDate: function (start_date, end_date) {
          if(new Date() < new Date(start_date)) {
            return 'Locked'
          } else if(new Date() >= new Date(start_date) && new Date() <= new Date(end_date)) {
            return 'Unlocked'
          } else if(new Date() > new Date(end_date)) {
            return 'Completed'
          }
        },
        competitionDateFormat: function(start_date, end_date) {
          // return start_date + ' ' + end_date
          if(moment(start_date).format("DD-MMMM-YYYY") === moment(end_date).format("DD-MMMM-YYYY")) {
            return moment(end_date).format("DD MMMM YYYY")
          } else if(moment(start_date).format("YYYY") !== moment(end_date).format("YYYY")) {
            return moment(start_date).format("DD MMMM YYYY") + ' - ' + moment(end_date).format("DD MMMM YYYY")
          } else if(moment(start_date).format("MMMM") !== moment(end_date).format("MMMM")) {
            return moment(start_date).format("DD MMMM") + ' - ' + moment(end_date).format("DD MMMM YYYY")
          } else {
            return moment(start_date).format("DD") + ' - ' + moment(end_date).format("DD MMMM YYYY")
          }
        }
      },
  })
      .use(plugin)
      .mount(el)
  },
});

InertiaProgress.init();