<template>

    <div class="container" v-bind:class="{'active': search.length}">
        <span id="placeholder" class="placeholder" >Encontre rápido...</span>
        <input type="text" v-model="search">
        <svg-icon icon-class="shopping-online"></svg-icon>
    </div>
</template>

<script>

    export default {
        name: 'searchInput',
        data() {
            return{
                search:''
            }
        },
        watch:{
            search(after,before)
            {
                this.moverOffers()


                if(after.length > 1) {
                    this.$store.commit('SET_PRODUCT_CURRENT_PAGE', 0);
                    this.$store.commit('SET_PRODUCT_FILTER', after);
                    this.$store.dispatch('queryProducts')
                }
            }
        },
        methods:{
            moverOffers(){
                const route = this.$route.name;
                if(!route.toLowerCase().includes('productsoffers')){
                    this.$router.push({name:'fetchProductsOffersList'})
                }
            }
        }
    }
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
    .container {
        display: flex;
        flex-direction: column;
        position: relative;
        width: 320px;
        svg {
            position: relative;
            top: -32px;
            width:1.6rem;
            height:1.6rem;
            color:orange;
        }
        input {
            background: transparent;
            border: 0;
            font-size: 20px;
            height: 46px;
            color: orange;
            outline: none !important;
            position: absolute;
            top: 3px;
        }
        .placeholder {
            color: orange;
            transform-origin: 0 50%;
            transform: translateX(30px);
        }
        &.active{
            .placeholder {
                animation: MovePlaceholder 250ms 30ms both linear !important;
            }
            svg{
                animation: MoveCar 250ms 30ms both linear !important;
            }
        }
    }

    @keyframes MovePlaceholder {
        0% { transform: translateX(25px) translateY(0) rotate(0) }
        60% { transform: translateX(25px) translateY(12px) rotate(-18deg) scale(0.92); }
        100% { transform: translateX(0) translateY(18px) rotate(0deg) scale(0.9);color: #03A9F4; }
    }
    @keyframes MoveCar {
        0% { transform: translateX(53px)}
        50% { transform: translateX(86px)}
        70% { transform: translateX(150px)}
        100% { transform: translateX(233px)}
    }

</style>
