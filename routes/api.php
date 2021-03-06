<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::group(['prefix'=>'v1'],function (){
//
//    Route::get('/user','Api\UsersController@getUser');
//
//
//});


//需要授权路由
Route::group(['prefix' => 'v1','middleware' => 'auth:api'],function (){

    Route::get('/user', function( Request $request ){
        return $request->user();
    });

    /*
   |-------------------------------------------------------------------------------
   | Get All Cafes
   |-------------------------------------------------------------------------------
   | URL:            /api/v1/cafes
   | Controller:     API\CafesController@getCafes
   | Method:         GET
   | Description:    Gets all of the cafes in the application
  */
    Route::get('/cafes', 'API\CafesController@getCafes');

    /*
     |-------------------------------------------------------------------------------
     | Get An Individual Cafe
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/cafes/{id}
     | Controller:     API\CafesController@getCafe
     | Method:         GET
     | Description:    Gets an individual cafe
    */
    Route::get('/cafes/{id}', 'API\CafesController@getCafe');

    /*
     |-------------------------------------------------------------------------------
     | Adds a New Cafe
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/cafes
     | Controller:     API\CafesController@postNewCafe
     | Method:         POST
     | Description:    Adds a new cafe to the application
    */
    Route::post('/cafes', 'API\CafesController@postNewCafe');

    Route::get('/brew-methods', 'API\BrewMethodsController@getBrewMethods');

    // 喜欢咖啡店
    Route::post('/cafes/{id}/like', 'API\CafesController@postLikeCafe');
    // 取消喜欢咖啡店
    Route::delete('/cafes/{id}/like', 'API\CafesController@deleteLikeCafe');
    //添加标签
    Route::post('/cafes/{id}/tags', 'API\CafesController@postAddTags');
    //删除指定的标签
    Route::delete('/cafes/{id}/tags/{tagID}', 'API\CafesController@deleteCafeTag');
    //搜索标签
    Route::get('/tags', 'API\TagsController@getTags');

});
