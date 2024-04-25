<script setup>
import {Notifications} from "@kyvg/vue3-notification";
</script>

<template>
  <notifications class="m-2" />
  <div class="bg-white">
    <h1>Hello</h1>
    <router-view></router-view>
  </div>
</template>

<style>
@import "style.css";
body, h1, h2, h3, p, label
{
  font-family: 'Roboto', sans-serif;
}
</style>


