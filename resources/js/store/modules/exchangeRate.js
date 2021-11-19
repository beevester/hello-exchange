const state = {
    baseRate: "",
    rates: [],
    allowedRates: [],
    from: "EUR",
    to: [
        "ZAR",
        "INR",
        "USD",
        "BDT",
        "PKR"
    ]
};

const actions = {
    async fetchRates({ commit }) {
        const response = await axios.get('/api/rates');
        commit('setRates', response.data.rates)
        commit('setBaseCurrency', response.data.base)
    },
    async fetchExchangeRates({commit}) {
      const response = await axios.post('/api/exchange-rates', {
          from: state.from,
          to: state.to
      });
    commit('setAllowedRates', response.data.rates)
    commit('setBaseCurrency', response.data.base)
    }
}

const getters = {
    base: (state) => state.baseRate,
    rates: (state) => state.rates,
    from: (state) => state.from,
    to: (state) => state.to,
    allowedRates: (state) => state.allowedRates
};

const mutations = {
    setAllowedRates: (state, rates) => state.allowedRates = rates,
    setRates: (state, rates) => state.rates = rates,
    setBaseCurrency: (state, base) => state.baseRate = base,
    setFrom: (state, from) => state.from = from,
    setTo: (state, to) => state.to = to,
}

export default {
    state,
    getters,
    actions,
    mutations
}
