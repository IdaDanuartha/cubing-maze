<template>
  <nav
    class="
      relative
      w-full
      flex flex-wrap
      items-center
      justify-center
      py-4
      text-main-color
      hover:text-third-color
      transition
      duration-300
      font-worksans-medium
      focus:text-gray-700
      navbar navbar-expand-lg navbar-light
    "
  >
    <div
      class="container w-full flex flex-wrap items-center justify-between px-6"
    >
      <button
        class="
          navbar-toggler
          text-main-color
          border-0
          hover:shadow-none hover:no-underline
          py-2
          px-2.5
          bg-transparent
          focus:outline-none focus:ring-0 focus:shadow-none focus:no-underline
        "
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fa-solid fa-bars text-main-color fa-lg"></i>
      </button>
      <div
        class="collapse navbar-collapse flex-grow items-center"
        id="navbarSupportedContent"
      >
        <Link
          class="
            flex
            items-center
            text-gray-900
            hover:text-gray-900
            focus:text-gray-900
            mt-2
            lg:mt-0
            mr-1
          "
          href="/"
        >
          <img
            src="/assets/img/logo.png"
            alt="logo cubingmaze"
            width="30"
            loading="lazy"
          />
          <p class="font-worksans-semibold text-xl ml-2">
            Cubing<span class="font-worksans-bold text-third-color">Maze</span>
          </p>
        </Link>
        <!-- Left links -->
        <ul
          class="navbar-nav ml-auto flex flex-col pl-0 list-style-none mr-auto"
        >
          <li class="nav-item p-2">
            <Link
              class="
                nav-link
                text-main-color
                hover:text-third-color
                transition
                duration-300
                font-worksans-medium
                focus:text-gray-700
                p-0
              "
              href="/"
              >Home</Link
            >
          </li>
          <li class="nav-item p-2">
            <a
              class="
                nav-link
                text-main-color
                hover:text-third-color
                transition
                duration-300
                font-worksans-medium
                focus:text-gray-700
                p-0
              "
              href="#"
              >Courses</a
            >
          </li>
          <li class="nav-item p-2">
            <a
              class="
                nav-link
                text-main-color
                hover:text-third-color
                transition
                duration-300
                font-worksans-medium
                focus:text-gray-700
                p-0
              "
              href="#"
              >Blogs</a
            >
          </li>
          <li class="nav-item p-2">
            <a
              class="
                nav-link
                text-main-color
                hover:text-third-color
                transition
                duration-300
                font-worksans-medium
                focus:text-gray-700
                p-0
              "
              href="#"
              >Contact</a
            >
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->

      <!-- Right elements -->
      <div class="flex items-center relative">
        <!-- Icon -->

        <div class="dropdown relative" v-if="$page.props.auth.user">
          <a
            class="
              text-main-color
              hover:text-third-color
              transition
              duration-300
              font-worksans-medium
              focus:text-gray-700
              mr-4
              dropdown-toggle
              hidden-arrow
              flex
              items-center
            "
            href="#"
            id="dropdownMenuButton1"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <svg
              aria-hidden="true"
              focusable="false"
              data-prefix="fas"
              data-icon="bell"
              class="w-4"
              role="img"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 448 512"
            >
              <path
                fill="currentColor"
                d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z"
              ></path>
            </svg>
            <span
              class="
                text-white
                bg-red-700
                absolute
                rounded-full
                text-xs
                -mt-2.5
                ml-2
                py-0
                px-1.5
              "
              >1</span
            >
          </a>
          <ul
            class="
              dropdown-menu
              min-w-max
              absolute
              hidden
              bg-white
              text-base
              z-50
              float-left
              py-2
              list-none
              text-left
              rounded-lg
              shadow-lg
              mt-1
              hidden
              m-0
              bg-clip-padding
              border-none
              left-auto
              right-0
            "
            aria-labelledby="dropdownMenuButton1"
          >
            <li>
              <a
                class="
                  dropdown-item
                  text-sm
                  py-2
                  px-4
                  font-normal
                  block
                  w-full
                  whitespace-nowrap
                  bg-transparent
                  text-gray-700
                  hover:bg-gray-100
                "
                href="#"
                >Action</a
              >
            </li>
            <li>
              <a
                class="
                  dropdown-item
                  text-sm
                  py-2
                  px-4
                  font-normal
                  block
                  w-full
                  whitespace-nowrap
                  bg-transparent
                  text-gray-700
                  hover:bg-gray-100
                "
                href="#"
                >Another action</a
              >
            </li>
            <li>
              <a
                class="
                  dropdown-item
                  text-sm
                  py-2
                  px-4
                  font-normal
                  block
                  w-full
                  whitespace-nowrap
                  bg-transparent
                  text-gray-700
                  hover:bg-gray-100
                "
                href="#"
                >Something else here</a
              >
            </li>
          </ul>
        </div>
        <div
          class="dropdown relative"
          @click="handleDropdownProfile"
          v-click-outside="onClickOutside"
          v-if="$page.props.auth.user"
        >
          <a
            class="flex items-center hidden-arrow"
            href="#"
            id="dropdownMenuButton2"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <img
              :src="
                $page.props.auth.user.profile_img ??
                '/assets/img/user_profile.svg'
              "
              class="rounded-full"
              style="height: 25px; width: 25px"
              alt=""
              loading="lazy"
            />
          </a>
          <div
            class="dropdown-profile"
            :class="{ active: activeDropdownProfile }"
          >
            <div class="flex border-b pb-[15px] mb-2.5">
              <img
                src="/assets/img/user_profile.svg"
                width="30"
                alt="User profile picture"
              />
              <div class="ml-2.5">
                <h1 class="text-[10px] font-worksans-medium">
                  {{ $page.props.auth.user.username }}
                </h1>
                <h5 class="text-[8px] text-main-color/80">
                  {{ $page.props.auth.user.email }}
                </h5>
              </div>
            </div>
            <ul>
              <li class="mb-2">
                <a href="/dashboard/statistics" class="flex"
                  ><img
                    class="mr-1"
                    src="/assets/img/home/navbar/dashboard.svg"
                    alt="Dashboard icon"
                  />
                  <span class="text-[12px]">Dashboard</span></a
                >
              </li>
              <li class="mb-2">
                <a href="" class="flex"
                  ><img
                    class="mr-1"
                    src="/assets/img/home/navbar/profile.svg"
                    alt="Profile icon"
                  />
                  <span class="text-[12px]">My Profile</span></a
                >
              </li>
              <li class="">
                <Link href="/logout" method="post" class="flex"
                  ><img
                    class="mr-1"
                    src="/assets/img/home/navbar/logout.svg"
                    alt="Logout icon"
                  />
                  <span class="text-[12px]">Logout</span></Link
                >
              </li>
            </ul>
          </div>
        </div>
        <a
          class="
            text-main-color
            hover:text-third-color
            transition
            duration-300
            font-worksans-medium
            focus:text-gray-700
            ml-5
          "
          href="#"
          @click="toggleDarkMode"
        >
          <i
            class="fa-solid fa-xl"
            :class="isDarkMode ? 'fa-sun' : 'fa-moon'"
          ></i>
        </a>
        <Link
          href="/auth/login"
          class="btn btn-submit ml-5"
          v-if="!$page.props.auth.user"
        >
          Login / Register
        </Link>
      </div>
      <!-- Right elements -->
    </div>
  </nav>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import vClickOutside from "click-outside-vue3";

