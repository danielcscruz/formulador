<template>
  <router-link
    v-if="!item.disabled"
    :class="`${currentRouteName === item.route?.name && 'active'} ${className}`"
    :to="{ name: item.route?.name, params: item.route?.params }"
  >
    <span v-if="item.icon" class="nav-icon">
      <Icon :icon="item.icon" />
    </span>
    <span class="nav-text"> {{ item.label }} </span>
    <b-badge
      :variant="null"
      v-if="item.badge && !authStore.isAuthenticated"
      class="text-end"
      :class="`bg-${item.badge.variant}`"
    >
      {{ item.badge.text }}
    </b-badge>
  </router-link>

  <!-- Versão desabilitada (sem router-link, apenas visual) -->
  <div
    v-else
    :class="`disabled ${className}`"
  >
    <span v-if="item.icon" class="nav-icon">
      <Icon :icon="item.icon" />
    </span>
    <span class="nav-text"> {{ item.label }} </span>
    <b-badge
      :variant="null"
      v-if="item.badge && !authStore.isAuthenticated"
      class="text-end"
      :class="`bg-${item.badge.variant}`"
    >
      {{ item.badge.text }}
    </b-badge>
  </div>
</template>


<script setup lang="ts">
import type { SubMenus } from '@/types/menu'
import { Icon } from '@iconify/vue'
import router from '@/router'
import { useAuthStore } from '@/stores/auth';

defineProps<SubMenus>()
const authStore = useAuthStore()

const currentRouteName = router.currentRoute.value.name
</script>
