<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
  return view('pages.home.home',
    ['title' => 'Wrainbo: Mobile game platform for business learning']);
});

Route::get('feature', function () {
    return view('pages.feature.feature',
      ['title' => 'Feature | Wrainbo']);
});

Route::get('package', function () {
    return view('pages.product.product',
      ['title' => 'Package | Wrainbo']);
});

Route::get('gameplay', function () {
    return view('pages.gameplay.gameplay',
      ['title' => 'Gameplay | Wrainbo']);
});

Route::get('learning', function () {
    return view('pages.learning.learning',
      ['title' => 'Practical Learning | Wrainbo']);
});

Route::get('assessment', function () {
    return view('pages.accessment.accessment',
      ['title' => 'Data-Driven Assessment | Wrainbo']);
});

Route::get('aboutUs', function () {
    return view('pages.aboutus.aboutus',
      ['title' => 'About Us | Wrainbo']);
});


Route::group(['prefix' => 'analytics'], function () {
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: text/html; charset=UTF-8');

    Route::get('/', function () {
        return view('analytics',
          ['title' => 'Analytics Demo']);
    });

    Route::post('save', "Analytics\UserCtrl@SaveGameRecord");
    Route::post('import', "Analytics\UserCtrl@ImportUnityAnalyticsData");
    Route::get("ranking/{level}", "Analytics\UserCtrl@GetRanking");

    Route::get("spell_level/{guid}", "Analytics\WebAnaCtrl@GetSpellLevelAnalysis");
    Route::get("score/{guid}", "Analytics\WebAnaCtrl@GetAllDataByGUID");
    Route::get("allUserID", "Analytics\WebAnaCtrl@AnalyticsTestPortal");
});
