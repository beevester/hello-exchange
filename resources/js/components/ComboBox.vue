<template>
    <div class="grid my-4 border-purple-900 rounded border-2 p-2">
        <label for="Currency" class="text-green-900">{{ label }}</label>
        <select
            :multiple="multiple ? 'multiple': null"
            id="Currency"
            name="currency"
            @change="onChange()"
            v-model="selectedValue"
            class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
            <option v-for="(rate, key) in rates">{{ key }}</option>
        </select>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
    name: "ComboBox",
    computed: mapGetters(['rates', 'from', 'allowedRates']),
    props: ['label', 'multiple'],
    data() {
        return {
            selectedValue: this.from,
        }
    },
    methods: {
        ...mapActions(['fetchRates']),
        onChange() {
            this.$store.commit('set' + this.label, this.selectedValue)
        }
    },
    mounted() {
        this.fetchRates().then(() => {
            this.selectedValue = this.from

            if (this.label !== 'From' ) {
                this.selectedValue = this.allowedRates
            }
        })
    }
}
</script>

<style scoped>

</style>
