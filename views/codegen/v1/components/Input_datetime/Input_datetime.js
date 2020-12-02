export default { 
    inheritAttrs: false, 
    template: ` 
    <input 
       type="datetime-local"
       class="w-full p-2 border border-black"  
       v-bind="$attrs" 
       :value="value" 
       @input="updateValue($event.target.value)"  
    />       
    `,
    mixins: [], 
    props:["value"], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Input_datetime', 
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
    computed: {}, 
    mounted() {}, 
    components:{} 
}; 