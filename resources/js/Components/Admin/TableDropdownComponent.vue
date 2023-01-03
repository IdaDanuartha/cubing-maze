<template>
    <div class="relative sm:hidden inline-block" v-click-outside="onClickOutside">
        <a href="#" @click.prevent="handleDropdown">
            <i class="fa-solid fa-ellipsis-vertical icon"></i>
        </a>
        <div class="dropdown-table" :class="{ active: activeDropdownTable }">
            <slot name="dropdown_item"></slot>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import { ref } from 'vue'
import vClickOutside from 'click-outside-vue3'

export default {
    components: {
        Link
    },
    directives: {
      clickOutside: vClickOutside.directive
    },
    setup () {
        let activeDropdownTable = ref(false)

        const handleDropdown = () => {
            activeDropdownTable.value = !activeDropdownTable.value
        }

        const onClickOutside = () => {
            activeDropdownTable.value = false
        }

        return {
            activeDropdownTable,
            handleDropdown,
            onClickOutside
        }
    }
}
</script>

<style scoped>

</style>