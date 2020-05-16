export const API_ROOT = () => 'http://localhost/perso/mangaful/api/public/api'

export const MANGAS_ROOT = () => `${API_ROOT()}/mangas`
export const GET_MANGA = mangaId => `${API_ROOT()}/mangas/${mangaId}`

export const CHAPTERS_ROOT = () => `${API_ROOT()}/chapters`
export const LAST_CHAPTERS = () => `${CHAPTERS_ROOT()}/last`

export const CHAPTER_PAGES = chapterId => `${CHAPTERS_ROOT()}/${chapterId}/pages`
