import router from './router'
import store from './store'

router.beforeEach((to, from, next) => {

    store.dispatch('GenerateRoutes', {}).then(() => { // roles
        router.addRoutes(store.getters.addRouters); //
        next({ ...to, replace: true }) //
    })
      next()

});

router.afterEach(() => {
   // finish progress bar
});
