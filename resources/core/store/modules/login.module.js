import { defineStore } from "pinia";
import { useCoreStore as core } from "./core.module";
import { createUrl } from "../../extension/createUrl";
export const useAuthStore = defineStore({
  id: "auth",
  state: () => ({
    login_method: null,
    csrf: null,
    password: null
  }),
  getters: {
    getLoginMethod() {
      return this.login_method;
    },
    getToken() {
      return this.csrf;
    },
  },
  actions: {
    async actionLogin(username,password,mechanism) {

      return response.data;
    },
    async actionGetCsrf(payload) {
      const response = await core().get({
        url: createUrl("/security/csrf", payload),
      });
      this.csrf = response.data;
      return this.csrf;
    },
    async actionGetLocale(payload) {
      const response = await core().get({
        url: createUrl("/config",payload),
      });
      console.log(response);
      localStorage.setItem('locale',response.data.locale)
      return response
    },
    async actionGetNewEmailOtp() {
      const response = await core().get({
        url: createUrl("/",payload),
      });
    }
  },
});
