<template>
  <div :class="$style.manga" :style="`background-image:url(${image})`">
    <div :class="$style.manga__informations">
      <strong :class="$style.manga__informations__title">{{ title }}</strong>
      <p :class="$style.manga__informations__description">{{ description }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Manga',
  props: {
    title: {
      type: String,
      default: 'Aucun titre'
    },
    description: {
      type: String,
      default: 'Aucune description'
    },
    image: {
      type: String,
      default: ''
    }
  }
}
</script>

<style module lang="scss">
  @import 'assets/variables';

  .manga {
    position: relative;
    border-radius: $border-radius;
    padding-bottom: (5/3.33) * 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    cursor: pointer;

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

    &__informations {
      position: absolute;
      z-index: 1;
      bottom: 0;
      opacity: 0;
      transition: opacity .2s;
      padding: $spacer;
      pointer-events: none;

      &__description {
        margin-bottom: unset;
        font-size: $font-size-sm / 1.1;
        color: $gray-100;
      }
    }
  }
</style>
