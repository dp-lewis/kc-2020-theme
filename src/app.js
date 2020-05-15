import Vue from 'vue/dist/vue.js';

Vue.component('kc-nav', {
    data() {
      return {
        message: 'hello'
      }
    },
    methods: {
        toggleNav() {
            console.log('hi there');
        }
    },
    mounted() {
        console.log('boo');
    } 
});

const app = new Vue({
  el: '#site-heading'
});