import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

/* Layout */
import Layout from '../views/layout/Layout'
import home from '../views/home/index'
import fetchProductsList from '../views/product-offer/list'

export const constantRouterMap = [
    {
        path: '',
        component: Layout,
        redirect: 'home',
        children: [{
            path: 'home',
            component: home,
            name: 'home',
            meta: { title: 'home', icon: 'home', noCache: true }
        }]
    }
];

export default new Router({
    //mode: 'history', // require service support
    scrollBehavior: () => ({ y: 0 }),
    routes: constantRouterMap
})

export const asyncRouterMap = [
    {
        path: '/manageProducts',
        component: Layout,
        redirect: '/fetchProductsList',
        alwaysShow: true, // will always show the root menu
        name: 'manageProducts',
        meta: {
            title: 'products',
            icon: 'cash-machine'
        },
        children: [
            {
                path: '/offers',
                components:{default: fetchProductsList},
                name: 'fetchProductsList',
                meta: {
                    title: 'billReceives',
                    icon: 'cash-machine',
                    roles: ['manage.billreceives']
                }
            },
            {
                path: '/products/:id/details',
                components:{default: fetchProductsList},
                name: 'productShow',
                meta: {
                    title: 'details',
                    icon: 'cash-machine',
                },
                props: true,
                params: {
                    id: null
                },
                hidden: true
            }]
    },
    { path: '*', redirect: '/home', hidden: true }
];
