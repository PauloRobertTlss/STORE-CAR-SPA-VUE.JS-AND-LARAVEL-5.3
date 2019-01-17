<template>
  <div class="home-editor-container">
    <div class=" clearfix">
      <div class="info-container">
        <span class="display_name warn-content text-orange">
          <span class="tab"></span>
          <strong>ABERTO</strong>
        </span>
      </div>
    </div>
    <div>
      <img class="emptyGif" :src="emptyGif">
    </div>
  </div>
</template>

<script>
import PanThumb from '_@/js/components/PanThumb'

export default {
  name: 'home-client',
  components: { PanThumb },
  data() {
    return {
      emptyGif: 'https://s3.us-east-2.amazonaws.com/eaadk4yfoubad0tmoq3cert/certificados/giphy_1.gif'
    }
  },
}
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
  .warn-content{
    .tab{
      top: -0.1em;
      right: -0.1em;
      border: 2px solid #483d8b;
      border-width: 0em .6em .7em 0em;
      border-color: #151430 #151430 #2f2e46 #151430;
      z-index: 2;
      width: 12%;
      height: .9rem;
      position: absolute;
      &:before {
        content: " ";

      }
    }
  }
  .emptyGif {
    display: block;
    width: 28%;
    margin: 0 auto;
    border-width: 21px 21px;
    border-style: dotted;
    transition: all;
    animation: 3s;
    animation-delay: 3s;
    color: #33264a87;
    background-color: #48473f40;
    -webkit-background-clip: border;
    -webkit-animation-name: Gradient;
    -webkit-animation-duration: 3s;
    -webkit-animation-iteration-count: infinite;
    border-radius: 10px;
  }

  .home-editor-container {

    background-size: cover;
    background-color: #151430;
    min-height: 100vh;
    padding: 50px 60px 0px;
    .pan-info-roles {
      font-size: 12px;
      font-weight: 700;
      color: #333;
      display: block;
    }
    .info-container {
      position: relative;
      margin-left: 190px;
      height: 150px;
      line-height: 200px;
      .display_name {
        font-size: 48px;
        line-height: 48px;
        position: absolute;
        top: 25px;
      }
    }
  }


  @-webkit-keyframes Gradient {
    0% {
      background-position: 0% 50%
    }
    50% {
      background-position: 100% 50%;
      color: #f1ff15;
    }
    100% {
      background-position: 0% 50%
    }
  }

  @-moz-keyframes Gradient {
    0% {
      background-position: 0% 50%
    }
    50% {
      background-position: 100% 50%;
      color: #fbff13;
    }
    100% {
      background-position: 0% 50%
    }
  }

  @keyframes Gradient {
    0% {
      background-position: 0% 50%
    }
    50% {
      background-position: 100% 50%;
      color: #fbff13;
    }
    100% {
      background-position: 0% 50%
    }
  }

</style>
