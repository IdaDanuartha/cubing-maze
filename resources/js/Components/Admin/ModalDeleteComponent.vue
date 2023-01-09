<template>
  <div
    class="
      modal
      fade
      fixed
      top-0
      left-0
      hidden
      w-full
      h-full
      outline-none
      overflow-x-hidden overflow-y-auto
    "
    :id="`${modalId}Modal`"
    tabindex="-1"
    :aria-labelledby="`${modalId}ModalLabel`"
    aria-hidden="true"
  >
    <div class="modal-dialog relative w-auto pointer-events-none">
      <div
        class="
          modal-content
          border-none
          shadow-lg
          relative
          flex flex-col
          w-full
          pointer-events-auto
          bg-white bg-clip-padding
          rounded-md
          outline-none
          text-current
        "
      >
        <div class="modal-body relative p-4 text-center">
            <div class="icon">
                <i class="fa-solid fa-circle-exclamation"></i>
            </div>
            <h2 class="text-lg font-worksans-bold">Delete {{ modalTitle }}?</h2>
            <p class="my-4">Are you sure you want to delete <span class="text-secondary-color">"{{ modalData }}"</span>? You can't undo this action</p>

            <div class="flex">
                <button class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-delete" @click="$emit('destroy')">Yes, Delete it</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const emits = defineEmits(['destroy'])

const props = defineProps({
  modalId: String,
  modalTitle: String,
  modalData: String,
});

</script>

<style lang="scss" scoped>
</style>