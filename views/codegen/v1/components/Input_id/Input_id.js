export default { 
    inheritAttrs: false, 
    template: ` 
    <input 
       type="number"
       class="w-full p-2 border border-black"  
       v-bind="$attrs" 
       :value="value" 
       @input="updateValue($event.target.value)"  
       readonly
    />       
    `,
    mixins: [], 
    props:["value"], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Input_id', 
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