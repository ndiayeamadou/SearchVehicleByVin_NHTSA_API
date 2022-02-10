import { createStore } from 'vuex'
import axiosClient from '../axios'

const store = createStore({
    state: {
        user: {
            data: {},
            token: sessionStorage.getItem("TOKEN")
        },
        keyword: ''
    },

    getters: {},

    actions: {
        register({commit}, user) {
            return axiosClient.post('/register', user)
            .then(({data})=> {
                commit('setUser', data)
                return data
            })
        },
        login({commit}, user) {
            return axiosClient.post('/login', user)
                            .then(({data})=> {
                                commit('setUser', data)
                                return data
                            })
        },
        logout({commit}) {
            return axiosClient.post('/logout')
            .then( (response)=> {
                commit('logout')
                return response
            })
        },
        rechercher({commit}, keyword) {
            return axiosClient.get(`/vehicle/search/${keyword}`, {params: { keyword: this.keyword } })
                .then((response)=> {
                    commit('rechercher')
                    return response
                })
        }
    },

    mutations: {
        logout: (state) => {
            state.user.data = {}
            state.user.token = null
            sessionStorage.removeItem('TOKEN')
        },
        setUser: (state, userData) => {
            state.user.token = userData.token
            state.user.data = userData.user
            sessionStorage.setItem('TOKEN', userData.token)
        },
        rechercher: (state, s) => {
            state.keyword = s.keyword
        }
    },

    modules: {}
})

export default store