import Vue from 'vue/dist/vue.js';

Vue.component('kc-nav', {
    data() {
      return {
        isNavShown: false,
        isQuoteShown: false
      }
    },
    methods: {
        toggleNav() {
            this.isNavShown = !this.isNavShown;
        },
        toggleQuote() {
          this.isQuoteShown = !this.isQuoteShown;
        }
      }
});

const app = new Vue({
  el: '#site-heading'
});