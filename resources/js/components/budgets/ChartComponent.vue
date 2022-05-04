<template>
  <h4>{{ this.budgetModel.name }}</h4>
  <!-- <div>: {{ this.budgetModel }}</div> -->
  <!-- <div>: {{ this.budget }}</div> -->

  <div class="chart" style="max-width: 400px"><vue3-chart-js v-bind="{ ...pieChart }" /></div>
</template>

<script>
import Vue3ChartJs from "@j-t-mcc/vue3-chartjs";

export default {
  name: "ChartComponent",
  components: {
    Vue3ChartJs
  },
  props: {
    // dataValues: {1, 2, 2, 3, 3, 3},
    budget: {
      required: false,
      type: Object
      // default: () => {}
    }
  },
  data() {
    return {
      budgetModel: {
        id: 0,
        name: "",
        username: "",
        house: "",
        food: "",
        transport: "",
        personal: "",
        entertainment: ""
      }
    };
  },
  mounted() {
    this.initModel();
  },
  watch: {
    budget() {
      this.initModel();
    }
  },
  methods: {
    initModel() {
      if (this.budget) {
        this.budgetModel.id = this.budget.id;
        this.budgetModel.name = this.budget.name;
        this.budgetModel.username = this.budget.username;
        this.budgetModel.food = this.budget.food;
        this.budgetModel.house = this.budget.house;
        this.budgetModel.transport = this.budget.transport;
        this.budgetModel.personal = this.budget.personal;
        this.budgetModel.entertainment = this.budget.entertainment;
      }
    }
  },

  setup() {
    const pieChart = {
      type: "pie",
      data: {
        labels: ["Housing", "Food", "Transport", "Personal Spendings", "Entertainment"],
        datasets: [
          {
            backgroundColor: ["#FFDFD3", "#E0BBE4", "#fed4e6", "#F6EDB3", "#ACECAE"],
            data: [25, 35, 35, 25, 35]
          }
        ]
      }
    };

    return {
      pieChart
    };
  }
};
</script>
<style scoped>
h4 {
  color: rgb(164, 48, 63) !important;
  text-decoration: solid;
  text-align: center;
}
.chart {
  padding-top: 5%;
  margin-left: 15%;
}
</style>
