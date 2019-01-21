import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

/* Layout */
import Layout from '../views/layout/Layout'
import home from '../views/home/index'
import fetchProductsList from '../views/product-offer/listAbstract'
import productDetails from '../views/product-offer/details'
import saleDetails from '../views/shopping-car/details'
import fetchOrdersList from '../views/sale-order/list'

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
        path: '/customerSale',
        component: Layout,
        redirect: '/sale',
        alwaysShow: true, // will always show the root menu
        name: 'customerSale',
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
    },{
        path: '/manageSale',
        component: Layout,
        redirect: '/sale/all',
        alwaysShow: true, // will always show the root menu
        name: 'manageSale',
        meta: {
            title: 'sales',
            icon: 'handshake'
        },
        children: [
            {
                path: '/sale/all',
                components:{default: fetchOrdersList},
                name: 'saleOrders',
                meta: {
                    title: 'all',
                    icon: 'chart'
                }
            }]
    },
    { path: '*', redirect: '/home', hidden: true }
];
