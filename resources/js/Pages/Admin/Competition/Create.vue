<template>
  <Head>
    <title>Add Competition - CubingMaze</title>
    <meta
      name="description"
      description="add competition page for administrator cubingmaze"
    />
    <meta
      name="keywords"
      description="add new competition page cubingmaze, halaman tambah kompetisi baru cubingmaze, add competition administrator"
    />
  </Head>
  <div class="alert-error -ml-2" v-if="session.error">
    <p class="alert-label-error">{{ session.error }}</p>
  </div>
  <div class="container-fluid mb-16 grid grid-cols-3">
    <form class="sm:col-span-2 col-span-3" @submit.prevent="store">
      <div class="form-group">
        <label class="text-third-color dark:text-white font-worksans-medium"
          >Competition Image</label
        >
        <div class="">
          <img
            :src="image_url ?? '/assets/img/no-preview.png'"
            width="200"
            alt="competition image cover"
            class="inline-block rounded my-2"
          />
          <input
            type="file"
            @input="payload.competition_img = $event.target.files[0]"
            @change="previewImage"
            id="competition_img"
            class="hidden"
          />
          <label for="competition_img" class="btn btn-upload"
            >Upload Image</label
          >
        </div>
        <div v-if="errors.competition_img">
          <p class="text-error">
            {{ errors.competition_img }}
          </p>
        </div>
      </div>
      <div class="relative mt-5">
        <button type="button" data-bs-toggle="modal" data-bs-target="#competitionEventModal" class="btn btn-submit">Select Event</button>
      </div>
      <div v-if="errors.cube_categories">
        <p class="text-error">{{ errors.cube_categories }}</p>
      </div>
      <div class="relative mt-5">
        <input
          type="text"
          v-model="payload.name"
          id="name"
          :class="{ error: errors.name }"
          class="custom-input peer"
          placeholder=" "
        />
        <label for="name" class="custom-label" :class="{ error: errors.name }"
          >Competition Name</label
        >
      </div>
      <div v-if="errors.name">
        <p class="text-error">{{ errors.name }}</p>
      </div>
      <!-- <p class="helper-input-text">Remember, contributions to this topic should follow our</p> -->
      <div class="relative mt-5">
        <input
          type="number"
          v-model="payload.competitor_limit"
          :class="{ error: errors.competitor_limit }"
          id="competitor_limit"
          class="custom-input peer"
          placeholder=" "
        />
        <label
          for="competitor_limit"
          class="custom-label"
          :class="{ error: errors.competitor_limit }"
          >Competitor Limit</label
        >
      </div>
      <div v-if="errors.competitor_limit">
        <p class="text-error">
          {{ errors.competitor_limit }}
        </p>
      </div>
      <div class="relative mt-5">
        <input
          type="date"
          id="date_start"
          v-model="payload.date_start"
          :class="{ error: errors.date_start }"
          class="custom-input peer"
          placeholder=" "
        />
        <label
          for="date_start"
          class="custom-label"
          :class="{ error: errors.date_start }"
          >Start Date</label
        >
      </div>
      <div v-if="errors.date_start">
        <p class="text-error">
          {{ errors.date_start }}
        </p>
      </div>
      <div class="relative mt-5">
        <input
          type="date"
          id="date_end"
          v-model="payload.date_end"
          :class="{ error: errors.date_end }"
          class="custom-input peer"
          placeholder=" "
        />
        <label
          for="date_end"
          class="custom-label"
          :class="{ error: errors.date_end }"
          >End Date</label
        >
      </div>
      <div v-if="errors.date_end">
        <p class="text-error">{{ errors.date_end }}</p>
      </div>
      <div class="relative select-group mt-5">
        <div
          class="relative"
          @click.prevent="handleSelectDropdown"
          v-click-outside="onClickOutside"
        >
          <input
            type="text"
            id="type"
            class="custom-input cursor-pointer peer"
            disabled
            :value="currentType"
            placeholder=" "
          />
          <label for="type" class="custom-label">Type</label>
          <i
            class="fa-solid fa-chevron-down"
            :class="{ active: activeSelectInput }"
          ></i>
        </div>
        <div class="select-dropdown" :class="{ active: activeSelectInput }">
          <div class="select-item" @click="selectType('Free')">
            <p>Free</p>
          </div>
          <div class="select-item" @click="selectType('Paid')">
            <p>Paid</p>
          </div>
        </div>
      </div>
      <Transition>
        <div class="relative mt-5" v-if="currentType == 'Paid'">
          <input
            type="number"
            id="fee"
            v-model="payload.fee"
            :class="{ error: errors.fee }"
            class="custom-input peer"
            placeholder=" "
          />
          <label for="fee" class="custom-label" :class="{ error: errors.fee }"
            >Competition Fee</label
          >
        </div>
      </Transition>
      <div v-if="errors.fee">
        <p class="text-error">{{ errors.fee }}</p>
      </div>
      <div class="relative mt-5">
        <Editor
          api-key="no-api-key"
          v-model="payload.description"
          :init="{
            height: 350,
            menubar: false,
            plugins: 'lists link image emoticons',
            toolbar:
              'undo redo | casechange blocks | bold italic backcolor | \
                            alignleft aligncenter alignright alignjustify | \
                            bullist numlst checklist outdent indent | removeformat | a11ycheck code table | link image emoticons',
          }"
        />
      </div>
      <div v-if="errors.description">
        <p class="text-error">
          {{ errors.description }}
        </p>
      </div>
      <div class="relative mt-5">
        <input
          type="checkbox"
          id="using_password"
          class="custom-checkbox"
          @click="usingPassword"
        />
        <label
          for="using_password"
          class="text-xs relative dark:text-gray-500 -top-0.5 ml-2"
          >Using password?</label
        >
      </div>
      <Transition>
        <div class="relative mt-3" v-if="usePass">
          <input
            type="text"
            v-model="payload.password"
            id="password"
            :class="{ error: errors.password }"
            class="custom-input peer"
            placeholder=" "
          />
          <label for="password" class="custom-label">Password</label>
        </div>
      </Transition>
      <div v-if="errors.password">
        <p class="text-error" :class="{ error: errors.password }">
          {{ errors.password }}
        </p>
      </div>
      <div class="mt-10 flex justify-end">
        <!-- <Link href="/admin/competitions" class="btn btn-back"><i class="fa-solid fa-arrow-left mr-2"></i>Back</Link> -->
        <button type="submit" class="btn btn-submit">Add Competition</button>
      </div>
    </form>
  </div>

    <ModalBase
    modalId="competitionEvent"
    modalTitle="Select Competition Event"
    btnCancel="Back"
  >
    <template v-slot:body>    
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
          :class="eventSelected.map((id) => (id == cube.id ? 'active' : ''))"
          v-for="(cube, index) in cube_categories"
          :key="index"
          @click="toggleEvent(cube.id)"
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
            {{ cube.short_name }}</span
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
import LayoutAdmin from "../../../Layouts/Admin.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Editor from "@tinymce/tinymce-vue";
import { ref, reactive } from "vue";
import vClickOutside from "click-outside-vue3";
import { Inertia } from "@inertiajs/inertia";
import ModalBase from "../../../Components/Admin/ModalBaseComponent.vue";

