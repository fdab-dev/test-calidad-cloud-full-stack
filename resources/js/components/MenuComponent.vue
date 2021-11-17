<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <div class="">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <router-link :to="{ name: 'user-home' }" class="nav-link" href="#">Home</router-link>
            </li>
            <li class="nav-item">
                <router-link :to="{ name: 'user-list' }" class="nav-link" href="#">Listar usuarios</router-link>
            </li>
            <li class="nav-item">
                <router-link :to="{ name: 'user-new' }" class="nav-link" href="#">Nuevo usuario</router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
</script>
<style scoped>
.navbar-expand-lg .navbar-nav{
    flex-direction: row!important;
}
.nav-item{
    margin-right: 10px;
}

</style>