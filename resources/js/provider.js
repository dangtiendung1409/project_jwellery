export function getUrlList()
{
const baseUrl = 'http://127.0.0.1:8001/api';
      return {
          // home page
          getCategories: `${baseUrl}/getCategories`,
          searchProducts: `${baseUrl}/search-products`,

          // category page
          getProductsByCategorySlug: (slug) => `${baseUrl}/products-by-category/${slug}`,
          getParentCategoriesWithCount: `${baseUrl}/get-parent-categories-with-count`,

          // details page
          getProductDetailBySlug: (slug) => `${baseUrl}/product-detail/${slug}`,
          getRelatedProductsBySlug: (slug) => `${baseUrl}/related-products/${slug}`,

      }
}
export default getUrlList;
