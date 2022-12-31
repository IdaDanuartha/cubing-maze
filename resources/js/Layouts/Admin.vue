<template>
  <Sidebar />
</template>

<script>
import Header from '../Components/HeaderComponent2.vue'
import Sidebar from '../Components/SidebarComponent.vue'

export default {
  components: { Header, Sidebar },
  data() {
    return {
      openSidebar: true
    }
  },
  methods: {
    toggleSidebar() {
      this.openSidebar = !this.openSidebar
    }
  }

}
</script>

<style>

</style>