import { createI18n } from "vue-i18n";
import en from './en'
import tr from './tr'

function loadLocalesMessages(){
    const locales = [{en:en},{tr:tr}]
    const messages = {}
    locales.forEach(lang=>{
        const key = Object.keys(lang)
        messages[key]=lang[key]
    })
    return messages
}
export default createI18n({
    locale:'en',
    fallbackLocale:'en',
    messages:loadLocalesMessages()
})
