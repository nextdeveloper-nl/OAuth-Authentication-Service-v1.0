import axios from "axios";

String.prototype.t1 = function () {
    let translated = axios.post(
        "http://127.0.0.1:8000/i18n/translate",
        {
            text: this,
            locale: localStorage.getItem('locale'),
        }
    )
        .then(function(response) {
            console.log(response)
            return response.data.translation;
        })

    return translated;
  };
  