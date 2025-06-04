<template>
    <Layout>
        <template v-slot:content="slotProps">
            <!-- breadcrumb-area -->
            <section class="breadcrumb-area breadcrumb-bg" style="background-image: url('/images/anhbg.jpg')">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <h2>Category</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="index.html">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Shop
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- shop-area -->
            <section class="shop-area pt-100 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-8">
                            <div class="shop-top-meta mb-35">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="shop-top-left">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="flaticon-menu"></i>
                                                        FILTER</a>
                                                </li>
                                                <li v-if="products.length > 0">
                                                    Found {{ totalProducts }} results
                                                </li>
                                                <li v-else class="text-center text-gray-500 text-lg py-10">
                                                    No products found.
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="shop-top-right">
                                            <form action="#">
                                                <select name="select">
                                                    <option value="">
                                                        Sort by newness
                                                    </option>
                                                    <option>
                                                        Free Shipping
                                                    </option>
                                                    <option>Best Match</option>
                                                    <option>Newest Item</option>
                                                    <option>Size A - Z</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div v-for="product in products" :key="product.id" class="col-xl-4 col-sm-6">
                                    <div class="new-arrival-item text-center mb-50">
                                        <div class="thumb mb-25">
                                            <div v-if="product.discount" class="discount-tag">
                                                - {{ product.discount }}%
                                            </div>
                                            <a :href="`/product/${product.slug}`">
                                                <img :src="product.image.startsWith(
                                                    '/'
                                                )
                                                    ? product.image
                                                    : '/' +
                                                    product.image
                                                    " :alt="product.name" />
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li>
                                                        <a href="/cart"><i class="far fa-heart"></i></a>
                                                    </li>
                                                    <li>
                                                        <a :href="`/product/${product.slug}`"><i
                                                                class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h5>
                                                <a :href="`/shop-details/${product.slug}`">{{ product.name }}</a>
                                            </h5>
                                            <span class="price">${{ product.price }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pagination-wrap" v-if="pagination.last_page > 1">
                                <ul>
                                    <li class="prev" :class="{
                                        disabled:
                                            pagination.current_page === 1,
                                    }">
                                        <a href="#" @click.prevent="
                                            changePage(
                                                pagination.current_page - 1
                                            )
                                            ">Prev</a>
                                    </li>

                                    <li v-for="page in pagination.last_page" :key="page" :class="{
                                        active:
                                            page ===
                                            pagination.current_page,
                                    }">
                                        <a href="#" @click.prevent="changePage(page)">{{ page }}</a>
                                    </li>

                                    <li class="next" :class="{
                                        disabled:
                                            pagination.current_page ===
                                            pagination.last_page,
                                    }">
                                        <a href="#" @click.prevent="
                                            changePage(
                                                pagination.current_page + 1
                                            )
                                            ">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <aside class="shop-sidebar">
                                <div class="widget side-search-bar">
                                    <form @submit.prevent="onSearchSubmit">
                                        <input type="text" v-model="searchKeyword" placeholder="Search product..." />
                                        <button type="submit">
                                            <i class="flaticon-search"></i>
                                        </button>
                                    </form>
                                </div>

                                <div class="widget" style="
                                        margin-top: 20px;
                                        border-bottom: 1px dotted #d7d7d7;
                                    ">
                                    <h4 class="widget-title">Product Categories</h4>
                                    <div class="shop-cat-list">
                                        <ul>
                                            <li v-for="cat in categoriesWithCount" :key="cat.id">
                                                <router-link :to="{ name: 'Category', params: { slug: cat.slug } }">
                                                    {{ cat.name }}
                                                </router-link>
                                                <span>({{ cat.product_count }})</span>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="widget" style="margin-top: 20px; border-bottom: 1px dotted #d7d7d7;">
                                    <h4 class="widget-title">Price Filter</h4>
                                    <div class="price_filter">
                                        <slider v-model="priceRange" :min="0" :max="1000" :step="100" :tooltip="true"
                                            @change="onSliderChange" class="w-full mb-4" />

                                        <div class="price_slider_amount"
                                            style="display: flex; gap: 8px; align-items: center;">
                                            <span>Price :</span>
                                            <input type="number" min="0" max="10000" v-model.number="priceRange[0]"
                                                @change="onSliderChange" placeholder="Min" style="width: 70px;">
                                            <span>-</span>
                                            <input type="number" min="0" max="10000" v-model.number="priceRange[1]"
                                                @change="onSliderChange" placeholder="Max" style="width: 70px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="widget" style="margin-top: 20px">
                                    <h4 class="widget-title">Gender</h4>
                                    <div class="sidebar-brand-list">
                                        <ul>
                                            <li>
                                                <a href="#" @click.prevent="
                                                    updateFilter(
                                                        'gender',
                                                        'Male'
                                                    )
                                                    " :class="{ 'active': filters.gender === 'Male' }">Male</a>
                                            </li>
                                            <li>
                                                <a href="#" @click.prevent="
                                                    updateFilter(
                                                        'gender',
                                                        'Female'
                                                    )
                                                    " :class="{ 'active': filters.gender === 'Female' }">Female</a>
                                            </li>
                                            <li>
                                                <a href="#" @click.prevent="
                                                    updateFilter(
                                                        'gender',
                                                        'Unisex'
                                                    )
                                                    " :class="{ 'active': filters.gender === 'Unisex' }">Unisex</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget has-border">
                                    <div class="sidebar-product-size mb-30">
                                        <h4 class="widget-title">
                                            Product Material
                                        </h4>
                                        <div class="shop-size-list">
                                            <ul>
                                                <li>
                                                    <a href="#" @click.prevent="updateFilter('material', 'Gold 18K')"
                                                        :class="{ 'active': filters.material === 'Gold 18K' }">Gold
                                                        18K</a>
                                                </li>
                                                <li>
                                                    <a href="#" @click.prevent="updateFilter('material', 'Silver 925')"
                                                        :class="{ 'active': filters.material === 'Silver 925' }">Silver
                                                        925</a>
                                                </li>
                                                <li>
                                                    <a href="#" @click.prevent="updateFilter('material', 'Platinum')"
                                                        :class="{ 'active': filters.material === 'Platinum' }">Platinum</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget has-border" style="border-bottom: 1px dotted #d7d7d7">
                                    <div class="sidebar-product-size mb-30">
                                        <h4 class="widget-title">Stone type</h4>
                                        <div class="shop-size-list">
                                            <ul>
                                                <li>
                                                    <a href="#" @click.prevent="updateFilter('stone_type', 'Diamond')"
                                                        :class="{ 'active': filters.stone_type === 'Diamond' }">Diamond</a>
                                                </li>
                                                <li>
                                                    <a href="#" @click.prevent="updateFilter('stone_type', 'Ruby')"
                                                        :class="{ 'active': filters.stone_type === 'Ruby' }">Ruby</a>
                                                </li>
                                                <li>
                                                    <a href="#" @click.prevent="updateFilter('stone_type', 'Sapphire')"
                                                        :class="{ 'active': filters.stone_type === 'Sapphire' }">Sapphire</a>
                                                </li>
                                                <li>
                                                    <a href="#" @click.prevent="updateFilter('stone_type', 'None')"
                                                        :class="{ 'active': filters.stone_type === 'None' }">None</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-product-color" style="margin-top: 20px">
                                    <h4 class="widget-title">Color</h4>
                                    <div class="shop-color-list">
                                        <ul>
                                            <li v-for="color in colors" :key="color" style="position: relative">
                                                <span class="color-circle"
                                                    :class="{ selected: filters.color === color }" :style="{
                                                        backgroundColor: colorMap[color] || '#ccc'
                                                    }" :title="color" @click="updateFilter('color', color)">
                                                    <span v-if="filters.color === color"
                                                        class="checkmark">&#10003;</span>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="widget has-border">
                                    <div class="sidebar-product-size mb-30">
                                        <h4 class="widget-title">
                                            Finish quality
                                        </h4>
                                        <div class="shop-size-list">
                                            <ul>
                                                <li>
                                                    <a href="#"
                                                        @click.prevent="updateFilter('finish_quality', 'High Polish')"
                                                        :class="{ 'active': filters.finish_quality === 'High Polish' }">High
                                                        Polish</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        @click.prevent="updateFilter('finish_quality', 'Matte Finish')"
                                                        :class="{ 'active': filters.finish_quality === 'Matte Finish' }">Matte
                                                        Finish</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        @click.prevent="updateFilter('finish_quality', 'Satin Finish')"
                                                        :class="{ 'active': filters.finish_quality === 'Satin Finish' }">Satin
                                                        Finish</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </section>
            <!-- shop-area-end -->
        </template>
    </Layout>
