<template>
  <div class="card mt-5">
    <div class="card-header d-flex">
      <p class="col">Inscription</p>
      <router-link :to="{name: 'Login'}" class="col-auto">Se connecter</router-link>
    </div>

    <div class="card-body">
        <form @submit="register">

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Nom complet</label>

                <div class="col-md-6">
                    <input v-model="user.name" id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                </div>
            </div>

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
                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirmation mot de passe</label>

                <div class="col-md-6">
                    <input v-model="user.password_confirmation" id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="current-password_confirmation">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        S'inscrire
                    </button>
                </div>
            </div>
        </form>
    </div>
  </div>
</template>

<script setup>
import store from '../store'
import { useRouter } from 'vue-router'

const user =  {
  name: '', email: '', password: '', password_confirmation: ''
}
const router = useRouter()

function register(ev) {
  ev.preventDefault()
  store.dispatch('register', user).then((res)=> {
    router.push({
      name: 'Dashboard'
    })
  })
}

</script>