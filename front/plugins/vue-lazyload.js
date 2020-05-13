import Vue from 'vue'
import VueLazyload from 'vue-lazyload'

Vue.use(VueLazyload, {
  observer: true,
  loading: require('~/assets/misc/loader.svg')
})
