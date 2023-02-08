<template>
  <Head>
    <title>Detail Competition - Cubing Maze</title>
    <meta
      name="description"
      description="Halaman detail kompetisi cubingmaze"
    />
    <meta
      name="keywords"
      description="detail competition cubingmaze, halaman detail kompetisi cubingmaze, cubing, competitions, courses, blogs"
    />
  </Head>
  <div class="alert-success" v-if="session.success">
    <p class="alert-label-success">{{ session.success }}</p>
  </div>
  <div class="grid grid-cols-12 gap-10">
    <div class="xl:col-span-8 lg:col-span-7 col-span-12 lg:order-1 order-2">
      <div class="bg-white shadow-lg p-[30px] rounded">
        <div class="border-b border-secondary-color/50 pb-5 mb-5">
          <h3 class="text-secondary-color font-worksans-bold">Description</h3>
        </div>
        <div v-html="competition.description"></div>
      </div>
    </div>
    <div class="xl:col-span-4 lg:col-span-5 col-span-12 lg:order-2 order-1">
      <div class="bg-white shadow-lg p-[30px] rounded">
        <div class="border-b border-secondary-color/50 pb-5 mb-5">
          <img
            :src="`/storage/${competition.competition_img}`"
            class="rounded"
            alt="competition cover image"
          />
        </div>
        <div class="flex mb-4">
          <p>Competition Name :</p>
          <p class="font-worksans-semibold ml-1">{{ competition.name }}</p>
        </div>
        <div class="flex mb-4">
          <p>Competition Date :</p>
          <p class="font-worksans-semibold ml-1">
            {{
              competitionDateFormat(
                competition.date_start,
                competition.date_end
              )
            }}
          </p>
        </div>
        <div class="flex mb-4">
          <p>Competitor Limit :</p>
          <p class="font-worksans-semibold ml-1">
            {{ competition.competitor_limit }} Competitors
          </p>
        </div>
        <div class="flex mb-4">
          <p>Type :</p>
          <p class="font-worksans-semibold capitalize ml-1">
            {{ competition.type }}
          </p>
        </div>
        <div class="flex mb-4">
          <p>Registration Fee :</p>
          <p class="font-worksans-semibold ml-1">
            {{ competition.fee ?? "-" }}
          </p>
        </div>
        <div class="flex mb-4">
          <p>Using Password :</p>
          <p class="font-worksans-semibold ml-1">
            {{ competition.password ? "Yes" : "No" }}
          </p>
        </div>
        <div class="flex mb-4">
          <p>Status :</p>
          <p class="font-worksans-semibold ml-1">
            {{
              checkCompetitionDate(competition.date_start, competition.date_end)
            }}
          </p>
        </div>
        <div
          class="flex mt-10"
          v-if="$page.props.auth.user.level.role === 'Cuber'"
        >
          <button
            data-bs-toggle="modal"
            data-bs-target="#registerCompetitionModal"
            class="
              w-full
              btn
              text-white
              px-6
              py-2.5
              font-worksans-regular
              text-sm
            "
            :class="
              cuber_competition
                ? 'bg-gray-500 pointer-events-none'
                : 'bg-secondary-color'
            "
          >
            {{ cuber_competition ? "Already Registered" : "Register" }}
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Register Competition -->
  <ModalBase
    modalId="registerCompetition"
    modalTitle="Form Registration"
    btnName="Register"
    @submit="register"
  >
    <template v-slot:body>
      <div class="alert-error -ml-2" v-if="session.error">
        <p class="alert-label-error">{{ session.error }}</p>
      </div>      
      <div class="flex justify-between mt-6 mb-3">
        <p class="dark:text-gray-200 text-main-color">Select the event :</p>
        <a
          href="#"
          @click.prevent="selectAllEvent(cube_categories)"
          class="
            font-worksans-medium
            underline
            text-secondary-color
            dark:text-third-color
          "
          >Select all</a
        >
      </div>
      <div class="flex flex-wrap">
        <button
          type="button"
          class="select-event-btn"
          :class="eventSelected.map((id) => (id == cube.cube_category.id ? 'active' : ''))"
          v-for="(cube, index) in cube_categories"
          :key="index"
          @click="toggleEvent(cube.cube_category.id)"
        >
          <span
            class="
              mr-3
              text-main-color/80
              dark:text-gray-200
              text-sm
              relative
              top-0.5
            "
          >
            {{ cube.cube_category.short_name }}</span
          >
          <div>
            <i
              class="
                fa-solid fa-plus
                text-[8px]
                bg-main-color/80
                text-white
                rounded-full
                p-0.5
                relative
                -top-0.5
              "
            ></i>
          </div>
        </button>
      </div>
      <div v-if="errors.cube_categories">
        <p class="text-error">{{ errors.cube_categories }}</p>
      </div>
    </template>
  </ModalBase>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import LayoutHome from "../../Layouts/Home.vue";
import Navbar from "../../Components/Home/NavbarComponent.vue";
import ModalBase from "../../Components/Admin/ModalBaseComponent.vue";
import { reactive, ref } from "vue";

export default {
  layout: LayoutHome,
  components: {
    Head,
    Link,
    Inertia,
    Navbar,
    ModalBase,
  },

  props: {
    session: Object,
    errors: Object,
    cuber: Object,
    competition: Object,
    cube_categories: Object,
    cuber_competition: Object,
  },

  setup(props) {
    let selectAll = ref(false);
    let eventSelected = reactive([]);

    let payload = reactive({
      competition_id: props.competition.id,
      cuber_id: props.cuber.id,
      cube_categories: eventSelected,
    });

    const toggleEvent = (cube_id) => {
      if (eventSelected.length) {
        eventSelected.forEach((id) => {
          if (id === cube_id) {
            eventSelected.splice(eventSelected.indexOf(id), 1);
          }
        });
      }
      eventSelected.push(cube_id);
    };

    const selectAllEvent = (cube_ids) => {
      cube_ids.forEach((event) => {
        eventSelected.pop();
      });

      cube_ids.forEach((cube) => {
        if (!selectAll.value) {
          eventSelected.push(cube.cube_category.id);
        } else {
          eventSelected.pop();
        }
      });
      selectAll.value = !selectAll.value;
    };

    const register = () => {
      Inertia.post(
        `/competitions/${props.competition.slug}/register`,
        payload,
        {
          onSuccess: () => {
            if (props.session.success) {
              $("#registerCompetitionModal").modal("hide");
              payload.cube_categories = [];
            }
          },
        }
      );
    };

    return {
      payload,
      selectAll,
      eventSelected,
      toggleEvent,
      selectAllEvent,
      register,
    };
  },
};
</script>

<style scoped>
.search-group-home {
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.08);
}
</style>