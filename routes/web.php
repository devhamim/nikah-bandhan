<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CropImageUploadController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/storage/link', function () {
    Artisan::call('storage:link');
});


Route::get('/', [WelcomeController::class, 'index'])->name('index');

Route::get('sitemap.xml', [WelcomeController::class, 'sitemap'])->name('sitemap');
Route::get('robot.txt', [WelcomeController::class, 'robotTxt'])->name('robotTxt');
Route::get('page/{page}', [WelcomeController::class, 'page'])->name('page');
Route::get('packages', [WelcomeController::class, 'packagelist'])->name('packagelist');
Route::get('dashboard', [WelcomeController::class, 'dashboard'])->name('dashboard');
Route::get('/registration/user', [WelcomeController::class, 'registrationUser'])->name('registration.user');
Route::get('categories/{id}/{slug?}', [WelcomeController::class, 'categories'])->name('categories');

Route::group(['prefix' => 'blogs'], function() {

    Route::get('/', [WelcomeController::class,'blogs'])->name('blogs.index');
    Route::get('/blog-details', [WelcomeController::class, 'blogDetails']);
    Route::get('/blog-details/{id}/{excerpt?}', [WelcomeController::class, 'blogDetails2'])->name('blogDetails2');

});



Route::get('profile3', [WelcomeController::class, 'profile3'])->name('profile3');

Route::get('generate-pdf', [AdminController::class, 'generatePDF']);
// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END



Route::post('load_district/fetch', [WelcomeController::class, 'load_districtFetch'])
        ->name('load_district.fetch');

Route::post('load_thana/fetch', [WelcomeController::class, 'load_thanaFetch'])
        ->name('load_thana.fetch');

Route::post('cast/fetch', [WelcomeController::class, 'castfetch'])->name('cast.fetch');

Route::post('/contact-us/post', [WelcomeController::class, 'contactUsPost'])->name('contactUsPost');

// Route::get('index', [WelcomeController::class, 'index'])->name('index');

Route::get('success-stories/details/{id}', [WelcomeController::class, 'successstories_details'])->name('success.stories_details');



Route::get('/user/login', [CustomAuthController::class, 'userLogin'])->name('user.login');
Route::get('/test', [CustomAuthController::class, 'test'])->name('test');
Route::get('/about-us', [CustomAuthController::class, 'aboutUs'])->name('aboutUs');

Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
// //forgot password
// Route::get('custom-forgot-password', [ForgotPasswordController::class, 'forgot_password'])->name('custom.forgot.password');
// Route::post('custom-forgot-password-submit', [ForgotPasswordController::class, 'forgot_password_submit'])->name('custom.forgot.password_post');
// //end forgot Password
// Route::get('password/reset/{token}',[ResetPasswordController::class ,'showResetForm'])->name('custom.password.reset');
// Route::post('password/reset/post', [ResetPasswordController::class ,'reset'])->name('custom.password.reset.post');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
//reset password






Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

