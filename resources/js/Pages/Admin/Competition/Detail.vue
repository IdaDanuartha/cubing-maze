<template>
  <Head>
    <title>Detail Competitions - CubingMaze</title>
    <meta
      name="description"
      description="competition detail management page for administrator cubingmaze"
    />
    <meta
      name="keywords"
      description="competition detail management page cubingmaze, halaman manajemen kompetisi detail cubingmaze, competition detail management administrator"
    />
  </Head>
  <div class="container-fluid mb-5">
    <div class="alert-success" v-if="session.success">
      <p class="alert-label-success">{{ session.success }}</p>
    </div>

    <!-- Table Competition Rounds -->
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
          Table Competition Rounds
        </h2>
        <button
          data-bs-toggle="modal"
          data-bs-target="#createCompRoundModal"
          class="flex btn btn-create"
        >
          <div>
            <i class="fa-solid fa-plus mr-2 md:text-lg text-sm"></i>
          </div>
          <span class="md:text-lg text-sm">Add Round</span>
        </button>
      </div>
      <SearchGroup
        v-model:search_query="search_query"
        @handle-search="handleSearch"
      />
      <Table>
        <template v-slot:columns>
          <div class="data-head col-span-2 md:col-span-1 pl-[1.125rem]">No</div>
          <div class="data-head col-span-6 md:col-span-3">Round</div>
          <div class="data-head col-span-5 hidden md:inline-block">Event</div>
          <div class="data-head col-span-4 md:col-span-3 text-end"></div>
        </template>
        <template v-slot:rows>
          <div v-if="competition_rounds.data.length">
            <TransitionGroup name="table">
              <div
                class="table-body"
                v-for="(comp, i) in competition_rounds.data"
                :key="comp.id"
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
                      ++i +
                      (competition_rounds.current_page - 1) *
                        competition_rounds.per_page
                    }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-6
                      md:col-span-3
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    {{ comp.round_name }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-5
                      dark:text-gray-200 dark:font-light
                      hidden
                      md:inline-block
                    "
                  >
                    <span
                      v-for="(category, index) in comp.competition_event_rounds"
                      :key="index"
                    >
                      {{
                        index == comp.competition_event_rounds.length - 1
                          ? category.cube_category.short_name
                          : category.cube_category.short_name + ", "
                      }}
                    </span>
                  </div>
                  <div
                    class="
                      data-column
                      col-span-4
                      md:col-span-3
                      dark:text-gray-200 dark:font-light
                      flex
                      justify-end
                    "
                  >
                    <TableDropdown>
                      <template v-slot:dropdown_item>
                        <button
                          data-bs-toggle="modal"
                          data-bs-target="#editCompRoundModal"
                          class="dropdown-item"
                          @click="editRound(comp.id)"
                        >
                          <i
                            class="fa-solid mr-2 relative top-0.5 fa-pencil"
                          ></i>
                          <span>Edit</span>
                        </button>
                        <button
                          data-bs-toggle="modal"
                          data-bs-target="#deleteCompRoundModal"
                          @click="editRound(comp.id)"
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
                      data-bs-target="#editCompRoundModal"
                      class="hidden sm:inline-block icon edit-icon mr-4"
                      @click="editRound(comp.id)"
                    >
                      <img src="/assets/img/icon/edit.svg" alt="" />
                    </button>
                    <div
                      class="hidden sm:inline-block icon delete-icon"
                      data-bs-toggle="modal"
                      data-bs-target="#deleteCompRoundModal"
                      @click="editRound(comp.id)"
                    >
                      <img src="/assets/img/icon/delete.svg" alt="" />
                    </div>
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
              Competition round data not found
            </div>
          </div>
        </template>
      </Table>

      <Pagination :data="competition_rounds" />
    </div>

    <!-- Table Competition Items -->
    <div class="table-container my-10">
      <div class="flex justify-between items-center">
        <h2
          class="
            font-worksans-medium
            md:text-lg
            text-md
            hidden
            xs:inline-block
            dark:text-gray-100
          "
        >
          Table Competition Scrambles
        </h2>
        <button
          data-bs-toggle="modal"
          data-bs-target="#createCompItemModal"
          class="flex btn btn-create"
        >
          <div>
            <i class="fa-solid fa-plus mr-2 md:text-lg text-sm"></i>
          </div>
          <span class="md:text-lg text-sm">Add Scramble</span>
        </button>
      </div>
      <SearchGroup
        v-model:search_query="search_query"
        @handle-search="handleSearch"
      />
      <Table>
        <template v-slot:columns>
          <div class="data-head col-span-2 md:col-span-1 pl-[1.125rem]">No</div>
          <div class="data-head col-span-8 sm:col-span-4 md:col-span-3">
            Scramble Image
          </div>
          <div
            class="data-head md:col-span-3 col-span-4 hidden sm:inline-block"
          >
            Round
          </div>
          <div class="data-head col-span-3 hidden md:inline-block">Event</div>
          <div class="data-head col-span-2 text-end"></div>
        </template>
        <template v-slot:rows>
          <div v-if="competition_items.data.length">
            <TransitionGroup name="table">
              <div
                class="table-body"
                v-for="(comp, i) in competition_items.data"
                :key="comp.id"
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
                      ++i +
                      (competition_items.current_page - 1) *
                        competition_items.per_page
                    }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-8
                      sm:col-span-4
                      md:col-span-3
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    <img
                      :src="`/storage/${comp.scramble_img}`"
                      width="40"
                      alt=""
                    />
                  </div>
                  <div
                    class="
                      data-column
                      col-span-4
                      md:col-span-3
                      hidden
                      sm:inline-block
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    {{ comp.competition_round.round_name }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-6
                      md:col-span-3
                      hidden
                      md:inline-block
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    {{ comp.cube_category.name }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-2
                      dark:text-gray-200 dark:font-light
                      flex
                      justify-end
                    "
                  >
                    <TableDropdown>
                      <template v-slot:dropdown_item>
                        <button
                          data-bs-toggle="modal"
                          data-bs-target="#editCompItemModal"
                          class="dropdown-item"
                          @click="editItem(comp.id)"
                        >
                          <i
                            class="fa-solid mr-2 relative top-0.5 fa-pencil"
                          ></i>
                          <span>Edit</span>
                        </button>
                        <button
                          data-bs-toggle="modal"
                          data-bs-target="#deleteCompItemModal"
                          class="dropdown-item"
                          @click="editItem(comp.id)"
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
                      data-bs-target="#editCompItemModal"
                      @click="editItem(comp.id)"
                      class="hidden sm:inline-block icon edit-icon mr-4"
                    >
                      <img src="/assets/img/icon/edit.svg" alt="" />
                    </button>
                    <button
                      class="hidden sm:inline-block icon delete-icon"
                      data-bs-toggle="modal"
                      data-bs-target="#deleteCompItemModal"
                      @click="editItem(comp.id)"
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
              Competition scramble data not found
            </div>
          </div>
        </template>
      </Table>

      <Pagination :data="competition_items" />
    </div>

    <!-- Table Cuber Competitions -->
    <div class="table-container my-10">
      <h2 class="font-worksans-medium md:text-lg text-md dark:text-gray-100">
        Table Competitors
      </h2>
      <SearchGroup
        v-model:search_query="search_query"
        @handle-search="handleSearch"
      />
      <Table>
        <template v-slot:columns>
          <div
            class="
              data-head
              col-span-2
              md:col-span-1
              pl-[1.125rem]
              2xs:col-span-2
              xs:text-lg
              text-xs
            "
          >
            No
          </div>
          <div
            class="
              data-head
              col-span-6
              md:col-span-4
              2xs:col-span-8
              xs:text-lg
              text-xs
            "
          >
            Competitor name
          </div>
          <div class="data-head col-span-4 hidden md:inline-block">Event</div>
          <div
            class="data-head col-span-4 md:col-span-3 2xs:col-span-2 text-end"
          ></div>
        </template>
        <template v-slot:rows>
          <div v-if="cuber_competitions.data.length">
            <TransitionGroup name="table">
              <div
                class="table-body"
                v-for="(comp, i) in cuber_competitions.data"
                :key="comp.id"
              >
                <div class="grid grid-cols-12">
                  <div
                    class="
                      data-column
                      2xs:col-span-2
                      xs:text-lg
                      text-xs
                      col-span-2
                      md:col-span-1
                      pl-[1.125rem]
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    {{
                      ++i +
                      (cuber_competitions.current_page - 1) *
                        cuber_competitions.per_page
                    }}
                  </div>
                  <div
                    class="
                      2xs:col-span-8
                      xs:text-lg
                      text-xs
                      data-column
                      col-span-6
                      md:col-span-4
                      dark:text-gray-200 dark:font-light
                    "
                  >
                    {{ comp.cuber.name }}
                  </div>
                  <div
                    class="
                      data-column
                      col-span-4
                      dark:text-gray-200 dark:font-light
                      hidden
                      md:inline-block
                    "
                  >
                    <span
                      class=""
                      v-for="(
                        category, index
                      ) in comp.cuber_competition_categories"
                      :key="index"
                    >
                      {{
                        index == comp.cuber_competition_categories.length - 1
                          ? category.cube_category.short_name
                          : category.cube_category.short_name + ", "
                      }}
                    </span>
                  </div>
                  <div
                    class="
                      data-column
                      col-span-4
                      2xs:col-span-2
                      md:col-span-3
                      dark:text-gray-200 dark:font-light
                      flex
                      justify-end
                    "
                  >
                    <TableDropdown>
                      <template v-slot:dropdown_item>
                        <!-- <Link
                          :href="'/admin/competitions/' + comp.id + '/edit'"
                          class="dropdown-item"
                        >
                          <i
                            class="fa-solid mr-2 relative top-0.5 fa-pencil"
                          ></i>
                          <span>Edit</span>
                        </Link> -->
                        <a
                          href="#"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteCompetitorModal"
                          @click="editCompetitor(comp.id)"
                          class="dropdown-item"
                        >
                          <i
                            class="fa-solid mr-2 relative top-0.5 fa-trash"
                          ></i>
                          <span>Remove</span>
                        </a>
                      </template>
                    </TableDropdown>
                    <!-- <Link
                      :href="'/admin/competitions/' + comp.id + '/edit'"
                      class="hidden sm:inline-block icon edit-icon mr-4"
                    >
                      <img src="/assets/img/icon/edit.svg" alt="" />
                    </Link> -->
                    <div
                      class="hidden sm:inline-block icon delete-icon"
                      data-bs-toggle="modal"
                      data-bs-target="#deleteCompetitorModal"
                      @click="editCompetitor(comp.id)"
                    >
                      <img src="/assets/img/icon/delete.svg" alt="" />
                    </div>
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
              Competitor data not found
            </div>
          </div>
        </template>
      </Table>

      <Pagination :data="cuber_competitions" />
    </div>

    <!-- Create competition round -->
    <ModalBase
      modalId="createCompRound"
      modalTitle="Add New Round"
      btnName="Add Round"
      @submit="storeRound"
    >
      <template v-slot:body>
        <div class="alert-error -ml-2" v-if="session.error">
          <p class="alert-label-error">{{ session.error }}</p>
        </div>
        <div class="relative">
          <input
            type="text"
            v-model="payloadCompRound.round_name"
            id="name"
            :class="{ error: errors.round_name }"
            class="custom-input peer"
            placeholder=" "
          />
          <label
            for="name"
            class="custom-label"
            :class="{ error: errors.round_name }"
            >Round Name</label
          >
        </div>
        <div v-if="errors.round_name">
          <p class="text-error">{{ errors.round_name }}</p>
        </div>
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
            :class="
              eventSelected.map((id) =>
                id == cube.cube_category.id ? 'active' : ''
              )
            "
            v-for="(cube, index) in cube_categories"
            :key="index"
            @click="toggleEvent(cube.cube_category.id)"
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
              {{ cube.cube_category.short_name }}</span
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
              <!-- <i
                class="
                  fa-solid fa-xmark
                  text-[8px]
                  bg-main-color/80
                  text-white
                  rounded-full
                  py-0.5
                  px-1
                  relative
                  -top-0.5
                "                
              ></i> -->
            </div>
          </button>
        </div>
        <div v-if="errors.cube_categories">
          <p class="text-error">{{ errors.cube_categories }}</p>
        </div>
      </template>
    </ModalBase>
    <!-- Edit competition round -->
    <ModalBase
      modalId="editCompRound"
      modalTitle="Edit Round"
      btnName="Save Changes"
      @submit="updateRound"
    >
      <template v-slot:body>
        <div class="alert-error -ml-2" v-if="session.error">
          <p class="alert-label-error">{{ session.error }}</p>
        </div>
        <div class="relative">
          <input
            type="text"
            v-model="payloadCompRound.round_name"
            id="name"
            :class="{ error: errors.round_name }"
            class="custom-input peer"
            placeholder=" "
          />
          <label
            for="name"
            class="custom-label"
            :class="{ error: errors.round_name }"
            >Round Name</label
          >
        </div>
        <div v-if="errors.round_name">
          <p class="text-error">{{ errors.round_name }}</p>
        </div>
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
            :class="
              eventSelected.map((id) =>
                id == cube.cube_category.id ? 'active' : ''
              )
            "
            v-for="(cube, index) in cube_categories"
            :key="index"
            @click="toggleEvent(cube.cube_category.id)"
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
              {{ cube.cube_category.short_name }}</span
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
    <!-- Delete Competition Round -->
    <ModalDelete
      modalId="deleteCompRound"
      modalTitle="Competition Round"
      :modalData="payloadCompRound.round_name"
      @destroy="destroyRound"
    />

    <!-- Create competition scramble -->
    <ModalBase
      modalId="createCompItem"
      modalTitle="Add New Scramble"
      btnName="Add Scramble"
      @submit="storeItem"
    >
      <template v-slot:body>
        <div class="alert-error -ml-2" v-if="session.error">
          <p class="alert-label-error">{{ session.error }}</p>
        </div>
        <div class="relative select-group mb-5">
          <div
            class="relative"
            @click.prevent="handleSelectDropdown('round')"
            v-click-outside="onClickOutside"
          >
            <input
              type="text"
              id="type"
              class="custom-input cursor-pointer peer"
              :class="{ error: errors.competition_round_id }"
              disabled
              :value="currentRound"
              placeholder=" "
            />
            <label
              for="type"
              class="custom-label"
              :class="{ error: errors.competition_round_id }"
              >Round</label
            >
            <i
              class="fa-solid fa-chevron-down"
              :class="{ active: activeSelectRound }"
            ></i>
          </div>
          <div class="select-dropdown" :class="{ active: activeSelectRound }">
            <div
              v-for="round in competition_rounds.data"
              :key="round.id"
              class="select-item"
              @click="selectRound(round.id, round.round_name)"
            >
              <p>{{ round.round_name }}</p>
            </div>
          </div>
          <div v-if="errors.competition_round_id">
            <p class="text-error">{{ errors.competition_round_id }}</p>
          </div>
        </div>
        <div class="relative select-group mb-5">
          <div
            class="relative"
            @click.prevent="handleSelectDropdown('event')"
            v-click-outside="onClickOutside"
          >
            <input
              type="text"
              id="type"
              class="custom-input cursor-pointer peer"
              :class="{ error: errors.cube_category_id }"
              disabled
              :value="currentEvent"
              placeholder=" "
            />
            <label
              for="type"
              class="custom-label"
              :class="{ error: errors.cube_category_id }"
              >Event</label
            >
            <i
              class="fa-solid fa-chevron-down"
              :class="{ active: activeSelectEvent }"
            ></i>
          </div>
          <div class="select-dropdown" :class="{ active: activeSelectEvent }">
            <div
              v-for="cube in cube_categories"
              :key="cube.cube_category.id"
              class="select-item"
              @click="
                selectEvent(cube.cube_category.id, cube.cube_category.name)
              "
            >
              <p>{{ cube.cube_category.name }}</p>
            </div>
          </div>
          <div v-if="errors.cube_category_id">
            <p class="text-error">{{ errors.cube_category_id }}</p>
          </div>
        </div>
        <div class="relative mb-5">
          <input
            type="date"
            v-model="payloadCompItem.date"
            id="name"
            :class="{ error: errors.date }"
            class="custom-input peer"
            placeholder=" "
          />
          <label for="name" class="custom-label" :class="{ error: errors.date }"
            >Date</label
          >
          <div v-if="errors.date">
            <p class="text-error">{{ errors.date }}</p>
          </div>
        </div>
        <div class="form-group">
          <label class="text-third-color dark:text-white font-worksans-medium"
            >Scramble Image</label
          >
          <div class="">
            <img
              :src="scramble_img_url ?? '/assets/img/no-preview.png'"
              width="150"
              alt="competition image cover"
              class="inline-block rounded my-2"
            />
            <input
              type="file"
              @input="payloadCompItem.scramble_img = $event.target.files[0]"
              @change="previewImage"
              id="scramble_img"
              class="hidden"
            />
            <label for="scramble_img" class="btn btn-upload"
              >Upload Image</label
            >
          </div>
          <div v-if="errors.scramble_img">
            <p class="text-error">
              {{ errors.scramble_img }}
            </p>
          </div>
        </div>
      </template>
    </ModalBase>
    <!-- Edit competition scramble -->
    <ModalBase
      modalId="editCompItem"
      modalTitle="Edit Scramble"
      btnName="Save Changes"
      @submit="updateItem"
    >
      <template v-slot:body>
        <div class="alert-error -ml-2" v-if="session.error">
          <p class="alert-label-error">{{ session.error }}</p>
        </div>
        <div class="relative select-group mb-5">
          <div
            class="relative"
            @click.prevent="handleSelectDropdown('round')"
            v-click-outside="onClickOutside"
          >
            <input
              type="text"
              id="type"
              class="custom-input cursor-pointer peer"
              :class="{ error: errors.competition_round_id }"
              disabled
              :value="currentRound"
              placeholder=" "
            />
            <label
              for="type"
              class="custom-label"
              :class="{ error: errors.competition_round_id }"
              >Round</label
            >
            <i
              class="fa-solid fa-chevron-down"
              :class="{ active: activeSelectRound }"
            ></i>
          </div>
          <div class="select-dropdown" :class="{ active: activeSelectRound }">
            <div
              v-for="round in competition_rounds.data"
              :key="round.id"
              class="select-item"
              @click="selectRound(round.id, round.round_name)"
            >
              <p>{{ round.round_name }}</p>
            </div>
          </div>
          <div v-if="errors.competition_round_id">
            <p class="text-error">{{ errors.competition_round_id }}</p>
          </div>
        </div>
        <div class="relative select-group mb-5">
          <div
            class="relative"
            @click.prevent="handleSelectDropdown('event')"
            v-click-outside="onClickOutside"
          >
            <input
              type="text"
              id="type"
              class="custom-input cursor-pointer peer"
              :class="{ error: errors.cube_category_id }"
              disabled
              :value="currentEvent"
              placeholder=" "
            />
            <label
              for="type"
              class="custom-label"
              :class="{ error: errors.cube_category_id }"
              >Event</label
            >
            <i
              class="fa-solid fa-chevron-down"
              :class="{ active: activeSelectEvent }"
            ></i>
          </div>
          <div class="select-dropdown" :class="{ active: activeSelectEvent }">
            <div
              v-for="cube in cube_categories"
              :key="cube.cube_category.id"
              class="select-item"
              @click="
                selectEvent(cube.cube_category.id, cube.cube_category.name)
              "
            >
              <p>{{ cube.cube_category.name }}</p>
            </div>
          </div>
          <div v-if="errors.cube_category_id">
            <p class="text-error">{{ errors.cube_category_id }}</p>
          </div>
        </div>
        <div class="relative mb-5">
          <input
            type="date"
            v-model="payloadCompItem.date"
            id="name"
            :class="{ error: errors.date }"
            class="custom-input peer"
            placeholder=" "
          />
          <label for="name" class="custom-label" :class="{ error: errors.date }"
            >Date</label
          >
          <div v-if="errors.date">
            <p class="text-error">{{ errors.date }}</p>
          </div>
        </div>
        <div class="form-group">
          <label class="text-third-color dark:text-white font-worksans-medium"
            >Scramble Image</label
          >
          <div class="">
            <img
              :src="
                payloadCompItem.scramble_img && !scramble_img_url
                  ? '/storage/' + payloadCompItem.scramble_img
                  : scramble_img_url
              "
              width="150"
              alt="competition image cover"
              class="inline-block rounded my-2"
            />
            <input
              type="file"
              @input="payloadCompItem.scramble_img = $event.target.files[0]"
              @change="previewImage"
              id="scramble_img"
              class="hidden"
            />
            <label for="scramble_img" class="btn btn-upload"
              >Upload Image</label
            >
          </div>
          <div v-if="errors.scramble_img">
            <p class="text-error">
              {{ errors.scramble_img }}
            </p>
          </div>
        </div>
      </template>
    </ModalBase>
    <!-- Delete competition scramble -->
    <ModalDelete
      modalId="deleteCompItem"
      modalTitle="Competition Scramble"
      :modalData="'this scramble'"
      @destroy="destroyItem"
    />

    <!-- Delete Competitor -->
    <ModalDelete
      modalId="deleteCompetitor"
      modalTitle="Competitor"
      :modalData="'Competitor ' + payloadCompetitor.name"
      @destroy="destroyCompetitor"
    />
  </div>
</template>

<script>
import LayoutAdmin from "../../../Layouts/Admin.vue";
import Table from "../../../Components/Admin/TableComponent.vue";
import Pagination from "../../../Components/PaginationComponent.vue";
import SearchGroup from "../../../Components/Admin/SearchGroupComponent.vue";
import TableDropdown from "../../../Components/Admin/TableDropdownComponent.vue";
import ModalBase from "../../../Components/Admin/ModalBaseComponent.vue";
import ModalDelete from "../../../Components/Admin/ModalDeleteComponent.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref, reactive } from "@vue/runtime-core";
import { Inertia } from "@inertiajs/inertia";
import vClickOutside from "click-outside-vue3";

export default {
  //layout
  layout: LayoutAdmin,

  directives: {
    clickOutside: vClickOutside.directive,
  },

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

  //props
  props: {
    session: Object,
    errors: Object,
    cube_categories: Object,
    competition_rounds: Object,
    competition_items: Object,
    cuber_competitions: Object,
    competition_id: Number,
  },

  setup(props) {
    const search_query = ref(
      "" || new URL(document.location).searchParams.get("search_query")
    );

    let scramble_img_url = ref();
    let selectAll = ref(false);
    let eventSelected = reactive([]);
    let activeSelectRound = ref(false);
    let activeSelectEvent = ref(false);
    let currentRound = ref("Select round");
    let currentEvent = ref("Select event");

    let payloadCompRound = reactive({
      competition_round_id: "",
      competition_id: props.competition_id,
      round_name: "",
      cube_categories: eventSelected,
    });

    let payloadCompItem = reactive({
      competition_id: props.competition_id,
      competition_item_id: "",
      competition_round_id: "",
      cube_category_id: "",
      scramble_img: "",
      date: "",
    });

    let payloadCompetitor = reactive({
      id: "",
      name: "",
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
          eventSelected.push(cube.cube_category_id);
        } else {
          eventSelected.pop();
        }
      });
      selectAll.value = !selectAll.value;
    };

    const handleSearch = () => {
      Inertia.get("/admin/competitions", {
        search_query: search_query.value,
      });
    };

    const storeRound = () => {
      Inertia.post("/admin/competitions/rounds", payloadCompRound, {
        onSuccess: () => {
          if (props.session.success) {
            $("#createCompRoundModal").modal("hide");
            payloadCompRound.round_name = "";
            eventSelected.length = 0;
          }
        },
      });
    };

    const editRound = (id) => {
      eventSelected.length = 0;
      $.ajax({
        method: "GET",
        url: `/admin/competitions/rounds/${id}/edit`,
        success: (response) => {
          payloadCompRound.competition_round_id = response[0].id;
          payloadCompRound.round_name = response[0].round_name;
          response[1].forEach((event) => {
            eventSelected.push(event.cube_category_id);
          });
        },
      });
    };

    const updateRound = () => {
      Inertia.put(
        `/admin/competitions/rounds/${payloadCompRound.competition_round_id}`,
        payloadCompRound,
        {
          onSuccess: () => {
            if (props.session.success) {
              $("#editCompRoundModal").modal("hide");
              payloadCompRound.round_name = "";
              eventSelected.length = 0;
            }
          },
        }
      );
    };

    const destroyRound = () => {
      Inertia.delete(
        `/admin/competitions/rounds/${payloadCompRound.competition_round_id}`,
        {
          onSuccess: () => {
            if (props.session.success) {
              $("#deleteCompRoundModal").modal("hide");
            }
          },
        }
      );
    };

    const handleSelectDropdown = (type) => {
      if (type === "round") {
        activeSelectRound.value = !activeSelectRound.value;
      } else if (type === "event") {
        activeSelectEvent.value = !activeSelectEvent.value;
      }
    };

    const onClickOutside = () => {
      // activeSelectRound.value = false;
      // activeSelectEvent.value = false;
    };

    const selectRound = (id, name) => {
      currentRound.value = name;
      payloadCompItem.competition_round_id = id;
      activeSelectRound.value = false;
    };

    const selectEvent = (id, name) => {
      currentEvent.value = name;
      payloadCompItem.cube_category_id = id;
      activeSelectEvent.value = false;
    };

    const previewImage = (e) => {
      const file = e.target.files[0];
      scramble_img_url.value = URL.createObjectURL(file);
    };

    const resetItem = () => {
      payloadCompItem.competition_item_id = "";
      payloadCompItem.competition_round_id = "";
      payloadCompItem.cube_category_id = "";
      payloadCompItem.scramble_img = "";
      payloadCompItem.date = "";
      scramble_img_url.value = null;

      currentRound.value = "Select round";
      currentEvent.value = "Select event";
    };

    const storeItem = () => {
      Inertia.post("/admin/competitions/items", payloadCompItem, {
        onSuccess: () => {
          if (props.session.success) {
            $("#createCompItemModal").modal("hide");
            resetItem();
          }
        },
      });
    };

    const editItem = (id) => {
      $.ajax({
        method: "GET",
        url: `/admin/competitions/items/${id}/edit`,
        success: (response) => {
          payloadCompItem.competition_item_id = response[0].id;
          payloadCompItem.competition_round_id =
            response[0].competition_round_id;
          payloadCompItem.cube_category_id = response[0].cube_category_id;
          payloadCompItem.scramble_img = response[0].scramble_img;
          payloadCompItem.date = response[0].date;

          currentRound.value = response[1].round_name;
          currentEvent.value = response[2].name;
        },
      });
    };

    const updateItem = () => {
      Inertia.post(
        `/admin/competitions/items/${payloadCompItem.competition_item_id}`,
        {
          _method: "put",
          competition_id: payloadCompItem.competition_id,
          competition_round_id: payloadCompItem.competition_round_id,
          cube_category_id: payloadCompItem.cube_category_id,
          date: payloadCompItem.date,
          scramble_img: payloadCompItem.scramble_img,
        },
        {
          onSuccess: () => {
            if (props.session.success) {
              $("#editCompItemModal").modal("hide");
              resetItem();
            }
          },
        }
      );
    };

    const destroyItem = () => {
      Inertia.delete(
        `/admin/competitions/items/${payloadCompItem.competition_item_id}`,
        {
          onSuccess: () => {
            if (props.session.success) {
              $("#deleteCompItemModal").modal("hide");
            }
          },
        }
      );
    };

    const editCompetitor = (id) => {
      $.ajax({
        method: "GET",
        url: `/admin/competitions/competitor/${id}/edit`,
        success: (response) => {
          payloadCompetitor.id = response.id;
          payloadCompetitor.name = response.cuber.name;
        },
      });
    };

    const destroyCompetitor = () => {
      Inertia.delete(`/admin/competitions/competitor/${payloadCompetitor.id}`, {
        onSuccess: () => {
          if (props.session.success) {
            $("#deleteCompetitorModal").modal("hide");
          }
        },
      });
    };

    return {
      search_query,
      handleSearch,
      payloadCompRound,
      payloadCompItem,
      toggleEvent,
      eventSelected,
      selectAllEvent,
      storeRound,
      editRound,
      updateRound,
      destroyRound,
      activeSelectRound,
      activeSelectEvent,
      handleSelectDropdown,
      selectRound,
      selectEvent,
      currentRound,
      currentEvent,
      onClickOutside,
      scramble_img_url,
      previewImage,
      storeItem,
      editItem,
      updateItem,
      destroyItem,
      payloadCompetitor,
      editCompetitor,
      destroyCompetitor,
    };
  },
};
</script>

<style scoped>
</style>