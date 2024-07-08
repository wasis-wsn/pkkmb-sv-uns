<template>
    <div>
      <HeaderView />
      
      <!-- Konten dari halaman yang menggunakan layout ini -->
      <router-view></router-view>
      
      <FooterView />
    </div>
  </template>
  
  <script>
import HeaderView from './NavbarView.vue';
import FooterView from './FooterView.vue';
  
  export default {
    components: {
      HeaderView,
      FooterView
    }
  };
  </script>
  