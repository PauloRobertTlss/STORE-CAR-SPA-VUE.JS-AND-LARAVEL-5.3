<template>
    <div class="app-container">
        <el-row :gutter="24">

            <el-col :xl="24" :sm="3" :md="3" :lg="3" >
                <h3>{{$t('offers.categories')}}</h3>
                <el-button :disabled="!c.count_offers" @click="searchPerCategory(c.id)" size="mini" style="width: 90%;" class="category" :key="c.id" v-for="c in categories"><small class="badge">{{c.count_offers}}</small>&nbsp;{{c.title}}</el-button>
                <!--<el-tag style="width: 90%;" :key="c.id" v-for="c in categories">{{c.title}}</el-tag>-->
            </el-col>
            <el-col :xl="24" :sm="18" :md="18" :lg="18" :offset="2">
                <el-row :gutter="24">
            <el-col class="mb-md" :xl="24" :sm="8" :md="8" :lg="8" v-for="(o, index) in products" :key="o.id">
                <a @click="info(o)">
                <el-card shadow="never" :body-style="{ padding: '0px' }">
                    <img :src="o.image_path" class="image" width="190px" height="190px">
                    <div style="padding: 14px;">
                        <span>{{o.name}}</span>
                        <span class="productDetails">
                            <span class="for">
                                Por: <br><strong>R$ {{o.price}}</strong>
                            </span>
                        </span>
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
                scrollPercent:0,
                link: ''
            }
        },
        computed:{
            products() {
                return this.$store.state.product.entities
            },
            categories() {
                return this.$store.state.category.entities;
            }
        },
        methods: {
            getList() {
                this.$store.commit('product/SET_ENTITY_CURRENT_PAGE',0);
                this.$store.commit('product/SET_ENTITY_FILTER','');
                this.$store.dispatch('product/query')
                this.$store.dispatch('category/query')
            },
            handleScroll(e){
                var s = $(window).scrollTop(),
                    d = $(document).height(),
                    c = $(window).height();
                var scrollcurrent = (s / (d - c)) * 100;
                if(parseFloat(scrollcurrent) > 70 && scrollcurrent > this.scrollPercent){
                    this.$store.commit('product/SET_ENTITY_NEXT_PAGE');
                    this.$store.dispatch('product/union');
                }
                this.scrollPercent = scrollcurrent;
            },
            info(product){
                this.$store.commit('product/SET_ID_ENTITY_CURRENT',product.id);
                this.$store.dispatch('product/get').then(r=>{
                    this.$router.push({ name: 'productShow', params: { id: product.id }})
                })
            },
            searchPerCategory(id){
                this.$store.commit('SET_LOADING',true);
                this.$store.commit('product/SET_ENTITY_CURRENT_PAGE',0);
                this.$store.commit('product/SET_ENTITY_FILTER',`category_id-${id}`);
                this.$store.dispatch('product/query').then(r=>{
                    this.$store.commit('SET_LOADING',false);
                })
            }
        },
        mounted(){
            this.$store.commit('product/SET_ENTITY_LIMIT',12);
            this.$store.commit('category/SET_ENTITY_LIMIT',20);
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

<style rel="stylesheet/scss" lang="scss" scoped>
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
    .category {
        text-align: left;
        width: 90%!important;
        margin-bottom: 6px;
        &.is-disabled{
            .badge {
                opacity:0.6;
                background: gray;
            }
        }
        .badge {
            background: #673ab7;
            border-radius: 0.8em;
            -moz-border-radius: 0.8em;
            -webkit-border-radius: 0.8em;
            color: #ffffff;
            display: inline-block;
            font-weight: bold;
            line-height: 1.6em;
            margin-right: 5px;
            text-align: center;
            width: 1.6em;
        }
    }
</style>
