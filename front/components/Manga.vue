<template>
  <nuxt-link to="/" :class="$style.manga__wrapper">
    <div v-if="placeholder === false" v-lazy:background-image="image" :class="$style.manga">
      <span v-if="typeof chapter !== 'undefined'" class="badge badge-primary badge-pill" :class="$style.manga__number">#{{ chapter.number }}</span>
      <div :class="$style.manga__informations">
        <strong :class="$style.manga__informations__title">{{ title }}</strong>
        <p :class="$style.manga__informations__description">{{ mangaAuthors }} — {{ status }}</p>
        <time v-if="typeof chapter !== 'undefined'" :class="$style.manga__informations__time" datetime="chapter.created_at">{{ chapterCreatedAtLocale }}</time>
      </div>
    </div>
    <div v-else :class="$style.manga" />
  </nuxt-link>
</template>

<script>
import moment from 'moment'

export default {
  name: 'Manga',
  props: {
    title: {
      type: String,
      default: 'Aucun titre'
    },
    authors: {
      type: Array,
      default: () => ['Inconnu']
    },
    status: {
      type: String,
      default: 'Inconnu'
    },
    image: {
      type: String,
      default: ''
    },
    chapter: {
      type: Object,
      default: undefined
    },
    placeholder: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    mangaAuthors () {
      return this.authors.map(author => author.fullname || 'Inconnu').join(', ')
    },
    chapterCreatedAtLocale () {
      return typeof this.chapter !== 'undefined' ? moment(this.chapter.created_at).format('DD/MM/YYYY HH:mm') : undefined
    }
  }
}
</script>

<style module lang="scss">
  @keyframes loading {
    0% {
      transform: translateX(-100%)
    }

    to {
      transform: translateX(50%)
    }
  }

  .manga__wrapper {
    display: block;
    color: $white !important;
    text-underline: none;
  }

  .manga {
    position: relative;
    border-radius: $border-radius;
    padding-bottom: (5/3.33) * 100%;
    background-color: $gray-800;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    cursor: pointer;

    &[lazy=loading] {
      overflow: hidden;

      &::before {
        content: "";
        position: absolute;
        display: block;
        animation: loading 2s linear infinite;
        transform: translateX(0);
        height: 100%;
        width: 200%;
        background: linear-gradient(90deg,rgba($gray-400,0) 0,rgba($gray-400,.06) 40%,rgba($gray-400,.06) 60%,rgba($gray-400,0));
      }
    }

    &:hover {
      .manga__informations, &::after {
        opacity: 1;
      }
    }

    &::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      opacity: 0;
      transition: opacity .2s;
      height: 100%;
      width: 100%;
      background: linear-gradient(0deg, rgba($gray-900, .9) 0%, rgba(#000,0) 100%);
      pointer-events: none;
    }

    &__number {
      position: absolute;
      top: $spacer / 2; left: $spacer / 2;
    }

    &__informations {
      position: absolute;
      z-index: 1;
      bottom: 0;
      opacity: 0;
      transition: opacity .2s;
      padding: $spacer;
      pointer-events: none;

      &__description, &__time {
        margin-bottom: unset;
        font-size: $font-size-sm / 1.1;
        color: $gray-100;
      }
    }
  }
</style>
