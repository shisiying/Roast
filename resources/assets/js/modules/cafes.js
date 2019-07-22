import CafeAPI from '../api/cafe'

// status = 0 -> 数据尚未加载
// status = 1 -> 数据开始加载
// status = 2 -> 数据加载成功
// status = 3 -> 数据加载失败
export const cafes ={
    state: {
        cafes: [],
        cafesLoadStatus: 0,
        cafe: {},
        cafeLoadStatus: 0
    },
    actions: {
        loadCafes( { commit } ){
            commit('setCafesLoadStatus',1);
            CafeAPI.getCafes().then(
                function (response) {
                    commit('setCafes',response.data);
                    commit('setCafesLoadStatus',2);
                }
            ).catch(function () {
                    commit('setCafes',[]);
                    commit('setCafesLoadStatus',3);
            });

        },
        loadCafe( { commit }, data ){
            commit( 'setCafeLoadStatus', 1 );
            CafeAPI.getCafe(data.id)
                .then( function( response ){
                    commit( 'setCafe', response.data );
                    commit( 'setCafeLoadStatus', 2 );
                })
                .catch( function(){
                    commit( 'setCafe', {} );
                    commit( 'setCafeLoadStatus', 3 );
                });
        }
    },
    mutations: {
        setCafesLoadStatus(state, status) {
            state.cafesLoadStatus = status;
        },
        setCafes(state, cafe) {
            state.cafes = cafe;
        },
        setCafeLoadStatus(state, status) {
            state.CafeLoadStatus = status;
        },
        setCafe(state, cafe) {
            state.cafe = cafe;
        }
    },
    getters: {
        getCafesLoadStatus(state) {
            return state.cafesLoadStatus;
        },
        getCafes(state) {
            return state.cafes;
        },
        getCafeLoadStatus(state) {
            return state.cafeLoadStatus;
        },
        getCafe(state) {
            return state.cafe;
        }
    }
}