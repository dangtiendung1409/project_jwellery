import { createWebHistory, createRouter } from 'vue-router';
import Index from './frontTemplate/Index.vue';
import Category from './frontTemplate/Category.vue';
import DetailsProduct from './frontTemplate/DetailsProduct.vue'
import Search from './frontTemplate/Search.vue';

const routes = [
    { name: 'Index', path: '/', component: Index },
    { name: 'Category', path: '/category/:slug', component: Category },
    { name: 'DetailsProduct', path: '/product/:slug', component: DetailsProduct },
    { name: 'Search', path: '/search', component: Search },
];

// Tạo router
const router = createRouter({
    history: createWebHistory(),
    routes,
});

// Navigation Guard
// router.beforeEach(async (to, from, next) => {
//     const authStore = useAuthStore();
//     await authStore.checkLoginStatus();

//     // Nếu route yêu cầu xác thực và người dùng không đăng nhập
//     if (to.matched.some(record => record.meta.requiresAuth) && !authStore.isLoggedIn) {
//         next({ name: 'Login', query: { redirect: to.fullPath } }); // Lưu đường dẫn muốn truy cập
//     } else {
//         next(); // Tiếp tục điều hướng
//     }
// });

export default router;
