<template>
  <!-- <div>{{ categoriesTimetable }}</div> -->
  <div class="table-wrapper-scroll-y my-custom-scrollbar shadow">
    <div class="row no-gutters">
      <div class="col">
        <table class="table table-bordered " style="table-layout:fixed;width:100%;">
          <thead>
            <tr>
              <th class="col">#</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in times">
              <td>{{ item }}</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col" v-for="day in timetables" :key="day.slug">
        <table class="table table-bordered " style="table-layout:fixed;width:100%;">
          <thead>
            <tr>
              <th class="col">{{ day.title }}</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="hour in day.hours" :key="hour.id">
              <td class="if-empty" v-if="hour.slot == 'empty'">{{ hour.slot }}</td>
              <td class="non-empty" v-else :style="{ 'background-color': hour.color }" id="app">
                {{ hour.slot }}

                <!-- <HelloW :username="day.categories" /> -->
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import HelloW from "./HelloW";
export default {
  name: "App",
  components: {
    HelloW
  },
  props: {
    initialData: Array
  },
  data() {
    return {
      timetables: [],
      times: [
        "00:00",
        "1:00",
        "2:00",
        "3:00",
        "4:00",
        "5:00",
        "6:00",
        "7:00",
        "8:00",
        "9:00",
        "10:00",
        "11:00",
        "12:00",
        "13:00",
        "14:00",
        "15:00",
        "16:00",
        "17:00",
        "18:00",
        "19:00",
        "20:00",
        "21:00",
        "22:00",
        "23:00"
      ]
    };
  },
  mounted() {
    // 'clone' the statuses so we don't alter the prop when making changes
    this.timetables = JSON.parse(JSON.stringify(this.initialData));
  }
};
</script>

<style scoped>
.if-empty {
  color: rgba(105, 105, 105, 0.338);
}
.non-empty {
  color: white;
  border-color: black;
  /* border: solid; */
}
</style>