export default {
  components: {
    Link,
  },
  directives: {
    clickOutside: vClickOutside.directive,
  },
  setup() {
    let isDarkMode = ref(false);
    let darkMode = localStorage.getItem("darkMode");
    let activeDropdownProfile = ref(false);

    const enabledDarkMode = () => {
      document.documentElement.classList.add("dark");
      localStorage.setItem("darkMode", "enabled");
    };

    const disabledDarkMode = () => {
      document.documentElement.classList.remove("dark");
      localStorage.setItem("darkMode", null);
    };

    if (darkMode === "enabled") {
      enabledDarkMode();
      isDarkMode.value = true;
    }

    const toggleDarkMode = () => {
      darkMode = localStorage.getItem("darkMode");
      if (darkMode != "enabled") {
        enabledDarkMode();
        isDarkMode.value = true;
      } else {
        disabledDarkMode();
        isDarkMode.value = false;
      }
    };

    const handleDropdownProfile = () => {
      activeDropdownProfile.value = !activeDropdownProfile.value;
    };

    const onClickOutside = () => {
      activeDropdownProfile.value = false;
    };

    return {
      isDarkMode,
      toggleDarkMode,
      activeDropdownProfile,
      handleDropdownProfile,
      onClickOutside,
    };
  },
};
</script>

<style scoped>
.btn-submit {
  @apply bg-third-color/30;
}

.dropdown-profile {
  @apply absolute bg-white shadow-lg w-[200px] right-0 top-10 rounded-lg p-[15px] transition-all duration-300 opacity-0 -z-10 -translate-y-3;
}

.dropdown-profile.active {
  @apply opacity-100 -translate-y-0 z-10;
}
</style>