<template>
  <div class="card">
    <div class="card-header justify-content-between">
        <p>Connexion</p>
        <router-link :to="{name: 'Register'}">S'inscrire gratuitement</router-link>
    </div>

    <div class="card-body">
        <form method="" action="">

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">

                        <label class="form-check-label" for="remember">
                            Remember Me
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

<script>
export default {
  
}
</script>