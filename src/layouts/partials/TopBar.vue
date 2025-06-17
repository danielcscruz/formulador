<template>
  <header class="topbar">
    <b-container fluid>
      <div class="navbar-header">
        <div class="d-flex align-items-center gap-2">
          <!-- Menu Toggle Button -->
          <div class="topbar-item">
            <button type="button" class="button-toggle-menu topbar-button">
              <Icon icon="solar:hamburger-menu-broken" class="fs-24 align-middle" @click="toggleLeftSideBar" />
            </button>
          </div>

          <!-- App Search-->

        </div>

        <div class="d-flex align-items-center gap-1">
          <!-- Theme Color (Light/Dark) -->
          <div class="topbar-item">
            <button type="button" class="topbar-button" id="light-dark-mode" @click="toggleTheme">
              <Icon icon="solar:moon-broken" class="fs-24 align-middle light-mode" />
              <Icon icon="solar:sun-broken" class="fs-24 align-middle dark-mode" />
            </button>
          </div>

          <!-- Category -->
          <div class="dropdown topbar-item d-none d-lg-flex">
            <button type="button" class="topbar-button" data-toggle="fullscreen" @click="toggleFullScreen">
              <Icon icon="solar:full-screen-broken" class="fs-24 align-middle fullscreen" />
              <Icon icon="solar:quit-full-screen-broken" class="fs-24 align-middle quit-fullscreen" />
            </button>
          </div>
          <div>
          </div>

          <!-- User -->
          <DropDown class="topbar-item">
            <a type="button" class="topbar-button" id="page-header-user-dropdown" data-bs-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <span class="d-flex align-items-center">
                <!-- <img class="rounded-circle" width="32" :src="avatar1" alt="avatar-1"> -->
                <img :src="avatarUrl" alt="Avatar" width="32" height="32" />
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end">

              <h6 v-if="authStore.isAuthenticated" class="dropdown-header">Bem vindo, {{ authStore.user?.first_name}}</h6>
              <h6 v-else class="dropdown-header">Bem vindo! Faça o login</h6>

              <!-- <router-link class="dropdown-item" :to="{ name: item.route?.name }"
                v-for="(item, idx) in profileMenuItems" :key="idx">
                <i :class="`bx ${item.icon} text-muted fs-18 align-middle me-1`"></i><span class="align-middle">{{
                  item.label }}</span>
              </router-link> -->

              <div class="dropdown-divider my-1"></div>

              <router-link v-if="authStore.isAuthenticated" class="dropdown-item text-danger" :to="{ name: 'auth.sign-in' }">
                <i class="bx bx-log-out fs-18 align-middle me-1"></i><span class="align-middle">Sair</span>
              </router-link>
              <router-link v-else class="dropdown-item text-success" :to="{ name: 'auth.sign-in' }">
                <i class="bx bx-log-in fs-18 align-middle me-1"></i><span class="align-middle">Entrar</span>
              </router-link>
            </div>
          </DropDown>


        </div>
      </div>
    </b-container>
  </header>
</template>

<script setup lang="ts">
import { onMounted } from 'vue';
import { Icon } from "@iconify/vue";
import simplebar from 'simplebar-vue';

import { useLayoutStore } from '@/stores/layout';
import { toggleDocumentAttribute } from "@/helpers";
import { profileMenuItems, notifications } from "@/layouts/partials/data";

import DropDown from "@/components/DropDown.vue";
import avatar1 from "@/assets/images/users/avatar-1.jpg";

import { useAuthStore } from '@/stores/auth';
import { generateAvatarSVG } from '@/utils/generateAvatarSVG'


const authStore = useAuthStore()
const svg = generateAvatarSVG(authStore.user?.first_name, authStore.user?.last_name) || ""

const avatarUrl = `data:image/svg+xml;base64,${btoa(svg)}`

const toggleFullScreen = () => {
  if (!document.fullscreenElement) {
    document.documentElement.requestFullscreen();
    document.body.classList.add('fullscreen-enable');
  } else if (document.exitFullscreen) {
    document.exitFullscreen();
    document.body.classList.remove('fullscreen-enable');
  }
};

const useLayout = useLayoutStore();

const toggleTheme = () => {
  if (useLayout.layout.theme === 'light') {
    return useLayout.setTheme('dark');
  }
  useLayout.setTheme('light');
};

const toggleLeftSideBar = () => {
  if (useLayout.layout.leftSideBarSize === 'default') {
    return useLayout.setLeftSideBarSize('condensed');
  }
  if (useLayout.layout.leftSideBarSize === 'condensed') {
    return useLayout.setLeftSideBarSize('default');
  }
  toggleDocumentAttribute('class', 'sidebar-enable');
  showBackdrop();
};

const showBackdrop = () => {
  let backdrop = document.createElement('div') as HTMLDivElement;
  if (backdrop) {
    backdrop.classList.add('offcanvas-backdrop', 'fade', 'show');
    document.body.appendChild(backdrop);
    document.body.style.overflow = 'hidden';
    if (window.innerWidth > 1040) {
      document.body.style.paddingRight = '15px';
    }

    backdrop.addEventListener('click', function (e) {
      toggleDocumentAttribute('class', '');
      document.body.removeChild(backdrop);
      document.body.style.overflow = '';
      document.body.style.paddingRight = '';
    });
  }
};

onMounted(() => {
  useLayout.init();
});
</script>
