<template>
  <el-menu class="navbar" mode="horizontal">
    <hamburger class="hamburger-container" :toggleClick="toggleSideBar" :isActive="sidebar.opened"></hamburger>

    <breadcrumb class="breadcrumb-container"></breadcrumb>
    <div class="right-menu">
      <input-search></input-search>
    </div>
    <div class="right-menu">

      <!--<error-log class="errLog-container right-menu-item"></error-log>-->
      <lang-select class="international right-menu-item"></lang-select>

      <el-dropdown class="avatar-container right-menu-item" trigger="click">
        <div class="avatar-wrapper">
          <img class="user-avatar" :src="avatar+'?imageView2/1/w/80/h/80'">
          <i class="el-icon-caret-bottom"></i>
          <svg viewBox="0 0 36 36"
               class="badge" v-bind:class="{'show':sumUnits>0}">
            <circle
                    cx="50%"
                    cy="50%"
                    r="50%"/>

            <text
                    x="50%"
                    y="55%"
                    text-anchor="middle"
                    alignment-baseline="middle">
              {{sumUnits}}
            </text>
          </svg>
        </div>
        <el-dropdown-menu slot="dropdown">
          <router-link to="/">
            <el-dropdown-item>
              {{$t('navbar.products')}}
            </el-dropdown-item>
          </router-link>
        </el-dropdown-menu>
      </el-dropdown>
    </div>
  </el-menu>
</template>

<script>
    import { mapGetters } from 'vuex'
    import Breadcrumb from '_@/js/components/Breadcrumb'
    import Hamburger from '_@/js/components/Hamburger'
    import ErrorLog from '_@/js/components/ErrorLog'
    import LangSelect from '_@/js/components/LangSelect'
    import InputSearch from '_@/js/components/InputSearch'

    export default {
        components: {
            Breadcrumb,
            Hamburger,
            ErrorLog,
            LangSelect,
            InputSearch
        },
        data(){
            return {
                searchGlobal:''
            }
        },
        computed: {
            ...mapGetters([
                'sidebar',
                'name',
                'avatar',
                'car_shopping_itens',
                'sumUnits'
            ]),
        },
        methods: {
            toggleSideBar() {
                this.$store.dispatch('toggleSideBar')
            }
        }
    }
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
  .el-menu{
    &--horizontal{
      background-color: #151430;
      border-bottom: solid 1px #673AB7;
    }

  }

  .navbar {
    height: 50px;
    line-height: 50px;
    border-radius: 0px !important;
    .hamburger-container {
      line-height: 58px;
      height: 50px;
      float: left;
      padding: 0 10px;
    }
    .breadcrumb-container{
      float: left;

    }
    .errLog-container {
      display: inline-block;
      vertical-align: top;
    }
    .right-menu {
      float: right;
      height: 100%;
      &:focus{
        outline: none;
      }
      .badge {
        /* Set to any width you like */
        width: 1.6vw;
        fill: #2ECC71;
        position: absolute;
        z-index: 9999;
        top: 0;
        left: 30px;
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        display: none;
        &.show{
          display: inherit;
          -webkit-animation-name: bounceIn;
          animation-name: bounceIn;
        }
      }
      .badge text {
        font-size: 18px;
        font-weight: 300;
        font-feature-settings: 'lnum';
        fill: white;
      }
      .right-menu-item {
        display: inline-block;
        margin: 0 8px;
      }
      .screenfull {
        height: 20px;
      }
      .international{
        color:orange;
        vertical-align: top;
      }
      .theme-switch {
        vertical-align: 15px;
      }
      .avatar-container {
        height: 50px;
        margin-right: 30px;
        .avatar-wrapper {
          cursor: pointer;
          margin-top: 5px;
          position: relative;
          .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 10px;
          }
          .el-icon-caret-bottom {
            position: absolute;
            right: -20px;
            top: 25px;
            font-size: 12px;
          }
        }
      }
    }
  }


  @-webkit-keyframes bounceIn {
    0%, 20%, 40%, 60%, 80%, 100% {
      -webkit-animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
      animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
    }

    0% {
      opacity: 0;
      -webkit-transform: scale3d(.3, .3, .3);
      transform: scale3d(.3, .3, .3);
    }

    20% {
      -webkit-transform: scale3d(1.1, 1.1, 1.1);
      transform: scale3d(1.1, 1.1, 1.1);
    }

    40% {
      -webkit-transform: scale3d(.9, .9, .9);
      transform: scale3d(.9, .9, .9);
    }

    60% {
      opacity: 1;
      -webkit-transform: scale3d(1.03, 1.03, 1.03);
      transform: scale3d(1.03, 1.03, 1.03);
    }

    80% {
      -webkit-transform: scale3d(.97, .97, .97);
      transform: scale3d(.97, .97, .97);
    }

    100% {
      opacity: 1;
      -webkit-transform: scale3d(1, 1, 1);
      transform: scale3d(1, 1, 1);
    }
  }

  @keyframes bounceIn {
    0%, 20%, 40%, 60%, 80%, 100% {
      -webkit-animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
      animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
    }

    0% {
      opacity: 0;
      -webkit-transform: scale3d(.3, .3, .3);
      transform: scale3d(.3, .3, .3);
    }

    20% {
      -webkit-transform: scale3d(1.1, 1.1, 1.1);
      transform: scale3d(1.1, 1.1, 1.1);
    }

    40% {
      -webkit-transform: scale3d(.9, .9, .9);
      transform: scale3d(.9, .9, .9);
    }

    60% {
      opacity: 1;
      -webkit-transform: scale3d(1.03, 1.03, 1.03);
      transform: scale3d(1.03, 1.03, 1.03);
    }

    80% {
      -webkit-transform: scale3d(.97, .97, .97);
      transform: scale3d(.97, .97, .97);
    }

    100% {
      opacity: 1;
      -webkit-transform: scale3d(1, 1, 1);
      transform: scale3d(1, 1, 1);
    }
  }
</style>
