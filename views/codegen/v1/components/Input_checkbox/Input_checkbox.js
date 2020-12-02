export default { 
    inheritAttrs: false, 
    template: ` 
    <label>
      <input 
        type="checkbox" 
        v-model="chk" 
        class="mr-3 align-top" 
        v-bind="$attrs"
        @change="updateValue($event.target.value)"  
      />
      {{label}}
    </label>
    `,
    mixins: [], 
    props:["value","label"], 
    data() { 
      return { 
          chk: false,
          theme: 'AdminLte', 
          name: 'Input_checkbox', 
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
      this.chk = this.value;
    }, 
    methods: { 
       updateValue(value){ 
         console.log('updateval--->',value,this.chk);
         this.$emit('input',this.chk) 
       }         
    }, 
    computed: {}, 
    mounted() {}, 
    components:{} 
}; 