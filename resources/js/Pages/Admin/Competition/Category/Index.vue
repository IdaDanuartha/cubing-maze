<template>
  <Head>
    <title>Competition Categories - CubingMaze</title>
    <meta
      name="description"
      description="competition categories management page for administrator cubingmaze"
    />
    <meta
      name="keywords"
      description="competition categories management page cubingmaze, halaman manajemen kategori kompetisi cubingmaze, competition categories management administrator"
    />
  </Head>
  <div class="container-fluid mb-16">
    <div class="alert-success" v-if="session.success">
      <p class="alert-label-success">{{ session.success }}</p>
    </div>
    <div class="table-container">
      <div class="flex justify-between items-center">
        <h2
          class="
            font-worksans-medium
            md:text-lg
            hidden
            xs:inline-block
            text-md
            dark:text-gray-100
          "
        >
          Table Competition Categories
        </h2>
        <button
          class="flex btn btn-create"
          data-bs-toggle="modal"
          data-bs-target="#createCategoryModal"
        >
          <div>
            <i class="fa-solid fa-plus mr-2 md:text-lg text-sm"></i>
          </div>
          <span class="md:text-lg text-sm">Add Category</span>
        </button>
      </div>
      <SearchGroup
        v-model:search_query="search_query"
        @handle-search="handleSearch"
      />
      <Table>
        <template v-slot:columns>
          <div class="data-head col-span-2 md:col-span-1 pl-[1.125rem]">No</div>
          <div
            class="
              data-head
              col-span-4
              md:col-span-2
              xl:col-span-1
              hidden
              xl:inline-block
            "
          >
            Icon
          </div>
          <div class="data-head col-span-5 md:col-span-3">Category name</div>
          <div
            class="data-head col-span-5 xl:col-span-3 hidden md:inline-block"
          >
            Short Name
          </div>
          <div class="data-head col-span-2 hidden xl:inline-block">
            Total Competitions
          </div>
          <div
            class="data-head col-span-4 md:col-span-3 xl:col-span-2 text-end"
          ></div>
        </template>
        <template v-slot:rows>
          <div v-if="categories.data.length">
            <TransitionGroup name="table">
              <div
                class="table-body"
                v-for="(category, i) in categories.data"
                :key="category.id"
              >
                <div class="grid grid-cols-12">
                  <div
                    class="
                      data-column
                      col-span-2
                      md:col-span-1
                      pl-[1.125rem]
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    {{
                      ++i + (categories.current_page - 1) * categories.per_page
                    }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-4
                      md:col-span-2
                      xl:col-span-1
                      hidden
                      xl:inline-block
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    <img :src="`/storage/${category.icon_img}`" alt="" />
                  </div>
                  <div
                    class="
                      data-column
                      col-span-5
                      md:col-span-3
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    {{ category.name }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-5
                      xl:col-span-3
                      dark:text-gray-200 dark:font-light
                      hidden
                      md:inline-block
                    "
                  >
                    {{ category.short_name }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-2
                      dark:text-gray-200 dark:font-light
                      hidden
                      xl:inline-block
                    "
                  >
                    {{ category.competitions.length }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-4
                      md:col-span-3
                      xl:col-span-2
                      dark:text-gray-200 dark:font-light
                      flex
                      justify-end
                    "
                  >
                    <TableDropdown>
                      <template v-slot:dropdown_item>
                        <button
                          data-bs-toggle="modal"
                          data-bs-target="#editCategoryModal"
                          @click="edit(category.id)"
                          class="dropdown-item"
                        >
                          <i
                            class="fa-solid mr-2 relative top-0.5 fa-pencil"
                          ></i>
                          <span>Edit</span>
                        </button>
                        <button
                          data-bs-toggle="modal"
                          data-bs-target="#deleteCategoryModal"
                          @click="edit(category.id)"
                          class="dropdown-item"
                        >
                          <i
                            class="fa-solid mr-2 relative top-0.5 fa-trash"
                          ></i>
                          <span>Remove</span>
                        </button>
                      </template>
                    </TableDropdown>
                    <button
                      data-bs-toggle="modal"
                      data-bs-target="#editCategoryModal"
                      @click="edit(category.id)"
                      class="hidden sm:inline-block icon edit-icon mr-4"
                    >
                      <img src="/assets/img/icon/edit.svg" alt="" />
                    </button>
                    <button
                      data-bs-toggle="modal"
                      data-bs-target="#deleteCategoryModal"
                      @click="edit(category.id)"
                      class="hidden sm:inline-block icon delete-icon"
                    >
                      <img src="/assets/img/icon/delete.svg" alt="" />
                    </button>
                  </div>
                </div>
              </div>
            </TransitionGroup>
          </div>
          <div class="table-body" v-else>
            <div
              class="
                data-column
                col-span-12
                text-center text-gray-600
                dark:text-gray-400
              "
            >
              Category data not found
            </div>
          </div>
        </template>
      </Table>

      <Pagination :data="categories" />
    </div>
  </div>

  <!-- Create competition category -->
  <ModalBase
    modalId="createCategory"
    modalTitle="Add New Category"
    btnName="Add Category"
    @submit="store"
  >
    <template v-slot:body>
      <div class="alert-error -ml-2" v-if="session.error">
        <p class="alert-label-error">{{ session.error }}</p>
      </div>
      <div class="form-group mb-5">
        <label class="text-third-color dark:text-white font-worksans-medium"
          >Category Icon</label
        >
        <div class="">
          <img
            :src="icon_img_url ?? '/assets/img/no-preview.png'"
            width="150"
            alt="category icon"
            class="inline-block rounded my-2"
          />
          <input
            type="file"
            @input="payload.icon_img = $event.target.files[0]"
            @change="previewImage"
            id="icon_img"
            class="hidden"
          />
          <label for="icon_img" class="btn btn-upload">Upload Image</label>
        </div>
        <div v-if="errors.icon_img">
          <p class="text-error">
            {{ errors.icon_img }}
          </p>
        </div>
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
          >Category Name</label
        >
      </div>
      <div v-if="errors.name">
        <p class="text-error">
          {{ errors.name }}
        </p>
      </div>
      <div class="relative mt-5">
        <input
          type="text"
          v-model="payload.short_name"
          id="short_name"
          :class="{ error: errors.short_name }"
          class="custom-input peer"
          placeholder=" "
        />
        <label
          for="short_name"
          class="custom-label"
          :class="{ error: errors.short_name }"
          >Short Name</label
        >
      </div>
      <div v-if="errors.short_name">
        <p class="text-error">
          {{ errors.short_name }}
        </p>
      </div>
    </template>
  </ModalBase>

  <!-- Edit competition category -->
  <ModalBase
    modalId="editCategory"
    modalTitle="Edit Category"
    btnName="Save Changes"
    @submit="update"
  >
    <template v-slot:body>
      <div class="alert-error -ml-2" v-if="session.error">
        <p class="alert-label-error">{{ session.error }}</p>
      </div>
      <div class="form-group mb-5">
        <label class="text-third-color dark:text-white font-worksans-medium"
          >Category Icon</label
        >
        <div class="">
          <img
            :src="
              payload.icon_img && !icon_img_url
                ? '/storage/' + payload.icon_img
                : icon_img_url
            "
            width="150"
            alt="category icon"
            class="inline-block rounded my-2"
          />
          <input
            type="file"
            @input="payload.icon_img = $event.target.files[0]"
            @change="previewImage"
            id="icon_img"
            class="hidden"
          />
          <label for="icon_img" class="btn btn-upload">Upload Image</label>
        </div>
        <div v-if="errors.icon_img">
          <p class="text-error">
            {{ errors.icon_img }}
          </p>
        </div>
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
          >Category Name</label
        >
      </div>
      <div v-if="errors.name">
        <p class="text-error">
          {{ errors.name }}
        </p>
      </div>
      <div class="relative mt-5">
        <input
          type="text"
          v-model="payload.short_name"
          id="short_name"
          :class="{ error: errors.short_name }"
          class="custom-input peer"
          placeholder=" "
        />
        <label
          for="short_name"
          class="custom-label"
          :class="{ error: errors.short_name }"
          >Short Name</label
        >
      </div>
      <div v-if="errors.short_name">
        <p class="text-error">
          {{ errors.short_name }}
        </p>
      </div>
    </template>
  </ModalBase>

  <ModalDelete
    modalId="deleteCategory"
    modalTitle="Category"
    :modalData="payload.name"
    @destroy="destroy"
  />
</template>

<script>
import LayoutAdmin from "../../../../Layouts/Admin.vue";
import Table from "../../../../Components/Admin/TableComponent.vue";
import Pagination from "../../../../Components/PaginationComponent.vue";
import SearchGroup from "../../../../Components/Admin/SearchGroupComponent.vue";
import TableDropdown from "../../../../Components/Admin/TableDropdownComponent.vue";
import ModalBase from "../../../../Components/Admin/ModalBaseComponent.vue";
import ModalDelete from "../../../../Components/Admin/ModalDeleteComponent.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref, reactive } from "@vue/runtime-core";
import { Inertia } from "@inertiajs/inertia";
import vClickOutside from "click-outside-vue3";

export default {
  //layout
  layout: LayoutAdmin,

  //register components
  components: {
    Head,
    Link,
    Table,
    SearchGroup,
    Pagination,
    TableDropdown,
    ModalBase,
    ModalDelete,
  },

  directives: {
    clickOutside: vClickOutside.directive,
  },

  //props
  props: {
    session: Object,
    errors: Object,
    categories: Object,
  },

  setup() {
    const search_query = ref(
      "" || new URL(document.location).searchParams.get("search_query")
    );

    let icon_img_url = ref();

    let payload = reactive({
      cube_category_id: "",
      name: "",
      short_name: "",
      icon_img: "",
    });

    //define method search
    const handleSearch = () => {
      Inertia.get("/admin/categories/competitions", {
        //send params "q" with value from state "search"
        search_query: search_query.value,
      });
    };

    const previewImage = (e) => {
      const file = e.target.files[0];
      icon_img_url.value = URL.createObjectURL(file);
    };

    const store = () => {
      Inertia.post(`/admin/categories/competitions`, payload, {
        onSuccess: () => {
          $("#createCategoryModal").modal("hide");
        },
      });
    };

    const edit = (id) => {
      $.ajax({
        method: "GET",
        url: `/admin/categories/competitions/${id}/edit`,
        success: (response) => {
          payload.cube_category_id = response.id;
          payload.name = response.name;
          payload.short_name = response.short_name;
          payload.icon_img = response.icon_img;
        },
      });
    };

    const update = () => {
      Inertia.post(
        `/admin/categories/competitions/${payload.cube_category_id}`,
        {
          _method: "put",
          name: payload.name,
          short_name: payload.short_name,
          icon_img: payload.icon_img,
        },
        {
          onSuccess: () => {
            $("#editCategoryModal").modal("hide");
          },
        }
      );
    };

    const destroy = () => {
      Inertia.delete(
        `/admin/categories/competitions/${payload.cube_category_id}`,
        {
          onSuccess: () => {
            $("#deleteCategoryModal").modal("hide");
          },
        }
      );
    };

    return {
      icon_img_url,
      search_query,
      handleSearch,
      payload,
      store,
      edit,
      update,
      destroy,
      previewImage,
    };
  },
};
</script>

<style scoped>
</style>