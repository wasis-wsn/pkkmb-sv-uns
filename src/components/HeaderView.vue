<template>
    <header>
      <nav>
        <!-- Isi navigasi header di sini -->
        <router-link to="/">Home</router-link>
        <router-link to="/about">About</router-link>
        <router-link to="/contact">Contact</router-link>
      </nav>
    </header>
  </template>
  
  <script>
  export default {
    name: 'HeaderView'
    // Komponen header bisa memiliki properti, metode, atau logika lainnya sesuai kebutuhan
  };
  </script>
  
  <style scoped>
  /* Styling untuk header */
  header {
    background-color: #333;
    color: white;
    padding: 1rem;
  }
  nav {
    display: flex;
    justify-content: space-between;
  }
  nav a {
    color: white;
    text-decoration: none;
    margin-right: 1rem;
  }
  </style>
  