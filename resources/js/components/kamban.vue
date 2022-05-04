<template>
  <div class="row">
    <!-- Columns (Statuses) -->
    <div class="col" v-for="status in statuses" :key="status.slug">
      <Add-Task-Form
        v-if="newTaskForStatus === status.id"
        :status-id="status.id"
        v-on:task-added="handleTaskAdded"
        v-on:task-canceled="closeAddTaskForm"
      />
      <div>
        <div class="card card_tasks border-danger shadow">
          <div class="card-header">
            <div class="row">
              <div class="col card_tasks_header">{{ status.title }}</div>
              <div class="col">
                <!-- Button trigger modal -->
                <!-- <button @click="openAddTaskForm(status.id)">Add Task</button> -->

                <button
                  type="button"
                  class="btn btn-danger button-task-modal shadow"
                  data-toggle="modal"
                  :data-target="'#myModal' + status.id"
                >
                  Add Task
                </button>

                <!-- <button @click="openAddTaskForm(status.id)">Add Task</button> -->

                <!-- Modal -->
                <div
                  class="modal hide fade"
                  :id="'myModal' + status.id"
                  tabindex="-1"
                  role="dialog"
                  aria-labelledby="exampleModalLabel"
                  aria-hidden="true"
                >
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <strong class="modal_title" id="exampleModalLabel">Add Task</strong>

                        <a href="" type="button" class="closebtn" data-dismiss="modal" aria-label="Close">
                          <!-- black sircle empty inside -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                            <path
                              d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"
                            />
                          </svg>

                          <!-- empty x on circle -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                              d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                            />
                          </svg>
                        </a>
                      </div>
                      <div class="modal-body">
                        <div id="form"><Add-Task-Form @task-added="onTaskAdded" :status="status"></Add-Task-Form></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <draggable
              item-key="id"
              :list="status.tasks"
              group="tasks"
              v-bind="taskDragOptions"
              @end="handleTaskMoved"
              v-model="status.tasks"
            >
              <div v-for="task in status.tasks" :key="task.id">
                <!-- Tasks -->

                <!-- <transition-group tag="div"> -->
                <div class="card card-list border-danger shadow">
                  <div class="card-header card-header-list container-fluid">
                    <div class="row">
                      <div class="col">
                        <p>
                          <strong>{{ task.title }}</strong>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="card-body card-body-list" v-show="task.description">{{ task.description }}<br /></div>
                </div>

                <!-- </transition-group> -->
              </div>
            </draggable>

            <!-- No Tasks -->
            <div class="container" v-show="!status.tasks.length && newTaskForStatus !== status.id">
              <div class="row">
                <div class="col-12 d-flex justify-content-center if-empty"><span>Empty</span></div>
                <div class="col-12 d-flex justify-content-center">
                  <button
                    class="btn btn-outline-secondary"
                    type="button"
                    data-toggle="modal"
                    data-target="#myModal"
                    style="display: inline-block;"
                  >
                    Add Task
                  </button>
                </div>
              </div>
            </div>
            <!-- ./No Tasks -->
          </div>
        </div>
      </div>
    </div>
    <!--row -->
  </div>
</template>

<script>
import { VueDraggableNext } from "vue-draggable-next";
import AddTaskForm from "./AddTaskForm"; // import the component
export default {
  components: { draggable: VueDraggableNext, AddTaskForm }, // register component

  computed: {
    taskDragOptions() {
      return {
        animation: 200,
        group: "task-list",
        dragClass: "status-drag"
      };
    }
  },

  props: {
    initialData: Array
  },
  data() {
    return {
      statuses: [],
      newTaskForStatus: 0, // track the ID of the status we want to add to

      tasks: {
        ideas: ["Migrate codebase to TypeScript"],
        todos: ["Dockerize App", "Add vue.draggable to project"],
        inProgress: ["Implement Web3 Features", "Bump to vite.js"],
        completed: []
      }
    };
  },
  mounted() {
    // 'clone' the statuses so we don't alter the prop when making changes
    this.statuses = JSON.parse(JSON.stringify(this.initialData));
  },
  methods: {
    onTaskAdded(task, status) {
      status.tasks.push(task);
    },

    // set the statusId and trigger the form to show
    openAddTaskForm(statusId) {
      this.newTaskForStatus = statusId;
    },
    // reset the statusId and close form
    closeAddTaskForm() {
      this.newTaskForStatus = 0;
    },
    // add a task to the correct column in our list
    handleTaskAdded(newTask) {
      // Find the index of the status where we should add the task
      const statusIndex = this.statuses.findIndex(status => status.id === newTask.status_id);

      // Add newly created task to our column
      this.statuses[statusIndex].tasks.push(newTask);

      // Reset and close the AddTaskForm
      this.closeAddTaskForm();
    },
    handleTaskMoved() {
      // Send the entire list of statuses to the server
      axios.put("/tasks/sync", { columns: this.statuses }).catch(err => {
        console.log(err.response);
      });
    }
  }
};
</script>
<style scoped>
.status-drag {
  transition: transform 0.5s;
  transition-property: all;
}
.if-empty {
  font-size: 5vh;
  color: rgba(105, 105, 105, 0.338);
  padding-bottom: 15%;
}
.card-list {
  margin: 5%;
}
.card-header-list {
  padding: 1%;
  background-color: rgba(164, 48, 63, 0.817);
  color: white;
}
.card-body-list {
  padding: 1%;
}
.btn-danger {
  background-color: rgb(164, 48, 63);
}
.btn-danger:hover {
  background-color: whitesmoke;
  color: rgb(164, 48, 63);
  transition: 0.3s;
}

.btn-outline-secondary {
  opacity: 75%;
}
p {
  font-size: 2vh;
  text-align: center;
  padding-bottom: 0%;
  margin-bottom: 0%;
}

.card_tasks {
  margin-top: 5%;
}
</style>
