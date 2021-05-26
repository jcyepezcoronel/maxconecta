<template>
  <div class="table-responsive tableFixHead">
    <table class="table">
      <tbody>
        <tr v-for="(item, index) in data" :key="index">
          <th class="col-1">{{ index + 1 }}</th>
          <td class="col-2">{{ item.names }}</td>
          <td class="col-2">{{ item.surnames }}</td>
          <td class="col-2">{{ item.dni }}</td>
          <td class="col-3">{{ item.description }}</td>
          <td class="col-2 text-center">
            <a class="btn btn-outline-dark p-0" style="border: none;" :href="'/cliente/editar/'+item.id" role="button"><i class="bi bi-pencil-square bi-light" style="font-size: 13pt;"></i></a>   
            <a class="btn btn-outline-dark p-0" style="border: none;" href="#" @click="del(item)" role="button"><i class="bi bi-trash" style="font-size: 13pt;"></i></a>  
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import $ from 'jquery'
import axios from "axios";
export default {
  data: (vm) => ({
    data: [],
  }),
  methods: {
    loadData() {
      const vm = this;
      console.log("loadData");
      axios["get"]("api/clients/list", {
        headers: {
          "Content-Type": "application/json",
          //   Authorization: vm.$auth.strategy.token.get(),
        },
      })
        .then((res) => {
          // console.log("loadData", res.data.response);
          vm.data = res.data.response;
        })
        .catch((error) => {
          console.log("loadData", error);
        });
    },
    del(item) {
      console.log('Delete', item)
    }
  },
  mounted() {
    console.log("Component mounted.");
    this.loadData();
  },
};
</script>