</template>
<script>
import axios from "axios";
import Layout from "./Layout.vue";
import getUrlList from "../provider.js";
import '@vueform/slider/themes/default.css'
import Slider from '@vueform/slider'


export default {
    name: "Category",
    components: {
        Layout,
        Slider,
    },
    data() {
        return {
            products: [],
            totalProducts: 0,
            searchKeyword: this.$route.query.search || '',
            categoriesWithCount: [],
            colors: ["Gold", "Silver", "Rose Gold"],
            colorMap: {
                Gold: "#FFD700",
                Silver: "#C0C0C0",
                "Rose Gold": "#B76E79",
            },
            pagination: {
                current_page: 1,
                last_page: 1,
            },
            filters: {
                price_min: null,
                price_max: null,
                gender: null,
                material: null,
                stone_type: null,
                color: null,
                finish_quality: null,
            },
            priceRange: [0, 10000], // Thêm biến này để dùng cho slider
        };
    },

    mounted() {
        this.loadProducts();
        this.loadCategoriesWithCount();
        // Khởi tạo priceRange từ filters nếu có
        if (this.filters.price_min !== null && this.filters.price_max !== null) {
            this.priceRange = [Number(this.filters.price_min), Number(this.filters.price_max)];
        }
    },
    watch: {
        "$route.params.slug": "loadProducts",
        "$route.query": {
            handler(val) {
                this.loadProducts();
                // Đồng bộ filters từ query
                Object.keys(this.filters).forEach(k => {
                    this.filters[k] = val[k] !== undefined ? val[k] : null;
                });
                // Đồng bộ lại priceRange khi filters thay đổi từ ngoài
                if (this.filters.price_min !== null && this.filters.price_max !== null) {
                    this.priceRange = [Number(this.filters.price_min), Number(this.filters.price_max)];
                }
            },
            deep: true,
        },
        filters: {
            handler(val) {
                // Đồng bộ lại priceRange khi filters thay đổi từ ngoài
                if (val.price_min !== null && val.price_max !== null) {
                    this.priceRange = [Number(val.price_min), Number(val.price_max)];
                }
            },
            deep: true,
        },
    },

    methods: {
        async loadProducts() {
            const slug = this.$route.params.slug;
            const query = { ...this.$route.query };

            if (!slug) return;

            try {
                const queryString = new URLSearchParams(query).toString();
                const response = await axios.get(
                    getUrlList().getProductsByCategorySlug(slug) +
                    `?${queryString}`
                );
                this.products = response.data.data;
                this.pagination.current_page = response.data.current_page;
                this.pagination.last_page = response.data.last_page;
                this.totalProducts = response.data.total;
            } catch (error) {
                console.error("Lỗi khi lấy sản phẩm theo slug:", error);
            }
        },
        onSearchSubmit() {
            const current = { ...this.$route.query };

            if (this.searchKeyword.trim()) {
                current.search = this.searchKeyword.trim();
            } else {
                delete current.search;
            }
            this.$router.push({
                name: "Category",
                params: { slug: this.$route.params.slug },
                query: current,
            });
        },
        async loadCategoriesWithCount() {
            try {
                const res = await axios.get(getUrlList().getParentCategoriesWithCount);
                this.categoriesWithCount = res.data;
            } catch (error) {
                console.error("Lỗi khi lấy category:", error);
            }
        },

        updateFilter(key, value) {
            // Lấy filter hiện tại từ URL query
            const current = { ...this.$route.query };
            // Cập nhật filter mới
            current[key] = value;
            // Xóa các key null/undefined/rỗng
            const cleaned = {};
            Object.keys(this.filters).forEach(k => {
                if (current[k] !== null && current[k] !== undefined && current[k] !== '') {
                    cleaned[k] = current[k];
                }
            });

            this.$router.push({
                name: "Category",
                params: { slug: this.$route.params.slug },
                query: cleaned,
            });
        },

        changePage(page) {
            if (page < 1 || page > this.pagination.last_page) return;
            this.$router.push({
                name: "Category",
                params: { slug: this.$route.params.slug },
                query: { ...this.$route.query, page },
            });
        },

        onSliderChange() {
            // Cập nhật filters từ priceRange
            this.filters.price_min = this.priceRange[0];
            this.filters.price_max = this.priceRange[1];
            this.onPriceInput();
        },

        onPriceInput() {
            // Ensure min <= max
            if (this.filters.price_min > this.filters.price_max) {
                [this.filters.price_min, this.filters.price_max] = [this.filters.price_max, this.filters.price_min];
            }

            // Clean out empty/null/undefined values
            const cleaned = {};
            Object.keys(this.filters).forEach(k => {
                if (this.filters[k] !== null && this.filters[k] !== undefined && this.filters[k] !== '') {
                    cleaned[k] = this.filters[k];
                }
            });

            this.$router.push({
                name: "Category",
                params: { slug: this.$route.params.slug },
                query: {
                    ...this.$route.query,
                    ...cleaned,
                },
            });
        }

    },
};
</script>

