<template>
  <div class="card mt-5">
    <div class="card-header d-flex">
        <p class="col">Connexion</p>
        <router-link :to="{name: 'Register'}" class="col-auto">S'inscrire gratuitement</router-link>
    </div>

    <div class="card-body">
        <form @submit="login">

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Adresse email</label>

                <div class="col-md-6">
                    <input v-model="user.email" id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>

                <div class="col-md-6">
                    <input v-model="user.password" id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input v-model="user.remember" class="form-check-input" type="checkbox" name="remember" id="remember">

                        <label class="form-check-label" for="remember">
                            Se souvenir de moi
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Se connecter
                    </button>
                </div>
            </div>
        </form>
    </div>
  </div>
</template>

<script setup>
    import { useRouter } from 'vue-router'
    import store from '../store'
    import { ref } from "vue"
    import swal from 'sweetalert'

    const router = useRouter()
    const user = {
        email: '', password: '', remember: false
    }

    let errorMsg = ref('')

    function login(ev) {
        ev.preventDefault()

        store.dispatch('login', user)
            .then( ()=> {
                router.push({
                    name: 'Dashboard'
                })
            }).catch(err => {
                errorMsg.value = err.response.data.error
                //swal("Error", errorMsg.value, "error")
                swal({
                    title: "Erreur. Veuillez fournir les bonnes informations.",
                    text: errorMsg.value,
                    icon: "error"
                })
            })
    }

</script>