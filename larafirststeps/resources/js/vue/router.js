import { createRouter, createWebHashHistory } from "vue-router";

import List from "./components/listComponent.vue";
import Save from "./components/SaveComponent.vue";

const routes = [ 
  {
    path: "/",          // ✅ RUTA RAÍZ (ESTO FALTABA)
    redirect: "/vue"    // redirige a tu vista real
  },
  {
    name: "list",
    path: "/vue",
    component: List
  },
  {
    name: "save",
    path: "/vue/save",
    component: Save
  }
];

const router = createRouter({
  history: createWebHashHistory(),
  routes
});

export default router;
