<template>
  <article class="c-card c-card--wide" @click="addSale">
    <header class="c-card__header">
    </header>
    <div class="c-card__body">
      <h2 class="c-card__title">
        {{productCurrent.name}}
      </h2>
      <p class="c-card__subtitle">
        <small>unid.</small>&nbsp;{{productCurrent.price | numberFormatter(true)}}
      </p>
      <p class="c-card__intro">
        {{productCurrent.description}}
      </p>
    </div>
    <footer class="c-card__footer">
      ADICIONAR AO CARRINHO
    </footer>
  </article>
</template>

<script>

    export default {
        computed: {
            productCurrent(){
                return this.$store.state.product.productCurrent
            }
        },
        mounted() {

        },
        methods: {
            addSale(){
                console.log('adicionando venda')
                if(this.productCurrent.hasOwnProperty('id')){
                    this.$store.commit('ADD_LINE',this.productCurrent)
                }
            }
        }
    }
</script>
<style type="text/scss" lang="scss" scoped>
  .c-card{
    display: inline-block;
    width: 100%;
    margin: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: left;
    background: #fff;
    box-shadow: 0 6px 10px -5px rgba(0, 0, 0, 0.2);

    &:hover {
      transform: translateY(-1px);
      box-shadow: 0 20px 20px -15px rgba(0, 0, 0, 0.3);
    }

    &__header{
      float: left;
    }

    &__image{
      max-width: 100%;
    }

    &__body{
      float: left;
      padding-top: 30px;
      padding: 20px;
    }

    &__title {
      font-size: 18px;
      font-weight: 700;
      line-height: 3.2;
      margin: 0;
      padding: 0;
      text-transform: uppercase;
    }
    &__subtitle {
      font-size: 18px;
      font-weight: 700;
      line-height: 3.2;
      color: blue;
      margin-top: 5px;
      padding: 0;
    }
    &__intro {
      margin-bottom: 0;
    }
    &__footer{
      color: #1e262a;
      font-size: 0.9rem;
      font-weight: bold;
      letter-spacing: 0.5rem;
      background-color: #8BC34A;
      clear: both;
      text-align: center;
      padding: 20px;
      border-top: 1px solid #ddd;
    }
  }
</style>
