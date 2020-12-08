import crud from "./crud/index.js";
import gform from "./gform/index.js"

const app = {
    namespaced: true,
    state: {
        lang: {
            locale: 'th',
            lang: 'Thai',
            flag: 'th.jpg'
        },
        languages: {
            'en': 'English',
            'th': 'ไทย',
            'cn': '中文'
        },
        window: {
            width: 0,
            height: 0
        } 
    },
    mutations: {},
    actions: {},
    getters: {},
}

const store = {
        app,
        crud,
        gform
};

export default store;