export default {
  //layout
  layout: LayoutAdmin,

  //register components
  components: {
    Head,
    Link,
    Editor,
    ModalBase
  },

  directives: {
    clickOutside: vClickOutside.directive,
  },

  props: {
    session: Object,
    errors: Object,
    cube_categories: Object,
  },

  setup() {
    let image_url = ref();
    let activeSelectInput = ref(false);
    let currentType = ref("Free");
    let usePass = ref(false);
    let selectAll = ref(false);
    let eventSelected = reactive([]);

    const payload = reactive({
      name: "",
      competition_img: "",
      description: "",
      competitor_limit: "",
      type: "free",
      fee: "",
      date_start: "",
      date_end: "",
      password: "",
      cube_categories: eventSelected
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
          eventSelected.push(cube.id);
        } else {
          eventSelected.pop();
        }
      });
      selectAll.value = !selectAll.value;
    };

    const previewImage = (e) => {
      const file = e.target.files[0];
      image_url.value = URL.createObjectURL(file);
    };

    const handleSelectDropdown = () => {
      activeSelectInput.value = !activeSelectInput.value;
    };

    const onClickOutside = () => {
      activeSelectInput.value = false;
    };

    const store = () => {
      Inertia.post("/admin/competitions ", payload);
    };

    const selectType = (type) => {
      currentType.value = type;
      payload.type = currentType.value.toLowerCase();
    };

    const usingPassword = () => {
      usePass.value = !usePass.value;
    };

    return {
      image_url,
      previewImage,
      activeSelectInput,
      handleSelectDropdown,
      onClickOutside,
      payload,
      store,
      selectType,
      currentType,
      usePass,
      usingPassword,
      selectAll,
      eventSelected,
      toggleEvent,
      selectAllEvent
    };
  },
};
</script>

<style scoped>
</style>