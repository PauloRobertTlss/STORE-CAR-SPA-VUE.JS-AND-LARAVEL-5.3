<template>
  <div v-if="!item.hidden&&item.children" class="menu-wrapper">

    <router-link v-if="hasOneShowingChild(item.children) && !onlyOneChild.children&&!item.alwaysShow" :to="resolvePath(onlyOneChild.path)">
      <el-menu-item :index="resolvePath(onlyOneChild.path)" :class="{'submenu-title-noDropdown':!isNest}">
        <svg-icon v-if="onlyOneChild.meta&&onlyOneChild.meta.icon" :icon-class="onlyOneChild.meta.icon"></svg-icon>
        <span v-if="onlyOneChild.meta&&onlyOneChild.meta.title" slot="title">{{generateTitle(onlyOneChild.meta.title)}}</span>
      </el-menu-item>
    </router-link>

    <el-submenu v-else :index="item.name||item.path">
      <template slot="title">
        <svg-icon v-if="item.meta&&item.meta.icon" :icon-class="item.meta.icon"></svg-icon>
        <span v-if="item.meta&&item.meta.title" slot="title">{{generateTitle(item.meta.title)}}</span>


      </template>

      <template v-for="child in item.children" v-if="!child.hidden">
        <sidebar-item :is-nest="true" class="nest-menu" v-if="child.children&&child.children.length>0" :item="child" :key="child.path" :base-path="resolvePath(child.path)"></sidebar-item>

        <router-link v-else :to="resolvePath(child.path)" :key="child.name">
          <el-menu-item :index="resolvePath(child.path)">
            <svg-icon v-if="child.meta&&child.meta.icon" :icon-class="child.meta.icon"></svg-icon>
            <span v-if="child.meta&&child.meta.title" slot="title">{{generateTitle(child.meta.title)}}
              <svg viewBox="0 0 36 36"
                   class="badge" v-bind:class="{'show':sumUnits>0}" v-if="child.meta.badge">
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
            </span>

          </el-menu-item>
        </router-link>
      </template>
    </el-submenu>

  </div>
</template>

<script>
    import { mapGetters } from 'vuex'
    import path from 'path'
    import { generateTitle } from '_@/js/utils/i18n'

    export default {
        name: 'SidebarItem',
        props: {
            // route object
            item: {
                type: Object,
                required: true
            },
            isNest: {
                type: Boolean,
                default: false
            },
            basePath: {
                type: String,
                default: ''
            }
        },
        computed:{
            ...mapGetters([
                'sumUnits'
            ]),
        },
        data() {
            return {
                onlyOneChild: null
            }
        },
        methods: {
            hasOneShowingChild(children) {
                const showingChildren = children.filter(item => {
                    if (item.hidden) {
                        return false
                    } else {
                        // temp set(will be used if only has one showing child )
                        this.onlyOneChild = item;
                        return true
                    }
                });
                if (showingChildren.length === 1) {
                    return true
                }
                return false
            },
            resolvePath(...paths) {
                return path.resolve(this.basePath, ...paths)
            },
            generateTitle
        }
    }
</script>
<style type="text/scss" lang="scss" scoped>
  .badge {
    /* Set to any width you like */
    width: 1.6vw;
    fill: orange;
    position: absolute;
    z-index: 9999;
    top: 0;
    rigth: 0;
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
</style>

