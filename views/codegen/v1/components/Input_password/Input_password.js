export default { 
    inheritAttrs: false, 
    template: ` 
    <input 
       type="password"
       class="w-full p-2 border border-black"  
       v-bind="$attrs" 
       :class="$attrs.className"  
       :style="$attrs.styleName" 
       :value="value" 
       @input="updateValue($event.target.value)"  
    />       
    `,
    mixins: [], 
    props:["value"], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Input_password', 
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