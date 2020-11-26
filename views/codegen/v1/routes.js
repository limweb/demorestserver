import Main from "./pages/index.js";
import Crudpage from "./pages/crudpage.js";
const Login = () => import("./pages/login.js");
const Dashv1 = () => import("./pages/dashboard1.js");
const Dashv2 = () => import("./pages/dashboard2.js");
const Dashv3 = () => import("./pages/dashboard3.js");
const Authpage = () => import("./pages/authpage.js");
const Backendall = () => import("./pages/backendall.js");
const Controllerpage = () => import("./pages/controllerpage.js");
const Crudpage1 = () => import("./pages/crudpage1.js");
const Dbsetting = () => import("./pages/dbsetting.js");
const Loginpage = () => import("./pages/loginpage.js");
const Menucfg = () => import("./pages/menucfg.js");
const Modelpags = () => import("./pages/modelpags.js");
const Msdtpage1 = () => import("./pages/msdtpage1.js");
const Pjsetting = () => import("./pages/pjsetting.js");
const Pjthemes = () => import("./pages/pjthemes.js");
const Roles = () => import("./pages/roles.js");
const Servicespage = () => import("./pages/servicespage.js");
const Userrecords = () => import("./pages/userrecords.js");
const Messages = () => import("./pages/messages.js");
const Profile = () => import("./pages/profile.js");
const Forgotpass = () => import("./pages/forgotpass.js");
const Register = () => import("./pages/register.js");
const Authfacebook = () => import("./pages/authfacebook.js");
const Authgoogle = () => import("./pages/authgoogle.js");

export default [
  { path: "/index", name: "Index", component: Main, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/home", name: "Home", component: Main, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/login", name: "Login", component: Login, meta: { requiresAuth: false, layout: "loginlayout" } },
  { path: "/dashv1", name: "Dashv1", component: Dashv1, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/dashv2", name: "Dashv2", component: Dashv2, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/dashv3", name: "Dashv3", component: Dashv3, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/dbsetting", name: "Dbsetting", component: Dbsetting, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/pjsetting", name: "Pjsetting", component: Pjsetting, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/pjthemes", name: "Pjthemes", component: Pjthemes, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/menucfg", name: "Menucfg", component: Menucfg, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/userrecords", name: "Userrecords", component: Userrecords, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/roles", name: "Roles", component: Roles, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/auth", name: "Auth", component: Authpage, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/loginpage", name: "Loginpage", component: Loginpage, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/models", name: "Models", component: Modelpags, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/services", name: "Services", component: Servicespage, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/controllers", name: "Controllers", component: Controllerpage, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/crud", name: "Crud", component: Crudpage, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/crud1", name: "Crud1", component: Crudpage1, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/msdt1", name: "Msdt1", component: Msdtpage1, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/backendall", name: "Backendall", component: Backendall, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/messages", name: "Messages", component: Messages, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/profile", name: "Profile", component: Profile, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/forgotpass", name: "Forgotpass", component: Forgotpass, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/register", name: "Register", component: Register, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/authfacebook", name: "Authfacebook", component: Authfacebook, meta: { requiresAuth: false, layout: "mainlayout" } },
  { path: "/authgoogle", name: "Authgoogle", component: Authgoogle, meta: { requiresAuth: false, layout: "mainlayout" } },
];
