import axios from "axios";

const lang = await import(`./../../../lang/vue/${localStorage.getItem('locale')}.json`);

String.prototype.t1 = function () {
    t(this);
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