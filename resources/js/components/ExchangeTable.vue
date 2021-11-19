<template>
    <table class="border-separate border">
        <caption>Exchange Rate of {{fromCurrency}}</caption>
        <thead>
            <tr>
                <th>Base Currency</th>
                <th>Rate</th>
                <th>Exchange Currency</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(value, key) in allowedRates">
                <td style="text-align: center">{{ fromCurrency }}</td>
                <td style="text-align: center">{{ value }}</td>
                <td style="text-align: center">{{ key }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
    name: "ExchangeTable",
    data() {
        return {
            fromCurrency: this.from,
        }
    },
    methods: {
        ...mapActions(['fetchExchangeRates'])
    },
    mounted() {
        this.fetchExchangeRates()
    },
    computed: mapGetters(['allowedRates', 'from']),
    watch: {
        allowedRates() {
            this.fromCurrency = this.from
        }
    }
}
</script>

<style scoped>

</style>
