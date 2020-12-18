export default { 
    template: `<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <router-link to="#" class="nav-link">Home</router-link>
      </li>
    </ul>
    <div class="ml-3 form-inline">
      <div class="bg-green-200 sm:bg-gray-300 md:bg-yellow-200 lg:bg-indigo-200 xl:bg-red-200"> {{breakpoint}}/{{window.width}} &nbsp;&nbsp; </div>
      <div class="input-group input-group-sm">
        DB: {{$store.state.dbname}}&nbsp;&nbsp;
        <select v-model="$store.state.dbname" @change="selectdb">
          <option value="">- select-database-</option>
          <option v-for="(db,idx) in $store.state.databases" :value="db.Database">{{db.Database}}</option>
        </select>
        &nbsp;&nbsp;TB:{{this.$store.state.table}}&nbsp;&nbsp;
        <select v-model="$store.state.table" >
          <option value="">-- select-table-</option>
          <option value="ALL">-- all-tables-</option>
          <option v-for="(tb,idx) in $store.state.tables" :value="tb.table">{{tb.table}}</option>
        </select>
      </div>
    </div>

    <ul class="ml-auto navbar-nav">
      <li class="nav-item dropdown">
          <div class="nav-link image d-flex" data-toggle="dropdown" style="align-items: center;"  >
            <small>&nbsp;&nbsp;Brad Diesel&nbsp;&nbsp;</small>
            <div class="image">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Image" class="img-circle elevation-2" style="width:34px;height:34px;">
            </div> 
            <span class="badge badge-danger navbar-badge">4</span>
          </div>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item" style="height:100px;">
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="mr-3 img-size-50 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="mr-1 far fa-clock"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <router-link to="/profile" class="dropdown-item">
            <i class="mr-2 far fa-address-card"></i> Profile
            <span class="float-right text-sm text-muted">&nbsp;</span>
          </router-link>
          <div class="dropdown-divider"></div>
          <router-link to="/messages" class="dropdown-item">
            <i class="mr-2 fas fa-envelope"></i> 4 new messages
            <span class="float-right text-sm text-muted">&nbsp;</span>
          </router-link>
          <div class="dropdown-divider"></div>
          <router-link to="/lockscreen" class="dropdown-item">
            <i class="fas fa-lock"></i>&nbsp;&nbsp; Lock Screen
            <span class="float-right text-sm text-muted">&nbsp;</span>
          </router-link>
          <router-link to="/login" class="dropdown-item">
            <i class="mr-2 fas fa-sign-out-alt"></i> Logout
            <span class="float-right text-sm text-muted">&nbsp;</span>
          </router-link>
      </li>
    </ul>
  </nav>`, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Header', 
          window: {
              width: 0,
              height: 0
          }           
      }; 
    }, 
    methods: {
        selectdb(){
          let url = '/codegen/v1/tables/'+ this.$store.state.dbname;
          this.$store.state.table = '';
          axios.get(url).then(rs=>{
             this.$store.state.components = rs.data.datas.components
             this.$store.state.tables = rs.data.datas.tables
          }).catch(console.error);
        },
        handleResize() {
            this.window.width = window.innerWidth;
            this.window.height = window.innerHeight;
        }
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
      window.addEventListener("resize", this.handleResize);
      this.handleResize(); 
    }, 
    mounted() {}, 
    computed: {
        breakpoint() {
            if (this.window.width > 2014) {
                return '-xl2014px)';
            } else if (this.window.width > 1920) {
                return '-xl(1920px)';
            } else if (this.window.width > 1600) {
                return '-xl16(1600px)';
            } else if (this.window.width > 1500) {
                return '-xl15(1536px)';
            } else if (this.window.width > 1280) {
                return "-xl(1280px)";
            } else if (this.window.width > 1024) {
                return "-lg(1024px)";
            } else if (this.window.width > 768) {
                return "-md(768px)";
            } else if (this.window.width > 640) {
                return "-sm(640px)";
            } else {
                return "-ssm(640px)"
            }
         }
    }, 
    components:{} 
}; 


