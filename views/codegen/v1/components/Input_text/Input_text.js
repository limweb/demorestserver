export default { 
    inheritAttrs: false,    
    template: `
      <input type="text" 
        class="w-full p-2"
        :value="value"
        @input="updateValue($event.target.value)" />
    `, 
    mixins: [], 
    props:['value'],
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Inputtext', 
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    methods: {
      updateValue(value){
        this.$emit('input',value)
      }
    }, 
    mounted() {}, 
    computed: {}, 
    components:{} 
}; 