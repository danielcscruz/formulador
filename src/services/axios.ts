// services/axios.ts
import axios from 'axios'
import { useAuthStore } from '@/stores/auth'
import router from '@/router'

const api = axios.create({
  baseURL: 'http://localhost:8000',
  headers: {
    'Content-Type': 'application/json'
  }
})

api.interceptors.request.use(
  (config) => {
    const store = useAuthStore()
    const token = store.accessToken || localStorage.getItem('access_token')
    if (token && config.url !== '/api/auth/login/') {
      config.headers.Authorization = `Bearer ${token}`
    }
    return config
  },
  (error) => Promise.reject(error)
)

api.interceptors.response.use(
  (response) => response,
  async (error) => {
    const store = useAuthStore()
    const original = error.config

    if (error.response?.status === 401 && !original._retry) {
      original._retry = true
      try {
        await store.refreshTokens()
        return api(original)
      } catch (refreshError) {
        store.logout()
        router.push('/auth/sign-in')
        return Promise.reject(refreshError)
      }
    }

    return Promise.reject(error)
  }
)

export default api
