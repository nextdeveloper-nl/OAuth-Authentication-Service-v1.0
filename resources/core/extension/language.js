import axios from "axios";
import VueCookies from "vue-cookies";

let locale = localStorage.getItem('locale');

if(locale == 'undefined')
    locale = VueCookies.get('locale');

if(locale == 'undefined')
    locale = 'en';

let lang;

try {
    lang = await import(`./../../../lang/vue/${locale}.json`);
} catch (e){}

String.prototype.t1 = function () {
    console.log(this);
    if(lang == undefined || !(this in lang.default)) {
        //  This is a very stupid workaround. I did this but I have no idea how to fix this :D
        //  The problem is this; when we enter a new text in a textbox, obviously vue updates all the
        //  visible components, which is fine. But it also runs all the prototypes and functions within the
        //  visible area, which hits our dynamic translation service.

        //  The most generic way of fixing this issue is not to use prototypes or functions but instead we should
        //  use static content. Or maybe we should add somekind of a predefined text.

        //  This is because translation service does not translate locales. If we maybe include the locales in
        //  dictionary, then this will be fixed.
        if(this.length > 2)
            t(this);
        return this;
    }

    return lang.default[this];
};

export async function t(text) {
    let response = await axios.post(
        "http://127.0.0.1:8000/i18n/translation",
        {
            text: text,
            locale: localStorage.getItem('locale'),
            domain_id: "d2c98bdf-9942-11ee-b8af-c2ea10853885"
        }
    )
        .then(function (response) {
            return response.data.data.translation;
        })
}