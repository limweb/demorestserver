export default { 
    template: `<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <router-link to="#" class="nav-link">Home</router-link>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <div class="ml-3 form-inline">
      <div class="input-group input-group-sm">
        DB: {{$store.state.dbname}}&nbsp;&nbsp;
        <select v-model="$store.state.dbname" @change="selectdb">
          <option value="">---- select-database-----</option>
          <option v-for="(db,idx) in $store.state.databases" :value="db.Database">{{db.Database}}</option>
        </select>
        &nbsp;&nbsp;
        <select>
          <option value="">--- select-table-----</option>
          <option v-for="(tb,idx) in $store.state.tables" :value="tb.table">{{tb.table}}</option>
        </select>
      </div>
    </div>

    <!-- Right navbar links -->
    <ul class="ml-auto navbar-nav">
    </ul>
  </nav>`, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Header', 
      }; 
    }, 
    methods: {
        selectdb(){
          let url = '/codegen/v1/tables/'+ this.$store.state.dbname;
          axios.get(url).then(rs=>{
             this.$store.state.components = rs.data.datas.components
             this.$store.state.tables = rs.data.datas.tables
          }).catch(console.log);
        },

    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    mounted() {}, 
    computed: {}, 
    components:{} 
}; 