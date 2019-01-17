import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

/* Layout */
import Layout from '../views/layout/Layout'
import dashboard from '../views/home/index'

export const constantRouterMap = [
    {
        path: '',
        component: Layout,
        redirect: 'dashboard',
        children: [{
            path: 'dashboard',
            component: dashboard,
            name: 'dashboard',
            meta: { title: 'dashboard', icon: 'dashboard', noCache: true }
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
                components:{default: productShow},
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
    {
        path: '/error',
        component: Layout,
        redirect: 'noredirect',
        name: 'errorPages',
        meta: {
            title: 'errorPages',
            icon: '404'
        },
        children: [
            { path: '401', component: errorPage401, name: 'page401', meta: { title: 'page401', noCache: true }},
            { path: '404', component: errorPage404, name: 'page404', meta: { title: 'page404', noCache: true }}
        ]
    },
    { path: '*', redirect: '/404', hidden: true }
];
