<template>
  <div id="app">
    <LoginView />
  </div>
</template>

<script>
import LoginView from './pages/LoginView.vue';

export default {
  name: 'App',
  components: {
    LoginView
  }
};
</script>

<style>
@import 'css/main.css';
</style>
