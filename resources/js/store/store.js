import {createStore} from "vuex";
import exchangeRate from "./modules/exchangeRate";

export default createStore({
    modules: {
        exchangeRate
    }
})
