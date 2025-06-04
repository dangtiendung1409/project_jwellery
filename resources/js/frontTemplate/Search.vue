<template>
    <Layout>
        <template v-slot:content>
            <div class="container my-5">
                <h2>Search results for: "{{ keyword }}"</h2>
                <p v-if="products.length">Find {{ total }} product</p>
                <p v-else>No products found.</p>

                <div class="row">
                    <div v-for="product in products" :key="product.id" class="col-md-3 mb-4">
                        <div class="card h-100">
                            <router-link :to="{ name: 'DetailsProduct', params: { slug: product.slug } }">
                                <img :src="product.images[0]?.image_path || 'https://via.placeholder.com/300'"
                                    class="card-img-top" alt="Ảnh sản phẩm" />
                            </router-link>

                            <div class="card-body">
                                <h5 class="card-title">{{ product.product_name }}</h5>
                                <p class="card-text">${{ product.price }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </Layout>
</template>

<script>
import axios from "axios";
import Layout from "./Layout.vue";
import getUrlList from "../provider.js";

export default {
    name: "Search",
    components: { Layout },
    data() {
        return {
            keyword: this.$route.query.keyword || "",
            products: [],
            total: 0,
        };
    },
    watch: {
        '$route.query.keyword': {
            handler(newKeyword) {
                this.keyword = newKeyword || "";
                if (this.keyword.trim()) {
                    this.search();
                } else {
                    this.products = [];
                    this.total = 0;
                }
            },
            immediate: true,
        },
    },
    methods: {
        async search() {
            try {
                const response = await axios.get(`${getUrlList().searchProducts}?keyword=${encodeURIComponent(this.keyword)}`);
                this.products = response.data.products;
                this.total = response.data.total;
            } catch (error) {
                console.error("Lỗi khi tìm kiếm sản phẩm:", error);
            }
        },
    },
};
</script>

<style scoped>
.card img {
    object-fit: cover;
    height: 200px;
}
</style>
