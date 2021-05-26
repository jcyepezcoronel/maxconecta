<template>
<div>
  <form class="row g-3 needs-validation" novalidate>
    <div class="col-md-4">
      <label for="validationCustom01" class="form-label">Nombres</label>
      <input type="text" class="form-control" v-model="form.names" id="names" value="" required />
      <div class="invalid-feedback">Este campo es requerido</div>
    </div>
    <div class="col-md-4">
      <label for="validationCustom02" class="form-label">Apellidos</label>
      <input type="text" class="form-control" v-model="form.surnames" id="surnames" value="" required />
      <div class="invalid-feedback">Este campo es requerido</div>
    </div>
    <div class="col-md-4">
      <label for="validationCustom02" class="form-label"
        >Nro de Identificación</label
      >
      <input type="text" class="form-control" v-model="form.dni" id="dni" value="" required />
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

    <div class="col-12">
      <button class="btn btn-outline-dark" type="button" @click="validar">
        REGISTRAR
      </button>
    </div>
  </form>
</div>
</template>

<script>
import $ from 'jquery'
import axios from "axios";
export default {
    data: (vm) => ({
        form: {
            names: null,
            surnames: null,
            dni: null,
            description: null
        }
  }),
  mounted() {
    console.log("Component mounted.");     
  },
  methods: {
    validar() {
        const vm = this,
        forms = document.querySelectorAll(".needs-validation");
      // Loop over them and prevent submission
      Array.prototype.slice.call(forms).forEach(function (form) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
          form.classList.add("was-validated");
        } else {
          vm.registrar();
        }
      });
    },
    registrar() {
        console.log('registrar form', this.form);
        axios["post"]("/api/clients/store", this.form, {
        headers: {
          "Content-Type": "application/json",
          //   Authorization: vm.$auth.strategy.token.get(),
        },
      })
        .then((res) => {
          // console.log("registrar", res.data.response);         
          $('#modal-body').html(res.data.response);
          $('#launchNotication').click();
          $('#modal-close').on('click', () => {
            window.location.href = '/clientes';
          })
        })
        .catch((error) => {
          console.log("registrar", error);
        });
    }
  },
};
</script>
