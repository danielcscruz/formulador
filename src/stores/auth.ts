import { defineStore } from 'pinia'
import api from '@/services/axios'
import router from '@/router'

interface User {
  id: number
  username: string
  email: string
  first_name?: string
  last_name?: string
}

interface AuthState {
  user: User | null
  accessToken: string | null
  refreshToken: string | null
  isAuthenticated: boolean
  loading: boolean
}

export const useAuthStore = defineStore('auth', {
  state: (): AuthState => ({
    user: null,
    accessToken: null,
    refreshToken: null,
    isAuthenticated: false,
    loading: false
  }),

  getters: {
    isLoggedIn: (state) => state.isAuthenticated && !!state.accessToken,
    userFullName: (state) => {
      const first = state.user?.first_name || ''
      const last = state.user?.last_name || ''
      return `${first} ${last}`.trim()
    },
    userFirstName: (state) => state.user?.first_name || state.user?.username || ''
  },

  actions: {
    async init() {
      this.accessToken = localStorage.getItem('access_token')
      this.refreshToken = localStorage.getItem('refresh_token')
      const userData = localStorage.getItem('user')
      if (userData) this.user = JSON.parse(userData)

      if (this.accessToken && this.refreshToken) {
        try {
          await this.fetchUserProfile()
          this.isAuthenticated = true
        } catch (e) {
          this.logout()
        }
      }
    },

    async login(credentials: { login: string; password: string }) {
      this.loading = true
      try {
        const { data } = await api.post('/api/auth/login/', credentials)
        const { access, refresh, user } = data

        this.accessToken = access
        this.refreshToken = refresh
        this.user = user
        this.isAuthenticated = true

        localStorage.setItem('access_token', access)
        localStorage.setItem('refresh_token', refresh)
        localStorage.setItem('user', JSON.stringify(user))

        const redirectPath = router.currentRoute.value.query.redirectedFrom || '/'
        router.push(redirectPath as string)

        return data

      } catch (error) {
        throw error
      } finally {
        this.loading = false
      }
    },

    async fetchUserProfile() {
      const { data } = await api.get('/api/auth/user/')
      this.user = data
      localStorage.setItem('user', JSON.stringify(data))
      return data
    },

    async refreshTokens() {
      const { data } = await api.post('/api/auth/token/refresh/', {
        refresh: this.refreshToken
      })
      this.accessToken = data.access
      if (data.refresh) this.refreshToken = data.refresh

      localStorage.setItem('access_token', data.access)
      if (data.refresh) localStorage.setItem('refresh_token', data.refresh)
    },

    async logout() {
      try {
        if (this.refreshToken) {
          await api.post('/api/auth/logout/', { refresh: this.refreshToken })
        }
      } catch (_) {
        // ignorar erro silenciosamente
      } finally {
        this.user = null
        this.accessToken = null
        this.refreshToken = null
        this.isAuthenticated = false

        localStorage.clear()
      }
    },

    async verifyToken() {
      if (!this.accessToken) return false
      try {
        await api.post('/api/auth/token/verify/', {
          token: this.accessToken
        })
        return true
      } catch {
        return false
      }
    }
  }
})