<style scoped>
.shop-size-list ul {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    gap: 10px;
    padding: 0;
    margin: 0;
    justify-content: flex-start;
}

.shop-size-list ul li {
    width: auto !important;
    min-width: 0 !important;
    display: block;
    margin: 0;
    padding: 0;
}

.shop-size-list ul li a {
    display: block;
    padding: 6px 18px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 15px;
    white-space: normal;
    word-break: break-word;
    width: auto;
    min-width: 0;
    max-width: 100%;
    box-sizing: border-box;
    text-align: center;
}

.shop-size-list ul li a.active,
.shop-size-list ul li a:active,
.sidebar-brand-list ul li a.active,
.sidebar-brand-list ul li a:active {
    background: #FF5400 !important;
    color: #fff !important;
    border-color: #FF5400 !important;
}

.sidebar-brand-list ul li a {
    position: relative;
    padding-left: 24px;
    font-size: 15px;
    color: #333;
    display: inline-block;
    line-height: 1.6;
}

.sidebar-brand-list ul li a::before {
    content: "";
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid #999;
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    background-color: #fff;
}

.sidebar-brand-list ul li a.active::before {
    background-color: #FF5400;
    border-color: #FF5400;
}

.sidebar-brand-list ul li a.active {
    background: transparent !important;
    color: #333 !important;
    border: none !important;
}

.color-circle {
    display: inline-block;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 2px solid transparent;
    transition: border 0.3s;
}

.color-circle.active {
    border-color: #FF5400;
}

.checkmark {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 18px;
    pointer-events: none;
}
</style>
