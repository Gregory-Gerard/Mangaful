<template>
  <div :class="$style.manga" :style="`background-image:url(${image})`">
    <strong :class="$style.manga__title">{{ title }}</strong>
    <p :class="$style.manga__description">{{ description }}</p>
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
    &__image {

    }

    &__title {

    }

    &__description {
      margin-bottom: unset;
    }
  }
</style>
