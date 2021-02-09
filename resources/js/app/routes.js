import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './Home';
import Login from './Login';
import Cliente from './Cliente';
Vue.use(VueRouter);

export const routes = [{
        path: '/',
        component: Home,
    },
    {
        path: '/login',
        component: Login,
    }, {
        path: '/cliente',
        component: Cliente,
    }

]