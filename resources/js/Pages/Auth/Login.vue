<template>
  <Head>
    <title>Login Administrator - Cubing Maze</title>
    <meta name="description" description="Halaman untuk login cubingmaze" />
    <meta
      name="keywords"
      description="login page cubingmaze, halaman login cubingmaze, login administrator"
    />
  </Head>
  <div class="flex justify-center items-center w-full h-full">
    <div
      class="
        bg-white
        grid grid-cols-12
        xl:mx-[100px]
        lg:mx-[50px]
        mx-0
        xl:my-0
        md:my-5
        my-2
        rounded-xl
      "
    >
      <div class="xl:col-span-9 lg:col-span-8 col-span-12 lg:m-0 mx-20 mt-5">
        <div class="flex items-center ml-5 mt-5">
          <img src="/assets/img/logo.png" alt="Logo cubing maze" width="40" />
          <h4 class="text-2xl ml-3 font-worksans-medium">
            Cubing<span class="text-third-color font-worksans-bold">Maze</span>
          </h4>
        </div>
        <div class="w-full h-auto mt-10 mb-16 flex justify-center items-center">
          <div>
            <h1
              class="
                font-worksans-semibold
                text-center
                mb-7
                text-third-color text-3xl
              "
            >
              Sign In To Account
            </h1>
            <div class="alert-success mt-4 -ml-3" v-if="session.success">
              <p class="alert-label-success">{{ session.success }}</p>
            </div>
            <div class="alert-error mt-4 -ml-3" v-if="session.error">
              <p class="alert-label-error">{{ session.error }}</p>
            </div>
            <form
              @submit.prevent="submit"
              class="xl:w-[25vw] lg:w-[40vw] w-[70vw]"
            >
              <div class="relative mt-5">
                <input
                  type="text"
                  id="email"
                  v-model="payload.email"
                  class="custom-input peer"
                  :class="{ error: errors.email }"
                  placeholder=" "
                />
                <label
                  for="email"
                  class="custom-label"
                  :class="{ error: errors.email }"
                  >Email</label
                >
              </div>
              <div v-if="errors.email">
                <p class="text-error">
                  {{ errors.email }}
                </p>
              </div>
              <div class="relative mt-5">
                <input
                  type="password"
                  id="password"
                  v-model="payload.password"
                  class="custom-input peer"
                  :class="{ error: errors.password }"
                  placeholder=" "
                />
                <label
                  for="password"
                  class="custom-label"
                  :class="{ error: errors.password }"
                  >Password</label
                >
              </div>
              <div v-if="errors.password">
                <p class="text-error">
                  {{ errors.password }}
                </p>
              </div>
              <div class="flex mt-4 justify-between">
                <div>
                  <input
                    type="checkbox"
                    id="remember_me"
                    v-model="payload.remember_me"
                    class="w-3 h-3 relative top-[1px]"
                  />
                  <label for="remember_me" class="ml-2 text-xs"
                    >Remember me</label
                  >
                </div>
                <a href="#" class="text-third-color text-xs"
                  >Forgot Password?</a
                >
              </div>

              <div class="block text-center mt-9">
                <button
                  type="submit"
                  class="
                    w-full
                    rounded
                    text-white
                    focus:outline focus:outline-4 focus:outline-third-color/50
                    btn
                    bg-third-color
                    py-2.5
                  "
                >
                  Sign In
                </button>
              </div>
            </form>
            <div class="my-5">
              <p
                class="
                  text-other-signin text-main-color/70 text-center text-[12px]
                "
              >
                Or sign in with
              </p>
            </div>
            <div class="block">
              <Link href="/auth/google" class="btn-other-signin btn flex">
                <img src="/assets/img/icon/google.svg" alt="Google icon" />
                <span class="ml-2.5">Sign in with Google</span>
              </Link>
              <button class="btn-other-signin btn mt-2.5 flex">
                <img
                  src="/assets/img/icon/wca.svg"
                  alt="World Cube Association icon"
                />
                <span class="ml-2.5">Sign in with WCA</span>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div
        class="
          xl:col-span-3
          lg:col-span-4
          w-full
          h-full
          bg-third-color
          rounded-tr-xl rounded-br-xl
          lg:flex
          hidden
          justify-center
          items-center
          relative
          px-[72px]
        "
      >
        <img
          src="/assets/img/login/cube.svg"
          class="cube-decoration1 absolute -top-20"
          alt="Decoration login page"
        />
        <img
          src="/assets/img/login/cube.svg"
          class="cube-decoration2 absolute -top-20 w-10"
          alt="Decoration login page"
        />
        <img
          src="/assets/img/login/cube.svg"
          class="cube-decoration3 absolute -bottom-20 w-10"
          alt="Decoration login page"
        />
        <img
          src="/assets/img/login/cube.svg"
          class="cube-decoration4 absolute -bottom-20"
          alt="Decoration login page"
        />
        <div class="text-center">
          <h1 class="text-welcome font-worksans-semibold text-white text-3xl">
            Hello Cuber!
          </h1>
          <h5 class="text-white mt-7 mb-11">
            Fill up personal information and stary journey with us.
          </h5>
          <Link
            href="/auth/signup"
            class="
              btn
              py-2.5
              px-8
              outline outline-1
              text-sm
              focus:outline-white/40
              outline-white
              rounded-full
              text-white
            "
            >Sign Up</Link
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
//import layout
import LayoutAuth from "../../Layouts/Auth.vue";

//import Head from Inertia
import { Head, Link } from "@inertiajs/inertia-vue3";

//import reactive
import { onMounted, reactive } from "vue";

//import inertia adapter
import { Inertia } from "@inertiajs/inertia";

export default {
  //layout
  layout: LayoutAuth,

  //register component
  components: {
    Head,
    Link,
  },

  //props
  props: {
    session: Object,
    errors: Object,
    session: Object,
  },

  //define composition API
  setup() {
    
    const payload = reactive({
      remember_me: "",
      email: "",
      password: "",
    });

    function getCookie(name) {
      const value = `; ${document.cookie}`;
      const parts = value.split(`; ${name}=`);
      if (parts.length === 2) return parts.pop().split(";").shift();
    }

    onMounted(() => {
      payload.email = getCookie(email);
    });

    const submit = () => {
      Inertia.post("/auth/login", payload);
    };

    return {
      payload,
      submit,
    };
  },
};
</script>

<style scoped>
.text-other-signin::before {
  content: "";
  @apply w-5 h-[1px] bg-main-color/50 inline-block mr-2 mb-1.5;
}
.text-other-signin::after {
  content: "";
  @apply w-5 h-[1px] bg-main-color/50 inline-block ml-2 mb-1;
}

.btn-other-signin {
  @apply flex justify-center w-full py-2.5 outline outline-1 rounded outline-main-color/60 transition-all duration-300 hover:opacity-80;
}

.text-welcome:after {
  content: "";
  @apply w-[60px] h-[3px] bg-white block mx-auto mt-5 rounded;
}
</style>