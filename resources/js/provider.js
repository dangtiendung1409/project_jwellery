export function getUrlList()
{
const baseUrl = 'http://127.0.0.1:8001/api';
      return {
          // home page
          getPhotoData : `${baseUrl}/getPhotoData`,
      }
}
export default getUrlList;
