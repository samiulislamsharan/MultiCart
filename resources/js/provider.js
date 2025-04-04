export function getUrlList() {
    const baseUrl = 'http://localhost:8000/api/';

    return {
        header_categories: baseUrl + 'header_categories',
        home: baseUrl + 'home',
        category: baseUrl + 'category',
        product: baseUrl + 'product',
        get_user_data: baseUrl + 'get_user_data',
        get_cart_data: baseUrl + 'get_cart_data',
        add_to_cart: baseUrl + 'add_to_cart',
        remove_from_cart: baseUrl + 'remove_from_cart',
        add_coupon: baseUrl + 'add_coupon',
        remove_coupon: baseUrl + 'remove_coupon',
        get_user_coupon: baseUrl + 'get_user_coupon',
        get_post_code_details: baseUrl + 'get_post_code_details',
    }
}

export default getUrlList;
