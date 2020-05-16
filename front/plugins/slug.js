import slug from 'slug'

slug.defaults.mode = 'rfc3986'

export default ({ app }, inject) => {
  inject('slug', slug)
}
