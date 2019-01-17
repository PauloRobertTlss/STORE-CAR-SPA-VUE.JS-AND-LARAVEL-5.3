<template>
    <div class="app-container">
        <el-row :gutter="24">
            <el-col class="mb-md" :xl="24" :sm="6" :md="6" :lg="4" v-for="(o, index) in products" :key="o.id" >
                <el-card :body-style="{ padding: '0px' }">
                    <img :src="o.image_path" class="image" width="260px" height="260px">
                    <div style="padding: 14px;">
                        <span>{{o.name}}</span>
                        <div class="bottom clearfix">
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
            products() {
                return this.$store.state.product.products;
            }
        },
        created() {
            this.getList()
        },
        watch: {
            search(after, before) {
                this.$store.commit('SET_PRODUCT_FILTER', after);
                this.$store.dispatch('queryProducts')
            }
        },
        methods: {
            getList() {
                this.$store.commit('SET_PRODUCT_FILTER','');
                this.$store.dispatch('queryProducts').then(()=>{

                });
            }

        },
        mounted(){
            this.$store.commit('SET_PRODUCT_LIMIT',12);
            this.getList()
        }
    }
</script>

<style rel="stylesheet/scss" lang="scss">
.mb{
    &-md{
        margin-bottom: 3rem;
    }
    &-lg{
        margin-bottom: 6rem;
    }
}
</style>
