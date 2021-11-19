<template>

    <div class="grid">
        <h1 class="text-2xl text-center text-green-900">HELLO! Exchange</h1>

        <h3 class="text-center mt-8">Exchange of {{from}} to {{ to }}</h3>
        <h6 v-if="showThis" class="text-xs italic text-center">This was set as default</h6>
        <div class="mb-6"></div>

        <button class="rounded bg-indigo-600 text-indigo-200 w-2/6" @click="refresh()">Refresh</button>

        <select-box label="From"></select-box>

        <select-box label="To" multiple="true"></select-box>
        <h6 v-if="showThis" class="-mt-4 mb-4 italic text-xs text-center">To multiselect please holding the (mac) Command / (win) Ctrl button and click your selection</h6>

        <button class="rounded bg-green-600 text-green-200 w-2/6" @click="getExchange()">Get Rate/s</button>

        <exchange-table class="mt-8 mx-auto bg-white p-6 rounded-md"></exchange-table>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "MainPage",
    data() {
      return {
          fromCurrency: this.from,
          toCurrency: this.to,
          showThis: true
      }
    },
    computed: mapGetters(['to', 'from']),
    methods: {
        refresh() {
            this.$store.commit('setAllowedRates', [])
        },
        getExchange() {
            this.$store.dispatch('fetchExchangeRates')
            this.showThis = false
        }
    }
}
</script>

<style scoped>

</style>
