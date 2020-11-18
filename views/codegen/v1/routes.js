import Main from "./pages/index.js";
import Login from "./pages/login.js";
import Dashv1 from "./pages/dashboard1.js";
import Dashv2 from "./pages/dashboard2.js";
import Dashv3 from "./pages/dashboard3.js";
export default [
    { path: '/index', component: Main ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/login', component: Login ,meta: { requiresAuth: true,layout: 'loginlayout' } },
    { path: '/dashv1', component: Dashv1 ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/dashv2', component: Dashv2 ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/dashv3', component: Dashv3 ,meta: { requiresAuth: true,layout: 'mainlayout' } },
]