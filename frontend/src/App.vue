<template>
  <div id="app">
    <FizzBuzz/>
  </div>
</template>

<script lang="ts">
import Vue from 'vue';
import FizzBuzz from './components/FizzBuzz.vue';

export default Vue.extend({
  name: 'App',
  components: {
    FizzBuzz
  }
});
</script>

<style lang="scss">
body {
  margin: 0;
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  background: #f0f0ff;
  height: 100vh;
  padding-top: 30vh;

  @media screen and (max-width: 700px) {
    padding-top: 50px;
  }
}
</style>
