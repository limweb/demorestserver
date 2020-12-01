export default { 
    template: `
    <div> 
        <h1 class="font-blod">{{label}}:</h1>
        <input                   
            class="bg-yellow-200 border-2 rounded input"
            type="text"
            :id="id"
            :placeholder="label"
            :value="value"
            :required="required"
            v-on:input="updateValue($event.target.value)"
        />
    </div>
    `, 
    props: {
      id: {
        type: String
      },
      label: {
        type: String,
        required: true
      },
      value: {
        type: String,
        default: 'abc'
      },
      required: {
        type: Boolean,
        default: false
      }
    },
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Test', 
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    methods: {
      updateValue(value) {
        this.$emit('input', value)
      }
    }, 
    computed: {}, 
    mounted() {}, 
    components:{} 
}; 