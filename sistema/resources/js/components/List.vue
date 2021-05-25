<template>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Pokemon</th>
          <th scope="col">Url</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item, index) in data" :key="index">
          <th scope="row">{{ index + 1 }}</th>
          <td>{{ item.name }}</td>
          <td>{{ item.url }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data: (vm) => ({
    data: [],
  }),
  methods: {
    loadData() {
      const vm = this;
      console.log("loadData");
      axios["get"]("https://pokeapi.co/api/v2/pokemon", {
        headers: {
          "Content-Type": "application/json",
          //   Authorization: vm.$auth.strategy.token.get(),
        },
      })
        .then((response) => {
          console.log("loadData", response.data.results);
          vm.data = response.data.results;
        })
        .catch((error) => {
          console.log("loadData", error);
        });
    },
  },
  mounted() {
    console.log("Component mounted.");
    this.loadData();
  },
};
</script>
