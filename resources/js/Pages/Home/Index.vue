<template>
  <Head>
    <title>Home Page - Cubing Maze</title>
    <meta name="description" description="Halaman beranda cubingmaze" />
    <meta
      name="keywords"
      description="home page cubingmaze, halaman beranda cubingmaze, cubing, competitions, courses, blogs"
    />
  </Head>
  <div>
    <header class="flex lg:flex-row flex-col mb-[250px]">
      <div class="lg:mr-48 lg:order-1 order-2">
        <h1 class="font-worksans-bold text-[72px] tracking-wide">
          Best Cubing Website To Compete And Learn With Fun
        </h1>
        <p class="border-l-2 border-main-color/80 pl-5 mt-[30px] mb-[40px]">
          Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi.
          Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi.
        </p>
        <div class="flex justify-between search-group-home py-[18px] px-5">
          <form class="flex">
            <span class="mr-3">
              <i class="fa-solid fa-magnifying-glass text-main-color/60"></i>
            </span>
            <input
              type="text"
              class="w-[35vw] focus:outline-0 bg-transparent"
              placeholder="Search course and blog here..."
            />
          </form>
          <div class="border-l border-main-color pl-5">
            <div class="relative select-group">
              <div
                class="relative"
                @click.prevent="handleSelectDropdown"
                v-click-outside="onClickOutside"
              >
                <input
                  type="text"
                  id="type"
                  class="-mr-16"
                  disabled
                  :value="currentType"
                  placeholder=" "
                />
                <span class="absolute -top-3">
                  <i
                    class="fa-solid fa-chevron-down"
                    :class="{ active: activeSelectInput }"
                  ></i>
                </span>
              </div>
              <div
                class="select-dropdown select-home"
                :class="{ active: activeSelectInput }"
              >
                <div class="select-item" @click="selectType('Courses')">
                  <p>Courses</p>
                </div>
                <div class="select-item" @click="selectType('Blogs')">
                  <p>Blogs</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="lg:order-2 order-1 lg:block hidden">
        <img src="/assets/img/home/header-img.svg" class="w-[1000px]" alt="" />
      </div>
    </header>

    <section>
      <div class="title-section">
        <p class="small-text">Competitions</p>
        <h1 class="big-text">Upcoming Competitions</h1>
      </div>
      <div>
        <div class="px-[30px] py-15">
          <swiper
            :spaceBetween="30"
            :navigation="true"
            :modules="modules"
            :breakpoints="{
              '0': {
                slidesPerView: 1,
              },
              '650': {
                slidesPerView: 2,
              },
              '1024': {
                slidesPerView: 3,
              },
              '1400': {
                slidesPerView: 4,
              },
            }"
            class="mt-[50px]"
          >
            <!-- <div
              class="bg-fourth-color absolute w-full h-1/2 bottom-0 -z-10"
            ></div> -->
            <swiper-slide
              v-for="(comp, index) in upcoming_competitions"
              :key="index"
            >
              <div class="custom-card">
                <div class="h-[350px] overflow-y-hidden">
                  <p
                    class="
                      bg-green-100
                      px-4
                      py-0.5
                      rounded
                      text-sm text-green-600
                      absolute
                      right-5
                      top-5
                      capitalize
                    "
                  >
                    {{ comp.type }}
                  </p>

                  <img
                    src="/assets/img/no-preview.png"
                    loading="lazy"
                    class="rounded"
                    alt="Thumbnail competition cubingmaze"
                  />
                </div>
                <h2 class="font-worksans-semibold text-lg mb-1">
                  {{ comp.name }}
                </h2>
                <p>
                  <i class="fa-solid fa-calendar-days mr-2"></i
                  >{{ competitionDateFormat(comp.date_start, comp.date_end) }}
                </p>
                <h6 class="flex">
                  <img
                    src="/assets/img/icon/user-left.svg"
                    class="mr-2 -ml-1"
                    alt=""
                  />
                  <span class="text-red-500">{{ comp.competitor_limit - comp.cuber_competitions.length }} left</span>
                </h6>
                <div class="mt-6 flex" v-if="$page.props.auth.user">
                  <Link v-if="$page.props.auth.user.level.role === 'Cuber'" :href="`/competitions/${comp.slug}`" class="btn btn-submit text-center py-3 w-full"
                    >See Details</Link
                  >
                </div>
              </div>
            </swiper-slide>
          </swiper>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import LayoutHome from "../../Layouts/Home.vue";
import Navbar from "../../Components/Home/NavbarComponent.vue";
import vClickOutside from "click-outside-vue3";
import { ref } from "vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
import "swiper/css/navigation";
import { Navigation } from "swiper";

export default {
  layout: LayoutHome,
  components: {
    Head,
    Link,
    Inertia,
    Navbar,
    Swiper,
    SwiperSlide,
  },

  directives: {
    clickOutside: vClickOutside.directive,
  },

  props: {
    upcoming_competitions: Object,
  },

  setup() {
    let activeSelectInput = ref(false);
    let currentType = ref("Courses");

    const handleSelectDropdown = () => {
      activeSelectInput.value = !activeSelectInput.value;
    };

    const onClickOutside = () => {
      activeSelectInput.value = false;
    };

    const selectType = (type) => {
      currentType.value = type;
      payload.type = currentType.value.toLowerCase();
    };

    return {
      modules: [Navigation],
      activeSelectInput,
      currentType,
      handleSelectDropdown,
      onClickOutside,
      selectType,
    };
  },
};
</script>

<style scoped>
.search-group-home {
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.08);
}
</style>