<template>
  <aside class="w-64 fixed " :class="active ? 'active' : 'left-[-300px] lg:left-0 lg:block'" aria-label="Sidebar">
    <div class="overflow-y-auto sidebar h-full py-7 px-5 bg-[#3282B8] dark:bg-[#0F4C75] relative">
      <!-- <div class="close-icon right-5 absolute block lg:hidden top-3 cursor-pointer" @click="$emit('openSidebar')">
        <i class="fa-solid fa-xmark text-gray-100
        dark:text-gray-300 dark:text-gray-100"></i>
      </div>       -->
      <Link href="#" class="flex flex-col items-center pl-2.5 mb-10">
        <img
          src="/assets/img/logo.png"
          class="mb-3 h-12 sm:h-16"
          alt="Cubingmaze Logo"
        />
        <span
          class="
            self-center
            text-gray-100
            dark:text-gray-300
            text-xl
            font-semibold
            whitespace-nowrap
          "
          >Cubing Maze</span
        >
      </Link>
      <ul class="space-y-3">
        <li @click="$emit('openSidebar')">
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
              text-gray-100
              dark:text-gray-300
              hover:bg-[rgba(255,255,255,0.1)]
            "
            :class="{ 'active': $page.url.startsWith('/admin/dashboard') }">          
            <img class="dark:opacity-80" src="/assets/img/sidebar/statistics.svg" alt="" />
            <span class="ml-3 text-gray-100
            dark:text-gray-300">Statistics</span>
          </Link>
        </li>
        <li v-if="$page.props.auth.user.level_id == 1 || $page.props.auth.user.level_id == 2">
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
              text-gray-100
              dark:text-gray-300
            "
            @click.prevent="activeDropdown('competitions')"
            aria-controls="dropdown-example"
            data-collapse-toggle="dropdown-example"
          >
            <img class="dark:opacity-80" src="/assets/img/sidebar/competitions.svg" alt="">
            <span
              class="flex-1 ml-3 text-gray-100
              dark:text-gray-300 text-left whitespace-nowrap"
              >Competitions</span
            >
            <img src="/assets/img/sidebar/caret-down.svg" class="dark:opacity-80 dropdown-icon" :class="{ active: dropdown_competitions }" alt="">
          </button>
          <ul            
            class="dropdown-sidebar mt-2 hidden opacity-0 ml-[45px] space-y-3"
            :class="{ active: dropdown_competitions || $page.url.startsWith('/admin/competitions') }"
          >
            <li @click="$emit('openSidebar')">
              <Link
                href="/admin/competitions"
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
                  text-gray-100
                  dark:text-gray-300
                "
                :class="{ 'active': $page.url.startsWith('/admin/competitions') }"
                >Index</Link
              >
            </li>
            <li @click="$emit('openSidebar')">
              <Link
                href="/admin/competitions/category"
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
                  text-gray-100
                  dark:text-gray-300
                "
                :class="{ 'active': $page.url.startsWith('/admin/competitions/category') }"
                >Category</Link
              >
            </li>
          </ul>
        </li>
        <li v-if="$page.props.auth.user.level_id == 1 || $page.props.auth.user.level_id == 3">
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
              text-gray-100
              dark:text-gray-300
            "
            @click.prevent="activeDropdown('courses')"
            aria-controls="dropdown-example"
            data-collapse-toggle="dropdown-example"
          >
            <img class="dark:opacity-80" src="/assets/img/sidebar/courses.svg" alt="">
            <span
              class="flex-1 ml-3 text-gray-100
              dark:text-gray-300 text-left whitespace-nowrap"
              >Courses</span
            >
            <img src="/assets/img/sidebar/caret-down.svg" class="dark:opacity-80 dropdown-icon" :class="{ active: dropdown_courses || $page.url.startsWith('/admin/courses') }" alt="">
          </button>
          <ul            
            class="dropdown-sidebar mt-2 hidden opacity-0 ml-[45px] space-y-3"
            :class="{ active: dropdown_courses || $page.url.startsWith('/admin/courses') }"
          >
            <li @click="$emit('openSidebar')">
              <Link
                href="/admin/courses"
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
                  text-gray-100
                  dark:text-gray-300
                "
                :class="{ 'active': $page.url.startsWith('/admin/courses') }"
                >Index</Link
              >
            </li>
            <li @click="$emit('openSidebar')">
              <Link
                href="/admin/courses/category"
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
                  text-gray-100
                  dark:text-gray-300
                "
                :class="{ 'active': $page.url.startsWith('/admin/courses/category') }"
                >Category</Link
              >
            </li>
          </ul>
        </li>
        <li v-if="$page.props.auth.user.level_id == 1 || $page.props.auth.user.level_id == 4">
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
              text-gray-100
              dark:text-gray-300
            "
            @click.prevent="activeDropdown('blogs')"
            aria-controls="dropdown-example"
            data-collapse-toggle="dropdown-example"
          >
            <img class="dark:opacity-80" src="/assets/img/sidebar/blogs.svg" alt="">
            <span
              class="flex-1 ml-3 text-gray-100
              dark:text-gray-300 text-left whitespace-nowrap"
              >Blogs</span
            >
            <img src="/assets/img/sidebar/caret-down.svg" class="dark:opacity-80 dropdown-icon" :class="{ active: dropdown_blogs || $page.url.startsWith('/admin/blogs') }" alt="">
          </button>
          <ul            
            class="dropdown-sidebar mt-2 hidden opacity-0 ml-[45px] space-y-3"
            :class="{ active: dropdown_blogs || $page.url.startsWith('/admin/blogs') }"
          >
            <li @click="$emit('openSidebar')">
              <Link
                href="/admin/blogs"
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
                  text-gray-100
                  dark:text-gray-300
                "
                :class="{ 'active': $page.url.startsWith('/admin/blogs') }"
                >Index</Link
              >
            </li>
            <li @click="$emit('openSidebar')">
              <Link
                href="/admin/blogs/category"
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
                  text-gray-100
                  dark:text-gray-300
                "
                :class="{ 'active': $page.url.startsWith('/admin/blogs/category') }"
                >Category</Link
              >
            </li>
            <li @click="$emit('openSidebar')">
              <Link
                href="/admin/blogs/tag"
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
                  text-gray-100
                  dark:text-gray-300
                "
                :class="{ 'active': $page.url.startsWith('/admin/blogs/tag') }"
                >Tags</Link
              >
            </li>
          </ul>
        </li>
        <li v-if="$page.props.auth.user.level_id == 1" @click="$emit('openSidebar')">
          <Link
            href="/admin/levels"
            class="
              flex
              nav-item
              items-center
              p-3
              text-base
              font-normal              
              rounded-lg
              text-gray-100
              dark:text-gray-300
              hover:bg-[rgba(255,255,255,0.1)]
            "
            :class="{ 'active': $page.url.startsWith('/admin/levels') }"
          >
            <img class="dark:opacity-80" src="/assets/img/sidebar/levels.svg" alt="">
            <span class="flex-1 ml-3 text-gray-100
            dark:text-gray-300 whitespace-nowrap">Level</span>
          </Link>
        </li>
        <li v-if="$page.props.auth.user.level_id == 1" @click="$emit('openSidebar')">
          <Link
            href="/admin/reports"
            class="
              flex
              nav-item
              items-center
              p-3
              text-base
              font-normal              
              rounded-lg
              text-gray-100
              dark:text-gray-300
              hover:bg-[rgba(255,255,255,0.1)]
            "
            :class="{ 'active': $page.url.startsWith('/admin/reports') }"
          >
            <img class="dark:opacity-80" src="/assets/img/sidebar/reports.svg" alt="">
            <span class="flex-1 ml-3 text-gray-100
            dark:text-gray-300 whitespace-nowrap">Reports</span>
          </Link>
        </li>
        <li v-if="$page.props.auth.user.level_id == 1" @click="$emit('openSidebar')">
          <Link
            href="/admin/users"
            class="
              flex
              nav-item
              items-center
              p-3
              text-base
              font-normal              
              rounded-lg
              text-gray-100
              dark:text-gray-300
              hover:bg-[rgba(255,255,255,0.1)]
            "
            :class="{ 'active': $page.url.startsWith('/admin/users') }"
          >
            <img class="dark:opacity-80" src="/assets/img/sidebar/users.svg" alt="">
            <span class="flex-1 ml-3 text-gray-100
            dark:text-gray-300 whitespace-nowrap">Users</span>
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
              text-gray-100
              dark:text-gray-300
            "
            @click.prevent="activeDropdown('settings')"
            aria-controls="dropdown-example"
            data-collapse-toggle="dropdown-example"
          >
            <img class="dark:opacity-80" src="/assets/img/sidebar/settings.svg" alt="">
            <span
              class="flex-1 ml-3 text-gray-100
              dark:text-gray-300 text-left whitespace-nowrap"
              >Settings</span
            >
            <img src="/assets/img/sidebar/caret-down.svg" class="dark:opacity-80 dropdown-icon" :class="{ active: dropdown_settings || $page.url.startsWith('/admin/settings/application') }" alt="">
          </button>
          <ul            
            class="dropdown-sidebar mt-2 hidden opacity-0 ml-[45px] space-y-3"
            :class="{ active: dropdown_settings || $page.url.startsWith('/admin/settings/application') }"
          >
            <li v-if="$page.props.auth.user.level_id == 1" @click="$emit('openSidebar')">
              <Link
                href="/admin/settings/application"
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
                  text-gray-100
                  dark:text-gray-300
                "
                :class="{ 'active': $page.url.startsWith('/admin/settings/application') }"
                >Application</Link
              >
            </li>
            <li @click="$emit('openSidebar')">
              <Link
                href="/logout"
                method="POST" 
                as="button"
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
                  text-gray-100
                  dark:text-gray-300
                "
                >Log out</Link
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