<template>
  <div class="app-container">

    <el-row :gutter="8" v-if="!car_shopping_itens">
      <el-col :xs="{span: 24}" :sm="{span: 24}" :md="{span: 24}" :lg="{span: 24}" :xl="{span: 24}" style="margin-bottom:30px;">
        <router-link to="/offers">
          <el-button type="success">INICIAR CARRINHO</el-button>
        </router-link>
        <div class=" clearfix">
          <div class="info-container">

          </div>
        </div>
        <div>
          <img class="emptyGif" :src="emptyGif">
        </div>
      </el-col>
    </el-row>

     <el-row :gutter="8" v-else>
      <el-col :xs="{span: 24}" :sm="{span: 24}" :md="{span: 24}" :lg="{span: 24}" :xl="{span: 24}" style="margin-bottom:30px;">
          <el-table :data="sale.lines" style="width: 100%;padding-top: 15px;">
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
    <el-row :gutter="8" v-if="car_shopping_itens">
      <el-col :xs="{span: 24}" :sm="{span: 16}" :md="{span: 16}" :lg="{span: 16}" :xl="{span: 16}" style="margin-bottom:30px;">
        <el-form  ref="customer" :model="sale.customer" autoComplete="on" :rules="saleRules" label-width="160px" size="mini">
          <el-form-item prop="name" :label="$t('shopping_car.name')">
            <el-input name="name" v-model="sale.customer.name" autoComplete="on"  />
          </el-form-item>
          <el-row :gutter="24">

              <el-form-item prop="email" :label="$t('shopping_car.email')">
                <el-col :xs="{span: 24}" :sm="{span: 16}" :md="{span: 16}" :lg="{span: 16}" :xl="{span: 16}" >
                <el-input name="email" v-model="sale.customer.email" autoComplete="on" :placeholder="$t('shopping_car.email')"/>
                </el-col>
              </el-form-item>

              <el-form-item prop="contact" :label="$t('shopping_car.contact')">
                <el-col :xs="{span: 24}" :sm="{span: 8}" :md="{span: 8}" :lg="{span: 8}" :xl="{span: 8}" >
                  <el-input name="contact" v-model="sale.customer.contact" autoComplete="on" :placeholder="$t('shopping_car.contact_placeholder')"/>
                </el-col>
              </el-form-item>
          </el-row>
        </el-form>

        <el-form  ref="address" :model="sale.address" autoComplete="on" :rules="saleAddressRules"  label-width="160px" size="mini">
          <el-form-item prop="postcode" :label="$t('shopping_car.postcode')">
            <el-col :xs="{span: 24}" :sm="{span: 6}" :md="{span: 6}" :lg="{span: 6}" :xl="{span: 6}" >
            <el-input name="cep" v-model="sale.address.postcode" @change="getCep" autoComplete="on"/>
            </el-col>
            <el-col :xs="{span: 24}" :sm="{span: 18}" :md="{span: 18}" :lg="{span: 18}" :xl="{span: 18}" >
            </el-col>
          </el-form-item>
          <el-form-item prop="route" :label="$t('shopping_car.route')">
            <el-col :xs="{span: 24}" :sm="{span: 18}" :md="{span: 18}" :lg="{span: 18}" :xl="{span: 18}" >
            <el-input name="route" v-model="sale.address.route" autoComplete="on" />
            </el-col>
            <el-col :xs="{span: 24}" :sm="{span: 6}" :md="{span: 6}" :lg="{span: 6}" :xl="{span: 6}" >
              <el-input name="neighborhood" v-model="sale.address.neighborhood" autoComplete="on" :placeholder="$t('shopping_car.neighborhood')"  />
            </el-col>
          </el-form-item>

          <el-form-item prop="number" :label="$t('shopping_car.number')">
            <el-col :xs="{span: 24}" :sm="{span: 6}" :md="{span: 6}" :lg="{span: 6}" :xl="{span: 6}" >
              <el-input name="number" v-model="sale.address.number" autoComplete="on" />
            </el-col>
            <el-col :xs="{span: 24}" :sm="{span: 6}" :md="{span: 12}" :lg="{span: 12}" :xl="{span: 12}" >
              <el-input name="complement" v-model="sale.address.complement" autoComplete="on" :placeholder="$t('shopping_car.complement')" />
            </el-col>
            <el-col :xs="{span: 24}" :sm="{span: 6}" :md="{span: 6}" :lg="{span: 6}" :xl="{span: 6}" >
              <el-input name="city" v-model="sale.address.city" autoComplete="on" :placeholder="$t('shopping_car.city')" />
            </el-col>
            <el-col :xs="{span: 24}" :sm="{span: 6}" :md="{span: 6}" :lg="{span: 6}" :xl="{span: 6}" >

            </el-col>
          </el-form-item>
          <el-form-item prop="reference_point" :label="$t('shopping_car.reference_point')">
            <el-input name="reference_point" v-model="sale.address.reference_point" autoComplete="on"  />
          </el-form-item>

          <el-form-item>
            <el-col :span="24" :offset="1" class="pull-right">
              <el-button type="success" size="large" class="green-btn" @click="handleSave"><svg-icon icon-class="tick"></svg-icon>&nbsp;CONFIRMAR PEDIDO</el-button>
            </el-col>
          </el-form-item>
        </el-form>
      </el-col>
      <el-col :xs="{span: 24}" :sm="{span: 8}" :md="{span: 8}" :lg="{span: 8}" :xl="{span: 8}" style="margin-bottom:30px;">
        <div class="priceTotalOfSale">
          <small>Total Liquido:&nbsp;</small>
          <a class="number text-gray30">{{sumSale | numberFormatter(true)}}</a>
        </div>
      </el-col>
    </el-row>

    <loading :is-loading="cepLoading" v-show="cepLoading"></loading>
  </div>
