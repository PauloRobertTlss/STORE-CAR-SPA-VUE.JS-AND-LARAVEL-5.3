<template>
  <section class="app-main" v-bind:class="{'loading':loading}">
    <transition name="fade-transform" mode="out-in">
      <keep-alive :include="cachedViews">
        <router-view :key="key"></router-view>
      </keep-alive>
    </transition>
  </section>
</template>

<script>
    import { mapGetters } from 'vuex'

export default {
  name: 'AppMain',
  computed: {
    cachedViews() {
      return this.$store.state.tagsView.cachedViews
    },
    key() {
      return this.$route.fullPath
    },
      ...mapGetters([
          'loading'
      ])
  }
}
</script>

<style type="text/scss" lang="scss" scoped>
.app-main {
  /*84 = navbar + tags-view = 50 +34 */
  min-height: calc(100vh - 84px);
  position: relative;
  overflow: hidden;
  transition: opacity 1s;
  &.loading{
    opacity: .1;
   }
}
</style>

