<template>
  <div class="d-flex mt-5 col-md-6 offset-3">
      <input v-model="keyword" class="form-control me-2" type="text" placeholder="Rechercher un NIV" aria-label="Search">
      <button @click="getResult(keyword)" class="btn btn-outline-success" type="submit">Rechercher</button>
  </div>
</template>

<script>
import store from '../store'
import { ref } from 'vue'
import swal from 'sweetalert'
import { useRouter } from 'vue-router'
import axios from 'axios'

export default {
  data() {
    return {
      keyword : null,
      Vehicles : []
    }
  },
  watch: {
    keyword(after, before) {
      this.getResult()
    }
  },
  methods: {
    getResult(vin) {
      axios.get(`http://localhost:8000/vehicle/search/${vin}`, {params: { vin: this.keyword } })
          .then(()=>{
            console.log("success");
          })
          //.then((res => this.Vehicles = res.data))
          //.catch(error => {
          //  console.log(error.response.data.error);
          //})
    }
  }

}

/* 
let errorMsg = ref('')
const keyword = ''
const router = useRouter()

function rechercher(ev) {
  ev.preventDefault()

  store.dispatch('rechercher', keyword)
    .then(()=> {
      router.push({
        name: 'Dashboard'
      })
    })
    .catch(err => {
      errorMsg.value = err.response.data.error
      swal({
          title: "Note",
          text: errorMsg.value,
          icon: "error"
      })
    })
}
 */
</script>
