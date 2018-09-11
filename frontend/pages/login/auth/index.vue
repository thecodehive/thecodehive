<template>
  <section>
    <div class="video-main">
      <TheNavbar/>
      <div class="video-container">
        <video class="video" src="/videos/Mock-up.mp4" autoplay loop></video>
      </div>
      <div class="video-overlay">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4 offset-md-4 col-sm-8 offset-md-2">
              <div class="auth-container bg-white p-4 pb-2 bordered animated fadeIn">
                <h4 class="main-text-color text-center pb-1">The Code Hive</h4>
                <div class="progress" style="height: 1px;">
                  <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
                <form class="pt-3" @submit.prevent="submit">
                  <div class="form-group">
                    <input  
                        v-validate="'required|email'"
                        type="text" 
                        readonly 
                        class="form-control-plaintext" 
                        id="staticEmail"
                        :value="email"
                    >
                  </div>
                  <div class="form-group">
                    <input
                        v-validate="'required|min:6'"
                        type="text" 
                        v-model="password" 
                        class="form-control bordered" 
                        id="password" 
                        name="password" 
                        placeholder="Your password"
                    >
                    <small v-if="errors.has('password')" class="form-text text-danger">
                     {{ errors.first('password') }}
                    </small>
                  </div>
                  <div class="form-group">
                    <button 
                        :disabled="errors.has('password') || password == ''"
                        class="btn btn-success bordered">
                        Login
                    </button>
                  </div>
                </form>
                  <small class="form-text text-muted">
                    Not a member? 
                    <nuxt-link to="/join">
                        Join
                    </nuxt-link>
                  </small>
                  <small v-show="loading" class="form-text text-muted">
                    loading...
                  </small>
                  <small class="form-text text-muted">
                      {{alert.type}}
                  </small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>


<script>
import TheNavbar from "@/components/TheNavbar";

export default {
  components: {
    TheNavbar
  },

  // layout: "fullscreen",
  middleware: "notAuthenticated",

  data() {
    return {
      email: "jay@gmail.com",
      password: "",
      alert: "",
      loading: false
    };
  },
  methods: {
    submit({ redirect }) {
      this.alert = "";
      this.loading = true;
      this.$store
        .dispatch("auth/login", {
          email: this.email,
          password: this.password
        })
        .then(result => {
          this.alert = {
            type: "success",
            message: result.data.message
          };
          this.loading = false;
          console.log(result);
          return this.$router.push("/admin");
        })
        .catch(error => {
          this.loading = false;
          console.log(error);
          if (error.response && error.response.data) {
            this.alert = {
              type: "error",
              message: error.error || error.reponse.status
            };
          }
        });
    }
  }
};
</script>


<style scoped>
.video-main {
  height: 100vh;
  width: 100%;
}
.video-container {
  height: inherit;
  width: inherit;
  position: relative;
  z-index: 0;
  overflow: hidden;
}
.video {
  height: inherit;
  width: inherit;
  object-fit: none;
  /* object-position: top; */
  background-color: black;
  position: fixed;
}
.video-overlay {
  height: inherit;
  width: inherit;
  position: absolute;
  top: 0;
  z-index: 1;
  background: rgba(1, 71, 74, 0.39);
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>




