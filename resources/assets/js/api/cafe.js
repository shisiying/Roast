import {ROAST_CONFIG} from '../config/config.js';

export default {
    /**
     * GEt /api/v1/cafes
     */
    getCafes:function () {
        return axios.get(ROAST_CONFIG.API_URL+'/cafes');
    },

    /**
     * Get /api/v1/cafes/{cafeID}
     */
    getCafe:function (cafeID) {
        return axios.get(ROAST_CONFIG.API_URL+'/cafes/'+cafeID);
    },

    /**
     * Post /api/v1/cafes
     */
    postAddNewCafe:function (name,address,city,state,zip) {
        return axios.post(ROAST_CONFIG.API_URL+'/cafes',{
            name:name,
            address:address,
            city:city,
            state:state,
            zip:zip
        });
    }
}