export default { 
    template: `<footer class="main-footer noprint">
    <div class="float-right d-none d-sm-block">
      <b>CodeGen Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="/">AccMain Co.,Ltd.</a>.</strong> All rights
    reserved.
  </footer>`, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Footer', 
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