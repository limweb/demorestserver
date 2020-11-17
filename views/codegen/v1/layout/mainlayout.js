import Mainheader from     "../components/header.js";
import Mainsidebar from    "../components/sidebar.js";
import Mainfooter from     "../components/footer.js";
import Controlsidebar from "../components/controlsidebar.js";

export default { 
    template: `<div>
        <Mainheader />
        <Mainsidebar />
        <router-view ></router-view>
        <Mainfooter />
        <Controlsidebar />
        </div>
    `, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Mainlayout', 
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
        Mainsidebar,
        Mainfooter,
        Controlsidebar
    } 
}; 