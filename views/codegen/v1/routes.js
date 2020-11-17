import Main from "./pages/index.js";
import Login from "./pages/login.js";
export default [
    { path: '/indexx', component: Main ,meta: { requiresAuth: true,layout: 'mainlayout' } },
    { path: '/login', component: Login ,meta: { requiresAuth: true,layout: 'loginlayout' } },
]