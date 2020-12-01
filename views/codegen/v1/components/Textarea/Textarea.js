export default { 
    inheritAttrs: false,
    template: `
    <textarea 
        class="w-full h-16 p-2 rounded border-1" 
        :value="value"
        @input="updateValue($event.target.value)" 
        v-bind="$attrs"
        />
    `, 
    mixins: [], 
    props:['value'],
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Textarea', 
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    mounted() {}, 
    methods: {
      updateValue(value){
        this.$emit('input',value)
      }
    }, 
    computed: {}, 
    components:{} 
}; 