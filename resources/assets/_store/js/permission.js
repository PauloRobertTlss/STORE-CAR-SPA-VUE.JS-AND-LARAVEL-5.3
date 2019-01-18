import router from './router'
import store from './store'

router.beforeEach((to, from, next) => {
    store.commit('SET_LOADING',true);
    if(!store.getters.permission_routers) {
        store.dispatch('GenerateRoutes', {}).then(() => { // roles
            router.addRoutes(store.getters.addRouters); //
            next({...to, replace: true}) //
        })
    }
      next()

});

router.afterEach(() => {
    store.commit('SET_LOADING',false);
   // finish loading bar
});
