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
    data-bs-backdrop="static" data-bs-keyboard="false" 
    :aria-labelledby="`${modalId}ModalLabel`"
    aria-hidden="true"
  >
    <div class="modal-dialog relative w-auto pointer-events-none" :class="modalSize ?? 'modal-md'">
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
          dark:bg-main-color
          rounded-md
          outline-none
          text-current
        "
      >
        <div class="modal-body relative p-6">
            <h2 class="mb-5 font-worksans-bold text-xl dark:text-gray-200 text-main-color">{{ modalTitle }}</h2>
            <form action="" @submit.prevent="$emit('submit')">
                <slot name="body"></slot>
                <div class="flex justify-end mt-6">
                  <button type="button" class="btn btn-cancel mr-5 bg-main-color/70 text-white px-6 py-2.5 font-worksans-regular text-sm" data-bs-dismiss="modal">Cancel</button>
                  <button class="btn bg-secondary-color text-white px-6 py-2.5 font-worksans-regular text-sm" type="submit">{{ btnName }}</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const emits = defineEmits(["submit"]);

const props = defineProps({
  modalId: String,
  modalTitle: String,
  modalSize: String,
  btnName: String,
});
</script>
