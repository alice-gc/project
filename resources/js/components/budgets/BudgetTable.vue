<template>
  <br />
  <br />
  <table
    v-if="budgets.length"
    class="table table-bordered table-hover shadow"
    style="table-layout:fixed;width:100%;"
    id="infoTable"
  >
    <thead>
      <tr>
        <th>Budget Name</th>
        <th>Housing</th>
        <th>Food</th>
        <th>Transportation</th>
        <th>Personal Expenses</th>
        <th>Health Expenses</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody>
      <budget-table-row @click="onBudgetClicked(budget)" v-for="budget in budgets" :key="budget.id" :budget="budget" />
    </tbody>
  </table>
  <div v-else class="alert">No budgets defined.</div>
</template>

<script>
import BudgetTableRow from "./BudgetTableRow.vue";
export default {
  components: { BudgetTableRow },
  name: "BudgetTable",
  props: {
    budgets: {
      required: true
    }
  },
  methods: {
    onBudgetClicked(budget) {
      this.$emit("selected", budget);
    }
  }
};
$("#infoTable").on("click", "tbody tr", function(event) {
  $(this)
    .addClass("highlight")
    .siblings()
    .removeClass("highlight");
});

$(".delete-entry").click(function(e) {
  e.preventDefault(); // Don't post the form, unless confirmed
  if (confirm("Are you sure?")) {
    // Post the form
    $(e.target)
      .closest("form")
      .submit(); // Post the surrounding form
  }
});
</script>
<style scoped>
.table tbody tr.highlight td {
  background-color: rgba(164, 48, 63, 0.763);
  color: whitesmoke !important;
  text-decoration: solid !important;
}
</style>
