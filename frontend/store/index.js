import cookie from "cookie";
import { setAuthToken, resetAuthToken } from "~/utils/auth";

export const actions = {
  nuxtServerInit({ dispatch }, { req }) {
    return new Promise((resolve, reject) => {
      const cookies = cookie.parse(req.headers.cookie || "");
      if (cookies.hasOwnProperty("Authorization")) {
        setAuthToken(cookies["Authorization"]);
        dispatch("auth/fetch")
          .then(result => {
            resolve(true);
          })
          .catch(error => {
            console.log("Provided token is invalid:", error);
            resetAuthToken();
            resolve(false);
          });
      } else {
        resetAuthToken();
        resolve(false);
      }
    });
  }
};
