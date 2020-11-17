export default { 
    template: `  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>`, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'ControlSidebar', 
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