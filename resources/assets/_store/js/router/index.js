import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

/* Layout */
import Layout from '../views/layout/Layout'
import home from '../views/home/index'
import fetchProductsList from '../views/product-offer/list'
import productDetails from '../views/product-offer/details'
import saleDetails from '../views/shopping-car/details'

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
    scrollBehavior: (to, from, savedPosition) => (
        { y: 0 }
        ),
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
            icon: 'shopping-online'
        },
        children: [
            {
                path: '/offers',
                components:{default: fetchProductsList},
                name: 'fetchProductsOffersList',
                meta: {
                    title: 'offers',
                    icon: 'coupon'
                }
            },{
                path: '/all',
                components:{default: fetchProductsList},
                name: 'fetchProductsList',
                meta: {
                    title: 'search',
                    icon: 'shopping-online'
                }
            },
            {
                path: '/products/:id/details',
                components:{default: productDetails},
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
        path: '/manageSale',
        component: Layout,
        redirect: '/sale',
        alwaysShow: true, // will always show the root menu
        name: 'manageSale',
        meta: {
            title: 'sale',
            icon: 'cash-machine'
        },
        children: [
            {
                path: '/sale',
                components:{default: saleDetails},
                name: 'saleShow',
                meta: {
                    title: 'delivery',
                    icon: 'trolley',
                    badge: true
                }
            }]
    },
    { path: '*', redirect: '/home', hidden: true }
];
