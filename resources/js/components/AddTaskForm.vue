<template>
  <form @submit.prevent="handleAddNewTask" class="form input-group-sm calculatePercentForm">
    <div class="row">
      <div class="col">
        <div class="mb-1">
          <label for="total">Task Title:</label>

          <input
            type="text"
            placeholder="Enter a title"
            v-model.trim="newTask.title"
            name="total"
            class="form-control input-sm"
          />
        </div>
        <div class="mb-1">
          <label for="total">description</label>

          <input placeholder="Add a description (optional)" v-model.trim="newTask.description" class="form-control input-sm" />
        </div>
        <div v-show="errorMessage">
          <span> {{ errorMessage }} </span>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="modal-footer d-flex justify-content-center">
        <button @click="doCancel" type="reset" class="btn btn-outline-danger shadow" data-dismiss="modal">Close</button>
        <button @click="addTask" type="submit" class="btn btn-danger shadow" data-dismiss="modal">Save</button>
      </div>
    </div>
  </form>
</template>

<script>
export default {
  props: {
    status: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      newTask: {
        title: "",
        description: "",
        status_id: null
      },
      errorMessage: ""
    };
  },
  mounted() {
    this.newTask.status_id = this.status.id;
  },
  methods: {
    doCancel() {
      this.newTask.title = "";
      this.newTask.description = "";

      this.$emit("task-canceled");
    },

    addTask() {
      // Basic validation so we don't send an empty task to the server
      if (!this.newTask.title) {
        this.errorMessage = "The title field is required";
        return;
      }
      // Send new task to server
      axios
        .post("/tasks", this.newTask)
        .then(res => {
          this.$emit("task-added", res.data, this.status);
        })
        .catch(err => {
          // Handle the error returned from our request
          this.handleErrors(err);
        });

      this.newTask.title = "";
      this.newTask.description = "";
    },
    handleErrors(err) {
      if (err.response && err.response.status === 422) {
        // We have a validation error
        const errorBag = err.response.data.errors;
        if (errorBag.title) {
          this.errorMessage = errorBag.title[0];
        } else if (errorBag.description) {
          this.errorMessage = errorBag.description[0];
        } else {
          this.errorMessage = err.response.message;
        }
      } else {
        // We have bigger problems
        console.log(err.response);
      }
    }
  }
};
</script>
