import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

export const store = new Vuex.Store({

    state: {
        token: localStorage.getItem('auth') || '',
    },
    mulations: {
        setToken(state, token) {
            localStorage.setItem('auth', token)
            state.token = token
        },
    }

});