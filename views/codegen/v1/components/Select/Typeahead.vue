<template>
    <div>
        <h1 class="title">Typeahead</h1>
        <h1 class="title">Customer ID: {{customerId}}</h1>
        <input ref="inputRef" v-model="customerLabel" type="text" class="input" />
    </div>
</template>

<script>
import 'autocompleter/autocomplete.min.css'
import '../style.css'
import autocomplete from 'autocompleter'
import db from '../db.json'

const customers = db.customers.map(({ id, first_name, last_name }) => {
    return {
        id,
        label: `${first_name} ${last_name}`
    }
})

export default {
    data() {
        return {
            customerId: 0,
            customerLabel: ''
        }
    },
    mounted() {
        this.autocompleteRef = autocomplete({
            input: this.$refs.inputRef,
            minLength: 1,
            emptyMsg: 'No matched items found',

            fetch(text, update) {
                const pattern = new RegExp(text, 'i')
                const suggestions = customers.filter(({ label }) => {
                    return pattern.test(label)
                })

                update(suggestions)
            },

            onSelect: ({ id, label }) => {
                this.customerId = id
                this.customerLabel = label
            }
        })
    },

    beforeDestroy() {
        this.autocompleteRef.destroy()
    }
}
</script>