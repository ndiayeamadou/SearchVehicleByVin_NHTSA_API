<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid d-flex">
            <a class="navbar-brand" href="#">Test</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <ul class="col-10">
            </ul>

            <div class="col-auto">
                <ul class="navbar-nav me-5">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ user.name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" @click="logout">Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <router-view></router-view>
    </div>
</template>

<script>
import { useStore } from "vuex"
import { computed } from "vue"
import { useRouter } from "vue-router"

export default {
    setup() {
        const store = useStore()
        const router = useRouter()

        /* function logout() {
            store.commit('logout')
            router.push({
                name: 'Login'
            })
        } */
        function logout() {
            store.dispatch('logout')
            .then( ()=> {
                router.push({
                name: 'Login'
                })
            })
        }

        return {
            user : computed(()=> store.state.user.data),
            logout
        }
    }
}
</script>

<style>

</style>