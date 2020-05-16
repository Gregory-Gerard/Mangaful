export const API_ROOT = () => 'http://localhost/perso/mangaful/api/public/api'

export const CHAPTERS_ROOT = () => `${API_ROOT()}/chapters`
export const LAST_CHAPTERS = () => `${CHAPTERS_ROOT()}/last`

export const CHAPTER_PAGES = chapterId => `${CHAPTERS_ROOT()}/${chapterId}/pages`
