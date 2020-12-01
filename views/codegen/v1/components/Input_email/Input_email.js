export default { 
    template: `
    <input 
        type="email" 
        class="w-full p-2"
        :value="value"
        @input="updateValue($event.target.value)"
    />`, 
    mixins: [], 
    props:['value'],
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Inputemail', 
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