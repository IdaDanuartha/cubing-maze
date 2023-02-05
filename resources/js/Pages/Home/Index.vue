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
    <header class="flex lg:flex-row flex-col">
      <div class="lg:mr-48 lg:order-1 order-2">
        <h1 class="font-worksans-bold text-[72px] tracking-wide">
          Best Cubing Website To Compete And Learn With Fun
        </h1>
        <p class="border-l-2 border-main-color/80 pl-5 mt-[30px] mb-[40px]">
          Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi.
          Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi.
        </p>
        <div class="flex justify-between search-group-home py-[18px] px-5">
          <div class="flex">
            <span class="mr-3">
              <i class="fa-solid fa-magnifying-glass text-main-color/60"></i>
            </span>
            <input
              type="text"
              class="w-[35vw] focus:outline-0"
              placeholder="Search course and blog here..."
            />
          </div>
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
  </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import LayoutHome from "../../Layouts/Home.vue";
import Navbar from "../../Components/Home/NavbarComponent.vue";
import vClickOutside from "click-outside-vue3";
import { ref } from "vue";

export default {
  layout: LayoutHome,
  components: {
    Head,
    Link,
    Inertia,
    Navbar,
  },

  directives: {
    clickOutside: vClickOutside.directive,
  },

  props: {},

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