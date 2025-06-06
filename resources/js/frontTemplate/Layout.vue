<template>
    <!-- preloader  -->
    <!-- <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
            </div>
            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- preloader end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header class="header-style-five">
        <div id="sticky-header" class="main-header menu-area">
            <div class="container custom-container-two">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                        <div class="menu-wrap">
                            <nav class="menu-nav show">
                                <div class="logo d-block d-lg-none">
                                    <a href="index.html"><img src="/front_assets/img/logo/logo.png" alt="Logo"></a>
                                </div>
                                <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <ul class="navigation left">
                                        <li class="active menu-item-has-children has--mega--menu"><router-link
                                                :to="{ name: 'Index' }">Home</router-link>
                                            <ul class="mega--menu--wrap scroll">
                                                <li>
                                                    <a href="index.html">
                                                        <span class="img"><img src="img/home-demo/home_01.jpg"
                                                                alt=""></span>
                                                        <span class="text">Home style One</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="index-2.html">
                                                        <span class="img"><img src="img/home-demo/home_02.jpg"
                                                                alt=""></span>
                                                        <span class="text">Home style Two</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="index-3.html">
                                                        <span class="img"><img src="img/home-demo/home_03.jpg"
                                                                alt=""></span>
                                                        <span class="text">Home style Three</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="index-4.html">
                                                        <span class="img"><img src="img/home-demo/home_04.jpg"
                                                                alt=""></span>
                                                        <span class="text">Home style four</span>
                                                    </a>
                                                </li>
                                                <li class="active">
                                                    <a href="index-5.html">
                                                        <span class="img"><img src="img/home-demo/home_05.jpg"
                                                                alt=""></span>
                                                        <span class="text">Home style five</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="index-6.html">
                                                        <span class="img"><img src="img/home-demo/home_06.jpg"
                                                                alt=""></span>
                                                        <span class="text">Home style six</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="index-7.html">
                                                        <span class="img"><img src="img/home-demo/home_07.jpg"
                                                                alt=""></span>
                                                        <span class="text">Home style seven</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="index-8.html">
                                                        <span class="img"><img src="img/home-demo/home_08.jpg"
                                                                alt=""></span>
                                                        <span class="text">Home style eight</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="index-9.html">
                                                        <span class="img"><img src="img/home-demo/home_09.jpg"
                                                                alt=""></span>
                                                        <span class="text">Home style nine</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="has--mega--menu">
                                            <a href="#">Shop</a>
                                            <ul class="mega-menu">
                                                <li class="mega-menu-wrap" v-if="categories.length"
                                                    style="display: flex; flex-direction: row; justify-content: center; align-items: flex-start; gap: 32px;">
                                                    <ul class="mega-menu-col" v-for="(parentCat, index) in categories"
                                                        :key="parentCat.id"
                                                        style="display: flex; flex-direction: column; align-items: center; min-width: 220px; margin: 0; padding: 0;">
                                                        <li class="mega-title"
                                                            style="font-weight: bold; font-size: 20px; margin-bottom: 9px; text-align: center; border-bottom: 2px solid #222; padding-bottom: 6px; width: 100%; background: none;">
                                                            <router-link
                                                                :to="{ name: 'Category', params: { slug: parentCat.slug } }">
                                                                {{ parentCat.category_name }}
                                                            </router-link>

                                                        </li>
                                                        <li v-for="child in parentCat.children" :key="child.id"
                                                            style="margin-bottom: 6px; text-align: center; width: 100%;">
                                                            <router-link
                                                                :to="{ name: 'Category', params: { slug: child.slug } }">
                                                                {{ child.category_name }}
                                                            </router-link>
                                                        </li>
                                                        <!-- Ảnh đại diện category cha nằm ngay dưới danh mục, thẳng hàng với cột -->
                                                        <li class="cat-image"
                                                            style="text-align:center; margin-top:24px; width: 100%;">
                                                            <router-link
                                                                :to="{ name: 'Category', params: { slug: parentCat.slug } }">
                                                                <img :src="parentCat.image.startsWith('/') ? parentCat.image : '/' + parentCat.image"
                                                                    alt=""
                                                                    style="width: 200px; height: 150px; object-fit: cover; display:block; margin:0 auto; border-radius:14px; box-shadow:0 2px 14px rgba(0,0,0,0.13);" />
                                                            </router-link>
                                                        </li>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </li>
                                        <li><a href="shop.html">Sale</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                    </ul>
                                    <div class="logo">
                                        <a href="index.html"><img src="/front_assets/img/logo/logo.png" alt="Logo"></a>
                                    </div>
                                    <ul class="navigation right">
                                        <li class="menu-item-has-children"><a href="#">blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Our Blog</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </div>
                                <div class="header-action d-none d-md-block">
                                    <ul>
                                        <li class="header-search"><a href="#" data-toggle="modal"
                                                data-target="#search-modal"><i class="flaticon-search"></i></a></li>
                                        <li class="header-profile" v-if="isLoggedIn">
                                            <a href="#" @click.prevent="toggleDropdown('profileDropdown')">
                                                <i class="flaticon-user"></i>
                                            </a>
                                            <div id="profileDropdown" class="dropdown-content">
                                                <router-link to="/my-profile"><i class="fa fa-user"></i> My
                                                    Profile</router-link>
                                                <router-link to="/settings"><i class="fa fa-cog"></i>
                                                    Settings</router-link>
                                                <a href="#" @click.prevent="handleLogout"><i
                                                        class="fa fa-sign-out-alt"></i> Logout</a>
                                            </div>
                                        </li>

                                        <li class="header-wishlist" v-if="isLoggedIn"><a href="#"><i
                                                    class="flaticon-heart-shape-outline"></i></a></li>
                                        <li class="header-shop-cart" v-if="isLoggedIn"><a href="#"><i
                                                    class="flaticon-shopping-bag"></i><span>0</span></a>
                                            <ul class="minicart">
                                                <li class="d-flex align-items-start">
                                                    <div class="cart-img">
                                                        <a href="#"><img src="img/product/cart_p01.jpg" alt=""></a>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h4><a href="#">Exclusive Winter Jackets</a></h4>
                                                        <div class="cart-price">
                                                            <span class="new">$229.9</span>
                                                            <span><del>$229.9</del></span>
                                                        </div>
                                                    </div>
                                                    <div class="del-icon">
                                                        <a href="#"><i class="far fa-trash-alt"></i></a>
                                                    </div>
                                                </li>
                                                <li class="d-flex align-items-start">
                                                    <div class="cart-img">
                                                        <a href="#"><img src="img/product/cart_p02.jpg" alt=""></a>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h4><a href="#">Winter Jackets For Women</a></h4>
                                                        <div class="cart-price">
                                                            <span class="new">$229.9</span>
                                                            <span><del>$229.9</del></span>
                                                        </div>
                                                    </div>
                                                    <div class="del-icon">
                                                        <a href="#"><i class="far fa-trash-alt"></i></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="total-price">
                                                        <span class="f-left">Total:</span>
                                                        <span class="f-right">$239.9</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkout-link">
                                                        <a href="#">Shopping Cart</a>
                                                        <a class="black-color" href="#">Checkout</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li v-else class="header-auth">
    <router-link to="/login" class="auth-link">Log in</router-link>
    <span class="separator">|</span>
    <router-link to="/register" class="auth-link">Sign up</router-link>
