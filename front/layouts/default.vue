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
  @import '~bootstrap/scss/bootstrap.scss';
  @import '~bootstrap-vue/src/index.scss';

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
