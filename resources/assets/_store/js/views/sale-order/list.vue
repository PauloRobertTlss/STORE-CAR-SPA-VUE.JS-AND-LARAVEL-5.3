<template>
  <div class="app-container">
     <el-row :gutter="8" >
      <el-col :xs="{span: 24}" :sm="{span: 24}" :md="{span: 24}" :lg="{span: 24}" :xl="{span: 24}" style="margin-bottom:30px;">
          <el-table :data="sales" style="width: 100%;padding-top: 15px;">
            <el-table-column label="#" width="50">
              <template slot-scope="scope">
                <svg-icon icon-class="shopping-barcode"></svg-icon>
              </template>
            </el-table-column>
            <el-table-column label="Nome" min-width="160" align="center">
              <template slot-scope="scope">
                {{scope.row.name}}
                <el-row :gutter="8">
                  <el-tag type="primary" :key="t.id" v-for="t in scope.row.tags.data"> {{t.title}}</el-tag>
                </el-row>
              </template>
            </el-table-column>
            <el-table-column label="Valor" min-width="60px" align="center">
              <template slot-scope="scope">
                {{scope.row.price | numberFormatter(true)}}
              </template>
            </el-table-column>
            <el-table-column label="Qtd." min-width="60px" align="center">
              <template slot-scope="scope">
                <span> {{scope.row.units}}</span>
                <el-button circle @click="incrementLine(scope.row)">
                  <svg-icon class="increment" icon-class="add"></svg-icon>
                </el-button>
                <el-button circle @click="decrementLine(scope.row)">
                  <svg-icon icon-class="cancel"></svg-icon>
                </el-button>
              </template>
            </el-table-column>
            <el-table-column label="SubTotal" min-width="60px" align="center">
              <template slot-scope="scope">
                {{(scope.row.price * scope.row.units) | numberFormatter(true)}}
              </template>
            </el-table-column>
          </el-table>
      </el-col>
    </el-row>
  </div>
</template>

<script>

    import { mapGetters } from 'vuex'
    export default {
        name: 'saleOrdersList',
        data(){
            return{

            }
        },
        computed: {
            ...mapGetters([
                'car_shopping_itens'
            ]),
            sales(){
                return this.$store.state.order.entities
            },
            sumSale(){
                return this.$store.getters.sumSale
            }
        },
        methods:{

        },
        created() {
        }
    }
</script>
<style type="text/scss" lang="scss" scoped>
</style>
