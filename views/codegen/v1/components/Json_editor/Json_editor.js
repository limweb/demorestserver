export default { 
    template: `<div>JSONEDITOR</div>`, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Jsoneditor', 
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