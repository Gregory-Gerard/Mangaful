<template>
  <div>
    {{ manga.title }}
  </div>
</template>

<script>
import { GET_MANGA } from '../../../constants/api'

export default {
  async asyncData ({ app, redirect, error, params, $axios }) {
    const [slug, id] = params.manga.split('.')

    const { data: { data: manga } = {} } = await $axios.get(GET_MANGA(id)).catch(e => error({ statusCode: e.response.status || '500', message: e.response.status === 404 ? 'Manga introuvable' : e.message }))

    if (manga === undefined) {
      return
    }

    if (app.$slug(manga.title) !== slug) {
      redirect(301, `/manga/${app.$slug(manga.title)}.${id}`)
    }

    return { manga }
  },
  data () {
    return {
      manga: undefined
    }
  },
  validate ({ params }) {
    return /^[a-z0-9-]+\.\d+$/i.test(params.manga)
  }
}
</script>

<style module lang="scss">

</style>
