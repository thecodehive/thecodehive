<template>
  <section>
    <div class="video-main">
      <TheNavbar/>
      <div class="video-container">
        <video class="video" src="/videos/Mock-up.mp4" autoplay loop></video>
      </div>
      <div class="video-overlay">
        <div class="main-text-color text-center">
          <h1 class="display-3 animated fadeInDown">The Code Hive</h1>
          <hr>
          <p class="lead animated fadeIn">
            Porposeful innovations a better world!
          </p>
          <button 
            type="button" 
            class="button--green mr-2 animated fadeInUp">
            Join now!
          </button>
          <button 
            type="button" 
            class="button--green animated fadeInUp">
            Explore talent
          </button>
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
  }
};
</script>

<style>
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


