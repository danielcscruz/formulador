<template>
  <footer class="footer">
    <b-container fluid>
      <b-row>
        <b-col cols="12" class="text-center">
          {{ currentYear }} &copy; Formulador. Desenvolvido por
          <a href="https://dev.dancruz.me/" class="fw-bold footer-text" target="_blank">Daniel Cruz</a>
        </b-col>
      </b-row>
    </b-container>
  </footer>
</template>

<script setup lang="ts">
import { Icon } from '@iconify/vue';
import { currentYear } from "@/helpers/constants";
</script>