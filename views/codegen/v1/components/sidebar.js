export default { 
    template: `  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <router-link to="#" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CODEGEN V0.0.1</span>
    </router-link>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <router-link to="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </router-link>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/login" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Login</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/login" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/login" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-header">WORKS</li>
          <li class="nav-item has-treeview">
            <router-link to="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </router-link>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/login" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/login" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/login" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </router-link>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
`, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Sidebar', 
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