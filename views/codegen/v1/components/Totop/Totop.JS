export default { 
    template: `
      <div>
        <button
          :style="{display: show ? 'block':'none'}"
          @click="topFunction"
          id="myBtn"
          title="Go to top"
        >TOP</button>
      </div>
    `, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'TOTOP', 
          show: false
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    mounted() {
      window.addEventListener("scroll", this.scrollFunction);
    }, 
    methods: {
      scrollFunction() {
        if ( document.body.scrollTop > 20 || document.documentElement.scrollTop > 20 ) {
          this.show = true;
        } else {
          this.show = false;
        }
      },
      topFunction() {
        console.log("----to---top-----");
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    }, 
    computed: {},
    destroyed() {
      window.removeEventListener("scroll", this.scrollFunction);
    }, 
    components:{}
}; 
