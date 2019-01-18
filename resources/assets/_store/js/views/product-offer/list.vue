<template>
    <div class="app-container">
        <el-row :gutter="24">
            <el-col :xl="24" :sm="3" :md="3" :lg="3">
            </el-col>
            <el-col :xl="24" :sm="18" :md="18" :lg="18" :offset="2">
                <el-row :gutter="24">
            <el-col class="mb-md" :xl="24" :sm="8" :md="8" :lg="8" v-for="(o, index) in products" :key="o.id">
                <a>
                <el-card shadow="never" :body-style="{ padding: '0px' }">
                    <img :src="o.image_path" class="image" width="190px" height="190px">
                    <div style="padding: 14px;">
                        <span>{{o.name}}</span>
                        <span class="productDetails">
                            <span class="for">
                                Por: <br><strong>R$ {{o.price}}</strong>
                            </span>
                        </span>
                        <div class="bottom clearfix">
                            <el-button type="text" class="button">Operating button</el-button>
                        </div>
                    </div>
                </el-card>
                </a>
                </el-col>
                </el-row>
            </el-col>
            <el-col :xl="24" :sm="3" :md="3" :lg="3">
            </el-col>
        </el-row>
    </div>
</template>

<script>

    export default {
        name: 'offersList',
        data() {
            return {
                search:'',
                scrollPercent:0
            }
        },
        computed:{
            products() {
                return this.$store.state.product.products;
            }
        },
        watch: {
            search(after, before) {
                this.$store.commit('SET_PRODUCT_FILTER', after);
                this.$store.dispatch('queryProducts')
            },
            products(after,before){
                console.log('news products')
            }
        },
        methods: {
            getList() {
                this.$store.commit('SET_PRODUCT_FILTER','');
                this.$store.dispatch('queryProducts').then(()=>{

                });
            },
            handleScroll(e){
                var s = $(window).scrollTop(),
                    d = $(document).height(),
                    c = $(window).height();

                var scrollcurrent = (s / (d - c)) * 100;

                if(parseFloat(scrollcurrent) > 70 && scrollcurrent > this.scrollPercent){
                    this.$store.commit('SET_PRODUCT_NEXT_PAGE');
                    this.$store.dispatch('unionProducts');
                }
                this.scrollPercent = scrollcurrent;


                console.log('event scroll', this.scrollPercent, 'valid [',parseFloat(this.scrollPercent) > 70,']')
            }

        },
        mounted(){
            this.$store.commit('SET_PRODUCT_LIMIT',12);
            this.getList()
        },
        created () {
            window.addEventListener('scroll', this.handleScroll);
        },
        destroyed () {
            window.removeEventListener('scroll', this.handleScroll);
        }
    }
</script>

<style rel="stylesheet/scss" lang="scss">
    .el-card{
        border:none;
        max-height: 20rem!important;
        position:relative;
        img{
            display: block;
            border-radius: 2px 2px 0 0;
            position: relative;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            width: 100%;
        }
    }

    .mb{
        &-md{
            margin-bottom: 3rem;
        }
        &-lg{
            margin-bottom: 6rem;
        }
    }
    .productDetails {
        .for {
            margin: 2px 0;
            display: block;
            font-size: 16px;
            font-weight: normal;

            color: #004a9d;

        }
    }
</style>
