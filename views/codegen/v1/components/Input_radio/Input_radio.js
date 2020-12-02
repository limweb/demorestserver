export default { 
    inheritAttrs: false, 
    template: ` 
    <div>
        <label class="radio">
          <input type="radio" :value="label" :name="uuid" v-model="radioButtonValue">
          <span>{{ label }}</span>
    </label></div>
    `,
    mixins: [], 
    props: ['name', 'label'],
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Input_radio',
          uuid:'', 
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
      this.uuid ='idx'+Math.random().toString(36).slice(-6);
    }, 
    methods: { 
       updateValue(value){ 
         this.$emit('input',value) 
       }         
    }, 
    computed: {
        radioButtonValue: {
            set: function() {
                this.$emit("change", this.label)
            }
        }
    }, 
    mounted() {}, 
    components:{} 
}; 