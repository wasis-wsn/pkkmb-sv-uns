<template>
  <div class="container">
    <header class="header">
      <div class="header-content">
        <div class="header-bar">
          <div class="bar-item"></div>
          <div class="bar-item"></div>
          <div class="bar-item"></div>
          <div class="bar-item"></div>
          <div class="bar-item"></div>
        </div>
        <h1 class="header-title">
          KELOMPOK<br />PKKMB SV UNS 2024
        </h1>
      </div>
      <img loading="lazy" src="../assets/logo_besar.png" alt="PKKMB SV UNS 2024 logo" class="header-logo" />
    </header>
    <main class="main-content">
      <section class="search-section">
        <div class="search-header">
          <h2 class="search-title">PENCARIAN KELOMPOK</h2>
          <div class="search-underline"></div>
          <p class="search-description">
            Hallo Vocazens! Kamu dapat melakukan pencarian terkait pembagian kelompok pada halaman ini. Selamat
            menikmati!
          </p>
        </div>
      </section>
      <div class="table-container">
        <form class="search-form">
          <label for="groupSearch" class="search-label">
            Cari Kelompok
          </label>
          <div class="search-input-container">
            <MagnifyingGlassIcon class="size-5" />
            <input type="text" id="groupSearch" class="search-input" placeholder="Masukkan nama anda" />
          </div>
          <div class="filter-button">
            <FunnelIcon class="size-8" />
          </div>
        </form>
        <table class="group-table">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Kelompok</th>
              <th>Prodi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>yoga</td>
              <td>macan aung</td>
              <td>d3 teknik informatika</td>
            </tr>
            <tr>
              <td>ardya</td>
              <td>bangau wayaw</td>
              <td>d3 teknik informatika</td>
            </tr>
            <tr>
              <td>mamat</td>
              <td>elang putra</td>
              <td>d3 teknik informatika</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</template>

<script>
  import {
    FunnelIcon,
    MagnifyingGlassIcon
  } from '@heroicons/vue/24/outline'

  export default {
    name: 'KelompokView',
    components: {
      FunnelIcon,
      MagnifyingGlassIcon
    }
  }
</script>

<style scoped>
  @import '../css/pages/kelompokview.css';
</style>