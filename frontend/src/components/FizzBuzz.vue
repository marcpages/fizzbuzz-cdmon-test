<template>
  <div class="fizz-buzz-container">
    <div class="input-container">
      <input v-model="number" placeholder="Input a number" type="text" />
      <button @click="getOutput" :disabled="isLoading">Calculate</button>
    </div>
    <div class="result-container">
      <div class="loading" v-if="isLoading">Loading...</div>
      <div class="error" v-if="!isLoading && isError">{{ errorMsg }}</div>
      <div class="result" v-if="!isLoading && !isError && output">{{ output }}</div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue';
import axios from 'axios';

export default Vue.extend({
  name: 'FizzBuzz',
  data() {
    return {
      number: null,
      output: '',
      isLoading: false,
      isError: false,
      errorMsg: '',
    }
  },
  methods: {
    getOutput() {
      this.isLoading = true;
      axios({
        method: 'get',
        url: 'http://localhost:8080/fizz-buzz',
        params: {
          number: this.number
        }
      })
        .then( res => {
          this.output = res.data.output;
          this.isError = false;
        })
        .catch(err => {
          if ( err.response.status === 422 ) {
            this.handleValidationError( err.response.data );
          } else {
            this.errorMsg = "S'ha produït un error, tornar-ho a provar més tard.";
          }
          this.isError = true;
        }).finally( () => {
          this.isLoading = false;
        });
    },
    handleValidationError(errors: any) {
      let errorMsg = '';
      if ( errors.number ) {
        for (const error of errors.number ) {
          errorMsg = errorMsg + error;
        }
      }
      this.errorMsg = errorMsg;
    }
  },
});
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.fizz-buzz-container {
  width: 100%;
  max-width: 400px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  background-color: #fafafa;
  box-shadow: 0 20px 30px 0 rgba(1, 1, 1, 0.07);
  border-radius: 0.75rem;
  overflow: hidden;

  .input-container {
    display: flex;
    height: 50px;
    padding: 8px;
    background: white;
    input {
      width: 100%;
      border: none;
      font-size: 18px;
      padding: 10px;
      outline: none;
    }
    button {
      background: #3b44fb;
      color: white;
      border: none;
      font-size: 18px;
      padding: 5px 12px;
      border-radius: 8px;
      cursor: pointer;
      &:hover {
        opacity: .9;
      }
    }
  }
  .result-container {
    .error {
      background: #ecf1ad;
      color: #3c4002;
      margin: 10px;
      font-weight: 500;
      padding: 10px;
      border-radius: 4px;
    }
    .result {
      color: #184e75;
      font-weight: 600;
      font-size: 30px;
      padding: 10px;
    }
    .loading {
      padding: 10px;
    }
  }
}
</style>
