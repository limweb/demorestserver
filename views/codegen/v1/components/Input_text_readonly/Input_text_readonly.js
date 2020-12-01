export default { 
    template: `<div class="w-full h-full p-2">{{value}}</div>`, 
    mixins: [],
    props:['value'], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Inputtextreadonly', 
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