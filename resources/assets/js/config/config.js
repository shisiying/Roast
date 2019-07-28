var api_url = '';
var app_url = '';
var gaode_maps_js_api_key = 'b83abb3e118bde9ab6814bc14b762df3';

switch (process.env.NODE_ENV) {
    case 'development':
        api_url = 'http://roastapp.test/api/v1';
        break;
    case 'production':
        api_url = 'http://roastapp.test/api/v1';
        break;
}

export const ROAST_CONFIG = {
    API_URL: api_url,
    APP_URL: app_url,
    GAODE_MAPS_JS_API_KEY: gaode_maps_js_api_key

}