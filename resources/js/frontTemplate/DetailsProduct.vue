<template>
    <Layout>
        <template v-slot:content="slotProps">
            <!-- breadcrumb-area -->
            <div class="breadcrumb-area breadcrumb-style-two"
                data-background="/front_assets/img/bg/s_breadcrumb_bg01.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 d-none d-lg-block">
                            <div class="previous-product">

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="breadcrumb-content">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <router-link to="/">Home</router-link>
                                        </li>
                                        <li class="breadcrumb-item" v-if="product && product.category">
                                            <router-link :to="`/category/${product.category.slug}`">{{
                                                product.category
                                                    .category_name
                                            }}</router-link>
                                        </li>
                                        <li class="breadcrumb-item active" v-if="product">
                                            {{ product.product_name }}
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 d-none d-lg-block">
                            <div class="next-product">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

            <!-- shop-details-area -->
            <section class="shop-details-area pt-100 pb-95">
                <div class="container">
                    <div v-if="product" class="row">
                        <div class="col-lg-7">
                            <div class="shop-details-flex-wrap">
                                <div class="shop-details-nav-wrap">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li v-for="(
img, index
                                            ) in product.images" :key="img.id" class="nav-item" role="presentation">
                                            <a class="nav-link" :class="{ active: index === 0 }" :id="`tab-${index}`"
                                                data-toggle="tab" :href="`#img-${index}`" role="tab" :aria-selected="index === 0
                                                    ? 'true'
                                                    : 'false'
                                                    ">
                                                <img :src="getFullImagePath(
                                                    img.image_path
                                                )
                                                    " alt="thumb" />
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="shop-details-img-wrap">
                                    <div class="tab-content" id="myTabContent">
                                        <div v-for="(
