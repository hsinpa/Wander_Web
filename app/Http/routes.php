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
    ['title' => 'Wrainbo - Custom mobile games for corporate training and higher ed',
      'metaDesc' => 'Wrainbo helps organizations unlock learning ROI through
                      an adult learning game platform with better engagement, retention, and personalization.']);
});

Route::get('platform', function () {
    return view('pages.platform.platform',
      ['title' => ' Wrainbo’s Platform',
      'metaDesc' => 'Wrainbo’s customizable game-based learning platform provoides hands-on simulation, bite-sized lessons, and on-demand learning tools.']);
});

Route::get('games', function () {
    return view('pages.games.games',
      ['title' => 'Wrainbo - Games ',
      'metaDesc' => 'Download Wrainbo’s first e-learning titles to learn a variety of real world business skills like business operations, finance, and a variety of leadership skills.']);
});

Route::get('package', function () {
    return view('pages.product.product',
      ['title' => 'Package | Wrainbo']);
});

Route::get('gameplay', function () {
    return view('pages.gameplay.gameplay',
      ['title' => 'Game-Based Learning | Wrainbo']);
});

Route::get('learning', function () {
    return view('pages.learning.learning',
      ['title' => 'Practical Learning | Wrainbo']);
});

Route::get('demo', function () {
    return view('pages.home.demo',
      ['title' => 'Wrainbo - Get a Demo',
      'metaDesc' => 'Sign up to get a free demo of the Wrainbo’s platform and see how you can turn your corporate training or higher ed lessons into fun, engaging mobile games.']);
});

Route::get('assessment', function () {
    return view('pages.accessment.accessment',
      ['title' => 'Data-Driven Assessment | Wrainbo']);
});

Route::get('aboutUs', function () {
    return view('pages.aboutus.aboutus',
      ['title' => 'Wrainbo - About Us',
        'metaDesc' => "Wrainbo's vision is to make learning engaging, effective, and economical for the global community. We’d love to hear your goals and provide a free demo!"]);
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

    Route::get('getUsageData/{organization_id}', "CMS\CMSAssessmentCtrl@GetUsageData");
    Route::get('getUserUsageData/{user_id}', "CMS\CMSAssessmentCtrl@GetUsageByUserData");
    Route::get('CreateDummyUser/{level}/{num}', "CMS\CMSUserCtrl@CreateDummyUser");
    // Route::get('CreateYunusUser/', "CMS\CMSUserCtrl@CreateYunusUser");

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
    // header('Content-Type: text/html; charset=UTF-8');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:  GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    // header("Content-Type: application/json; charset=utf-8");

    Route::get('/', function () {
        return view('analytics',
          ['title' => 'Analytics Demo']);
    });
    //Send Reminding Email
    Route::post('sendEmailReminder', "CMS\CMSUserCtrl@SendEmailReminder");


    //For Unity
    Route::get("level/{user_id}", "CMS\CMSLevelCtrl@GetLevel");
    Route::get("ranking/{guid}/{level}", "Analytics\UserCtrl@GetRanking");
    Route::get("trophy/{guid}/{level}", "Analytics\UserCtrl@GetTrophyRanking");
    Route::get("getShadowPlayer/{level}/{guid}/{isMulti}", "Analytics\UserCtrl@GetShadowPlayerData");
    Route::get("getAllShadowPlayer/", "Analytics\UserCtrl@GetAllShadowPlayer");

    Route::get("getUnityVersion/{platform}", "Analytics\UserCtrl@CheckUnityVersion");
    Route::post("activatePromoCode", "Analytics\LicenseCtrl@ActivatePromoCode");
    Route::post("updateSocialMedia", "Analytics\DataReceiverCtrl@SocialMediaUpdate");

    //Push NotificationCtrl
    Route::get("pushNotification/UnplayUser", "Analytics\NotificationCtrl@PushUnplayUser");
    Route::get("pushNotification/UnupdateUser/{game}", "Analytics\NotificationCtrl@PushUnupdateUser");

    Route::get("pushNotification/{title}/{message}", "Analytics\NotificationCtrl@CheckNotification");
    Route::post("UpdateRecord/", "Analytics\NotificationCtrl@ReceiveRegistrationID");

    //For Assessment
    Route::post('login', "Analytics\UserCtrl@PrimeLogin");

    Route::post('logout', "Analytics\UserCtrl@Logout");
    Route::post('guestLogin', "Analytics\UserCtrl@LoginAsGuest");

    Route::post('editPassword', "Analytics\UserCtrl@EditorPassword");
    Route::post('forgetPassword', "Analytics\UserCtrl@ForgetPassword");

    Route::post('save', "Analytics\UserCtrl@SaveGameRecord");
    Route::post('import', "Analytics\UserCtrl@ImportUnityAnalyticsData");

    Route::get("spell_level/{guid}", "Analytics\WebAnaCtrl@GetSpellLevelAnalysis");
    Route::get("score/{guid}", "Analytics\WebAnaCtrl@GetAllDataByGUID");
    Route::get("allUserID", "Analytics\WebAnaCtrl@AnalyticsTestPortal");
});
