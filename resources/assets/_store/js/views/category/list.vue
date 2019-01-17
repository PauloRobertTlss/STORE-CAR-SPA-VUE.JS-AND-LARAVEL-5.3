<template>
  <div class="app-container">
    <el-row :gutter="24">
        <el-col :span="12" :md="12" :lg="12">
            <el-input id="searchText" type="text" v-model="search" name="searchText" placeholder="Search"></el-input>
        </el-col>
        <el-col :span="6"  :md="4" :lg="4">
            <el-button class="right" type="default" icon="el-icon-plus" @click="dialogFormVisible = true">Novo</el-button>
        </el-col>
        
    </el-row>
    
    <el-row :gutter="24" >
        <el-col :span="24" class="item">
        <el-table :data="companies" v-loading="listLoading" border fit highlight-current-row style="width: 100%">

            <el-table-column align="center" label="ID" width="80">
              <template slot-scope="scope">
                <span>{{scope.row.cid}}</span>
              </template>
            </el-table-column>

      <el-table-column width="180px" align="center" label="Date">
        <template slot-scope="scope">
         <span>{{scope.row.created_at | parseTimeBr('{y}-{m}-{d} {h}:{i}')}}</span>
        </template>
      </el-table-column>
   
      <el-table-column min-width="300px" label="Nome">
        <template slot-scope="scope">
          <template v-if="scope.row.edit">
            <el-input class="edit-input" size="small" v-model="scope.row.name"></el-input>
            <el-button class='cancel-btn' size="small" icon="el-icon-refresh" type="warning" @click="cancelEdit(scope.row)">cancel</el-button>
          </template>
          <span v-else>{{ scope.row.name }}</span>
        </template>
      </el-table-column>
      <el-table-column min-width="80px" align="center" label="Ativo">
      <template slot-scope="scope">
        <el-switch
            v-model="scope.row.enabled"
            active-color="#13ce66"
            inactive-color="#ff4949" disabled>
        </el-switch>
       </template>
      </el-table-column>

      <el-table-column align="center" label="Ações" width="120" v-if="checkPermission(['edit.users'])">
        <template slot-scope="scope">
          <el-button v-if="scope.row.edit" type="success" @click="confirmEdit(scope.row)" size="small" icon="el-icon-circle-check-outline">Ok</el-button>
          <!--<el-button v-else type="primary" @click='scope.row.edit=!scope.row.edit' size="small" icon="el-icon-edit">Editar</el-button>-->
          <el-button v-else type="primary" @click="confirmEdit(scope.row)" size="small" icon="el-icon-edit">Editar</el-button>

            </template>
            </el-table-column>
        </el-table>
    </el-col>
</el-row>
        
    
<!-- Form -->
    <el-row :gutter="24">
        <el-col :span="24">
        <el-dialog title="Nova Empresa" :visible.sync="dialogFormVisible">
          <el-form ref="contactForm" :model="contactForm" autoComplete="on" :rules="contactRules" label-position="top">
                <el-row :gutter="24">
                <el-col :span="16">
                        <el-form-item label="Nome" :label-width="formLabelWidth" prop="name">
                            <el-input type="text" name="name" v-model="contactForm.name" auto-complete="off"></el-input>
                        </el-form-item>
                </el-col>
                </el-row>
                <el-row :gutter="24">
                <el-col :span="24">
                        <multiselect v-model="company"
                                id="ajax" label="name" track-by="id" placeholder="search" 
                                open-direction="bottom" :options="companiesOptions" :multiple="false" 
                                :searchable="true" :loading="isLoadingAjax" :internal-search="true" 
                                :clear-on-select="true" 
                                :close-on-select="false" 
                                :options-limit="300" :limit="10" :limit-text="limitText" :max-height="600" 
                                :show-no-results="false" :hide-selected="false"
                                @search-change="asyncFind">
                      <template slot="clear" slot-scope="props">
                        <div class="multiselect__clear" v-if="companiesOptions.length" @mousedown.prevent.stop="clearAll(props.search)"></div>
                      </template>
                        <span slot="noResult">Oops! não encontramos nada.</span>
                    </multiselect>
                </el-col>
                </el-row>
                <el-row :gutter="24">
                    <el-col :span="16">
                    <el-form-item label="E-mail" prop="email">
                        <el-input name="email" type="email" v-model="contactForm.email"></el-input>
                    </el-form-item>
                    </el-col>
                    <el-col :span="8">
                        <el-form-item label="Telefone" prop="phone_number">
                        <el-input name="phone_number" type="text" v-model="contactForm.phone_number"></el-input>
                    </el-form-item>
                    </el-col>
                </el-row>
                <el-row :gutter="24">
         </el-row>
            <el-row :gutter="24">
                <el-col :span="24">
                        <multiselect
                                v-model="taggingSelected"
                                :options="taggingOptions"
                                :multiple="true"
                                :taggable="true"
                                @tag="addTag"
                                tag-placeholder="Add this as new tag"
                                label="title"
                                track-by="code">
                    </multiselect>
                </el-col>
                </el-row>
         </el-form>
          <span slot="footer" class="dialog-footer">
            <el-button @click="dialogFormVisible = false">Cancel</el-button>
            <el-button type="info" @click.native.prevent="handleSave">{{$t('user.created')}}</el-button>
            <el-button type="primary" @click.native.prevent="handleSaveAndEdit">{{$t('user.created_and_edit')}}</el-button>
          </span>
        
        </el-dialog>
        </el-col>
    </el-row>
  </div>
