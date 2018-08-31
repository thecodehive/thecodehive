<template>
  <header>
      <b-navbar toggleable="md" type="dark" fixed="top" class="mx-md-4">

        <nuxt-link to="/home"><b-navbar-brand>TheCodeHive</b-navbar-brand></nuxt-link>

        <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>

        <b-collapse is-nav id="nav_collapse">
          <b-navbar-nav class="ml-md-auto">
              <b-nav-item to="/login">Login</b-nav-item>
              <b-nav-item to="/about">About</b-nav-item>
          </b-navbar-nav>

        </b-collapse>
      </b-navbar>
    </header>
</template>

<script>
export default {};
</script>

<style scoped>
.navbar-toggler {
  color: rgba(255, 255, 255, 0.5);
  border-color: transparent;
}
</style>
