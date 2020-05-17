<template>
  <div>
    <nav class="navbar navbar-expand navbar-dark">
      <b-container fluid="fluid">
        <nuxt-link to="/"><strong class="navbar-brand">Mangaful</strong></nuxt-link>

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

  @keyframes loading {
    0% {
      transform: translateX(-100%)
    }

    to {
      transform: translateX(50%)
    }
  }

  [lazy=loading] {
    overflow: hidden;

    &::before {
      content: "";
      position: absolute;
      display: block;
      animation: loading 2s linear infinite;
      transform: translateX(0);
      height: 100%;
      width: 200%;
      background: linear-gradient(90deg, rgba($gray-300, 0) 0, rgba($gray-300, .06) 30%, rgba($gray-300, .06) 60%, rgba($gray-300, 0));
    }
  }
</style>