img, index
                                            ) in product.images" :key="img.id" class="tab-pane fade" :class="{
                                                'show active': index === 0,
                                            }" :id="`img-${index}`" role="tabpanel">
                                            <div class="shop-details-img">
                                                <img :src="getFullImagePath(
                                                    img.image_path
                                                )
                                                    " alt="main" style="
                                                        width: 600px;
                                                        height: 600px;
                                                        object-fit: cover;
                                                    " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="shop-details-content">
                                <a href="#" class="product-cat">{{
                                    product.category.category_name
                                    }}</a>
                                <h3 class="title">
                                    {{ product.product_name }}
                                </h3>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="style-name">
                                    Product Code: {{ product.product_code }}
                                </p>
                                <div class="price">
                                    Price : ${{ product.price }}
                                </div>
                                <div class="product-details-info">
                                    <p>{{ product.description }}</p>
                                </div>
                                <div class="perched-info">
                                    <div class="cart-plus-minus">
                                        <form action="#" class="num-block">
                                            <input type="text" class="in-num" value="1" readonly="" />
                                            <div class="qtybutton-box">
                                                <span class="plus"><img src="/front_assets/img/icon/plus.png"
                                                        alt="" /></span>
                                                <span class="minus dis"><img src="/front_assets/img/icon/minus.png"
                                                        alt="" /></span>
                                            </div>
                                        </form>
                                    </div>
                                    <a href="#" class="btn">add to cart</a>
                                    <div class="wishlist-compare">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="far fa-heart"></i>
                                                    Add to Wishlist</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-retweet"></i>
                                                    Add to Compare List</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details-share">
                                    <ul>
                                        <li>Share :</li>
                                        <li>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else class="text-center py-5">Loading...</div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product-desc-wrap">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="description-tab" data-toggle="tab"
                                            href="#description" role="tab" aria-controls="description"
                                            aria-selected="true">Description Guide</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews"
                                            role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="product-desc-title mb-30">
                                            <h4 class="title">
                                                Additional information :
                                            </h4>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit, sed do
                                            eiusmod tempor incididunt ut labore
                                            et dolore magna aliqua. Ut enim ad
                                            minim veniam, quis nostrud
                                            exercitation ullamco laboris nisi ut
                                            aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in
                                            reprehenderit in voluptate velit
                                            esse cillum dolore eu fugiat nulla
                                            pariatur. Excepteur sint occaecat
                                            cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit
                                            anim id est laborum.
                                        </p>
                                        <p>
                                            The purpose of lorem ipsum is to
                                            create a natural looking block of
                                            text (sentence, paragraph, page,
                                            etc.) that doesn't distract from the
                                            layout. A practice not without
                                            controversy, laying out pages with
                                            meaningless filler text can be very
                                            useful when the focus is meant to be
                                            on design, not content.
                                        </p>
                                        <div class="product-title">
                                            <span></span>
                                            <h2>PRODUCT SPECIFICATIONS</h2>
                                            <span></span>
                                        </div>
                                        <table class="product-table" v-if="product">
                                            <tr>
                                                <td><strong>Type:</strong></td>
                                                <td>{{ product.type }}</td>
                                                <td class="vertical-line" rowspan="3"></td>
                                                <td><strong>Stone:</strong></td>
                                                <td>
                                                    {{ product.stone_type }}
                                                </td>
                                            </tr>
                                            <tr class="alt">
                                                <td><strong>Color:</strong></td>
                                                <td>{{ product.color }}</td>
                                                <td>
                                                    <strong>Gender:</strong>
                                                </td>
                                                <td>{{ product.gender }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Material:</strong>
                                                </td>
                                                <td>{{ product.material }}</td>
                                                <td>
                                                    <strong>Perfection:</strong>
                                                </td>
                                                <td>
                                                    {{ product.finish_quality }}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="reviews" role="tabpanel"
                                        aria-labelledby="reviews-tab">
                                        <div class="product-desc-title mb-30">
                                            <h4 class="title">Reviews (0) :</h4>
                                        </div>
                                        <p>
                                            Your email address will not be
                                            published. Required fields are
                                            marked
                                        </p>
                                        <p class="adara-review-title">
                                            Be the first to review “Adara”
                                        </p>
                                        <div class="review-rating">
                                            <span>Your rating *</span>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <form action="#" class="comment-form review-form">
                                            <span>Your review *</span>
                                            <textarea name="message" id="comment-message"
                                                placeholder="Your Comment"></textarea>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="Your Name*" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="email" placeholder="Your Email*" />
                                                </div>
                                            </div>
                                            <div class="comment-check-box">
                                                <input type="checkbox" id="comment-check" />
                                                <label for="comment-check">Save my name and email in
                                                    this browser for the next
                                                    time I comment.</label>
                                            </div>
                                            <button class="btn">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="related-product-wrap">
                        <div class="row">
                            <div class="col-12">
                                <div class="related-product-title">
                                    <h4 class="title">You May Also Like...</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row related-product-active">
                            <div class="col-xl-3" v-for="item in relatedProducts" :key="item.id">
                                <div class="new-arrival-item text-center">
                                    <div class="thumb mb-25">
                                        <a :href="`/product/${item.slug}`">
                                            <img :src="getFullImagePath(item.images[0]?.image_path)" alt="" />
                                        </a>
                                        <div class="product-overlay-action">
                                            <ul>
                                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                                <li><a :href="`/product/${item.slug}`"><i class="far fa-eye"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h5><a :href="`/product/${item.slug}`">{{ item.product_name }}</a></h5>
                                        <span class="price">${{ item.price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!-- shop-details-area-end -->
        </template>
    </Layout>
</template>
<script>
import axios from "axios";
import Layout from "./Layout.vue";
import getUrlList from "../provider.js";

export default {
    name: "DetailsProduct",
    components: { Layout },
    data() {
        return {
            product: null,
            relatedProducts: [],
            baseImageUrl: "http://127.0.0.1:8001",
        };
    },
    mounted() {
        const slug = this.$route.params.slug;
        this.fetchProduct(slug);
    },
    methods: {
        async fetchProduct(slug) {
            try {
                const response = await axios.get(
                    getUrlList().getProductDetailBySlug(slug)
                );
                this.product = response.data;
                this.fetchRelatedProducts(slug);
            } catch (error) {
                console.error("Error fetching product:", error);
            }
        },
        async fetchRelatedProducts(slug) {
            try {
                const response = await axios.get(getUrlList().getRelatedProductsBySlug(slug));
                this.relatedProducts = response.data;
            } catch (error) {
                console.error("Error fetching related products:", error);
            }
        },
        getFullImagePath(path) {
            return path.startsWith("/")
                ? this.baseImageUrl + path
                : this.baseImageUrl + "/" + path;
        },
    },
};
</script>

<style scoped>
.product-title {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 30px;
    gap: 20px;
}

.product-title span {
    flex: 1;
    height: 1px;
    background-color: black;
    opacity: 0.8;
}

.product-title h2 {
    font-size: 28px;
    font-weight: bold;
    margin: 0;
}

.product-table {
    width: 100%;
    font-size: 16px;
    border-collapse: separate;
    border-spacing: 20px 40px;
}

.product-table td {
    vertical-align: top;
}

.product-table .alt {
    background-color: #f7f7f7;
    height: 30px;
}

.product-table td:first-child,
.product-table td:nth-child(4) {
    white-space: nowrap;
}

/* Gạch đứng giữa trái/phải – liền mạch */
.vertical-line {
    width: 1px;
    background-color: #ccc;
    min-width: 1px;
}
</style>
