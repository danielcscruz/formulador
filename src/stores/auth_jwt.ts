import { defineStore } from 'pinia'
import router from '@/router'
import api from '@/services/axios'
import { useSessionStorage } from '@vueuse/core'
import type { User } from '@/types/auth'

export const useAuthStore = defineStore('auth_store', () => {
  const accessToken = useSessionStorage<string | null>('RASKET_ACCESS_TOKEN', null)
  const refreshToken = useSessionStorage<string | null>('RASKET_REFRESH_TOKEN', null)
  const user = useSessionStorage<User | null>('RASKET_VUE_USER', null)

  const isAuthenticated = () => !!accessToken.value

  const saveSession = (access: string, refresh: string) => {
    accessToken.value = access
    refreshToken.value = refresh
  }

  const fetchUserProfile = async () => {
    try {
      const response = await api.get('/api/auth/profile/', {
        headers: {
          Authorization: `Bearer ${accessToken.value}`
        }
      })
      user.value = response.data
    } catch (error) {
      console.error('Erro ao buscar perfil do usuário', error)
      removeSession()
    }
  }

  const login = async (credentials: { login: string; password: string }) => {
    try {
      const response = await api.post('/api/auth/login/', credentials)
      saveSession(response.data.access, response.data.refresh)
      await fetchUserProfile()
      router.push('/')
    } catch (error) {
      console.error('Erro ao fazer login', error)
      throw error
    }
  }

  const logout = async () => {
    try {
      await api.post('/api/auth/logout/', {}, {
        headers: {
          Authorization: `Bearer ${accessToken.value}`
        }
      })
    } catch (error) {
      console.warn('Logout falhou ou usuário já estava desconectado')
    } finally {
      removeSession()
    }
  }

  const removeSession = () => {
    accessToken.value = null
    refreshToken.value = null
    user.value = null
    router.push('/auth/sign-in')
  }

  const refreshAccessToken = async () => {
    try {
      const response = await api.post('/api/auth/token/refresh/', {
        refresh: refreshToken.value
      })
      accessToken.value = response.data.access
    } catch (error) {
      console.error('Erro ao renovar token', error)
      removeSession()
    }
  }

  return {
    user,
    accessToken,
    refreshToken,
    isAuthenticated,
    login,
    logout,
    removeSession,
    fetchUserProfile,
    refreshAccessToken
  }
})
