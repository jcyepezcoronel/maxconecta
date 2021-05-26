<template>
  <div>
    <form class="row g-3 needs-validation" novalidate>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Cliente</label>
        <select v-model="form.client_id" id="category_id" class="form-select" aria-label="Clientes" required>
          <option selected value="">Seleccione</option>
          <option v-for="(client, index) in clients" :key="index" :value="client.id" :selected="form.client_id == client.id ? true : false">{{client.names}}</option>
        </select>
        <div class="invalid-feedback">Este campo es requerido</div>
      </div>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Pelicula</label>
        <select v-model="form.movie_id" id="category_id" class="form-select" aria-label="Peliculas" required>
          <option selected value="">Seleccione</option>
          <option v-for="(movie, index) in movies" :key="index" :value="movie.id" :selected="form.movie_id == movie.id ? true : false">{{movie.title}}</option>
        </select>
        <div class="invalid-feedback">Este campo es requerido</div>
      </div>

      <div class="col-md-12">
        <label for="validationCustom02" class="form-label">Descripción</label>
        <input
          type="text"
          class="form-control"
          v-model="form.description"
          id="description"
          value=""
          required
        />
        <div class="invalid-feedback">Este campo es requerido</div>
      </div>
      <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Fecha de Inicio</label>
        <div class='input-group date' id='datetimepicker'>
        <input type='text' class="form-control" />
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-calendar"></span>
        </span>
        </div>
        <div class="invalid-feedback">Este campo es requerido</div>
      </div>
      <div class="col-md-2">
        <label for="validationCustom02" class="form-label">Copias</label>
        <select v-model="form.number_copies" id="category_id" class="form-select" aria-label="Copias" required>
          <option selected value="">Seleccione</option>
          <option v-for="n in 1000" :key="n" :value="n">{{n}}</option>
        </select>
        <div class="invalid-feedback">Este campo es requerido</div>
      </div>

      <div class="col-12">
        <button
          v-if="mode == 'register'"
          class="btn btn-outline-dark"
          type="button"
          @click="validar"
        >
          REGISTRAR
        </button>
        <button
          v-if="mode == 'edit'"
          class="btn btn-outline-dark"
          type="button"
          @click="validar"
        >
          EDITAR
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import $ from "jquery";
import axios from "axios";
export default {
  props: ["data", "mode"],
  data: (vm) => ({
    categories: [],
    clients: [],
    movies: [],
    image: null,
    form: {
      client_id: null,
      movie_id: null,
      year: null,
      image: null,
      number_copies: null,
      description: null,
    },
  }),
  computed : {
    years () {
      const year = new Date().getFullYear()
      return Array.from({length: year - 1900}, (value, index) => 1901 + index)
    }
  },
  mounted() {
    console.log("Component mounted.", this.mode, this.data);
    this.getMovies();
    this.getClients();
     $('.date').datepicker({  
       format: 'mm-dd-yyyy'
     });
    if (this.mode == "edit") {
      this.form = this.data;
    }
  },
  methods: {
    async validar() {
      const vm = this,
        forms = document.querySelectorAll(".needs-validation");

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms).forEach(function (form) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
          form.classList.add("was-validated");
        } else {
          const file = document.getElementById("imagen").files[0],
            reader = new FileReader();
          reader.onload = function (e) {
            vm.form.image = e.target.result;
            vm.procesar();
          };
          reader.readAsDataURL(file);
        }
      });
    },
    procesar() {
      console.log("registrar form", this.form);
      let method, url;

      if (this.mode == "register") {
        method = "post";
        url = "/api/movies/store";
      }

      if (this.mode == "edit") {
        method = "post";
        url = "/api/movies/update";
      }
      axios[method](url, this.form, {
        headers: {
          "Content-Type": "application/json",
          //   Authorization: vm.$auth.strategy.token.get(),
        },
      })
        .then((res) => {
          // console.log("registrar", res.data.response);
          $("#modal-body").html(res.data.response);
          $("#launchNotication").click();
          $("#modal-close").on("click", () => {
            window.location.href = "/peliculas";
          });
        })
        .catch((error) => {
          console.log("registrar", error);
        });
    },
    getMovies() {
      const vm = this;
      axios['get']('/api/movies/list', {
        headers: {
          "Content-Type": "application/json",
          //   Authorization: vm.$auth.strategy.token.get(),
        },
      })
        .then((res) => {
          // console.log('movies', res.data.response)
          vm.movies = res.data.response;   
        })
        .catch((error) => {
          console.log("registrar", error);
        });
    },
    getClients() {
      const vm = this;
      axios['get']('/api/clients/list', {
        headers: {
          "Content-Type": "application/json",
          //   Authorization: vm.$auth.strategy.token.get(),
        },
      })
        .then((res) => {
          // console.log('movies', res.data.response)
          vm.clients = res.data.response;   
        })
        .catch((error) => {
          console.log("registrar", error);
        });
    },
  },
};
</script>
