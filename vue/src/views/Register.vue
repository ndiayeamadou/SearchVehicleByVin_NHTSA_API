<template>
  <div class="card">
    <div class="card-header">
      <p>Inscription</p>
      <router-link :to="{name: 'Login'}">Se connecter</router-link>
    </div>

    <div class="card-body">
        <form method="" action="">

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Addresse email</label>

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
                    <input v-model="user.password_confirmation" id="password_confirmation" type="password_confirmation" class="form-control" name="password_confirmation" required autocomplete="current-password_confirmation">
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

const user =  {
  email: '', password: '', password_confirmation: ''
}

</script>