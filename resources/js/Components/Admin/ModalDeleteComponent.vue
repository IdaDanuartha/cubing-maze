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
    <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
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
        <div class="modal-body relative px-4 py-8 text-center">
            <div class="mx-auto mb-3">
                <i class="fa-solid fa-circle-exclamation bg-red-100 px-4 py-3 rounded-full text-red-600 text-3xl"></i>
            </div>
            <h2 class="text-xl text-main-color/80 font-worksans-bold">Delete {{ modalTitle }}?</h2>
            <div class="lg:px-12 px-8">
                <p class="my-4">Are you sure you want to delete <span class="text-secondary-color font-worksans-medium">"{{ modalData }}"</span>? You can't undo this action</p>
            </div>

            <div class="flex justify-center mt-7">
                <button class="btn bg-main-color/70 text-gray-100 font-worksans-light mr-5" data-bs-dismiss="modal">Cancel</button>
                <button class="btn bg-red-500 text-gray-100 font-worksans-light" @click="$emit('destroy')">Yes, Delete it</button>
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
