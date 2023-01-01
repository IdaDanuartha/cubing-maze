<template>
  <aside class="w-64 fixed" :class="active ? 'active' : 'left-[-300px] md:left-0 md:block'" aria-label="Sidebar">
    <div class="overflow-y-auto sidebar h-full py-7 px-5 bg-[#3282B8] dark:bg-[#0F4C75] relative">
      <div class="close-icon right-5 absolute block md:hidden top-3 cursor-pointer bg-white p-1.5 py-0 rounded-full" @click="$emit('openSidebar')">
        <i class="fa-solid fa-xmark"></i>
      </div>      
      <Link href="/admin/dashboard" class="flex items-center pl-2.5 mb-10">
        <img
          src="/assets/img/logo.png"
          class="mr-3 h-6 sm:h-7"
          alt="Flowbite Logo"
        />
        <span
          class="
            self-center
            text-white
            text-xl
            font-semibold
            whitespace-nowrap
          "
          >Cubing Maze</span
        >
      </Link>
      <ul class="space-y-3">
        <li>
          <Link
            href="/admin/dashboard"
            class="
              flex
              nav-item
              items-center
              p-3
              text-base
              font-normal              
              rounded-lg
              text-white dark:hover:bg-gray-700
              hover:bg-[rgba(255,255,255,0.1)]
            "
            :class="{ 'active': $page.url.startsWith('/admin/dashboard') }">          
            <img src="/assets/img/sidebar/statistics.svg" alt="" />
            <span class="ml-3 text-white">Statistics</span>
          </Link>
        </li>
        <li>
          <button
            type="button"
            class="
              flex
              nav-item
              items-center
              p-3
              w-full
              text-base
              font-normal              
              rounded-lg
              transition
              duration-75
              group
              hover:bg-[rgba(255,255,255,0.1)]
              text-white dark:hover:bg-gray-700
            "
            @click.prevent="activeDropdown('competitions')"
            aria-controls="dropdown-example"
            data-collapse-toggle="dropdown-example"
          >
            <img src="/assets/img/sidebar/competitions.svg" alt="">
            <span
              class="flex-1 ml-3 text-white text-left whitespace-nowrap"
              >Competitions</span
            >
            <img src="/assets/img/sidebar/chevron-down.svg" class="dropdown-icon" :class="{ active: dropdown_competitions }" alt="">
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
                  nav-item
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal                  
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-[rgba(255,255,255,0.1)]
                  text-white dark:hover:bg-gray-700
                "
                :class="{ 'active': $page.url.startsWith('/admin/competitions/index') }"
                >Index</a
              >
            </li>
            <li>
              <a
                href="#"
                class="
                  flex
                  nav-item
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal                  
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-[rgba(255,255,255,0.1)]
                  text-white dark:hover:bg-gray-700
                "
                :class="{ 'active': $page.url.startsWith('/admin/competitions/category') }"
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
              nav-item
              items-center
              p-3
              w-full
              text-base
              font-normal              
              rounded-lg
              transition
              duration-75
              group
              hover:bg-[rgba(255,255,255,0.1)]
              text-white dark:hover:bg-gray-700
            "
            @click.prevent="activeDropdown('courses')"
            aria-controls="dropdown-example"
            data-collapse-toggle="dropdown-example"
          >
            <img src="/assets/img/sidebar/courses.svg" alt="">
            <span
              class="flex-1 ml-3 text-white text-left whitespace-nowrap"
              >Courses</span
            >
            <img src="/assets/img/sidebar/chevron-down.svg" class="dropdown-icon" :class="{ active: dropdown_courses }" alt="">
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
                  nav-item
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal                  
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-[rgba(255,255,255,0.1)]
                  text-white dark:hover:bg-gray-700
                "
                :class="{ 'active': $page.url.startsWith('/admin/courses/index') }"
                >Index</a
              >
            </li>
            <li>
              <a
                href="#"
                class="
                  flex
                  nav-item
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal                  
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-[rgba(255,255,255,0.1)]
                  text-white dark:hover:bg-gray-700
                "
                :class="{ 'active': $page.url.startsWith('/admin/courses/category') }"
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
              nav-item
              items-center
              p-3
              w-full
              text-base
              font-normal              
              rounded-lg
              transition
              duration-75
              group
              hover:bg-[rgba(255,255,255,0.1)]
              text-white dark:hover:bg-gray-700
            "
            @click.prevent="activeDropdown('blogs')"
            aria-controls="dropdown-example"
            data-collapse-toggle="dropdown-example"
          >
            <img src="/assets/img/sidebar/blogs.svg" alt="">
            <span
              class="flex-1 ml-3 text-white text-left whitespace-nowrap"
              >Blogs</span
            >
            <img src="/assets/img/sidebar/chevron-down.svg" class="dropdown-icon" :class="{ active: dropdown_blogs }" alt="">
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
                  nav-item
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal                  
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-[rgba(255,255,255,0.1)]
                  text-white dark:hover:bg-gray-700
                "
                :class="{ 'active': $page.url.startsWith('/admin/blogs/index') }"
                >Index</a
              >
            </li>
            <li>
              <a
                href="#"
                class="
                  flex
                  nav-item
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal                  
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-[rgba(255,255,255,0.1)]
                  text-white dark:hover:bg-gray-700
                "
                :class="{ 'active': $page.url.startsWith('/admin/blogs/category') }"
                >Category</a
              >
            </li>
            <li>
              <a
                href="#"
                class="
                  flex
                  nav-item
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal                  
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-[rgba(255,255,255,0.1)]
                  text-white dark:hover:bg-gray-700
                "
                :class="{ 'active': $page.url.startsWith('/admin/blogs/tag') }"
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
              nav-item
              items-center
              p-3
              text-base
              font-normal              
              rounded-lg
              text-white dark:hover:bg-gray-700
              hover:bg-[rgba(255,255,255,0.1)]
            "
            :class="{ 'active': $page.url.startsWith('/admin/levels') }"
          >
            <img src="/assets/img/sidebar/levels.svg" alt="">
            <span class="flex-1 ml-3 text-white whitespace-nowrap">Level</span>
          </a>
        </li>
        <li>
          <a
            href="#"
            class="
              flex
              nav-item
              items-center
              p-3
              text-base
              font-normal              
              rounded-lg
              text-white dark:hover:bg-gray-700
              hover:bg-[rgba(255,255,255,0.1)]
            "
            :class="{ 'active': $page.url.startsWith('/admin/reports') }"
          >
            <img src="/assets/img/sidebar/reports.svg" alt="">
            <span class="flex-1 ml-3 text-white whitespace-nowrap">Reports</span>
          </a>
        </li>
        <li>
          <a
            href="#"
            class="
              flex
              nav-item
              items-center
              p-3
              text-base
              font-normal              
              rounded-lg
              text-white dark:hover:bg-gray-700
              hover:bg-[rgba(255,255,255,0.1)]
            "
            :class="{ 'active': $page.url.startsWith('/admin/users') }"
          >
            <img src="/assets/img/sidebar/users.svg" alt="">
            <span class="flex-1 ml-3 text-white whitespace-nowrap">Users</span>
          </a>
        </li>
        <li>
          <button
            type="button"
            class="
              flex
              nav-item
              items-center
              p-3
              w-full
              text-base
              font-normal              
              rounded-lg
              transition
              duration-75
              group
              hover:bg-[rgba(255,255,255,0.1)]
              text-white dark:hover:bg-gray-700
            "
            @click.prevent="activeDropdown('settings')"
            aria-controls="dropdown-example"
            data-collapse-toggle="dropdown-example"
          >
            <img src="/assets/img/sidebar/settings.svg" alt="">
            <span
              class="flex-1 ml-3 text-white text-left whitespace-nowrap"
              >Settings</span
            >
            <img src="/assets/img/sidebar/chevron-down.svg" class="dropdown-icon" :class="{ active: dropdown_settings }" alt="">
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
                  nav-item
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal                  
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-[rgba(255,255,255,0.1)]
                  text-white dark:hover:bg-gray-700
                "
                :class="{ 'active': $page.url.startsWith('/admin/applications/edit') }"
                >Application</a
              >
            </li>
            <li>
              <a
                href="#"
                class="
                  flex
                  nav-item
                  items-center
                  px-4
                  py-2
                  w-full
                  text-base
                  font-normal                  
                  rounded-lg
                  transition
                  duration-75
                  group
                  hover:bg-[rgba(255,255,255,0.1)]
                  text-white dark:hover:bg-gray-700
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
import { Link } from '@inertiajs/inertia-vue3';

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

.nav-item.active {
  background: rgba(255,255,255,0.1);
}
</style>