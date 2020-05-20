import Vue from 'vue/dist/vue.js';

Vue.component('kc-nav', {
    data() {
      return {
        isNavShown: false,
        isSubnavShown: []
      }
    },
    methods: {
        toggleNav() {
            this.isNavShown = !this.isNavShown;
        },
        toggleSubNav(index) {
          Vue.set(this.isSubnavShown, index, !this.isSubnavShown[index]);
        }
      }
});

const app = new Vue({
  el: '#site-heading'
});