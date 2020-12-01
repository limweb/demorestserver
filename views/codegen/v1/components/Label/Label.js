export default { 
    template: `<label class="w-full h-10 p-2 border border-black">{{label}}</label>`, 
    mixins: [], 
    props:['label'],
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Label', 
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