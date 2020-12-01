export default { 
    template: `<abel>Date:<input type="date" /></label>`, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'InputDate', 
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