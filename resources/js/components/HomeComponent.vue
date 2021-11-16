<template>
  <div class="main-section">
    <menu-component></menu-component>
    <div class="main-content">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
</script>
<style scoped>
.main-section {
  max-width: 900px;
  width: 100%;
  margin: 0 auto;
}
.main-content {
  padding: 20px;
  border: solid 1px #e0e0e0;
  border-radius: 0px 0px 10px 10px;
  min-height: 400px;
  background: white;
}
</style>