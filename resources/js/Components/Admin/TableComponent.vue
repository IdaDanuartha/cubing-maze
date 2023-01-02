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
  padding: 1rem 0;
  font-weight: 550;
  border-radius: 4px;
}

.table-body {
  padding: 1rem 0;
}

.table-head {
  background-color: rgb(187, 225, 250, 0.5);
}

.data-head {
  color: #0f4c75;
}

.data-head span {
  color: inherit;
}

.table-body:nth-child(odd) {
  background-color: rgba(255, 255, 255, 0.02);
}

.data-head {
  font-size: 0.938rem;
}

.data-column {
  font-size: 0.875rem;
  padding-bottom: 10px;
  border-bottom: 1px solid rgba(27, 38, 44, 0.2);
}
</style>