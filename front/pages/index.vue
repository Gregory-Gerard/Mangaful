<template>
  <div :id="$style.home">
    <header :id="$style.header">
      <b-container fluid="fluid">
        <h1>Mangaful</h1>
        <p>Lisez vos mangas préférés gratuitement, sans aucune publicité et d'autres avantages comme les notifications de sorties,
          mise à jour automatique de MAL et AniList et bien plus encore !</p>
        <b-button href="#" variant="primary">S'inscrire</b-button>
      </b-container>
    </header>

    <section :id="$style.mangas">
      <b-container fluid="fluid">
        <h2>Les dernières sorties</h2>
        <swiper :id="$style.mangas__list" ref="mangas__list" :options="swiperOptions">
          <swiper-slide>
            <Manga title="Hunter x Hunter" description="Yoshihiro Togashi — En cours — 390 chapitres" image="https://pbs.twimg.com/media/DUXsxpnWsAAjjKH.jpg" />
          </swiper-slide>
          <div slot="scrollbar" class="swiper-scrollbar" />
        </swiper>
      </b-container>
    </section>
  </div>
</template>

<script>
// Import swiper
import { Swiper, SwiperSlide } from 'vue-awesome-swiper'

// Custom components
import Manga from '../components/Manga.vue'

export default {
  components: {
    Manga,
    Swiper,
    SwiperSlide
  },
  data () {
    return {
      swiperOptions: {
        slidesPerView: 1,
        spaceBetween: 30,
        breakpoints: {
          320: {
            slidesPerView: 2
          },
          576: {
            slidesPerView: 3
          },
          768: {
            slidesPerView: 4
          },
          992: {
            slidesPerView: 5
          },
          1200: {
            slidesPerView: 6
          },
          1600: {
            slidesPerView: 8
          }
        },
        scrollbar: {
          el: '.swiper-scrollbar',
          hide: true
        }
      }
    }
  },
  head () {
    return {
      title: 'Accueil'
    }
  }
}
</script>

<style lang="scss">
@import '~swiper/swiper';
</style>

<style module lang="scss">
@import 'assets/variables';

#home {
  #header {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    height: calc(100vh - 200px);
    min-height: 400px;
    padding-bottom: 200px;
    background-image: url(../assets/home/header.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center bottom;

    &::after {
      content: '';
      position: absolute;
      bottom: 0;
      height: 100%;
      width: 100%;
      background: linear-gradient(0deg, rgba($gray-900, 1) 5%, rgba(#000,0) 100%);
    }

    :global(.container-fluid) { z-index: 1; }

    p {
      max-width: 500px;
      font-weight: 300;
      color: rgba(#fff, .8);
    }
  }

  #mangas {
    margin: $spacer 0;

    h2 {
      margin-bottom: $spacer;
      font-size: $font-size-lg;
    }
  }
}
</style>
