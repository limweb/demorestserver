export default { 
    inheritAttrs: false, 
    template: ` 
    <div>
        <label class="radio">
          <input type="radio" :value="label" :name="name" v-model="radioButtonValue">
          <span>{{ label }}</span>
    </label></div>
    `,
    mixins: [], 
    props: ['name', 'label'],
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Input_radio', 
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