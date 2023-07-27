import { defineStore } from "pinia";
import axios from "axios";
export const useCoreStore = defineStore({
  id: "core",
  state: () => ({}),
  getters: {},
  actions: {
    async get(payload) {
      try {
        const response = await axios.get(payload.url);
        return response;
      } catch (error) {
        console.log(error);
      }
    },
    async post(payload) {
      try {
        const response = await axios.post(payload.url, payload.model);
        return response;
      } catch (error) {
        console.log(error);
      }
    },
    async put(payload) {
      try {
        const response = await axios.put(payload.url, payload.model);
        return response;
      } catch (error) {
        console.log(error);
      }
    },
    async delete(payload) {
      try {
        const response = await axios.delete(payload.url);
        return response;
      } catch (error) {
        console.log(error);
      }
    },
  },
});
