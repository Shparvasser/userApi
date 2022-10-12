import './bootstrap';
import '../css/app.css';

import {createApp} from "vue/dist/vue.esm-bundler";
import {createPinia} from "pinia/dist/pinia";
import * as VueRouter from 'vue-router'

import NavBar from "./components/layouts/NavBar.vue";
import SignIn from "./pages/auth/SignIn.vue";
import SignUp from "./pages/auth/SignUp.vue";


const routes = [
  {path : '/signIn', component: SignIn},
  {path : '/signUp', component: SignUp}
]

const router = VueRouter.createRouter({
  history: VueRouter.createWebHistory('/'),
  routes,
})

const pinia = createPinia()
const app = createApp({});

app.use(pinia)
app.use(router)

app.component('nav-bar', NavBar)

app.mount('#app')
