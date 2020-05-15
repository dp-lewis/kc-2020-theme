import Vue from 'vue/dist/vue.js';

Vue.component('kc-nav', {
    data() {
      return {
        isHidden: true
      }
    },
    methods: {
        toggleNav() {
            this.isHidden = !this.isHidden;
        }
    }
});

const app = new Vue({
  el: '#site-heading'
});