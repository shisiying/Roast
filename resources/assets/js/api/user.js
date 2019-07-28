import {ROAST_CONFIG} from "../config/config";

export default {
    /*
    Get /api/v1/user
     */
    getUser: function () {
        return axios.get(ROAST_CONFIG.API_URL + '/user');
    }
}