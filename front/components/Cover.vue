<template>
  <div v-lazy:background-image="image" :class="$style.cover" />
</template>

<script>
export default {
  name: 'Cover',
  props: {
    image: {
      type: String,
      default: '',
      required: true
    }
  }
}
</script>

<style module lang="scss">
  .cover {
    position: relative;
    border-radius: $border-radius;
    padding-bottom: (5/3.33) * 100%;
    background-color: $gray-800;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }
</style>
