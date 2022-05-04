<template>
  <form @submit.prevent="submit" class="form-horizontal input-group-sm">
    <div class="form-group row">
      <div class="col-sm-6"><label for="name" class="col-form-label">Name</label></div>
      <div class="col-sm-6">
        <input type="text" name="name" class="form-control" id="name" v-model="budgetModel.name" placeholder="Budget name" />
      </div>
    </div>
    <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
    <hr />
    <div class="form-group row">
      <div class="col-sm-6"><label for="house" class="col-form-label">Rent or Mortage: 25-35%</label></div>
      <div class="col-sm-6">
        <input type="numeric" name="house" class="form-control" id="house" v-model="budgetModel.house" placeholder="House" />
      </div>
    </div>
    <div v-if="errors && errors.house" class="text-danger">{{ errors.house[0] }}</div>

    <div class="form-group row">
      <div class="col-sm-6"><label for="food" class="col-form-label">Food (groceries) 5-15%</label></div>
      <div class="col-sm-6">
        <input type="numeric" name="food" class="form-control" id="food" v-model="budgetModel.food" placeholder="Food" />
      </div>
    </div>
    <div v-if="errors && errors.food" class="text-danger">{{ errors.food[0] }}</div>

    <div class="form-group row">
      <div class="col-sm-6"><label for="transport" class="col-form-label">Transportation: 10-15%</label></div>
      <div class="col-sm-6">
        <input
          type="numeric"
          name="transport"
          class="form-control"
          id="transport"
          v-model="budgetModel.transport"
          placeholder="transport"
        />
      </div>
    </div>
    <div v-if="errors && errors.transport" class="text-danger">{{ errors.transport[0] }}</div>

    <div class="form-group row">
      <div class="col-sm-6"><label for="personal" class="col-form-label">Personal Expenses: 5-10%</label></div>
      <div class="col-sm-6">
        <input
          type="numeric"
          name="personal"
          class="form-control"
          id="personal"
          v-model="budgetModel.personal"
          placeholder="personal"
        />
      </div>
    </div>
    <div v-if="errors && errors.personal" class="text-danger">{{ errors.personal[0] }}</div>

    <div class="form-group row">
      <div class="col-sm-6"><label for="entertainment" class="col-form-label">Health Expenses: 5-10%</label></div>
      <div class="col-sm-6">
        <input
          type="numeric"
          name="entertainment"
          class="form-control"
          id="entertainment"
          v-model="budgetModel.entertainment"
          placeholder="entertainment"
        />
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-12 to_be">
        * To be included: Savings: 10-15%, Utilities 5-10%, Clothing (or +personal): 2-7% , entertainment: 5-10%, Debr (and/or
        Savings): 5-10%
      </div>
    </div>

    <div v-if="errors && errors.entertainment" class="text-danger">{{ errors.entertainment[0] }}</div>

    <div class="form-group row">
      <div class="col text-center"><button type="submit" class="btn btn-outline-danger shadow">Save</button></div>
    </div>
    <!-- <div v-if="success" class="alert alert-success mt-3">budget saved!</div>
    <div v-else class="alert alert-danger mt-3">something is wrong :(</div> -->
  </form>
</template>

<script>
export default {
  name: "BudgetForm",
  props: {
    budget: {
      required: false,
      type: Object
      // default: () => {}
    }
  },
  data() {
    return {
      fields: {},
      errors: {},
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
    submit() {
      this.errors = {};
      axios
        .post("budget.store", this.budgetModel)
        .then(response => {
          alert("Message sent!");
        })
        .catch(error => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
    },

    onSubmit() {
      this.onSaved(this.budgetModel);
      // new data is found in: this.budgetModel - so send that to the server to update the budget!
      // axios.patch("/budgets/" + this.budgetModel.id, this.budgetModel).then(response => onSaved(response.data.data));

      axios.post("/budget", this.budgetModel).then(res => onSaved(response.data.data));
    },

    onSaved(budget) {
      this.$emit("updated", budget);
    },
    addTask() {
      axios.post("/budgets", this.budgetModel).then(res => {
        this.$emit("updated", this.budget);
      });
    },

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
  }
};
</script>
<style scoped>
.to_be {
  color: rgb(189, 189, 189);
}
</style>
