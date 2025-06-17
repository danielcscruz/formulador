import { createRouter, createWebHistory } from 'vue-router';
import { allRoutes } from "./routes";
import { useAuthStore } from '@/stores/auth'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: allRoutes
});

router.beforeEach((to, from, next) => {
    const title = to.meta.title;
    if (title) {
        document.title = title.toString();
    }
    next();
});

router.beforeEach((to, from, next) => {
  const authRequired = to.matched.some((route) => route.meta.authRequired)
  const useAuth = useAuthStore()

  // Se a rota não exige autenticação, segue normalmente
  if (!authRequired) return next()

  // Se já está logado, segue
  if (useAuth.isLoggedIn) return next()

  // Se está tentando acessar a própria página de login, permite
  if (to.name === 'auth.sign-in') return next()

  // Redireciona para o login com o destino original
  return next({ name: 'auth.sign-in', query: { redirectedFrom: to.fullPath } })
})


export default router;
