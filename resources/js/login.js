import './bootstrap';
import i18n from '../locales/i18n';
import {createApp} from 'vue'
import login from '/resources/views/components/login.vue'
import '../extension/language'
createApp(login).use(i18n).mount("#login")