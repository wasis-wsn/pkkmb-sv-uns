<template>
    <div>
      <HeaderView />
      
      <!-- Konten dari halaman yang menggunakan layout ini -->
      <slot></slot>
      
      <FooterView />
    </div>
  </template>
  
  <script>
import HeaderView from './HeaderView.vue';
import FooterView from './FooterView.vue';
  
  export default {
    components: {
      HeaderView,
      FooterView
    }
  };
  </script>
  