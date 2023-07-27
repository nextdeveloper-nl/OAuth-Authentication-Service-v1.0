import { defineStore } from "pinia";
import { useCoreStore as core } from "./core.module";
import { createUrl } from "../../extension/createUrl";
export const useAuthStore = defineStore({
  id: "auth",
  state: () => ({
    login_method: null,
    csrf: null,
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
    async actionGetLoginMethod(payload) {
      const response = await core().get({
        url: createUrl("/getLogins", payload),
      });
      this.login_method = response.data;
      return this.login_method;
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
      localStorage.setItem('locale',response.data.locale)
      return response
    },
  },
});
