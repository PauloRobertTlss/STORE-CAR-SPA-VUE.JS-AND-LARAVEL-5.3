<template>
  <el-card class="box-card-component" style="margin-left:8px;" v-if="productCurrent.id">
    <div slot="header" class="box-card-header">
      <img :src='productCurrent.image_path'>
    </div>
    <div style="position:relative;">
      <!--<pan-thumb class="panThumb" :image="avatar"></pan-thumb>-->
      <mallki className='mallki-text' :text='textTitle'></mallki>

       <div class='progress-item' v-for="t in productCurrent.tags.data">
        <span>{{t.title}}</span>
        <el-progress :percentage="100" status="success"></el-progress>
      </div>
    </div>
  </el-card>
</template>

<script>
import { mapGetters } from 'vuex'
import Mallki from '_@/js/components/TextHoverEffect/Mallki'

export default {
  components: { Mallki },

  data() {
    return {
      textTitle: 'olá, mundo'
    }
  },
  computed: {
    ...mapGetters([
      'name',
      'avatar',
      'roles'
    ]),
      productCurrent(){
          return this.$store.state.product.productCurrent
      }
  },
  filters: {
    statusFilter(status) {
      const statusMap = {
        success: 'success',
        pending: 'danger'
      };
      return statusMap[status]
    }
  }
}
</script>

<style rel="stylesheet/scss" lang="scss" >
.box-card-component{
  .el-card__header {
    padding: 0px!important;
  }
}
</style>
<style rel="stylesheet/scss" lang="scss" scoped>
.box-card-component {
  .box-card-header {
    position: relative;
    height: 220px;
    img {
      width: 100%;
      height: 100%;
      transition: all 0.2s linear;
      &:hover {
        transform: scale(1.1, 1.1);
        filter: contrast(130%);
      }
    }
  }
  .mallki-text {
    position: absolute;
    top: 0px;
    right: 0px;
    font-size: 20px;
    font-weight: bold;
  }
  .panThumb {
    z-index: 100;
    height: 70px!important;
    width: 70px!important;
    position: absolute!important;
    top: -45px;
    left: 0px;
    border: 5px solid #ffffff;
    background-color: #fff;
    margin: auto;
    box-shadow: none!important;
    /deep/ .pan-info {
      box-shadow: none!important;
    }
  }
  .progress-item {
    margin-bottom: 10px;
    font-size: 14px;
  }
  @media only screen and (max-width: 1510px){
    .mallki-text{
      display: none;
    }
  }
}
</style>
