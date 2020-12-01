export default { 
    template: `<div><label>Month:<input type="month" /></label></div>`, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Inputmonth', 
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