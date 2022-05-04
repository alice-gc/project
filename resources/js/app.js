require("./bootstrap");
require("./script");

//require("./charts");

import HelloWorld from "./components/HelloWorld";
import kamban from "./components/kamban";
import ExampleComponent from "./components/ExampleComponent";
import AddTaskForm from "./components/AddTaskForm";
import BudgetVue from "./components/budgets/BudgetVue";

import CalendarTable from "./components/CalendarTable";

// import ChartComponent from "./components/ChartComponent";

//register component
import { createApp } from "vue";

let vueApp = createApp({});
vueApp.component("hello-world", HelloWorld);
vueApp.component("kamban-board", kamban);
vueApp.component("Add-Task-Form", AddTaskForm);
vueApp.component("example-component", ExampleComponent);
vueApp.component("budget-vue", BudgetVue);
vueApp.component("calendar-table", CalendarTable);

// vueApp.component("chart-component", ChartComponent);

vueApp.mount("#vue-app");