//admin
Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {

    Route::get('payment/add/new', [AdminController::class, 'paymentAddNew'])->name('admin.paymentAddNew');
    Route::post('admin/User/Email/Match', [AdminController::class, 'adminUserEmailMatch'])->name('adminUserEmailMatch');
    Route::get('select/new/role', [AdminController::class, 'selectNewRole'])->name('admin.selectNewRole');
    Route::post('payment/add/new/post', [AdminController::class, 'paymentAddNewPost'])->name('admin.paymentAddNewPost');



    Route::get('all/free/payments', [AdminController::class, 'allFreePayments'])->name('admin.allFreePayments');
    Route::get('proposal/checked/by/admin/{proposal}', [AdminController::class, 'proposalCheckedByAdmin'])->name('admin.proposalCheckedByAdmin');
    Route::get('proposals/group/{type}', [AdminController::class, 'proposalsGroup'])->name('admin.proposalsGroup');
    Route::get('make/user/active/{user}', [AdminController::class, 'makeUserActive'])->name('admin.makeUserActive');

    Route::get('/user/search/ajax', [AdminController::class, 'userSearchAjax'])->name('admin.userSearchAjax');
    Route::get('edit/story/{story}', [AdminController::class, 'editStory'])->name('admin.editStory');
    Route::any('delete/story/{story}', [AdminController::class, 'deleteStory'])->name('admin.deleteStory');
    Route::post('edit/story/post/{story}', [AdminController::class, 'editStoryPost'])->name('admin.editStoryPost');
    Route::post('/post/update/{post}', [AdminController::class, 'postUpdate'])->name('admin.postUpdate');
    Route::get('/posts/all', [AdminController::class, 'postsAll'])->name('admin.postsAll');
    Route::get('/feature/image/delete/{post}', [AdminController::class, 'featureImageDelete'])->name('admin.featureImageDelete');
    Route::get('/users/all', [AdminController::class, 'usersAll'])->name('admin.usersAll');
    Route::get('quick/sms/draft', [AdminController::class, 'quickSmsDraft'])->name('admin.quickSmsDraft');
    Route::get('post/delete/{post}', [AdminController::class, 'postDelete'])->name('admin.postDelete');
    Route::get('new/story', [AdminController::class, 'newStory'])->name('admin.newStory');
    Route::post('new/story/post', [AdminController::class, 'newStoryPost'])->name('admin.newStoryPost');
    Route::get('all/stories', [AdminController::class, 'allStories'])->name('admin.allStories');
    Route::get('blog-add', [AdminController::class, 'postAddNew'])->name('admin.aboutPostAddNew');
    Route::get('blog-add2', [AdminController::class, 'postAddNew2'])->name('admin.aboutPostAddNew2');
    Route::get('logs/{user}', [AdminController::class, 'logs'])->name('admin.logs');
    Route::post('logs/post/{user}', [AdminController::class, 'logPost'])->name('admin.logPost');
    Route::post('user/profilepic/Change/{user}', [AdminController::class, 'userProfilepicChange'])->name('admin.userProfilepicChange');


    Route::get('user/pp/delete/{picture}', [AdminController::class, 'userPPDelete'])->name('admin.userPPDelete');

    Route::get('user/profilepic/checked/{pic}/{term}', [AdminController::class, 'userProfilepicCheck'])->name('admin.userProfilepicCheck');
    Route::get('select/thana/for/post', [AdminController::class, 'selectThanaForPost'])->name('welcome.selectThanaForPost');
    Route::get('select/district/for/post', [AdminController::class, 'selectDistrictForPost'])->name('welcome.selectDistrictForPost');
    Route::post('blog-add/post', [AdminController::class, 'aboutPostNewPost'])->name('admin.postAddNewPost');
    // Route::get('select/tags/or/add/new', [AdminController::class, 'selectTagsOrAddNew'])->name('admin.selectTagsOrAddNew');
    Route::get('/post/edit/{post}', [AdminController::class, 'postEdit'])->name('admin.postEdit');
    Route::get('quick/sms/draft/send/{bulk}', [AdminController::class, 'quickSmsDraftSend'])->name('admin.quickSmsDraftSend');
    Route::get('quick/sms/balance/check', [AdminController::class, 'quickSmsBalanceCheck'])->name('admin.quickSmsBalanceCheck');
    Route::get('quick/sms/draft/delete/{bulk}', [AdminController::class, 'quickSmsDraftDelete'])->name('admin.quickSmsDraftDelete');
    Route::post('quick/sms/draft/save', [AdminController::class, 'quickSmsDraftSave'])->name('admin.quickSmsDraftSave');
    Route::get('all/contact/list', [AdminController::class, 'allContact'])->name('admin.allContact');
    Route::post('send/email/sms/to/users/post', [AdminController::class, 'sendEmailSmsToUsersPost'])->name('admin.sendEmailSmsToUsersPost');
    Route::get('send/email/sms/to/users', [AdminController::class, 'sendEmailSmsToUsers'])->name('admin.sendEmailSmsToUsers');
    Route::get('new/contact/list', [AdminController::class, 'newContact'])->name('admin.newContact');
    Route::post('select/profile/users', [AdminController::class, 'selectProfileUsers'])->name('admin.selectProfileUsers');
    Route::any('send/profile/to/given/email/post', [AdminController::class, 'sendProfileToGivenEmailPost'])->name('admin.sendProfileToGivenEmailPost');
    Route::get('send/profile/to/given/email', [AdminController::class, 'sendProfileToGivenEmail'])->name('admin.sendProfileToGivenEmail');
    Route::post('quick/sms/draft/send/post/{bulk}', [AdminController::class, 'quickSmsDraftSendPost'])->name('admin.quickSmsDraftSendPost');
    Route::get('send/cv/to/given/email', [AdminController::class, 'sendCvToGivenEmail'])->name('admin.sendCvToGivenEmail');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('select/cv/users', [AdminController::class, 'selectCvUsers'])->name('admin.selectCvUsers');
    Route::any('send/cv/to/given/email/post', [AdminController::class, 'sendCvToGivenEmailPost'])->name('admin.sendCvToGivenEmailPost');
    Route::get('users/group/{type}', [AdminController::class, 'usersGroup'])->name('admin.usersGroup');
    Route::get('pendingProfiles', [AdminController::class, 'pendingProfiles'])->name('pendingProfiles');

    Route::get('quick/sms', [AdminController::class, 'quickSms'])->name('admin.quickSms');

    Route::get('quick/sms/bulk/items/{bulk}', [AdminController::class, 'quickSmsBulkItems'])->name('admin.quickSmsBulkItems');
    Route::post('quick/sms/send', [AdminController::class, 'quickSmsSend'])->name('admin.quickSmsSend');

    Route::get('quick/sms/bulk/items/resend/{bulk}', [AdminController::class, 'quickSmsBulkItemsResend'])->name('admin.quickSmsBulkItemsResend');
    Route::get('sent/sms/bulk', [AdminController::class, 'sentSmsBulk'])->name('admin.sentSmsBulk');
    Route::get('user/sms/user/{user}', [AdminController::class, 'userSms'])->name('admin.userSms');
    Route::any('sms/send/to-user/{user}', [AdminController::class, 'smsSendToUser'])->name('admin.smsSendToUser');
    Route::get('user/setting/list', [AdminController::class, 'userSettingList'])->name('admin.userSettingList');
    Route::post('user/setting/field/add', [AdminController::class, 'userSettingFieldAdd'])->name('admin.userSettingFieldAdd');
    Route::get('/pages/all', [AdminController::class, 'pagesAll'])->name('admin.pagesAll');
    Route::post('/page/add/new/post', [AdminController::class, 'pageAddNewPost'])->name('admin.pageAddNewPost');
    Route::post('page/edit/post/{page}', [AdminController::class, 'pageEditPost'])->name('admin.pageEditPost');
    Route::get('page-item/edit/{item}', [AdminController::class, 'pageItemEdit'])->name('admin.pageItemEdit');
    Route::get('page-item/delete/{item}', [AdminController::class, 'pageItemDelete'])->name('admin.pageItemDelete');
    Route::post('page-item/add/post/{page}', [AdminController::class, 'pageItemAddPost'])->name('admin.pageItemAddPost');
    Route::get('media/all', [AdminController::class, 'mediaAll'])->name('admin.mediaAll');
    Route::get('media/delete/{media}', [AdminController::class, 'mediaDelete'])->name('admin.mediaDelete');
    Route::get('get/media/ajax', [AdminController::class, 'getMediasAjax'])->name('admin.getMediasAjax');
    
    Route::post('media/file/upload', [AdminController::class, 'mediaUploadPost'])->name('admin.mediaUploadPost');
 
    Route::post('page-item/update/post/{item}', [AdminController::class, 'pageItemUpdate'])->name('admin.pageItemUpdate');
    Route::get('page-item/edit-editor/{item}', [AdminController::class, 'pageItemEditEditor'])->name('admin.pageItemEditEditor');
    Route::get('all/pending/payments', [AdminController::class, 'allPendingPayments'])->name('admin.allPendingPayments');
    Route::get('all/paid/payments', [AdminController::class, 'allPaidPayments'])->name('admin.allPaidPayments');
    Route::post('pending/payment/update/post/{payment}', [AdminController::class, 'pendingPaymentUpdatePost'])->name('admin.pendingPaymentUpdatePost');
    Route::get('payment/delete/{payment}', [AdminController::class, 'paymentDelete'])->name('admin.paymentDelete');
    Route::any('category/edit/{cat}', [AdminController::class, 'categoryEdit'])->name('admin.categoryEdit');
    Route::any('category/delete/{cat}', [AdminController::class, 'categoryDelete'])->name('admin.categoryDelete');
    Route::any('category/update/{cat}', [AdminController::class, 'categoryUpdate'])->name('admin.categoryUpdate');
    Route::any('district/update/{district}', [AdminController::class, 'districtUpdate'])->name('admin.districtUpdate');
    Route::post('category/add/new/post', [AdminController::class, 'categoryAddNewPost'])->name('admin.categoryAddNewPost');
    Route::get('page/edit/{page}', [AdminController::class, 'pageEdit'])->name('admin.pageEdit');
    Route::get('page/items/{page}', [AdminController::class, 'pageItems'])->name('admin.pageItems');
    Route::get('page/delete/{page}', [AdminController::class, 'pageDelete'])->name('admin.pageDelete');
    Route::get('divisions/all', [AdminController::class, 'divisionsAll'])->name('admin.divisionsAll');
    Route::get('districts/all', [AdminController::class, 'districtsAll'])->name('admin.districtsAll');

    Route::get('mobile/numbers/all', [AdminController::class, 'mobileNumbersAll'])->name('admin.mobileNumbersAll');
    Route::get('email/numbers/all', [AdminController::class, 'emailNumbersAll'])->name('admin.emailNumbersAll');
    Route::any('district/edit/{district}', [AdminController::class, 'districtEdit'])->name('admin.districtEdit');
    Route::any('district/delete/{district}', [AdminController::class, 'districtDelete'])->name('admin.districtDelete');
    Route::get('thana/all', [AdminController::class, 'thanaAll'])->name('admin.thanaAll');
    Route::any('thana/edit/{thana}', [AdminController::class, 'thanaEdit'])->name('admin.thanaEdit');
    Route::any('thana/delete/{thana}', [AdminController::class, 'thanaDelete'])->name('admin.thanaDelete');
    Route::post('thana/add/new/post', [AdminController::class, 'thanaAddNewPost'])->name('admin.thanaAddNewPost');
    Route::post('district/add/new/post', [AdminController::class, 'districtAddNewPost'])->name('admin.districtAddNewPost');
    Route::post('division/add/new/post', [AdminController::class, 'divisionAddNewPost'])->name('admin.divisionAddNewPost');
    Route::any('division/delete/{div}', [AdminController::class, 'divisionDelete'])->name('admin.divisionDelete');
    Route::any('division/update/{div}', [AdminController::class, 'divisionUpdate'])->name('admin.divisionUpdate');
    Route::any('division/edit/{div}', [AdminController::class, 'divisionEdit'])->name('admin.divisionEdit');
    Route::get('category/add/new', [AdminController::class, 'categoryAddNew'])->name('admin.categoryAddNew');
    Route::get('categories/all', [AdminController::class, 'categoriesAll'])->name('admin.categoriesAll');
    Route::get('select/tags/or/add/new', [AdminController::class, 'selectTagsOrAddNew'])->name('welcome.selectTagsOrAddNew');
    Route::get('user/setting/field/value', [AdminController::class, 'userSettingFieldValue'])->name('admin.userSettingFieldValue');
    Route::post('user/setting/field/value/add/post', [AdminController::class, 'userSettingFieldValueAddPost'])->name('admin.userSettingFieldValueAddPost');
    Route::post('user/setting/value/edit/{id}', [AdminController::class, 'userSettingValueEdit'])->name('admin.userSettingValueEdit');
    Route::any('user/setting/value/delete/{value}', [AdminController::class, 'userSettingValueDelete'])->name('admin.userSettingValueDelete');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::get('/website-parameters', [AdminController::class, 'webParams'])->name('admin.websiteParameters');
    Route::get('/userpanel', [AdminController::class, 'userpanel'])->name('admin.userpanel');
    Route::post('/website-parameters', [AdminController::class, 'webParamsSave'])->name('admin.websiteParameterUpdate');
    Route::get('report/delete/{report}', [AdminController::class, 'reportDelete'])->name('admin.reportDelete');
    Route::get('report/checked/{report}', [AdminController::class, 'reportChecked'])->name('admin.reportChecked');
    Route::get('reports/all', [AdminController::class, 'reportsAll'])->name('admin.reportsAll');
    Route::get('membership/package/add/new', [AdminController::class, 'membershipPackageAddNew'])->name('admin.membershipPackageAddNew');
    Route::post('membership/package/add/new/post', [AdminController::class, 'membershipPackageAddNewPost'])->name('admin.membershipPackageAddNewPost');
    Route::get('all/membership/packages', [AdminController::class, 'allMembershipPackages'])->name('admin.allMembershipPackages');
    Route::get('membership/package/edit/{package}', [AdminController::class, 'membershipPackageEdit'])->name('admin.membershipPackageEdit');
    Route::post('membership/package/update/{package}', [AdminController::class, 'membershipPackageUpdate'])->name('admin.membershipPackageUpdate');
    Route::get('user/list', [AdminController::class, 'users'])->name('admin.userlist');

    Route::get('new/user', [AdminController::class, 'newUser'])->name('admin.newUser');
    Route::post('new/user/post', [AdminController::class, 'newUserPost'])->name('admin.newUserPost');
    Route::post('upload/new/cv/{user}', [AdminController::class, 'uploadNewCv'])->name('admin.uploadNewCv');

    Route::get('user/cv/checked/{user}', [AdminController::class, 'userCvChecked'])->name('admin.userCvChecked');

    Route::post('new/temp/password/send/post/{user}', [AdminController::class, 'newTempPassSendPost'])->name('admin.newTempPassSendPost');
    Route::post('upgrade/user/for/free/post/{user}', [AdminController::class, 'upgradeUserForFreePost'])->name('admin.upgradeUserForFreePost');
    Route::post('admin.sendsms', [AdminController::class, 'admin_sendsms'])->name('admin.sendsms');

    // Route::resource('users', UserController::class);
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::get('user/edit/profile/{id}', [UserController::class, 'editprofile'])->name('users.editprofile');
    Route::get('user/edit', [UserController::class, 'edit'])->name('users.index');
    Route::put('user/update/{id}', [UserController::class, 'update'])->name('admin.userupdate');
});
Route::group(['middleware' => ['auth'], 'prefix' => 'user'], function () {
    Route::get('/dashboard', [WelcomeController::class, 'welcome'])->name('welcome');
    Route::get('/all-search', [UserController::class, 'allsearch'])->name('allsearch');
    Route::get('/get-Search/{slug}', [UserController::class, 'getSearch'])->name('getSearch');
    Route::get('gallery/delete/{gallery}', [UserController::class, 'galleryDel'])->name('galleryDel');
    Route::get('/feature/profiles', [WelcomeController::class, 'featureProfiles'])->name('featureProfiles');
    Route::get('/visitor/profiles', [WelcomeController::class, 'visitorProfiles'])->name('visitorProfiles');
    Route::get('/my/favourite/profiles', [WelcomeController::class, 'favouriteProfiles'])->name('favouriteProfiles');
    Route::get('/my/matches', [WelcomeController::class, 'mymatch'])->name('user.mymatch');

    Route::get('incomplete-profile', [CustomAuthController::class, 'register'])->name('register');
    Route::get('social/culture', [CustomAuthController::class, 'socialCulture'])->name('socialCulture');
    Route::get('family/info', [CustomAuthController::class, 'familyInfo'])->name('familyInfo');
    Route::get('contact/info', [CustomAuthController::class, 'contactInfo'])->name('contactInfo');
    Route::get('lifestyle/info', [CustomAuthController::class, 'lifestyleInfo'])->name('lifestyleInfo');

    Route::get('incomplete-profile/physical-attribute', [CustomAuthController::class, 'physicalAttribute'])->name('user.physical');
    Route::any('block/this/user/{user}', [UserController::class, 'blockThisUser'])->name('user.blockThisUser');
    Route::any('my/block/users', [UserController::class, 'myBlock'])->name('my.Block');
    Route::get('verify/email/now', [UserController::class, 'verifyEmailNow'])->name('user.verifyEmailNow');
    Route::post('verify/email/now/post', [UserController::class, 'verifyEmailNowPost'])->name('user.verifyEmailNowPost');
    Route::get('update/basic/info', [UserController::class, 'updateBasicInfo'])->name('user.updateBasicInfo');
    Route::get('gallery', [UserController::class, 'gellary'])->name('user.gallery');
    Route::post('addmore/image', [UserController::class, 'addgallery'])->name('user.addgallery');
    Route::get('pay-now/{id}', [UserController::class, 'payNow'])->name('payNow');
    Route::post('pay/now/post', [UserController::class, 'payNowPost'])->name('user.payNowPost');
    Route::any('make/contact/{user}', [UserController::class, 'makeContact'])->name('user.makeContact');
    Route::get('my/pending/proposals', [UserController::class, 'myAsset'])->name('user.myAsset');
    Route::get('my/connections', [UserController::class, 'myAssetaccepted'])->name('user.myAssetaccepted');
    Route::get('my/contacts', [UserController::class, 'myContacts'])->name('user.myContacts');
    Route::get('my/Sent/proposals', [UserController::class, 'mySentProposal'])->name('user.mySentProposal');
    Route::get('my/favourites', [UserController::class, 'favourites'])->name('user.favourites');
    Route::get('my/visitors', [UserController::class, 'visitors'])->name('user.visitors');
    Route::get('accept/proposal/{user}', [UserController::class, 'acceptProposal'])->name('user.acceptProposal');
    Route::get('cancel/proposal/{id}', [UserController::class, 'cancelProposal'])->name('user.cancelProposal');
    Route::get('update-profile', [UserController::class, 'updateProfile2'])->name('updateProfile');
    Route::get('update-preference', [UserController::class, 'updatePreference'])->name('updatePreference');
    Route::get('pertner-preference', [CustomAuthController::class, 'pertnerForm'])->name('pertnerForm');
    Route::get('/user-packeges', [UserController::class, 'packages'])->name('user.packeges');
    Route::get('/user/search', [UserController::class, 'search'])->name('user.search');
    Route::get('/partner', [UserController::class, 'partner'])->name('partner');




    Route::get('verify/mobile/code-generate', [UserController::class, 'verifyMobileCodeGenerate'])->name('user.verifyMobileCodeGenerate');

    Route::get('verify/email/code-generate', [UserController::class, 'verifyEmailCodeGenerate'])->name('user.verifyEmailCodeGenerate');

        Route::post('/report/post/{user}', [userController::class, 'reportPost'])->name('user.reportPost');
        Route::get('verify/mobile/now', [UserController::class, 'verifyMobileNow'])->name('user.verifyMobileNow');
        Route::post('verify/mobile/now/post', [userController::class, 'verifyMobileNowPost'])->name('user.verifyMobileNowPost');


    Route::post('profile/post/{id?}', [userController::class, 'profilePost'])->name('profilePost');
    Route::post('profile2/post/{id?}', [userController::class, 'profilePost2'])->name('profilePost2');
    Route::post('profile3/post/{id?}', [userController::class, 'physicalPost'])->name('physicalPost');
    Route::post('profile5/post/{id?}', [userController::class, 'socialCulture'])->name('socialCulture');
    Route::post('profile6/post/{id?}', [userController::class, 'familyDetails'])->name('familyDetails');
    Route::post('profile7/post/{id?}', [userController::class, 'contactInfo'])->name('contactInfo');
    Route::post('profile8/post/{id?}', [userController::class, 'lifestyleInfo2'])->name('lifestyleInfo2');

    Route::post('uploadPp/post/{id?}', [userController::class, 'uploadPp'])->name('uploadPp');
    Route::post('profile4/post/{id?}', [AdminController::class, 'profilePost'])->name('profilePost3');
    Route::post('pertner/post', [userController::class, 'pertnerPost'])->name('pertnerPost');
    Route::post('profile/update/{id}', [userController::class, 'profileupdate'])->name('profileUpdate');
    Route::get('/profile/{id?}', [UserController::class, 'profile'])->name('user.profile');
    Route::get('update/profile/{id?}', [UserController::class, 'updateprofile'])->name('user.updateprofile');
    Route::get('pertner/search', [UserController::class, 'pertnerSearch'])->name('user.pertnerSearch');
    Route::get('pertner/search/result', [UserController::class, 'allsearchresult'])->name('allsearch.result');

    Route::get('user/advance-search', [UserController::class, 'userAdvanceSearch'])->name('user.userAdvanceSearch');

    Route::any('remove/favourite/{user}', [UserController::class, 'removeFavourite'])->name('user.removeFavourite');

        // Route::get('make/user/active/{user}', [UserController::class, 'makeUserActive'])->name('admin.makeUserActive');

    Route::any('make/favourite/{user}', [UserController::class, 'makeFavourite'])->name('user.makeFavourite');

    Route::any('send/proposal/{user}', [UserController::class, 'sendProposal'])->name('user.sendProposal');

    Route::post('send/proposal/post/{user}', [userController::class, 'sendProposalPost'])->name('user.sendProposalPost');
    Route::get('user/details/print/{profile}', [UserController::class, 'userDetailsPrint'])->name('user.userDetailsPrint');

});



Route::group(['middleware' => ['auth'], 'prefix' => 'auther'], function () {
    Route::get('message/dashboard/{userto?}', [UserController::class, 'messageDashboard'])->name('user.messageDashboard');

    Route::post('message/dashboard/post/{userto}', [UserController::class, 'messageDashboardPost'])->name('user.messageDashboardPost');
});


Route::get('importExportView', [AdminController::class, 'importExportView']);
Route::get('export', [AdminController::class, 'export'])->name('export');
Route::post('import', [AdminController::class, 'import'])->name('import');
Route::get('image-crop', [CropImageUploadController::class, 'index']);

Route::post('save-crop-image', [CropImageUploadController::class, 'store']);
