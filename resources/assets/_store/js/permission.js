import router from './router'

router.beforeEach((to, from, next) => {
    /* has no token*/
    if (whiteList.indexOf(to.path) !== -1) {
      next()
    } else {
      next('/');

    }

});

router.afterEach(() => {
   // finish progress bar
});