</li>


                                        <li class="sidebar-toggle-btn"><a href="#" class="navSidebar-button"><i
                                                    class="flaticon-menu-button-of-three-horizontal-lines"></i></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <!-- Mobile Menu  -->
                        <div class="mobile-menu">
                            <div class="close-btn"><i class="flaticon-targeting-cross"></i></div>
                            <nav class="menu-box">
                                <div class="nav-logo"><a href="index.html"><img src="img/logo/logo.png" alt=""
                                            title=""></a>
                                </div>
                                <div class="menu-outer">
                                    <ul class="navigation">
                                        <li class="active menu-item-has-children"><a href="#">Home</a>
                                            <ul class="submenu">
                                                <li><a href="index.html">Home One</a></li>
                                                <li><a href="index-2.html">Home Two</a></li>
                                                <li><a href="index-3.html">Home Three</a></li>
                                                <li><a href="index-4.html">Home Four</a></li>
                                                <li class="active"><a href="index-5.html">Home Five</a></li>
                                                <li><a href="index-6.html">Home Six</a></li>
                                                <li><a href="index-7.html">Home Seven</a></li>
                                                <li><a href="index-8.html">Home Eight</a></li>
                                                <li><a href="index-9.html">Home Nine</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Shop</a>
                                            <ul class="submenu">
                                                <li><a href="shop.html">Shop Page</a></li>
                                                <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                                                <li><a href="shop-details.html">Shop Details</a></li>
                                                <li><a href="cart.html">Cart Page</a></li>
                                                <li><a href="cart.html">Checkout Page</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li class="menu-item-has-children"><a href="#">blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Our Blog</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </div>
                                <div class="social-links">
                                    <ul class="clearfix">
                                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                        <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                        <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                        <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-backdrop"></div>
                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Search -->
        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form @submit.prevent="goToSearch">
                        <input type="text" v-model="searchKeyword" placeholder="Search here..." />
                        <button type="submit"><i class="flaticon-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Search-end -->

        <!-- off-canvas-start -->
        <div class="sidebar-off-canvas info-group">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-widget scroll">
                <div class="sidebar-widget-container">
                    <div class="off-canvas-heading">
                        <a href="#" class="close-side-widget">
                            <span class="flaticon-targeting-cross"></span>
                        </a>
                    </div>
                    <div class="sidebar-textwidget">
                        <div class="sidebar-info-contents">
                            <div class="content-inner">
                                <div class="logo mb-30">
                                    <a href="index.html"><img src="img/logo/logo.png" alt=""></a>
                                </div>
                                <div class="content-box">
                                    <p>WooCommerce and WordPress are both free, open source software reasons many ...
                                    </p>
                                </div>
                                <div class="contact-info">
                                    <h4 class="title">CONTACT US</h4>
                                    <ul>
                                        <li><span class="flaticon-phone-call"></span><a href="tel:123456789">+9 325 444
                                                0000</a></li>
                                        <li><span class="flaticon-email"></span><a
                                                href="mailto:adara@info.com">adara@info.com</a></li>
                                        <li><span class="flaticon-place"></span>71 Park Lan Street 2355 NY</li>
                                    </ul>
                                </div>
                                <div class="oc-newsletter">
                                    <h4 class="title">NEWSLETTER</h4>
                                    <p>Fill your email below to subscribe to my newsletter</p>
                                    <form action="#">
                                        <input type="email" placeholder="Email...">
                                        <button class="btn">Subscribe</button>
                                    </form>
                                </div>
                                <div class="oc-social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google"></i></a></li>
                                    </ul>
                                </div>
                                <div class="oc-bottom">
                                    <div class="currency">
                                        <form action="#">
                                            <label>Currency</label>
                                            <select name="select">
                                                <option value="">USD</option>
                                                <option value="">AUE</option>
                                                <option value="">SAR</option>
                                                <option value="">INR</option>
                                                <option value="">BDT</option>
                                            </select>
                                        </form>
                                    </div>
                                    <div class="language">
                                        <form action="#">
                                            <label>Language</label>
                                            <select name="select">
                                                <option value="">English</option>
                                                <option value="">Spanish</option>
                                                <option value="">Turkish</option>
                                                <option value="">Russian</option>
                                                <option value="">Chinese</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- off-canvas-end -->

    </header>
    <main>
        <slot name="content"></slot>
    </main>
    <footer class="dark-bg pt-55 pb-80">
        <div class="container">
            <div class="footer-top-wrap">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-logo">
                            <a href="index.html"><img src="img/logo/w_logo.png" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-middle-wrap">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-link-wrap">
                            <nav class="menu-links">
                                <ul>
                                    <li>
                                        <a href="about-us.html">About us</a>
                                    </li>
                                    <li>
                                        <a href="shop-sidebar.html">Store</a>
                                    </li>
                                    <li><a href="#">Locations</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="contact.html">Support</a></li>
                                    <li><a href="#">Policy</a></li>
                                    <li><a href="#">Faqs</a></li>
                                </ul>
                            </nav>
                            <div class="footer-social">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-google"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="copyright-text">
                            <p>
                                &copy; 2021 <a href="index.html">adara</a>. All
                                Rights Reserved | Ph (+09) 456 457869
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pay-method-img">
                            <img src="img/images/payment_method_img.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="scripts"></div>
