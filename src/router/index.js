import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Pays from '../views/Pays.vue'
import FichePays from '../views/FichePays.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/pays',
      name: 'pays',
      component: Pays
    },
    {
      path: '/pays/:id',
      name: 'fiche-pays',
      component: FichePays
    }
  ]
})

export default router
