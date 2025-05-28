<template>
    <Layout>
        <template v-slot:content="slotProps">
            <!-- slider-area -->
            <HomeBanner :homeBanner="homeBanner" />
            <!-- slider-area-end -->

            <!-- category-banner -->
            <Category :categories="categories" />
            <!-- category-banner-end -->

            <!-- promo-services -->
            <section class="promo-services pt-50 pb-25">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="promo-services-item mb-40">
                                <div class="icon"><img src="/front_assets/img/icon/promo_icon01.png" alt=""></div>
                                <div class="content">
                                    <h6>payment & delivery</h6>
                                    <p>Delivered, when you receive arrives</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="promo-services-item mb-40">
                                <div class="icon"><img src="/front_assets/img/icon/promo_icon02.png" alt=""></div>
                                <div class="content">
                                    <h6>Return Product</h6>
                                    <p>Retail, a Product Return Process</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="promo-services-item mb-40">
                                <div class="icon"><img src="/front_assets/img/icon/promo_icon03.png" alt=""></div>
                                <div class="content">
                                    <h6>money back guarantee</h6>
                                    <p>Options Including 24/7</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="promo-services-item mb-40">
                                <div class="icon"><img src="/front_assets/img/icon/promo_icon04.png" alt=""></div>
                                <div class="content">
                                    <h6>Quality support</h6>
                                    <p>Support Options Including 24/7</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- promo-services-end -->

            <!-- new-product-area -->
            <NewProduct :newProduct="newProduct" />
            <!-- features-product-area-end -->

            <!-- discount-area -->
            <section class="discount-area discount-bg jarallax parallax-img" data-background="/front_assets/img/bg/discount_bg.jpg">
                <div class="container">
                    <div class="row justify-content-center justify-content-lg-start">
                        <div class="col-lg-6 col-md-10">
                            <div class="discount-content text-center">
                                <div class="icon mb-15"><img src="/front_assets/img/icon/discount_icon.png" alt=""></div>
                                <span>STOCK IS LIMITED</span>
                                <h2>Winter Collection End of Season Sale upto 30%</h2>
                                <a href="shop-sidebar.html" class="btn">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- discount-area-end -->

            <!-- trending-product-area -->
            <TrendingProduct :trendingProduct="trendingProduct" />
            <!-- trending-product-area-end -->

            <!-- newsletter-area -->
            <section class="newsletter-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="newsletter-bg" data-background="/front_assets/img/bg/newsletter_bg.jpg">
                                <div class="newsletter-title mb-65">
                                    <h2 class="title">NEWSLETTER!</h2>
                                    <h6 class="sub-title">NEWSLETTER AND GET DISCOUNT 25% OFF</h6>
                                </div>
                                <form action="#" class="newsletter-form">
                                    <input type="email" placeholder="Your email address...">
                                    <button><span>Subscribe</span> <i class="far fa-arrow-alt-circle-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- newsletter-area-end -->

            <!-- brand-area -->
            <div class="brand-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                        <div class="col">
                            <div class="brand-item">
                                <a href="#"><img src="/front_assets/img/brand/brand_item01.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="brand-item">
                                <a href="#"><img src="/front_assets/img/brand/brand_item02.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="brand-item">
                                <a href="#"><img src="/front_assets/img/brand/brand_item03.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="brand-item">
                                <a href="#"><img src="/front_assets/img/brand/brand_item04.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="brand-item">
                                <a href="#"><img src="/front_assets/img/brand/brand_item05.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="brand-item">
                                <a href="#"><img src="/front_assets/img/brand/brand_item06.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->

            <!-- instagram-post-area -->
            <div class="instagram-post-area">
                <div class="container-fluid p-0 fix">
                    <div class="row no-gutters insta-active">
                        <div class="col">
                            <div class="insta-post-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                    <img src="/front_assets/img/instagram/insta_post01.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="insta-post-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                    <img src="/front_assets/img/instagram/insta_post02.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="insta-post-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                    <img src="/front_assets/img/instagram/insta_post03.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="insta-post-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                    <img src="/front_assets/img/instagram/insta_post04.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="insta-post-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                    <img src="/front_assets/img/instagram/insta_post05.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="insta-post-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                    <img src="/front_assets/img/instagram/insta_post06.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="insta-post-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                    <img src="/front_assets/img/instagram/insta_post07.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- instagram-post-area-end -->
        </template>
    </Layout>
</template>
<script>
import axios from 'axios';
import Layout from './Layout.vue'
import HomeBanner from'./components/HomeBanner.vue'
import Category from './components/Category.vue'
import NewProduct from './components/NewProduct.vue'
import TrendingProduct from './components/TrendingProduct.vue'
// import getUrlList from "../provider.js";
export default {
    name: 'Index',
    components : {
        Layout,
        HomeBanner,
        Category,
        NewProduct,
        TrendingProduct,

    },
    data() {
        return {
        }
    },
    watch: {
    },
    async mounted() {

    },
    methods: {
    }
}
</script>
