<template>
  <div class="dashboard-container">
    <component :is="currentRole"></component>
  </div>
</template>

<script>

import home from './home'

export default {
  name: 'home-layout',
  components: {home},
  data() {
    return {
      currentRole: 'home'
    }
  },
  computed: {
  },
  created() {
  }
}
</script>
