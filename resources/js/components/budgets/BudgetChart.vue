<template>
  <div class="card"><div class="card-body">I am a chart</div></div>
  <canvas id="planet-chart"></canvas>
</template>

<script>
export default {
  data() {
    return {
      coin: {}
    };
  },
  methods: {
    addCoin() {
      let uri = "http://localhost:8000/coins";
      this.axios.post(uri, this.coin).then(response => {
        window.location.reload();
      });
    }
  }
};
</script>
