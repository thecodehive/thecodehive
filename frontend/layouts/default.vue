<template>
  <div>
    <nuxt/>
  </div>
</template>

<script>
// require("bootstrap");
export default {};
</script>


<style>
html {
  font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI",
    Roboto, "Helvetica Neue", Arial, sans-serif;
  font-size: 16px;
  word-spacing: 1px;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
}
*,
*:before,
*:after {
  box-sizing: border-box;
  margin: 0;
}
.button--green {
  background: transparent;
  display: inline-block;
  border-radius: 2px;
  border: 1px solid #2bd789;
  color: #38eb9c;
  text-decoration: none;
  padding: 10px 30px;
  font-size: 20px;
  cursor: pointer;
  transition: background 0.3s cubic-bezier(0, 0.2, 0.58, 1);
}
.button--green:hover {
  background: rgba(59, 128, 112, 0.35);
}
.button--green:focus {
  outline: none;
  background: rgba(59, 128, 112, 0.35);
}
.button--green:active {
  font-size: 18px;
  background: transparent;
}
.button--grey {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #35495e;
  color: #35495e;
  text-decoration: none;
  padding: 10px 30px;
  margin-left: 15px;
}
.button--grey:hover {
  color: #fff;
  background-color: #35495e;
}

/*primary text color*/
.main-text-color {
  color: #2ff99d;
}
.main-bg {
  color: #28d889;
}

button:focus {
  outline: none;
}

a {
  text-decoration: none;
}

.bordered {
  border-radius: 2px;
}

.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #2ff99d;
    outline: 0;
    -webkit-box-shadow: inset 0 0 5px 1px rgba(0, 255, 19, 0.41);
    box-shadow: inset 0 0 5px 1px rgba(0, 255, 19, 0.41);
}
</style>
