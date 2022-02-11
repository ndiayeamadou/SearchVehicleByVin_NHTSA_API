<template>
  <div class="d-flex mt-5 col-md-6 offset-3">
      <input v-model="keyword" class="form-control me-2" type="text" placeholder="Rechercher un NIV" aria-label="Search">
      <button @click="getResult(keyword)" class="btn btn-outline-success" type="submit">Rechercher</button>
  </div>
  <div class="mt-5">
    <div class="table-responsive">
      <table id="vehicleTable" class="table table-borderer">
        <thead>
          <tr>
            <th>ID</th><th>NIV</th><th>Marque</th><th>Model</th><th>Type de véhicule</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="vehicle in Vehicles">
            <td>{{ vehicle.id }}</td>
            <td>{{ vehicle.vin }}</td>
            <td>{{ vehicle.make }}</td>
            <td>{{ vehicle.model }}</td>
            <td>{{ vehicle.vehicle_type }}</td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
</template>

<script>
import store from '../store'
import { ref } from 'vue'
import swal from 'sweetalert'
import { useRouter } from 'vue-router'
import axios from 'axios'
import $ from 'jquery'
import axiosClient from '../axios'

export default {
  data() {
    return {
      keyword : null,
      Vehicles : []
    }
  },
  mounted() {
    this.loadVehicles()
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
            swal({
                title: "Succès",
                text: "Les données du véhicule sont bien enregistrées !",
                icon: "success"
            })
            this.loadVehicles()
          })
          //.then((res => this.Vehicles = res.data))
          .catch(error => {
            console.log(error.response.error);
            swal({
              title:  "Note",
              text:   error.response.data.error,
              icon:   "error"
            })
          })
    },
    vehicledtable() {
      this.$nextTick(()=> {
        $('#vehicleTable').DataTable()
      })
    },
    loadVehicles() {
      axiosClient.get('/vehicle')
        .then((response) => {
          console.log(response.data.data[1]['vin'])
          this.Vehicles = response.data.data
          $('#vehicleTable').DataTable().destroy()
          this.vehicledtable()
          //$("#vehicleTable").DataTable({
            /* data: response.data.data,
            columns: [
              {data: 'id'},
              {data: 'vin'}
            ], */
          //})
        }).catch((error) => console.log(error.response))
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
