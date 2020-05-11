<template>
  <div>
    <nav class="navbar navbar-expand navbar-dark">
      <b-container fluid="fluid">
        <strong class="navbar-brand">Mangaful</strong>

        <ul class="navbar-nav">
          <li class="nav-item">
            <b-button href="#" size="sm" variant="primary">
              <user-icon />
              Se connecter
            </b-button>
          </li>
        </ul>
      </b-container>
    </nav>

    <main>
      <nuxt />
    </main>
  </div>
</template>

<script>
import { UserIcon } from 'vue-feather-icons'

export default {
  components: {
    UserIcon
  }
}
</script>

<style lang="scss">
  @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap');

  $body-bg: #212529; // $gray-900
  $body-color: #fff; // $gray-900
  $primary: #544DFF;
  $font-family-sans-serif: 'Rubik', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji" !default;

  @import '~bootstrap/scss/bootstrap.scss';
  @import '~bootstrap-vue/src/index.scss';
  @import 'assets/variables';

  .navbar {
    position: absolute;
    top: 0; left: 0; right: 0;
    z-index: 1030;
    transition: background-color .1s, box-shadow .2s;

    .container {
      padding-left: 15px;
      padding-right: 15px;
    }
  }
</style>
