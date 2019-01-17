
import { fetchList,getInfo} from '_@/js/api/PRODUCTS'
import SearchOptions from '_@/js/services/search-options';

const product = {
    state: {
        IDCurrent: null,
        product: {name:`Teste`},
        PRODUCTS: [],
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
            state.products = data
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
        SET_PRODUCT_SORT: (state,sort) => {
            state.searchOptions.order.sort = sort;
        }

    },
    actions: {
        getProduct({commit,state}){
            return getInfo(state.IDCurrent).then(response => {
                state.productCurrent = response.data.data
                return response
            }).catch((e) => {

            })
        },
        queryProducts({commit,state}) {
            let searchOptions = state.searchOptions;
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
                    commit('SET_PRODUCTS', response.data.data);
                    resolve(response);
                });
            });
        }
    }
};

export default product
