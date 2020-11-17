import Mainheader from     "../components/header.js";
import Mainfooter from     "../components/footer.js";

export default { 
    template: `<div class="hold-transition login-page" >
        <router-view ></router-view>
  </div>`, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Loginlayout', 
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    mounted() {}, 
    methods: {}, 
    computed: {}, 
    components:{
        Mainheader,
        Mainfooter,
    } 
}; 