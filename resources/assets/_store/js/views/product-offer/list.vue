<template>
    <div class="app-container">
        <el-row :gutter="24">
            <el-col :span="8" v-for="(o, index) in 2" :key="o" :offset="index > 0 ? 2 : 0">
                <el-card :body-style="{ padding: '0px' }">
                    <img src="~examples/assets/images/hamburger.png" class="image">
                    <div style="padding: 14px;">
                        <span>Yummy hamburger</span>
                        <div class="bottom clearfix">
                            <time class="time">{{ currentDate }}</time>
                            <el-button type="text" class="button">Operating button</el-button>
                        </div>
                    </div>
                </el-card>
            </el-col>
        </el-row>


    </div>
</template>

<script>

    export default {
        name: 'offersList',
        data() {

            return {
                search:''
            }
        },
        computed:{
            companies() {
                return this.$store.state.products.offers;
            }
        },
        created() {
            this.getList()
        },
        watch: {
            search(after, before) {


                this.$store.commit('SET_COMPANY_FILTER', after);
                this.$store.dispatch('queryCompanies')
            }
        },
        methods: {
            getList() {
                this.$store.commit('SET_COMPANY_FILTER','');
                this.$store.dispatch('queryCompanies').then(()=>{

                });
            }

        },
        mounted(){
            this.getList()
        }
    }
</script>

<style rel="stylesheet/scss" lang="scss">
    
</style>
