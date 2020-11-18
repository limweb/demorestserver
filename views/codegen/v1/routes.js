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
import Messages from "./pages/messages.js";
import Profile from "./pages/profile.js";


export default [
    { path: '/index', name: 'Index', component: Main ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/home', name: 'Home', component: Main ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/login', name: 'Login', component: Login ,meta: { requiresAuth: false,layout: 'loginlayout' } },
    { path: '/dashv1', name: 'Dashv1', component: Dashv1 ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/dashv2', name: 'Dashv2', component: Dashv2 ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/dashv3', name: 'Dashv3', component: Dashv3 ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/dbsetting', name: 'Dbsetting', component: Dbsetting ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/pjsetting', name: 'Pjsetting', component: Pjsetting ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/pjthemes', name: 'Pjthemes', component: Pjthemes ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/menucfg', name: 'Menucfg', component: Menucfg ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/userrecords', name: 'Userrecords', component: Userrecords ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/roles', name: 'Roles', component: Roles ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/auth', name: 'Auth', component: Authpage ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/loginpage', name: 'Loginpage', component: Loginpage ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/models', name: 'Models', component: Modelpags ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/services', name: 'Services', component: Servicespage ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/controllers', name: 'Controllers', component: Controllerpage ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/crud1', name: 'Crud1', component: Crudpage1 ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/msdt1', name: 'Msdt1', component: Msdtpage1 ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/backendall', name: 'Backendall', component: Backendall ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/messages', name: 'Messages', component: Messages ,meta: { requiresAuth: false,layout: 'mainlayout' } },
    { path: '/profile', name: 'Profile', component: Profile ,meta: { requiresAuth: false,layout: 'mainlayout' } },
]