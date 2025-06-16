
import axios from 'axios'
import { useAuthStore } from '@/stores/auth_jwt'

const api = axios.create({
  baseURL: 'http://localhost:8000', // ou seu domínio de produção
  headers: {
    'Content-Type': 'application/json',
  }
})

api.interceptors.request.use((config) => {
  const authStore = useAuthStore()
  if (authStore.accessToken) {
    config.headers.Authorization = `Bearer ${authStore.accessToken}`
  }
  return config
})

export default api