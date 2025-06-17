<template>
  <AuthLayout>
    <b-row class="justify-content-center">
      <b-col xl="5">
        <b-card no-body class="auth-card">
          <b-card-body class="px-3 py-5">
            <LogoBox customClass="mx-auto mb-4 text-center auth-logo" :smLogoHeight="30" :logoHeight="24" smLogoClass="me-1" />
            <h2 class="fw-bold text-center fs-18">Entrar</h2>
            <span> {{ authStore.isAuthenticated }}</span> 
            <p class="text-muted text-center mt-1 mb-4">Informe o seu usuário ou e-mail e senha para acessar o painel</p>

            <div class="px-4">
              <b-form @submit.prevent="handleSignIn" class="authentication-form">
                <div v-if="error.length > 0" class="mb-2 text-danger">{{ error }}</div>
                <b-form-group label="login" class="mb-3">
                  <b-form-input 
                    type="text" 
                    id="example-login" 
                    name="example-login" 
                    placeholder="Digite o seu usuário ou email"
                    v-model="v.login.$model" 
                    :disabled="loading"
                  />
                  <div v-if="v.login.$error" class="text-danger">
                    <span v-for="(err, idx) in v.login.$errors" :key="idx">
                      {{ err.$message }}
                    </span>
                  </div>
                </b-form-group>
                <div class="mb-3">
                  <router-link :to="{ name: 'auth.reset-password' }"
                    class="float-end text-muted text-unline-dashed ms-1">Esqueci a senha</router-link>
                  <label class="form-label" for="example-password">Senha</label>
                  <input 
                    type="password" 
                    id="example-password" 
                    class="form-control" 
                    placeholder="Digite a sua senha"
                    v-model="v.password.$model"
                    :disabled="loading"
                  >
                  <div v-if="v.password.$errors" class="text-danger">
                    <span v-for="(err, idx) in v.password.$errors" :key="idx">
                      {{ err.$message }}
                    </span>
                  </div>
                </div>
                <div class="mb-3">
                  <b-form-checkbox id="checkbox-signin" v-model="rememberMe">
                    Salvar credenciais
                  </b-form-checkbox>
                </div>

                <div class="mb-1 text-center d-grid">
                  <b-button 
                    variant="primary" 
                    type="submit" 
                    :disabled="loading"
                  >
                    <span v-if="loading" class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                    {{ loading ? 'Entrando...' : 'Entrar' }}
                  </b-button>
                </div>
              </b-form>

              <p class="mt-3 fw-semibold no-span">OU Entre com</p>

              <div class="text-center">
                <a href="javascript:void(0);" class="btn btn-light shadow-none"><i
                    class='bx bxl-google fs-20'></i></a>{{ ' ' }}
                <a href="javascript:void(0);" class="btn btn-light shadow-none"><i
                    class='bx bxl-facebook fs-20'></i></a>{{ ' ' }}
                <a href="javascript:void(0);" class="btn btn-light shadow-none"><i class='bx bxl-github fs-20'></i></a>
              </div>
            </div>
          </b-card-body>
        </b-card>
        <p class="mb-0 text-center">Novo aqui? <router-link :to="{ name: 'auth.sign-up' }"
            class="text-reset fw-bold ms-1">Registrar</router-link></p>
      </b-col>
    </b-row>
  </AuthLayout>
</template>

<script setup lang="ts">
import AuthLayout from '@/layouts/AuthLayout.vue';

import { required, email } from '@vuelidate/validators';
import { useVuelidate } from '@vuelidate/core';

import { ref, reactive, computed } from 'vue';
import { useRoute, useRouter } from 'vue-router';

// Importando a store JWT correta
import { useAuthStore } from '@/stores/auth';

const credentials = reactive({
  login: '',
  password: ''
});

const vuelidateRules = computed(() => ({
  login: { required },
  password: { required }
}));

const v = useVuelidate(vuelidateRules, credentials);

const authStore = useAuthStore();
const route = useRoute();
const router = useRouter();
const query = route.query;

const error = ref('');
const loading = ref(false);
const rememberMe = ref(false);

const handleSignIn = async () => {
  // Limpar erro anterior
  error.value = '';
  
  // Validar formulário
  const result = await v.value.$validate();

  if (!result) {
    return;
  }

  loading.value = true;

  try {
    // Usar o método login da store JWT
    await authStore.login({
      login: credentials.login,
      password: credentials.password
    });

    // Redirecionar usuário após login bem-sucedido
    redirectUser();
  } catch (e: any) {
    console.error('Erro no login:', e);
    
    // Tratar diferentes tipos de erro
    if (e.response?.data?.detail) {
      error.value = e.response.data.detail;
    } else if (e.response?.data?.non_field_errors) {
      error.value = e.response.data.non_field_errors[0];
    } else if (e.response?.data?.error) {
      error.value = e.response.data.error;
    } else if (e.message) {
      error.value = e.message;
    } else {
      error.value = 'Erro interno do servidor. Tente novamente.';
    }
  } finally {
    loading.value = false;
  }
};

const redirectUser = () => {
  if (query.redirectedFrom && typeof query.redirectedFrom === 'string') {
    return router.push(query.redirectedFrom);
  }
  return router.push('/');
};
</script>