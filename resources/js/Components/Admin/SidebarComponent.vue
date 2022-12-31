<template>
  <aside class="w-64 fixed" :class="active ? 'active' : 'left-[-300px] md:left-0 md:block'" aria-label="Sidebar">
    <div class="overflow-y-auto sidebar h-full py-7 px-5 bg-gray-50 dark:bg-gray-800 relative">
      <div class="close-icon right-5 absolute block md:hidden top-3 cursor-pointer bg-white p-1.5 py-0 rounded-full" @click="$emit('openSidebar')">
        <i class="fa-solid fa-xmark"></i>
      </div>
      <a href="#" class="flex items-center pl-2.5 mb-10">
        <img
          src="/assets/img/logo.png"
          class="mr-3 h-6 sm:h-7"
          alt="Flowbite Logo"
        />
        <span
          class="
            self-center
            text-gray-800
            dark:text-white
            text-xl
            font-semibold
            whitespace-nowrap
          "
          >Cubing Maze</span
        >
      </a>
      <ul class="space-y-3">
        <li>
          <a
            href="#"
            class="
              flex
              items-center
              p-3
              text-base
              font-normal
              text-gray-900
              rounded-lg
              dark:text-white dark:hover:bg-gray-700
              hover:bg-gray-200
            "
          >
            <img src="/assets/img/sidebar/statistics.svg" alt="" />
            <span class="ml-3">Statistics</span>
          </a>
        </li>
        <li>
          <button
            type="button"
            class="
              flex
              items-center
              p-3
              w-full
              text-base
              font-normal
              text-gray-900
              rounded-lg
              transition
              duration-75
              group
              hover:bg-gray-200
              dark:text-white dark:hover:bg-gray-700
            "
            @click.prevent="activeDropdown('competitions')"
            aria-controls="dropdown-example"
            data-collapse-toggle="dropdown-example"
          >
            <img src="/assets/img/sidebar/competitions.svg" alt="">
            <span
              class="flex-1 ml-3 text-left whitespace-nowrap"
              >Competitions</span
            >
            <svg
              class="w-6 h-6 dropdown-icon"
              :class="{ active: dropdown_competitions }"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>
          <ul            
            class="dropdown-sidebar hidden opacity-0 ml-[45px] space-y-3"
            :class="{ active: dropdown_competitions }"
          >
            <li>
              <a
                href="#"
                class="
                  flex
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal
                  text-gray-900
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-gray-200
                  dark:text-white dark:hover:bg-gray-700
                "
                >Index</a
              >
            </li>
            <li>
              <a
                href="#"
                class="
                  flex
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal
                  text-gray-900
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-gray-200
                  dark:text-white dark:hover:bg-gray-700
                "
                >Category</a
              >
            </li>
          </ul>
        </li>
        <li>
          <button
            type="button"
            class="
              flex
              items-center
              p-3
              w-full
              text-base
              font-normal
              text-gray-900
              rounded-lg
              transition
              duration-75
              group
              hover:bg-gray-200
              dark:text-white dark:hover:bg-gray-700
            "
            @click.prevent="activeDropdown('courses')"
            aria-controls="dropdown-example"
            data-collapse-toggle="dropdown-example"
          >
            <img src="/assets/img/sidebar/courses.svg" alt="">
            <span
              class="flex-1 ml-3 text-left whitespace-nowrap"
              >Courses</span
            >
            <svg
              class="w-6 h-6 dropdown-icon"
              :class="{ active: dropdown_courses }"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>
          <ul            
            class="dropdown-sidebar hidden opacity-0 ml-[45px] space-y-3"
            :class="{ active: dropdown_courses }"
          >
            <li>
              <a
                href="#"
                class="
                  flex
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal
                  text-gray-900
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-gray-200
                  dark:text-white dark:hover:bg-gray-700
                "
                >Index</a
              >
            </li>
            <li>
              <a
                href="#"
                class="
                  flex
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal
                  text-gray-900
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-gray-200
                  dark:text-white dark:hover:bg-gray-700
                "
                >Category</a
              >
            </li>
          </ul>
        </li>
        <li>
          <button
            type="button"
            class="
              flex
              items-center
              p-3
              w-full
              text-base
              font-normal
              text-gray-900
              rounded-lg
              transition
              duration-75
              group
              hover:bg-gray-200
              dark:text-white dark:hover:bg-gray-700
            "
            @click.prevent="activeDropdown('blogs')"
            aria-controls="dropdown-example"
            data-collapse-toggle="dropdown-example"
          >
            <img src="/assets/img/sidebar/blogs.svg" alt="">
            <span
              class="flex-1 ml-3 text-left whitespace-nowrap"
              >Blogs</span
            >
            <svg
              class="w-6 h-6 dropdown-icon"
              :class="{ active: dropdown_blogs }"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>
          <ul            
            class="dropdown-sidebar hidden opacity-0 ml-[45px] space-y-3"
            :class="{ active: dropdown_blogs }"
          >
            <li>
              <a
                href="#"
                class="
                  flex
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal
                  text-gray-900
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-gray-200
                  dark:text-white dark:hover:bg-gray-700
                "
                >Index</a
              >
            </li>
            <li>
              <a
                href="#"
                class="
                  flex
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal
                  text-gray-900
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-gray-200
                  dark:text-white dark:hover:bg-gray-700
                "
                >Category</a
              >
            </li>
            <li>
              <a
                href="#"
                class="
                  flex
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal
                  text-gray-900
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-gray-200
                  dark:text-white dark:hover:bg-gray-700
                "
                >Tags</a
              >
            </li>
          </ul>
        </li>
        <li>
          <a
            href="#"
            class="
              flex
              items-center
              p-3
              text-base
              font-normal
              text-gray-900
              rounded-lg
              dark:text-white dark:hover:bg-gray-700
              hover:bg-gray-200
            "
          >
            <img src="/assets/img/sidebar/levels.svg" alt="">
            <span class="flex-1 ml-3 whitespace-nowrap">Level</span>
          </a>
        </li>
        <li>
          <a
            href="#"
            class="
              flex
              items-center
              p-3
              text-base
              font-normal
              text-gray-900
              rounded-lg
              dark:text-white dark:hover:bg-gray-700
              hover:bg-gray-200
            "
          >
            <img src="/assets/img/sidebar/reports.svg" alt="">
            <span class="flex-1 ml-3 whitespace-nowrap">Reports</span>
          </a>
        </li>
        <li>
          <a
            href="#"
            class="
              flex
              items-center
              p-3
              text-base
              font-normal
              text-gray-900
              rounded-lg
              dark:text-white dark:hover:bg-gray-700
              hover:bg-gray-200
            "
          >
            <img src="/assets/img/sidebar/users.svg" alt="">
            <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
          </a>
        </li>
        <li>
          <button
            type="button"
            class="
              flex
              items-center
              p-3
              w-full
              text-base
              font-normal
              text-gray-900
              rounded-lg
              transition
              duration-75
              group
              hover:bg-gray-200
              dark:text-white dark:hover:bg-gray-700
            "
            @click.prevent="activeDropdown('settings')"
            aria-controls="dropdown-example"
            data-collapse-toggle="dropdown-example"
          >
            <img src="/assets/img/sidebar/settings.svg" alt="">
            <span
              class="flex-1 ml-3 text-left whitespace-nowrap"
              >Settings</span
            >
            <svg
              class="w-6 h-6 dropdown-icon"
              :class="{ active: dropdown_settings }"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>
          <ul            
            class="dropdown-sidebar hidden opacity-0 ml-[45px] space-y-3"
            :class="{ active: dropdown_settings }"
          >
            <li>
              <a
                href="#"
                class="
                  flex
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal
                  text-gray-900
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-gray-200
                  dark:text-white dark:hover:bg-gray-700
                "
                >Application</a
              >
            </li>
            <li>
              <a
                href="#"
                class="
                  flex
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal
                  text-gray-900
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-gray-200
                  dark:text-white dark:hover:bg-gray-700
                "
                >Log out</a
              >
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </aside>
</template>

<script setup>
import { ref } from "vue";

const props = defineProps({
  active: Boolean,
});

let dropdown_competitions = ref(false);
let dropdown_courses = ref(false);
let dropdown_blogs = ref(false);
let dropdown_settings = ref(false);

const activeDropdown = (type) => {
  switch (type) {
    case "competitions":
      dropdown_competitions.value = !dropdown_competitions.value;
      break;
    case "courses":
      dropdown_courses.value = !dropdown_courses.value;
      break;
    case "blogs":
      dropdown_blogs.value = !dropdown_blogs.value;
      break;
    case "settings":
      dropdown_settings.value = !dropdown_settings.value;
      break;
  }
};
</script>

<style>
aside {
  height: 100vh;
  transition: all .3s;
}

aside.active {
  left: 0;
}

.sidebar::-webkit-scrollbar {
  display: none;
}

.dropdown-sidebar {
  transform: translateY(-40px);
  transition: all .3s ease;
}

.dropdown-sidebar.active {
  transform: translateY(0);
  display: block;
  opacity: 1;
}

.dropdown-icon {
  transition: all .2s ease;
}
.dropdown-icon.active {
   transform: rotate(180deg);
}
</style>