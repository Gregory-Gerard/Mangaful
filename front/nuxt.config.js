
export default {
  mode: 'universal',
  /*
  ** Headers of the page
  */
  head: {
    title: 'Chargement...',
    titleTemplate: '%s — Mangaful',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: "Lisez vos mangas préférés gratuitement, sans aucune publicité et d'autres avantages comme les notifications de sorties, mise à jour automatique de MAL et AniList et plus encore..." }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700;900&display=swap' }
    ],
    htmlAttrs: {
      lang: 'fr',
    }
  },
  /*
  ** Customize the progress-bar color
  */
  loading: { color: '#fff' },
  /*
  ** Global CSS
  */
  css: [
  ],
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    '~/plugins/vue-lazyload'
  ],
  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [
    // Doc: https://github.com/nuxt-community/eslint-module
    '@nuxtjs/eslint-module',
    '@nuxtjs/style-resources'
  ],
  /*
  ** Nuxt.js modules
  */
  modules: [
    // Doc: https://bootstrap-vue.js.org
    'bootstrap-vue/nuxt',
    // Doc: https://axios.nuxtjs.org/usage
    '@nuxtjs/axios',
    '@nuxtjs/pwa'
  ],
  /*
  ** Axios module configuration
  ** See https://axios.nuxtjs.org/options
  */
  axios: {
  },
  /*
  ** Build configuration
  */
  build: {
    /*
    ** You can extend webpack config here
    */
    extend (config, ctx) {
    }
  },

  styleResources: {
    scss: ['./assets/_variables.scss']
  },

  /*
  ** BootstrapVue Configuration
  */
  bootstrapVue: {
    bootstrapCSS: false,
    bootstrapVueCSS: false
  }
}
