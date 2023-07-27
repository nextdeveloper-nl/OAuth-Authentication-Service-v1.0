import './bootstrap';
import i18n from '../locales/i18n';
import {createApp} from 'vue'
import login from '/resources/views/components/login.vue'
import '../core/extension/language'
import { createPinia } from 'pinia';

const pinia = createPinia()
createApp(login).use(pinia).use(i18n).mount("#login")