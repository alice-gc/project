<template>
  <h1>{{ message }}, World!</h1>
  <!-- <p @click="incrementCount">the count is: {{ count }}</p>

  <p @click="reset">reset the click</p>

  <input class="form-control" placeholder="Enter your name" v-model="name" />
  <button @click="add" class="btn btn-outline-secondary">Add to list</button>

  <h3 v-for="name in list">Hi there {{ name }}!</h3> -->
</template>

<script>
export default {
  name: "HelloWorld",
  data() {
    return {
      message: "Hello",
      count: 0,
      list: []
    };
  },

  // mounted() {
  //   alert("hi!");
  // },
  methods: {
    incrementCount() {
      this.count++;
    },
    reset() {
      this.count = 0;
    },
    add() {
      this.list.push(this.name);
    }
  }
};
</script>

<style scoped>
p {
  color: blue;
}
</style>