</template>
<script>
import axios from "axios";
import getUrlList from "../provider.js";
import { useAuthStore } from '@/stores/authStore';
import { mapState } from 'pinia';
export default {
    name: "Layout",
    data() {
        return {
            categories: [],
            searchKeyword: '',
            currentOpenDropdown: null,
        };
    },
    computed: {
        ...mapState(useAuthStore, ['isLoggedIn'])
    },
    async mounted() {
        const authStore = useAuthStore();
        await authStore.checkLoginStatus();
        this.loadCategories();
        this.loadExternalScripts();
        document.addEventListener("click", this.handleOutsideClick);
    },
    beforeUnmount() {
        document.removeEventListener("click", this.handleOutsideClick);
    },
    methods: {
        toggleDropdown(id) {
            const dropdownElement = document.getElementById(id);
            if (dropdownElement) {
                dropdownElement.classList.toggle("show");
                this.currentOpenDropdown = id;
            }
        },
        handleOutsideClick(event) {
            const dropdown = document.getElementById(this.currentOpenDropdown);
            if (
                dropdown &&
                !dropdown.contains(event.target) &&
                !event.target.closest('.header-profile')
            ) {
                dropdown.classList.remove("show");
                this.currentOpenDropdown = null;
            }
        },
        async handleLogout() {
            const authStore = useAuthStore();
            await authStore.handleLogout();
        },
        async loadCategories() {
            try {
                const response = await axios.get(getUrlList().getCategories);
                this.categories = response.data;
            } catch (error) {
                console.error("Lỗi khi lấy danh sách category:", error);
            }
        },
        goToSearch() {
            if (this.searchKeyword.trim()) {
                this.$router.push({ name: 'Search', query: { keyword: this.searchKeyword.trim() } });
                this.searchKeyword = '';

                $('#search-modal').modal('hide');
            }
        },
        loadExternalScripts() {
            const src = [
                "/front_assets/js/vendor/jquery-3.5.0.min.js",
                "/front_assets/js/popper.min.js",
                "/front_assets/js/bootstrap.min.js",
                "/front_assets/js/isotope.pkgd.min.js",
                "/front_assets/js/imagesloaded.pkgd.min.js",
                "/front_assets/js/jquery.magnific-popup.min.js",
                "/front_assets/js/jquery.mCustomScrollbar.concat.min.js",
                "/front_assets/js/bootstrap-datepicker.min.js",
                "/front_assets/js/jquery.nice-select.min.js",
                "/front_assets/js/jquery.countdown.min.js",
                "/front_assets/js/swiper-bundle.min.js",
                "/front_assets/js/jarallax.min.js",
                "/front_assets/js/slick.min.js",
                "/front_assets/js/wow.min.js",
                "/front_assets/js/nav-tool.js",
                "/front_assets/js/plugins.js",
                "/front_assets/js/main.js",
            ];
            src.forEach((srcFile) => {
                const script = document.createElement("script");
                script.src = srcFile;
                script.async = false;
                document.getElementById("scripts").appendChild(script);
            });
        },
    },
};
</script>

<style scoped>
.dropdown-content {
    position: absolute;
    right: -10px;
    margin-top: 10px;
    background-color: white;
    border-radius: 16px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    min-width: 180px;
    z-index: 1000;
    display: none;
    flex-direction: column;
    padding: 12px 0;
}

.dropdown-content.show {
    display: flex;
}

.dropdown-content a,
.dropdown-content .router-link-active {
    display: flex;
    align-items: center;
    padding: 10px 20px;
    font-size: 15px;
    color: #333;
    text-decoration: none;
    transition: background 0.2s;
}

.dropdown-content a i {
    margin-right: 10px;
    font-size: 18px;
    width: 20px;
    text-align: center;
}

.dropdown-content a:hover {
    background-color: #f5f5f5;
    cursor: pointer;
}
.header-auth {
    display: flex;
    align-items: center;
    gap: 8px; /* khoảng cách giữa các phần tử */
    font-size: 14px;
    color: #555; /* Màu chữ có thể tùy theme */
}

.auth-link {
    color: #333; /* Màu chữ chính */
    text-decoration: none;
    transition: color 0.2s ease;
}

.auth-link:hover {
    color: #007bff; /* Màu khi hover */
}

.separator {
    color: #aaa; /* Màu cho dấu | */
}


</style>
