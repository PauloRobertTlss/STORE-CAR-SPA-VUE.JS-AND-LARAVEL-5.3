import { getInfo,fetchList} from '_@/js/api/resources'
import SearchOptions from '_@/js/services/search-options';
import moment from 'moment';
import _ from "lodash";

export default () => {
    const state = {
        api: null,
        IDCurrent: null,
        entityCurrent:{data:null},
        entities: [],
        searchOptions: new SearchOptions()
    };
    const mutations  = {
        SET_ID_ENTITY_CURRENT: (state, ID) => {
            state.IDCurrent = ID
            if(ID ===null){
                state.entityCurrent = {data:null}
            }
        },
        SET_ENTITIES: (state, data) => {
                state.entities = data
        },
        ONION_ENTITIES: (state, data) => {
            state.entities = _.union(state.entities, data);
        },
        SET_ENTITY_FILTER: (state, filter) => {
            state.searchOptions.search = filter;
        },
        SET_ENTITY_ORDER: (state,key ) => {
            state.searchOptions.order.key = key;
            let sort = state.searchOptions.order.sort;
            state.searchOptions.order.sort = sort == 'desc' ? 'asc' : 'desc';
        },
        SET_ENTITY_LIMIT: (state,limit ) => {
            state.searchOptions.limit = limit;
        },
        SET_ENTITY_PAGINATION: (state,pagination ) => {
            state.searchOptions.pagination = pagination;
        },
        SET_ENTITY_CURRENT_PAGE: (state,currentPage) => {
            state.searchOptions.pagination.current_page = currentPage;
        },
        SET_ENTITY_NEXT_PAGE: (state) => {
            if(state.entities.length < state.searchOptions.pagination.total) {
                state.searchOptions.pagination.current_page = (state.searchOptions.pagination.current_page + 1);
            }
        },
        SET_ENTITY_SORT: (state,sort) => {
            state.searchOptions.order.sort = sort;
        }
    };
    const actions = {
        get({commit,state}){
            return getInfo(state.api,state.IDCurrent).then(response => {
                state.entityCurrent = response.data.data
                return response
            }).catch((e) => {

            })
        },
        query({commit,state}) {
            let searchOptions = state.searchOptions;


            return new Promise((resolve, reject) => {
                return fetchList(state.api,searchOptions.createOptions(),
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
                    commit('SET_ENTITIES', response.data.data);
                    commit('SET_ENTITY_PAGINATION', response.data.meta.pagination);

                    resolve(response);
                });
            });

        },
        union({commit,state}) {
            let searchOptions = state.searchOptions;
            if(state.entities.length < state.searchOptions.pagination.total) {
                return new Promise((resolve, reject) => {
                    return fetchList(state.api,searchOptions.createOptions(),
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
                        commit('ONION_ENTITIES', response.data.data);
                        commit('SET_ENTITY_PAGINATION', response.data.meta.pagination);

                        resolve(response);
                    });
                });
            }else{
                commit('SET_ENTITY_CURRENT_PAGE',state.searchOptions.pagination.current_page--)
            }

        }
    }

    const module = {
        namespaced: true,
        state,
        mutations,
        actions

    };

    return module;
}