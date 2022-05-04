<template>
  <tr class="clickableRow">
    <td>{{ budget.name }}</td>
    <td>{{ budget.house }}</td>
    <td>{{ budget.food }}</td>
    <td>{{ budget.transport }}</td>
    <td>{{ budget.personal }}</td>
    <td>{{ budget.entertainment }}</td>
    <td>
      <!-- {{ ! route('budget.destroy', $budget->id) ! }}  -->
      <button type="submit" class="btn btn-danger delete-entry shadow btn-block" id="delete-entry" value="DELETE">
        Delete entry
      </button>
    </td>
  </tr>
</template>

<script>
export default {
  name: "BudgetTableRow",
  props: {
    budget: {
      required: true,
      type: Object
    }
  }
};

$("#delete-entry").click(function(e) {
  e.preventDefault(); // Don't post the form, unless confirmed
  if (confirm("Are you sure?")) {
    // Post the form
    $(e.target)
      .closest("form")
      .submit(); // Post the surrounding form
  }
});
</script>
