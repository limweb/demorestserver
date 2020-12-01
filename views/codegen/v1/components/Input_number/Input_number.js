export default { 
    template: `<input 
        type="number" 
        :value="value"
        class="w-full p-2"
        @input="updateValue($event.target.value)" 
        v-bind="$attrs"
     />`, 
    mixins: [], 
    props:['value'],
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Inputnumber', 
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
