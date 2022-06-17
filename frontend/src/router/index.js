import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/add',
    name: 'add',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AddUser.vue')
  },
  {
    path: '/edit/:id',
    name: 'edit',
    component: () => import('../views/EditUser.vue')
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
