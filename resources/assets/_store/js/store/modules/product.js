
import { fetchList,getInfo} from '_@/js/api/products'
import SearchOptions from '_@/js/services/search-options';
import _ from 'lodash'
import store from "../index";
const product = {
    state: {
        IDCurrent: null,
        productCurrent: {name:`Teste`},
        products: [],
        searchOptions: new SearchOptions()
    },
    mutations: {
        SET_ID_PRODUCT_CURRENT: (state, ID) => {
            state.IDCurrent = ID
            if(ID ===null){
                state.productCurrent = {name:`Teste`}
            }
        },
        SET_PRODUCTS: (state, data) => {
            if(data.length) {
                state.products = data
            }
        },
        ONION_PRODUCTS: (state, data) => {
            console.log('befone products ['+state.products.length+']')
            state.products = _.union(state.products, data);
            console.log('after products ['+state.products.length+']')
        },
        SET_PRODUCT_FILTER: (state, filter) => {
            state.searchOptions.search = filter;
        },
        SET_PRODUCT_ORDER: (state,key ) => {
            state.searchOptions.order.key = key;
            let sort = state.searchOptions.order.sort;
            state.searchOptions.order.sort = sort == 'desc' ? 'asc' : 'desc';
        },
        SET_PRODUCT_LIMIT: (state,limit ) => {
            state.searchOptions.limit = limit;
        },
        SET_PRODUCT_PAGINATION: (state,pagination ) => {
            state.searchOptions.pagination = pagination;
        },
        SET_PRODUCT_CURRENT_PAGE: (state,currentPage) => {
            state.searchOptions.pagination.current_page = currentPage;
        },
        SET_PRODUCT_NEXT_PAGE: (state) => {
            if(state.products.length < state.searchOptions.pagination.total) {
                state.searchOptions.pagination.current_page = (state.searchOptions.pagination.current_page + 1);
                console.log('proxima pagina', state.searchOptions.pagination.current_page)
            }
        },
        SET_PRODUCT_SORT: (state,sort) => {
            state.searchOptions.order.sort = sort;
        }

    },
    actions: {
        getProduct({commit,state}){
            commit('SET_LOADING',true);
            return getInfo(state.IDCurrent).then(response => {
                state.productCurrent = response.data.data
                commit('SET_LOADING',false);
                return response
            }).catch((e) => {

            })
        },
        queryProducts({commit,state}) {
            let searchOptions = state.searchOptions;

            commit('SET_LOADING',true);
                return new Promise((resolve, reject) => {
                    return fetchList(searchOptions.createOptions(),
                        {
                            //use before callback
                            before(request) {
                                //abort previous request, if exists
                                if (this.previousRequest) {
                                    this.previousRequest.abort();
                                }
                                //set previous request on Vue instance
                                this.previousRequest = request;
                            }
                        }
                    ).then(response => {
                        commit('SET_PRODUCTS', response.data.data);
                        commit('SET_PRODUCT_PAGINATION', response.data.meta.pagination);
                        commit('SET_LOADING',false);
                        resolve(response);
                    });
                });

        },
        unionProducts({commit,state}) {
            let searchOptions = state.searchOptions;
            if(state.products.length < state.searchOptions.pagination.total) {
            return new Promise((resolve, reject) => {
                return fetchList(searchOptions.createOptions(),
                    {
                        //use before callback
                        before(request) {
                            //abort previous request, if exists
                            if (this.previousRequest) {
                                this.previousRequest.abort();
                            }
                            //set previous request on Vue instance
                            this.previousRequest = request;
                        }}
                ).then(response => {

                    commit('ONION_PRODUCTS', response.data.data);
                    commit('SET_PRODUCT_PAGINATION', response.data.meta.pagination);
                    commit('SET_LOADING',false);
                    resolve(response);
                });
            });
            }else{
                console.log('já carregamos todos os produtos desta pagina' ,state.searchOptions.pagination.current_page)
                commit('SET_PRODUCT_CURRENT_PAGE',state.searchOptions.pagination.current_page--)
            }

        }
    }
};

export default product
