import { createApp } from 'vue';
import './style.css';
import 'flowbite';
import App from './App.vue';
import {createRouter, createWebHistory} from "vue-router";


import Notifications from '@kyvg/vue3-notification'
import HomePage from "@/pages/home/HomePage.vue";

const routes = [
    { path: '/', component: HomePage },
];
const router = createRouter({
    history: createWebHistory(),
    routes
});

const app = createApp(App)
app.use(router)
app.use(Notifications)
app.mount('#app')

