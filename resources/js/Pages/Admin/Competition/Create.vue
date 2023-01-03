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
  <div class="container-fluid mb-16 grid grid-cols-3">
    <form class="sm:col-span-2 col-span-3">
        <div class="form-group">
            <label class="text-third-color dark:text-white font-worksans-medium">Competition Image</label>
            <div class="">
                <img :src="image_url ?? 'https://picsum.photos/200'" width="200" alt="competition image cover" class="inline-block rounded my-2">
                <input type="file" @change="previewImage" id="competition_img" class="hidden">
                <label for="competition_img" class="btn btn-upload">Upload Image</label>
            </div>
        </div>
        <div class="relative mt-5">
            <input type="text" id="name" class="custom-input peer" placeholder=" " />
            <label for="name" class="custom-label">Competition Name</label>
        </div>
            <p class="helper-input-text">Remember, contributions to this topic should follow our</p>
        <div class="relative mt-5">
            <input type="number" id="competitor_limit" class="custom-input peer" placeholder=" " />
            <label for="competitor_limit" class="custom-label">Competitor Limit</label>
        </div>
        <div class="relative mt-5">
            <input type="date" id="date_start" class="custom-input peer" placeholder=" " />
            <label for="date_start" class="custom-label">Start Date</label>
        </div>
        <div class="relative mt-5">
            <input type="date" id="date_end" class="custom-input peer" placeholder=" " />
            <label for="date_end" class="custom-label">End Date</label>
        </div>
        <div class="relative select-group mt-5">
            <div class="relative" @click.prevent="handleSelectDropdown" v-click-outside="onClickOutside">
            <input type="text" id="type" class="custom-input cursor-pointer peer" disabled value="Paid" placeholder=" " />
            <label for="type" class="custom-label">Type</label>
            <i class="fa-solid fa-chevron-down" :class="{ active: activeSelectInput }"></i>
            </div>
            <div class="select-dropdown" :class="{ active: activeSelectInput }">
                <div class="select-item">
                <p>Free</p>
                </div>
                <div class="select-item">
                <p>Paid</p>
                </div>
            </div>
        </div>
        <div class="relative mt-5">
            <input type="number" id="price" class="custom-input peer" placeholder=" " />
            <label for="price" class="custom-label">Price</label>
        </div>
        <div class="relative mt-5">
            <Editor 
                api-key="no-api-key" 
                :init="{
                    height: 300,
                    menubar: false,
                    plugins: 'lists link image emoticons',
                    toolbar: 'undo redo | casechange blocks | bold italic backcolor | \
                            alignleft aligncenter alignright alignjustify | \
                            bullist numlst checklist outdent indent | removeformat | a11ycheck code table | link image emoticons'
                }"
            />
        </div>
        <div class="relative mt-5">
            <input type="checkbox" id="using_password" class="custom-checkbox" />
            <label for="using_password" class="text-xs relative dark:text-gray-500 -top-0.5 ml-2">Using password?</label>
        </div>
        <div class="relative mt-3">
            <input type="text" id="password" class="custom-input peer" placeholder=" " />
            <label for="password" class="custom-label">Password</label>
        </div>
        <div class="mt-10 flex justify-end">
            <!-- <Link href="/admin/competitions" class="btn btn-back"><i class="fa-solid fa-arrow-left mr-2"></i>Back</Link> -->
            <button type="submit" class="btn btn-submit">Add Competition</button>
        </div>
    </form>
  </div>
</template>

<script>
import LayoutAdmin from "../../../Layouts/Admin.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Editor from '@tinymce/tinymce-vue';
import { ref } from 'vue'
import vClickOutside from 'click-outside-vue3'

export default {
  //layout
  layout: LayoutAdmin,

  //register components
  components: {
    Head,
    Link,
    Editor
  },
  directives: {
      clickOutside: vClickOutside.directive
    },
  setup() {
    let image_url = ref()

    const previewImage = (e) => {
        const file = e.target.files[0];
        image_url.value = URL.createObjectURL(file);
    }

    let activeSelectInput = ref(false)

    const handleSelectDropdown = () => {
        activeSelectInput.value = !activeSelectInput.value
    }

    const onClickOutside = () => {
        activeSelectInput.value = false
    }

    return {
        image_url,
        previewImage,
        activeSelectInput,
        handleSelectDropdown,
        onClickOutside
    }
  }
};
</script>

<style scoped>
</style>