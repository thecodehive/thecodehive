import axios from "axios";
import { baseURL } from "~/config";
// import cookies from "js-cookie";
import { setAuthToken, resetAuthToken } from "~/utils/auth";
var cookies = require("js-cookie");

axios.defaults.baseURL = baseURL;

const token = cookies.get("Authorization");
console.log(token);
if (token) setAuthToken(token);
else resetAuthToken();
