import { createRouter, createWebHistory } from "vue-router";
import LandingView from "../pages/LandingView.vue";
import AboutView from "../pages/AboutView.vue";
import MateriView from "../pages/MateriView.vue";
import GaleriView from "../pages/GaleriView.vue";
import KelompokView from "../pages/KelompokView.vue";
import LoginView from "../pages/LoginView.vue";
import ErrorView from "../views/ErrorView.vue";
import LayoutWithHeaderFooter from "../components/LayoutWithHeaderFooter.vue";

const routes = [
  {
    path: "/",
    component: LayoutWithHeaderFooter,
    children: [
      { path: "", component: LandingView },
      { path: "/about", component: AboutView },
      { path: "/kelompok", component: KelompokView },
      { path: "/Materi", component: MateriView },
      { path: "/Galeri", component: GaleriView },
    ],
  },
  {
    path: "/login",
    component: LoginView,
  },
  {
    path: "/:catchAll(.*)",
    component: ErrorView,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
