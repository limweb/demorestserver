export default { 
    inheritAttrs: false, 
    template: ` 
    <img 
       :src='value' 
       v-bind="$attrs" 
       :class="$attrs.className"  
       :style="$attrs.styleName" 
       @input="updateValue($event.target.value)"  
    />       
    `,
    mixins: [], 
    props:["value"], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Input_image', 
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