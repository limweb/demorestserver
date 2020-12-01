export default { 
    template: `<h1>Color Picker</h1>`, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'ColorPicker', 
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    mounted() {}, 
    methods: {}, 
    computed: {}, 
    components:{} 
}; 