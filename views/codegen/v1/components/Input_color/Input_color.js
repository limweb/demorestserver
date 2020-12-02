export default { 
    inheritAttrs: false, 
    template: ` 
    <div class="h-8 px-2 border border-black w-min ">
      <input 
        type="color"
        class=""  
        v-bind="$attrs" 
        :value="value" 
        @input="updateValue($event.target.value)"  
      />      
      <span>{{value}}</span>
    </div>
    `,
    mixins: [], 
    props:["value"], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Input_color', 
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