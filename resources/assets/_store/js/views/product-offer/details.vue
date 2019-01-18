<template>
  <div class="app-container">
    <el-row :gutter="8">
      <el-col :xs="{span: 24}" :sm="{span: 12}" :md="{span: 12}" :lg="{span: 6}" :xl="{span: 6}" style="margin-bottom:30px;">
        <box-card ></box-card>
      </el-col>
      <el-col :xs="{span: 24}" :sm="{span: 24}" :md="{span: 24}" :lg="{span: 12}" :xl="{span: 12}" style="padding-right:8px;margin-bottom:30px;">
        <transaction-table></transaction-table>
      </el-col>
      <el-col :xs="{span: 24}" :sm="{span: 12}" :md="{span: 12}" :lg="{span: 6}" :xl="{span: 6}" style="margin-bottom:30px;">

      </el-col>
    </el-row>
  </div>
</template>

<script>
    import { mapGetters } from 'vuex'
    import TransactionTable from './components/TransactionTable'
    import BoxCard from './components/BoxCard'

    export default {
        name: 'productDetails',
        components:{TransactionTable,BoxCard},
        data() {
            return {
                currentRole: 'adminDashboard'
            }
        },
        computed: {
            ...mapGetters([
                'roles'
            ]),
            productCurrent(){
                return this.$store.state.product.productCurrent
            }
        },
        created() {

        }
    }
</script>
