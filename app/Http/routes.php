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

Route::get('platform', function () {
    return view('pages.platform.platform',
      ['title' => 'Platform | Wrainbo']);
});

Route::get('package', function () {
    return view('pages.product.product',
      ['title' => 'Package | Wrainbo']);
});

Route::get('overview', function () {
    return view('pages.gameplay.gameplay',
      ['title' => 'Overview | Wrainbo']);
});

Route::get('learning', function () {
    return view('pages.learning.learning',
      ['title' => 'Practical Learning | Wrainbo']);
});

Route::get('demo', function () {
    return view('pages.home.demo',
      ['title' => 'Get Demo | Wrainbo']);
});

Route::get('assessment', function () {
    return view('pages.accessment.accessment',
      ['title' => 'Data-Driven Assessment | Wrainbo']);
});

Route::get('aboutUs', function () {
    return view('pages.aboutus.aboutus',
      ['title' => 'About Us | Wrainbo']);
});


// ======================= CMS PANEL ======================
Route::group(['prefix' => 'cms'], function () {
    Route::get('/', function () {
        return view('cms.login',
              ['title' => 'Console | Wrainbo']);
    });

    Route::post('login', "CMS\CMSUserCtrl@login");
    Route::get('logout', "CMS\CMSUserCtrl@logout");
    Route::post('register', "CMS\CMSUserCtrl@register");

      //Access once user is login
      Route::group(['middleware' => 'session'], function () {
           Route::get('spell', function () {
              return view('cms.spell.spell');
          });

          //================== LEVEL ==================
          Route::get('level', "CMS\CMSLevelCtrl@LoadLevel");

          Route::get("level.template", function () {
              return view('cms.level.levelTemplate');
          });

          Route::get('level.event', function () {
              return view('cms.level.eventTemplate');
          });
          Route::get('level.preset', function () {
              return view('cms.level.presetTemplate');
          });
          Route::get('assessment', "CMS\CMSAssessmentCtrl@LoadPage");

          Route::post('saveLevel', "CMS\CMSLevelCtrl@SaveLevel");
          Route::post('deleteLevel', "CMS\CMSLevelCtrl@DeleteLevel");

        //================== LICENSE ==================

          Route::get('license', "CMS\CMSLicenseCtrl@LoadPage");

          Route::post('registerEmail', "CMS\CMSLicenseCtrl@RegisterEmail");
          Route::post('deleteLevel', "CMS\CMSLicenseCtrl@DeleteLevel");

        //================== LICENSE ==================

        Route::get('editor', "CMS\CMSEditorCtrl@LoadPage");
      });
});



Route::group(['prefix' => 'analytics'], function () {
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: text/html; charset=UTF-8');

    Route::get('/', function () {
        return view('analytics',
          ['title' => 'Analytics Demo']);
    });
    //For Unity
    Route::get("level/{user_id}", "CMS\CMSLevelCtrl@GetLevel");
    Route::get("ranking/{guid}/{level}", "Analytics\UserCtrl@GetRanking");

    //For Assessment
    Route::post('save', "Analytics\UserCtrl@SaveGameRecord");
    Route::post('import', "Analytics\UserCtrl@ImportUnityAnalyticsData");

    Route::get("spell_level/{guid}", "Analytics\WebAnaCtrl@GetSpellLevelAnalysis");
    Route::get("score/{guid}", "Analytics\WebAnaCtrl@GetAllDataByGUID");
    Route::get("allUserID", "Analytics\WebAnaCtrl@AnalyticsTestPortal");
});
