import { createRouter, createWebHistory } from 'vue-router';
import LoginView from '../pages/LoginView.vue';
import LandingView from '../pages/LandingView.vue';
import MateriView from '../pages/MateriView.vue';
import KelompokView from '../pages/KelompokView.vue';
import AboutView from '../pages/AboutView.vue';

const routes = [
  { path: '/', component: LandingView },
  { path: '/login', component: LoginView },
  { path: '/materi', component: MateriView },
  { path: '/kelompok', component: KelompokView },
  { path: '/about', component: AboutView },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
