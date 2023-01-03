<template>
  <table class="flex flex-col">
    <div class="table-head dark:bg-fourth-color/70">
      <div class="grid grid-cols-12">
        <slot name="columns"></slot>
      </div>
    </div>
    <slot name="rows"></slot>
  </table>
</template>

<script>
export default {
    
};
</script>

<style>
.table-head {
  @apply py-[1rem] px-0 font-worksans-medium rounded;
}

.table-body {
  @apply pt-[1rem] mb-[1rem] px-0;
}

.table-head {
  @apply bg-fourth-color/50;
}

.data-head {
  @apply text-secondary-color;
}

.data-head span {
  @apply text-inherit;
}

.table-body:nth-child(even) {
  background: rgba(255,255,255, .02);
}

.data-head {
  @apply text-[0.938rem];
}

.data-column {
  font-size: 0.875rem;
  padding-bottom: 10px;
  border-bottom: 1px solid rgba(27, 38, 44, 0.2);
}
</style>