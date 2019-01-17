<template>
  <div class="dashboard-container">
    <component :is="currentRole"></component>
  </div>
</template>

<script>

import home from './home'

export default {
  name: 'dashboard',
  components: {home},
  data() {
    return {
      currentRole: 'client'
    }
  },
  computed: {
  },
  created() {
  }
}
</script>
