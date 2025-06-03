export function getUrlList()
{
const baseUrl = 'http://127.0.0.1:8001/api';
      return {
          // home page
          getCategories: `${baseUrl}/getCategories`,
          getProductsByCategorySlug: (slug) => `${baseUrl}/products-by-category/${slug}`,
          getParentCategoriesWithCount: `${baseUrl}/get-parent-categories-with-count`,
      }
}
export default getUrlList;
