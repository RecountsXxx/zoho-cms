import { createApp } from 'vue';
import './style.css';
import 'flowbite';
import App from './App.vue';
import {createRouter, createWebHistory} from "vue-router";


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
app.mount('#app')

