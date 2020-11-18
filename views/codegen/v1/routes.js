import Main from "./pages/index.js";
import Login from "./pages/login.js";
import Dashv1 from "./pages/dashboard1.js";
import Dashv2 from "./pages/dashboard2.js";
import Dashv3 from "./pages/dashboard3.js";
import Authpage from "./pages/authpage.js";
import Backendall from "./pages/backendall.js";
import Controllerpage from "./pages/controllerpage.js";
import Crudpage1 from "./pages/crudpage1.js";
import Dbsetting from "./pages/dbsetting.js";
import Loginpage from "./pages/loginpage.js";
import Menucfg from "./pages/menucfg.js";
import Modelpags from "./pages/modelpags.js";
import Msdtpage1 from "./pages/msdtpage1.js";
import Pjsetting from "./pages/pjsetting.js";
import Pjthemes from "./pages/pjthemes.js";
import Roles from "./pages/roles.js";
import Servicespage from "./pages/servicespage.js";
import Userrecords from "./pages/userrecords.js";


export default [
    { path: '/index', component: Main ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/login', component: Login ,meta: { requiresAuth: true,layout: 'loginlayout' } },
    { path: '/dashv1', component: Dashv1 ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/dashv2', component: Dashv2 ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/dashv3', component: Dashv3 ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/dbsetting', component: Dbsetting ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/pjsetting', component: Pjsetting ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/pjthemes', component: Pjthemes ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/menucfg', component: Menucfg ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/userrecords', component: Userrecords ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/roles', component: Roles ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/auth', component: Authpage ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/loginpage', component: Loginpage ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/models', component: Modelpags ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/services', component: Servicespage ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/controllers', component: Controllerpage ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/crud1', component: Crudpage1 ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/msdt1', component: Msdtpage1 ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/backendall', component: Backendall ,meta: { requiresAuth: true,layout: 'mainlayout' } },
]