</template>

<script>
import { fetchList } from '../../api/companies'
import checkPermission from '../../utils/permission'
import { validateEmail } from '../../utils/validate'
import Multiselect from 'vue-multiselect'
import 'vue-multiselect/dist/vue-multiselect.min.css'

export default {
  name: 'companiesList',
  components:{Multiselect},
  data() {
    const validateUsername = (rule, value, callback) => {
      if (!validateEmail(value)) {
        callback(new Error('Por favor, informe um e-mail valido'))
      } else {
        callback()
      }
    };
    const validatePassword = (rule, value, callback) => {
      if (value.length < 6) {
        callback(new Error('Credênciais incorretas. informe por padrão 06 digitos'))
      } else {
        callback()
      }
    };
    const validatePhoneNumber = (rule, value, callback) => {
      if (value.length < 11) {
        callback(new Error('Número de contato incorretas. informe por padrão 11 digitos'))
      } else {
        callback()
      }
    };

    return {
      search:'',
      formLabelWidth: '15px',
      dialogFormVisible: false,
      contactForm: {
        name: '', email: '', phone_number: '',tags:[]
      },
      contactRules: {
        email: [{ required: true, trigger: 'blur', validator: validateUsername }],
        phone_number: [{ required: true, trigger: 'blur', validator: validatePhoneNumber }],
        password: [{ required: true, trigger: 'blur', validator: validatePassword }]
      },
      loading: false,
      listLoading: true,
      isLoadingAjax:false,
      taggingSelected: [],
      taggingOptions: [],
      companiesOptions: [],
    }
  },
  computed:{
    companies() {
        return this.$store.state.company.companies;
      }
  },
  created() {
    this.getList()
  },
  watch: {
        search(after, before) {
            if (this.search.length ==1 && after.length > 4) return;
           if(after.length > before.length && (after.length > 3 && after.length < 13)){
            this.$store.commit('SET_COMPANY_FILTER',after);
            this.$store.dispatch('queryCompanies')
           }
           }
  },
  methods: {
    checkPermission,
    getList() {
      this.listLoading = true;
      this.$store.commit('SET_COMPANY_FILTER','');
      this.$store.dispatch('queryCompanies').then(()=>{
              this.listLoading = false
        }).catch(()=>{this.listLoading = false});
    },
    cancelEdit(row) {
      row.title = row.originalTitle;
      row.edit = false;
      this.$message({
        message: 'The title has been restored to the original value',
        type: 'warning'
      })
    },
    confirmEdit(row) {
      this.$store.commit('SET_CID_COMPANY_CURRENT', row.cid);
        this.$store.dispatch('getCompanyCurrent', row.cid);
      this.$router.push({ name: 'companyIndex', params: { id: row.cid }});
      row.edit = false
    },
    viewRolesTitle(t) {
      return `+${t - 1}`
    },
    handleSave() {
      this.$refs.contactForm.validate(valid => {
        if (valid) {
          this.loading = true;
          this.contactForm.tags = this.taggingSelected;
          this.$store.dispatch('storeCompany', this.contactForm).then((e) => {
            this.loading = false;
            this.$message({
              message: 'Sucesso! Gravamos isso',
              type: 'success'
            });
            this.getList();
            this.dialogFormVisible = false
          }).catch((e) => {
            console.log('login catch', e);
            this.loading = false
          });
          this.$message({
            message: 'Formulário! Bem ',
            type: 'success'
          })
        } else {
          this.$message({
            message: 'Formulário! Preenchar corretamente suas informações',
            type: 'warning'
          });
          return false
        }
      })
    },
    limitText(count) {
      return `and ${count} other checkList`
    },
    addTag (newTag) {
          const tag = {
            title: newTag,
            code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
          };
          this.taggingOptions.push(tag);
          this.taggingSelected.push(tag)
    }
  }
}
</script>

<style rel="stylesheet/css" lang="css">
    .item {
      margin-top: 10px;
      margin-right: 40px;
    }
    sup.el-badge__content.is-fixed {
        background-color: #a5ecd3!important;
        color: #9E9E9E;
    }
</style>
