<template>
    <section>
        <button class="btn btn-secondary"
            @click="$store.dispatch('auth/fetch')">Check Me
        </button>
        <button class="btn btn-secondary"
            @click="logOut">Log out
        </button>
        <h4>
          {{user.email}}
        </h4>
    </section>
</template>

<script>
export default {
  // middleware: "authenticated",

  methods: {
    logOut() {
      this.$store.dispatch("auth/reset").then(() => {
        this.$router.push("/");
      });
    }
  },

  computed: {
    user() {
      return (this.$store.state.auth || {}).user || "";
    }
  }
};
</script>

<style>
</style>
