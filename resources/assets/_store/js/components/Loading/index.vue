<template>
    <ul class="centered" v-show="isLoading">
    <li class="info-loader">
        <h4 class="text-center" v-bind:class="{'success': !isLoading}"> buscando..</h4>
        <div class="c-ws">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </li>
    </ul>
</template>

<script>
export default {
  name: 'ItemLoader',
  props:{
    isLoading:{type:Boolean,default:false}
  }
}
</script>
<style rel="stylesheet/scss" lang="scss">

$color-1: #DDD8B8;
$color-2: #B3CBB9;
$color-3: #84A9C0;
$color-4: #6A66A3;
$color-5: #58548E;

$color: $color-1, $color-2, $color-3, $color-4, $color-5;

.centered{
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    transform: -webkit-translate(-50%, -50%);
    transform: -moz-translate(-50%, -50%);
    transform: -ms-translate(-50%, -50%);
}

@mixin anim($i){
  /*$y: ($i) * 5;*/
   $y: 6;
 
  @keyframes right-#{$i} {
     0% {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }
  30% {
    opacity: 1;
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -15deg);
    transform: perspective(400px) rotate3d(0, 1, 0, -15deg); 
  }
  100% {
    opacity: 0;
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
  }
  }
}
.info-loader {
    color: #607d8b99;
    line-height: 2.5rem;
    padding: 0 0 0 10px;
    font-weight: 400;
    font-size: .9rem;
    width: 100%;
    height: 2.1rem;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    .success{
        color: #7fffd4!important;
    }
    .c-ws{
        display: flex;
        position: absolute;
        top: -15px;
        span {
         width: 1px;
         height: 12px;
         margin: 2px;
         list-style-type: none;
         transition: 0.6s all ease;
        }

    @for $i from 1 through 6 {
        span:nth-child(#{$i}) {
        @include anim($i);
        animation: right-#{$i} 1s infinite alternate;
        //background-color: nth($color, $i);
        background-color:indigo;
        animation-delay: 100ms * $i;  
        }
      }

    }
    > h4 {
        font-weight: 100;
    }

}





</style>

