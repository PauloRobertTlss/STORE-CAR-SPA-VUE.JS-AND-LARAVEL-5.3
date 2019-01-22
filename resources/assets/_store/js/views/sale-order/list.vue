<template>
  <div class="app-container">
     <el-row :gutter="8" >
      <el-col :xs="{span: 24}" :sm="{span: 24}" :md="{span: 24}" :lg="{span: 24}" :xl="{span: 24}" style="margin-bottom:30px;">
          <el-table :data="sales" style="width: 100%;padding-top: 15px;">
            <el-table-column label="Registro há" min-width="60px">
              <template slot-scope="scope">
                {{scope.row.created_at | timeAgo}}
              </template>
            </el-table-column>
            <el-table-column label="Cliente" min-width="120px" align="left">
              <template slot-scope="scope" v-if="scope.row.customer">
                {{scope.row.customer.data.name}}
                <el-row :gutter="8">

                  <span :key="t.id" v-for="t in scope.row.customer.data.contacts.data">
                    <el-tag v-if="isPhone(t.type)"><svg-icon icon-class="phone"></svg-icon>&nbsp;{{t.contact}}</el-tag>
                    <span v-else><svg-icon icon-class="email"></svg-icon>&nbsp;{{t.contact}}</span>
                  </span>
                </el-row>
              </template>
            </el-table-column>
            <el-table-column label="Estado" min-width="30px" align="center">
              <template slot-scope="scope" v-if="scope.row.address">
                {{scope.row.address.data.state }}
              </template>
            </el-table-column>
          </el-table>
      </el-col>
    </el-row>
  </div>
</template>
<script>
    export default {
        name: 'saleOrdersList',
        data(){
            return{

            }
        },
        computed: {
            sales(){
                return this.$store.state.order.entities
            }
        },
        methods:{
          namespace(){
              return 'order';
          },
            getList(){
              this.$store.dispatch(`${this.namespace()}/query`)
            },
            isPhone(type){
              return type.toLowerCase().includes('phone')
            }
        },
        mounted() {
            this.getList()
        }
    }
</script>
<style type="text/scss" lang="scss" scoped>
  .el-tag{
    margin-left: 6px;
  }
</style>