</template>

<script>
    import Loading from '_@/js/components/Loading'
    import { mapGetters } from 'vuex'
    import {buscarCep} from '_@/js/api/remoteSearch'
    import {validateEmail,validateMobileNumber} from '_@/js/utils/validate'

    const ruleEmail = (rule, value, callback) => {
        if (!validateEmail(value)) {
            callback(new Error('Por favor, informe um e-mail valido'))
        } else {
            callback()
        }
    };
    const rulePhoneNumber = (rule, value, callback) => {
        if (value.length < 11 || !validateMobileNumber(value))  {
            callback(new Error('Número DD+WhatsApp. informe por padrão 11 digitos'))
        } else {
            callback()
        }
    };
    export default {
        name: 'saleDetails',
        data(){
            return{
                cepLoading:false,
                emptyGif: 'https://s3.us-east-2.amazonaws.com/eaadk4yfoubad0tmoq3cert/notebooks/giphy_shopping_cart.gif',
                saleRules:{
                    name: [
                        {required: true, trigger: 'blur', message: `obrigatório`},
                        {min: 6, max: 30, message: 'Minímo exigido. Entre 6 caracteres e 30 caracteres.', trigger: 'blur'}
                    ],
                    email: [
                        {required: true, trigger: 'blur', message: `obrigatório`,validator: ruleEmail}
                    ],
                    contact: [
                        {required: true, trigger: 'blur', message: `obrigatório núm.móvel -DD+Whatsapp. `,validator: rulePhoneNumber}
                    ]
                },
                saleAddressRules:{
                    route: [{required: true, trigger: 'blur', message: `obrigatório`}
                    ],
                    number: [
                        {required: true, trigger: 'blur', message: `obrigatório`}
                    ],
                    neighborhood: [
                        {required: true, trigger: 'blur', message: `obrigatório`}
                    ],
                    city: [
                        {required: true, trigger: 'blur', message: `obrigatório`}
                    ],
                    state: [
                        {required: true, trigger: 'blur', message: `obrigatório`}
                    ],
                    postcode: [
                        {required: true, trigger: 'blur', message: `obrigatório`}
                    ]
                }
            }
        },
        components:{Loading},
        computed: {
            ...mapGetters([
                'car_shopping_itens'
            ]),
            sale(){
                return this.$store.state.sale.sale
            },
            sumSale(){
                return this.$store.getters.sumSale
            }
        },
        methods:{
          incrementLine(row){
            this.$store.commit('INCREMENT_LINE',row)
          },
          decrementLine(row){
              this.$store.commit('DECREMENT_LINE',row)
          },
            getCep() {
                this.cepLoading = true;
                buscarCep({cep:this.sale.address.postcode}).then((r)=>{
                    this.cepLoading = false;
                    let result = r.data.result_cep;
                    this.sale.address.postcode = result.cep;
                    this.sale.address.neighborhood = result.bairro;
                    this.sale.address.route = result.logradouro;
                    this.sale.address.city = result.cidade;
                    this.sale.address.state = result.estado;
                }).catch(()=>{
                    this.$message.warning({
                        message: 'CEP! não encontrado',
                        type: 'warning'
                    });
                    this.cepLoading = false;
                });
                console.log('pesquisa cep')
            },
            handleSave(){

                this.$refs.customer.validate(valid => {
                    if(!valid){
                        console.log('customer invalid')
                        this.$message({
                            message: 'Ops! Confirme suas informações pessoais',
                            type: 'warning'
                        });
                    }else{
                        this.$refs.address.validate(valid => {
                            if(valid){
                                this.$store.dispatch(`saveSale`)
                                    .then((response) => {
                                        this.$message.success('Sucesso! Vamos processar o Pedido.');
                                        this.sale.init();
                                    });
                                return;
                            }

                            this.$message({
                                message: 'Ops! Confirme as informações de entrega',
                                type: 'warning'
                            });
                        })
                    }
                })


            }
        },
        created() {
        }
    }
</script>
<style type="text/scss" lang="scss" scoped>
  .priceTotalOfSale{
    font-size: 1.8rem;
    color: #607D8B;
    line-height: 1.42857143;
    -ms-flex-pack: initial;
    justify-content: initial;
    position: relative;
    border-left: 1px dashed;
    padding: 18px;
    top: 6px;
    right: 0;
    min-width: 25%;
  &-green{
     top: 1px!important;
   }
  }
  .el-tag + .el-tag{
    margin-left: 3px;
  }
  table{
    .cell{
      .increment{
        color: green;
      }
      svg{
        width: 1.6rem;
        height: 1.6rem;
      }
    }
  }
</style>
