import axios from "axios";
import { baseURL } from "~/config";
import cookies from "js-cookie";
import { setAuthToken, resetAuthToken } from "~/utils/auth";

axios.defaults.baseURL = baseURL;

const token = cookies.get("Authorization");
if (token) setAuthToken(token);
else resetAuthToken();
