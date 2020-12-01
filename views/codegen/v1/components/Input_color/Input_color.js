export default { 
    inheritAttrs: false,  
    template: `
    <label>Color:
        <input 
            type="color"  
            :value="value"
            v-on="$listeners"
            @input="updateValue($event)"
            />
    </label>
    `,
    props:['label','value'],
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'InputColor', 
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    methods: {
      updateValue(evt){
          this.$emit('input', evt.target.value)
      }
    }, 
    mounted() {}, 
    computed: {}, 
    components:{} 
}; 