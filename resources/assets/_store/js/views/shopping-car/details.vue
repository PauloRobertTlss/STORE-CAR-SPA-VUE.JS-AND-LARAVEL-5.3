<template>
  <div class="app-container">
    <el-row :gutter="8">
      <el-col :xs="{span: 24}" :sm="{span: 24}" :md="{span: 24}" :lg="{span: 24}" :xl="{span: 24}" style="margin-bottom:30px;">
          <el-table :data="sale.lines" style="width: 100%;padding-top: 15px;">
            <el-table-column label="#" min-width="200">
              <template slot-scope="scope">
                {{scope.row.id}}
              </template>
            </el-table-column>
            <el-table-column label="Nome" width="195" align="center">
              <template slot-scope="scope">
                {{scope.row.name}}
                <el-tag type="primary" :key="t.id" v-for="scope.row.tags.data"> {{t.title}}</el-tag>
              </template>
            </el-table-column>
            <el-table-column label="Price" width="195" align="center">
              <template slot-scope="scope">
                {{scope.row.price | numberFormatter(true)}}
              </template>
            </el-table-column>
            <el-table-column label="Qtd." width="60" align="center">
              <template slot-scope="scope">
                <span> {{scope.row.units}}</span>
                <el-button icon="el-icon-edit" circle></el-button>
                <el-button circle>
                  <svg-icon icon-class="dustbin"></svg-icon>
                </el-button>
              </template>
            </el-table-column>
            <el-table-column label="Remover" width="60" align="center">
              <template slot-scope="scope">

              </template>
            </el-table-column>
            <el-table-column label="Remover" width="60" align="center">
              <template slot-scope="scope">
                <el-button type="danger" circle>
                  <svg-icon icon-class="dustbin"></svg-icon>
                </el-button>
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
        name: 'saleDetails',
        computed: {
            ...mapGetters([
                'car_shopping_itens',
                'sumUnits'
            ]),
            sale(){
                return this.$store.state.sale.sale
            }
        },
        created() {

        }
    }
</script>
