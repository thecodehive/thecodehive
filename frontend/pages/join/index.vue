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
              <div class="auth-container bg-white p-4 pb-2 bordered">
                <h4 class="main-text-color text-center pb-1">The Code Hive</h4>
                <div class="progress" style="height: 2px;">
                  <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <form class="pt-3" method="post" @submit.prevent="checkEmail">
                  <div class="form-group">
                    <label class="col-form-label" for="email">Email address</label>
                    <input v-validate="'required|email'" type="text" v-model="email" class="form-control bordered" id="email" placeholder="Your email address" name="email">
                    <small v-if="errors.has('email')" id="emailHelpBlock" class="form-text text-muted">
                     {{ errors.first('email') }}
                    </small>
                    <small v-else class="form-text text-muted">
                      You will be verified using this email so it should be valid
                    </small>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-success bordered">Continue</button>
                    <small class="form-text text-muted">
                      Already a member? <nuxt-link to="/login">Login</nuxt-link>
                    </small>
                  </div>
                </form>
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

  data: () => ({
    
    email: null

  }),

  methods: {
    checkEmail() {
      this.$validator.validateAll().then((result) => {
        if (result) {
          // eslint-disable-next-line
          alert('Form Submitted!');
          return;
        }

        alert('Correct them errors!');
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




