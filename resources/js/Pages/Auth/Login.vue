<template>
  <Head>
    <title>Login Administrator - Cubing Maze</title>
    <meta
      name="description"
      description="Halaman login untuk administrator cubingmaze"
    />
    <meta
      name="keywords"
      description="login page cubingmaze, halaman login cubingmaze, login administrator"
    />
  </Head>
  <div class="flex justify-center items-center w-full h-full">
    <div class="bg-white grid grid-cols-12 container rounded-xl">
      <div class="col-span-8">
        <div class="flex items-center ml-5 mt-5">
          <img src="/assets/img/logo.png" alt="Logo cubing maze" width="40" />
          <h4 class="text-2xl ml-3 font-worksans-medium">
            Cubing<span class="text-third-color font-worksans-bold">Maze</span>
          </h4>
        </div>
        <div class="w-full h-auto mt-10 mb-16 flex justify-center items-center">
          <div>
            <h1 class="font-worksans-semibold text-third-color text-3xl">
              Sign In To Account
            </h1>
            <form @submit.prevent="submit">
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
                  <input type="checkbox" id="remember_me" />
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
              <button class="btn-other-signin btn flex">
                <img src="/assets/img/icon/google.svg" alt="Google icon" />
                <span class="ml-2.5">Sign in with Google</span>
              </button>
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
          col-span-4
          w-full
          h-full
          bg-third-color
          rounded-tr-xl rounded-br-xl
          flex
          justify-center
          items-center
          relative
          px-[72px]
        "
      >
        <div class="text-center">
          <h1 class="text-welcome font-worksans-semibold text-white text-3xl">
            Hello Cuber!
          </h1>
          <h5 class="text-white mt-7 mb-11">Fill up personal information and stary journey with us.</h5>
          <Link href="#" class="btn py-2.5 px-8 outline outline-1 text-sm focus:outline-white/40 outline-white rounded-full text-white">Sign Up</Link>
        </div>
      </div>
    </div>

    <!-- <div class="text-center text-md-center mb-4 mt-md-0">
      <h3>ADMINISTRATOR</h3>
    </div>
    <div v-if="session.error" class="alert alert-danger mt-2">
      {{ session.error }}
    </div>
    <form @submit.prevent="submit" class="mt-4">
      <div class="form-group mb-4">
        <label for="email">Email Address</label>
        <div class="input-group">
          <span class="input-group-text" id="basic-addon1">
            <i class="fa fa-envelope"></i>
          </span>
          <input
            type="email"
            class="w-full"
            v-model="payload.email"
            placeholder="Email Address"
          />
        </div>
        <div v-if="errors.email" class="alert alert-danger mt-2">
          {{ errors.email }}
        </div>
      </div>

      <div class="form-group">
        <div class="form-group mb-4">
          <label for="password">Password</label>
          <div class="input-group">
            <span class="input-group-text" id="basic-addon2">
              <i class="fa fa-lock"></i>
            </span>
            <input
              type="password"
              placeholder="Password"
              class="w-full"
              v-model="payload.password"
            />
          </div>
          <div v-if="errors.password" class="alert alert-danger mt-2">
            {{ errors.password }}
          </div>
        </div>

        <div class="d-flex justify-content-between align-items-top mb-4">
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              value=""
              id="remember"
            />
            <label class="form-check-label mb-0" for="remember">
              Remember me
            </label>
          </div>
        </div>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-gray-800">LOGIN</button>
      </div>
    </form> -->
  </div>
</template>

<script>
//import layout
import LayoutAuth from "../../Layouts/Auth.vue";

//import Head from Inertia
import { Head, Link } from "@inertiajs/inertia-vue3";

//import reactive
import { reactive } from "vue";

//import inertia adapter
import { Inertia } from "@inertiajs/inertia";

export default {
  //layout
  layout: LayoutAuth,

  //register component
  components: {
    Head,
    Link
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
      email: "",
      password: "",
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