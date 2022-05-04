import { Chart, registerables } from "chart.js";

Chart.register(...registerables);

var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];
var barColors = ["#FFE5E6", "#17AFE4", "#A4303F", "#84E296", "#F2AF29"];

// docoment.getelementbyid thing to get reference to chart in blad

var ctx = document.getElementById("myChart").getContext("2d"); // 2d context

new Chart("myChart", ctx, {
  type: "pie", //doughnut
  data: {
    labels: xValues,
    datasets: [
      {
        backgroundColor: barColors,
        data: yValues
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: "World Wide Wine Production 2018"
    }
  }
});
