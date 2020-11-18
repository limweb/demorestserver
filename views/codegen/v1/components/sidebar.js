export default { 
    template: `
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <router-link to="#" class="brand-link">
            <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">CODEGEN V0.0.1</span>
        </router-link>
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../../dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <router-link to="/profile" class="d-block">Accman Co.,Ltd</router-link>
                </div>
            </div>
            <nav class="mt-2" style="overflow: hidden;">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
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
                                <router-link to="/dashv1" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard V1</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/dashv2" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v2</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/dashv3" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v3</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <router-link to="#" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                APPS
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </router-link>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>-----------</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header"><i class="nav-icon fas fa-code-branch"></i>&nbsp;&nbsp;GEN CODES</li>
                    <li class="nav-item has-treeview">
                        <router-link to="#" class="nav-link">
                            <i class="nav-icon fas fa-code"></i>
                            <p>
                                BACKEND
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </router-link>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/backendall" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>-----ALL-----</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/models" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>MODELS</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/services" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SERVICES</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/controllers" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>CONTROLLERS</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <router-link to="#" class="nav-link">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                FRONT END
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </router-link>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/loginpage" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>LOGIN PAGE</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/crud1" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>CRUD</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/msdt1" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Master-Details</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <router-link to="/auth" class="nav-link">
                            <i class="nav-icon fas fa-key"></i>
                            <p>
                                Authentication
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/roles" class="nav-link">
                            <i class="nav-icon fas fa-unlock-alt"></i>
                            <p>
                                Roles and Permission
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/userrecords" class="nav-link">
                            <i class="nav-icon fas fa-user-plus"></i>
                            <p>
                                User Records Management
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/menucfg" class="nav-link">
                            <i class="nav-icon fas fa-bars"></i>
                            <p>
                                Menu Configuration
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/pjthemes" class="nav-link">
                            <i class="nav-icon fas fa-paint-brush"></i>
                            <p>
                                Project Themes
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-header"><i class="nav-icon fas fa-cog"></i>&nbsp;&nbsp;SETTING</li>
                    <li class="nav-item">
                        <router-link to="/pjsetting" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Project Properties
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/dbsetting" class="nav-link">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Database Setting
                            </p>
                        </router-link>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="bg-success" style="position: fixed;bottom: 0px;width: inherit;text-align:center;height: 35px; padding-top: 5px;">
          <a href="#" style="background-color: rgb(0, 166, 90);">
            <i class="fa fa-star-o" style="color: rgb(255, 255, 255);"></i>
            <span style="color: rgb(255, 255, 255);">AccMan Templates v0.0.1</span>
          </a>
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