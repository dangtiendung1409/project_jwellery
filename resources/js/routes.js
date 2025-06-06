import { createWebHistory, createRouter } from 'vue-router';
import { useAuthStore } from './stores/authStore.js';
import { jwtDecode } from 'jwt-decode';
import Index from './frontTemplate/Index.vue';
import Category from './frontTemplate/Category.vue';
import DetailsProduct from './frontTemplate/DetailsProduct.vue'
import Search from './frontTemplate/Search.vue';
import Login from './frontTemplate/Login.vue';
import Register from './frontTemplate/Register.vue';

const routes = [
    { name: 'Index', path: '/', component: Index },
    { name: 'Category', path: '/category/:slug', component: Category },
    { name: 'DetailsProduct', path: '/product/:slug', component: DetailsProduct },
    { name: 'Search', path: '/search', component: Search },
    { name: 'Login', path: '/login', component: Login },
    { name: 'Register', path: '/register', component: Register },
];

// Tạo router
const router = createRouter({
    history: createWebHistory(),
    routes,
});

// Navigation Guard
router.beforeEach(async (to, from, next) => {
    const authStore = useAuthStore();
    await authStore.checkLoginStatus();

    // Nếu route yêu cầu xác thực và người dùng không đăng nhập
    if (to.matched.some(record => record.meta.requiresAuth) && !authStore.isLoggedIn) {
        next({ name: 'Login', query: { redirect: to.fullPath } }); // Lưu đường dẫn muốn truy cập
    } else {
        next(); // Tiếp tục điều hướng
    }
});

export default router;
