<template>
  <div id="app">
    <router-view></router-view>
    <loading :is-loading="loading" v-show="loading"></loading>
  </div>
</template>

<script>
    import { mapGetters } from 'vuex'
    import Loading from '_@/js/components/Loading'
    export default{
        name: 'App',
        components:{Loading},
        computed: {
            ...mapGetters([
                'loading'
            ])
        }
    }
</script>
