export function getUrlList() {
    const baseUrl = 'http://localhost:8000/api/';

    return {
        header_categories: baseUrl + 'header_categories',
        home: baseUrl + 'home',
        category: baseUrl + 'category',
    }
}

export default getUrlList;
