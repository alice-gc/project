<template>
  <div class="row budget-form ">
    <div class="col">
      <div class="card budget-card border-danger ">
        <div class="card-header">Create your budget</div>
        <di class="card-body"> <budget-form :budget="budget" @updated="onBudgetUpdated" /> </di>
      </div>
    </div>
    <div class="col">
      <!-- <budget-chart /> -->
      <chart-component :budget="budget" @updated="onBudgetUpdated"> </chart-component>
    </div>
  </div>

  <div class="row">
    <div class="col-12"><budget-table :budgets="budgets" @selected="onBudgetSelected" /></div>
  </div>
</template>

<script>
import { Bar } from "vue-chartjs";
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from "chart.js";

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

import ChartComponent from "./ChartComponent.vue";
import BudgetForm from "./BudgetForm.vue";
import BudgetTable from "./BudgetTable.vue";

export default {
  computed: {
    chartData() {
      return [2, 3, 1, 3, 2, 43, 5];
    }
  },
  components: { BudgetForm, ChartComponent, BudgetTable, Bar },
  name: "BudgetVue",

  data() {
    return {
      budgets: [],
      budget: null
    };
  },

  mounted() {
    this.loadBudgets();
  },
  methods: {
    onBudgetSelected(budget) {
      this.budget = budget;
    },

    onBudgetUpdated(budget) {
      this.budget.name = budget.name;
      this.budget.userName = budget.userName;
      this.budget.house = budget.house;
      this.budget.food = budget.food;
      this.budget.transport = budget.transport;
      this.budget.personal = budget.personal;
      this.budget.entertainment = budget.entertainment;
    },

    loadBudgets() {
      axios.get("/budgets").then(response => this.initBudgets(response.data.data));
    },

    initBudgets(budgets) {
      this.budgets = budgets;
      this.budget = this.budgets[0];
    }
  }
};
</script>

<style scoped></style>
