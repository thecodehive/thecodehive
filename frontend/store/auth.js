import api from "~/api";
import { setAuthToken, resetAuthToken } from "~/utils/auth";
import cookies from "js-cookie";

export const state = () => ({
  user: null
});

export const mutations = {
  set_user(store, data) {
    store.user = data;
  },

  reset_user(store) {
    store.user = null;
  }
};

export const actions = {
  fetch({ commit }) {
    return api.auth
      .me()
      .then(response => {
        commit("set_user", response.data);
        return response;
      })
      .catch(error => {
        commit("reset_user");
        return error;
      });
  },
  login({ dispatch }, data) {
    return api.auth.login(data).then(response => {
      // commit("set_user", response.data.user);
      dispatch("fetch");
      setAuthToken(`Bearer ${response.data.access_token}`);
      cookies.set("Authorization", `Bearer ${response.data.access_token}`, {
        expires: 7
      });
      return response;
    });
  },
  reset({ commit }) {
    commit("reset_user");
    resetAuthToken();
    cookies.remove("Authorization");
    return Promise.resolve();
  }
};
