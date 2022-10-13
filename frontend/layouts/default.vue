<template>
  <div>
    <!--Nav Bar-->
    <b-navbar toggleable="lg" type="dark" variant="info" class="bg-dark">
      <b-navbar-brand href="#" class="font-weight-bolder font-italic"
        >IQ TEST</b-navbar-brand
      >

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <NuxtLink
            to="/"
            v-if="$auth.loggedIn"
            type="dark"
            class="btn-warning mb-1 mr-3 rounded p-2 text-white text-center"
            >Home</NuxtLink
          >
          <NuxtLink
            to="/login"
            v-if="!$auth.loggedIn"
            type="dark"
            class="btn-warning mb-1 mr-3 text-white text-center rounded p-2"
            >Login</NuxtLink
          >
          <NuxtLink
            to="/register"
            v-if="!$auth.loggedIn"
            type="dark"
            class="btn-warning mr-3 mb-1 text-white text-center rounded p-2"
            >Register</NuxtLink
          >
          <NuxtLink
            to="/profile"
            v-if="$auth.loggedIn"
            type="dark"
            class="btn-warning mr-3 mb-1 text-white text-center rounded p-2"
            >Profile</NuxtLink
          >
          <NuxtLink
            to="/dashboard"
            v-if="$auth.loggedIn"
            type="dark"
            class="btn-warning mr-3 mb-1 text-white text-center rounded p-2"
            >History</NuxtLink
          >
          <button
            type="button"
            v-if="$auth.loggedIn"
            class="btn-danger mr-3 mb-1 text-white text-center rounded p-2"
            @click="logout"
          >
            Logout
          </button>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
    <Nuxt />
  </div>
</template>
<script>
export default {
  auth: false,
  middleware: "auth",

  methods: {
    async logout() {
      this.$nuxt.$loading.start();
      this.$auth.logout();
      this.$nuxt.$loading.finish();
      this.$router.push("/login");
    },
  },
};
</script>
<style scoped>
</style>