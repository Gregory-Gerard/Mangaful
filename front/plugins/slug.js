import slug from 'slug'

slug.defaults.mode = 'rfc3986'
slug.defaults.modes.rfc3986.remove = /\./

export default ({ app }, inject) => {
  inject('slug', slug)
}
