// App.vue

<template>
  <div class="container-fluid">
    <div>
      <transition name="fade">
        <router-view></router-view>
      </transition>
    </div>
  </div>
</template>

<style>
body {
  font-family: "Nunito", sans-serif;
}
</style>

<script>
export default {};
</script>