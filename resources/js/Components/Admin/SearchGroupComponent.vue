<template>
  <div class="search-group dark:bg-fourth-color/70">
    <div class="flex pb-2">
      <div class="mr-3 relative top-1.5">
        <i class="fa-solid fa-magnifying-glass text-third-color/70 dark:text-secondary-color"></i>
      </div>
      <form class="relative top-1.5" @submit.prevent="$emit('handleSearch')">
        <input
        type="text"
        class="input-search dark:placeholder:text-secondary-color dark:text-secondary-color dark:placeholder:font-worksans-light"
        placeholder="Search here..."
        :value="search_query"
        @input="$emit('update:search_query', $event.target.value)"      
      />
      <!-- <button type="submit"></button> -->
      </form>
    </div>
    <div v-if="filter" class="select-option" v-click-outside="onClickOutside" :class="{ active: active }">
      <div class="display-text" @click="activeDropdown(displayText)">
        <span class="text-white text-sm mt-0.5">{{ displayText }}</span>
        <div class="-mt-0.5">
          <i class="fa-solid fa-chevron-down text-[10px] text-white ml-7"></i>
        </div>
      </div>

      <div class="option-group" :class="{ active: active }">
        <div class="option-item" @click="activeDropdown('Sort by')">
          <p>Sort by</p>
        </div>
        <div class="option-item" @click="activeDropdown('Latest')">
          <p>Latest</p>
        </div>
        <div class="option-item" @click="activeDropdown('Oldest')">
          <p>Oldest</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'
import vClickOutside from 'click-outside-vue3'

export default {
    emits: ['handleSearch'],
    props: {
        search_query: String,
        filter: {
          type: Boolean,
          default: true
        }
    },
    directives: {
      clickOutside: vClickOutside.directive
    },
    setup(props, { emit }) {
      const handleSearch = () => {
        emit('handleSearch')
      }

      let active = ref(false)
      let displayText = ref('Sort by')
      
      const activeDropdown = (text) => {
          displayText.value = text
          active.value = !active.value
      }

      const onClickOutside = (event) => {
        active.value = false
      }
      return {
          active,
          displayText,
          activeDropdown,
          handleSearch,
          onClickOutside
      };
    },
};
</script>

<style lang="scss" scoped>
</style>