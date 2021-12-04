<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;
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

Route::group(['guest' => 'guest'], function () {

        # Route::view('/register', 'Registration');
        Route::view('/', 'index');


        Route::view('/login', 'login');
        //reg for indigene
        Route::post('/register', [App\Http\Controllers\UserController::class, 'register']);
        Route::get('/register', [App\Http\Controllers\UserController::class, 'get_compond_name_in_reg_page']);

        //reg for STAKEHOLDER
        Route::post('/registerationStakeHolder', [App\Http\Controllers\UserController::class, 'registerAsStakeHolder']);
        Route::get('/registerationStakeHolder', [App\Http\Controllers\UserController::class, 'get_compond_name_in_regStakeHolder_page']);

        //reg for GUESTS
        Route::post('/registerationGuest', [App\Http\Controllers\UserController::class, 'registerAsGuest']);
        //renders the psge

        Route::get('/registerationGuest', [App\Http\Controllers\UserController::class, 'registerAsGuestPage']);


        Route::post('/login', [App\Http\Controllers\LoginController::class, 'login']);
        // render executive data
        Route::get('/', [App\Http\Controllers\UserController::class, 'executive']);
        // to get message
        Route::post('/', [App\Http\Controllers\UserController::class, 'clientMessage']);
        // HISTORY OF AYEDUN
        Route::get('/historyOfAyedun', [App\Http\Controllers\UserController::class, 'historyOfAyedun']);

//    Route::get('/castVote',[UserController::class,'getCastVote']);
// to get vote
    Route::get('/vote', [App\Http\Controllers\UserController::class, 'vote']);

//    Route::any('/payment', [App\Http\Controllers\PaymentController::class, 'payment']);
//    Route::any('/verifyPayment',[App\Http\Controllers\PaymentController::class,'verifyPayment'])->name('verifyPayment');

// PAY STACK
    // Laravel 5.1.17 and above
    Route::post('/pay', [App\Http\Controllers\PaymentController::class,'redirectToGateway'])->name('pay');
    // Laravel 8
//    Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');
    Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback']);


    Route::post('voter/voters_reg', [App\Http\Controllers\VoteController::class, 'voters_reg'])->name('voters_reg');
    // Voter start session
    Route::post('voter/start_session', [App\Http\Controllers\VoteController::class, 'voterStartSession'])->name('voterStartSession');

    // cast vote
    Route::post('/castVote', [App\Http\Controllers\VoteController::class, 'castVote'])->name('castVote');



});


Route::group(['authorized user' => 'authorized user'], function () {

        Route::view('user/imageUpload', 'imageUpload');
        # user home page
        Route::get('user/home', [App\Http\Controllers\UserController::class, 'home'])->name('home');
        # t pass data through page
        #Route::get('user/all_users/{id}', [App\Http\Controllers\UserController::class, 'userPage']);

        # render view all users page
        Route::get('user/all_users', [App\Http\Controllers\UserController::class, 'userPage']);

        Route::get('/user/like/{postId}', [App\Http\Controllers\UserController::class, 'likeOrUnlikePost']);

        Route::get('/user/unlike/{postId}', [App\Http\Controllers\UserController::class, 'likeOrUnlikePost']);

        # View  user profile
        Route::get('user/view_user_profile/{id}', [App\Http\Controllers\UserController::class, 'view_user_profile']);

        # View  user profile from comment page
        Route::get('user/commentPage/{id}', [App\Http\Controllers\UserController::class, 'view_user_profile']);

        # View  user profile from relative
        Route::get('user/ViewAllRelative/{id}', [App\Http\Controllers\UserController::class, 'view_user_profile']);


        # render edit profile page
        Route::get('user/Edit_profile', [App\Http\Controllers\UserController::class, 'Edit_user_page']);
        # update User profile route
        Route::POST('user/Edit_profile', [App\Http\Controllers\UserController::class, 'Edit_profile']);


        # user logout
        Route::post('user/logout', [App\Http\Controllers\UserController::class, 'logout']);

        # get user post
        Route::post('user/posting', [App\Http\Controllers\UserController::class, 'posting']);

        #upload Profile dp
        Route::get('/user/image-upload', [App\Http\Controllers\UserController::class, 'imageUploadPage'])->name('image.upload.post');
        Route::post('/user/image-upload', [App\Http\Controllers\UserController::class, 'imageUpload'])->name('image.upload');

        // delete my POST
        Route::get('user/delete_my_post/{id}', [App\Http\Controllers\UserController::class, 'delete_my_post']);

        // edit my POST
        Route::get('user/editPost/{id}', [App\Http\Controllers\UserController::class, 'editPostPage']);


        // edit edit comment to POST
        Route::get('user/editCommentToPost/{id}', [App\Http\Controllers\UserController::class, 'editCommentToPost']);

        // edit delet comment to POST
        Route::get('user/deleteCommentToPost/{id}', [App\Http\Controllers\UserController::class, 'deleteCommentToPost']);

        // view  POST likers
        Route::get('user/viewPostLikers/{id}', [App\Http\Controllers\UserController::class, 'viewPostLikers']);

        // edit edit comment to POST
        Route::post('user/updateCommentToPost', [App\Http\Controllers\UserController::class, 'updateCommentToPost']);

        // update my POST
        Route::post('user/updatePosting', [App\Http\Controllers\UserController::class, 'updatePosting']);

        // update my Posting
        Route::post('user/updatePosting', [App\Http\Controllers\UserController::class, 'updatePosting']);

        // update my IMAGE CAPTION
        Route::post('user/updateImageCaption', [App\Http\Controllers\UserController::class, 'updatePosting']);

        // update my VIDEO CAPTION
        Route::post('user/updateVideoCation', [App\Http\Controllers\UserController::class, 'updatePosting']);


        // upload image post
        Route::post('/user/UploadImagePost', [App\Http\Controllers\UserController::class, 'UploadImagePost'])->name('image.upload');
        // upload Video Post
        Route::post('/user/UploadVideoPost', [App\Http\Controllers\UserController::class, 'UploadVideo']);

        // comment to posting route
        Route::get('user/CommentToPost/{id}', [App\Http\Controllers\UserController::class, 'CommentToPost']);

        // Vie all Sport Directors
        Route::get('/user/ViewAllSportDirector', [App\Http\Controllers\UserController::class, 'ViewAllSportDirector']);
        // view All National President
        Route::get('/user/ViewAllNationalPresident', [App\Http\Controllers\UserController::class, 'ViewAllNationalPresident']);
        // view All Chapter President
        Route::get('/user/ViewAllChapterPresident', [App\Http\Controllers\UserController::class, 'ViewAllChapterPresident']);
        // View all compound
        Route::get('/user/ViewAllCompound', [App\Http\Controllers\UserController::class, 'ViewAllCompound']);
        # View COMPOUND HISTORY
        Route::get('user/ViewCompoundHistory/{id}', [App\Http\Controllers\UserController::class, 'ViewCompoundHistory']);

        // View all Relative
        Route::get('/user/ViewAllRelative', [App\Http\Controllers\UserController::class, 'ViewAllRelative']);

        // View all all national Executive
        Route::get('/user/ViewAllNationalExecutive', [App\Http\Controllers\UserController::class, 'ViewAllNationalExecutive']);

        # View  user profile for national eXecutive
        Route::get('user/ViewNationalExecutiveProfile/{id}', [App\Http\Controllers\UserController::class, 'ViewNationalExecutiveProfile']);

        # View  user profile for national eXecutive
        Route::get('user/ViewAllMissAsu', [App\Http\Controllers\UserController::class, 'ViewAllMissAsu']);

        # View  user profile for national President
        Route::get('user/ViewNationalPresidentProfile/{id}', [App\Http\Controllers\UserController::class, 'ViewNationalPresidentProfile']);
        # View  user profile for Chapter President
        Route::get('user/ViewChapterPresidentProfile/{id}', [App\Http\Controllers\UserController::class, 'ViewChapterPresidentProfile']);

        # View  user profile for Sport Directors
        Route::get('user/ViewSPortsProfile/{id}', [App\Http\Controllers\UserController::class, 'ViewSPortsProfile']);

        # View  user profile for Miss ASU Directors
        Route::get('user/ViewMissAsuProfile/{id}', [App\Http\Controllers\UserController::class, 'ViewMissAsuProfile']);
        # View MAP PAGE
        Route::get('user/map', [App\Http\Controllers\UserController::class, 'map']);
        # View Dveloper PAGE
        Route::get('user/developer', [App\Http\Controllers\UserController::class, 'developer']);

        // render comment to post page
        Route::get('user/commentPage/{id}', [App\Http\Controllers\UserController::class, 'commentPage']);

        // render comment to post page
        Route::post('user/commentPage', [App\Http\Controllers\UserController::class, 'createComment']);
        // to render user message inbox
        Route::get('user/inbox', [App\Http\Controllers\UserController::class, 'inbox']);

        // to render user start chatting
        Route::get('user/startChatting/{id}', [App\Http\Controllers\UserController::class, 'startChatting']);

        // post message to db user sendchatting
        Route::post('user/sendChat', [App\Http\Controllers\UserController::class, 'sendChat']);

        // online users page
        Route::get('user/onlineUsers', [App\Http\Controllers\UserController::class, 'onlineUsers']);

        // get search request
        Route::post('user/searchUsers/', [App\Http\Controllers\UserController::class, 'userPage']);
        // get search request
        Route::get('user/searchUsers/', [App\Http\Controllers\UserController::class, 'userPage']);

        // get search request national president
        Route::post('user/searchNationalPresident', [App\Http\Controllers\UserController::class, 'ViewAllNationalPresident']);
        // get search request national president
        Route::get('user/searchNationalPresident', [App\Http\Controllers\UserController::class, 'ViewAllNationalPresident']);

        // get search request Chapter president
        Route::post('user/searchChapterPresident', [App\Http\Controllers\UserController::class, 'ViewAllChapterPresident']);
        // get search request Chapter president
        Route::get('user/searchChapterPresident', [App\Http\Controllers\UserController::class, 'ViewAllChapterPresident']);

        // get search request National executive
        Route::post('user/searchNationalExecutive', [App\Http\Controllers\UserController::class, 'ViewAllNationalExecutive']);
        // get searchrequest National executive
        Route::get('user/searchNationalExecutive', [App\Http\Controllers\UserController::class, 'ViewAllNationalExecutive']);

        // get search request MISS ASU
        Route::post('user/searchMissAsu', [App\Http\Controllers\UserController::class, 'ViewAllMissAsu']);
        // get searchrequest MISS ASU
        Route::get('user/searchMissAsu', [App\Http\Controllers\UserController::class, 'ViewAllMissAsu']);

        // get search request Sport Director
        Route::post('user/searchSportDirector', [App\Http\Controllers\UserController::class, 'ViewAllSportDirector']);
        // get searchrequest Sport Director
        Route::get('user/searchSportDirector', [App\Http\Controllers\UserController::class, 'ViewAllSportDirector']);

        // Delete My Message
        Route::get('user/deleteMyMessage/{id}', [App\Http\Controllers\UserController::class, 'deleteMyMessage']);

         // Delete My chats
         Route::get('user/clearChats', [App\Http\Controllers\UserController::class, 'ClearCahts'])->name('clearChats');

        // reset Password Page
        Route::post('user/resetPassword', [App\Http\Controllers\UserController::class, 'resetPassword']);
        // reset Password Page
        Route::get('user/resetPassword', [App\Http\Controllers\UserController::class, 'resetPasswordPage']);

           // reset Update Password
         Route::post('user/updatePassword', [App\Http\Controllers\UserController::class, 'updatePassword']);
         // MISS ASU APPLICATION
    Route::post('user/MissAsuApplication', [App\Http\Controllers\UserController::class, 'MissAsuApplication'])->name('applyMissAsu');
   // Change ur miss asu dp
    Route::post('user/MissAsuApplicationDp', [App\Http\Controllers\UserController::class, 'ChangeMissAsuAppDp'])->name('changeMissAsuAppDp');

    Route::get('meeting/{id}', [App\Http\Controllers\UserController::class, 'getAspirant']);
//    Route::get('meetingss/{id}', [App\Http\Controllers\UserController::class, 'getAspirant']);

//    Route::get('meetingss/{$id}',[UserController::class,'payment']);

    // Change ur miss asu dp
//    Route::post('vote/{$id}', [App\Modules\vote\Http\Controllers\VoteController::class, 'getAspirant'])->name('getAspirant');

});



Route::group(['administrator' => 'administrator'], function () {


        # ADMIN SECTION

        Route::group(['Admin General' => 'Admin General'], function () {

                #view admin login page
                Route::view('/administrator', 'admin.AdminLogin');

                # post admin logins
                Route::post('/administrator', [App\Http\Controllers\adminLoginController::class, 'AdminLogin']);
                # render admin home  page
                Route::get('administrator/home', [App\Http\Controllers\adminController::class, 'Adminhome']);
                # supplies addmin all available users
                Route::get('administrator/Manage_Users', [App\Http\Controllers\adminController::class, 'Manage_Users']);

                # supplies addmin all available users
                Route::post('administrator/Manage_Users', [App\Http\Controllers\adminController::class, 'Manage_Users']);
                // PUBLICATION POST
                Route::post('administrator/postingPublication', [App\Http\Controllers\adminController::class, 'postingPublication']);

                // PUBLICATION IMAGE
                Route::post('administrator/imagePublication', [App\Http\Controllers\adminController::class, 'imagePublication']);
                // PUBLICATION VIDEO
                Route::post('administrator/videoPublication', [App\Http\Controllers\adminController::class, 'videoPublication']);

                // MANAGE ALL PUBLICATION
                Route::get('administrator/manageAllPublictions', [App\Http\Controllers\adminController::class, 'ManagePublications']);
                // EDIT PUBLICATION
                Route::get('administrator/editPublication/{id}', [App\Http\Controllers\adminController::class, 'editPublication']);

                // UPDATE PUBLICATION
                Route::post('administrator/updatePublication', [App\Http\Controllers\adminController::class, 'updatePublication']);
                // DELETE PUBLICATION

                Route::get('administrator/deletePublication/{id}', [App\Http\Controllers\adminController::class, 'deletePublication']);
                // SEARCH FOR STUDENT RECORD
                // Route::get('administrator/searchForUsers', [App\Http\Controllers\adminController::class, 'searchRequest']);

                // MANAGE ALL STAKE HOLDERS
                Route::get('administrator/manageAllStakeHolders', [App\Http\Controllers\adminController::class, 'manageStakeHolders']);

                // MANAGE ALL GUEST
                Route::get('administrator/manageAllGuest', [App\Http\Controllers\adminController::class, 'manageGuest']);
                // MARK MESSAGE AS READ
                Route::get('administrator/updateReadMessage/{id}', [App\Http\Controllers\adminController::class, 'updateReadMessage']);
                // SUSPEND USER
                Route::get('administrator/suspendUser/{id}', [App\Http\Controllers\adminController::class, 'suspendUser']);
                // ACTIVATE USER
                Route::get('administrator/activateUser/{id}', [App\Http\Controllers\adminController::class, 'activateUser']);

                // SUSPENSION PAGE
                Route::get('administrator/suspension', [App\Http\Controllers\adminController::class, 'suspension']);

                // USER ASK FOR ACCOUNT ACTIVATION
                Route::post('administrator/suspension', [App\Http\Controllers\adminController::class, 'complaintFromUser']);
                 // Delete Message
                 Route::get('administrator/deletemessage/{id}', [App\Http\Controllers\adminController::class, 'deleteMessage']);
                // send Warning signal
                Route::get('administrator/sendWaring/{id}',[App\Http\Controllers\adminController::class, 'SendSignal']);
                // send Warning signal
                Route::get('administrator/readSentMail/{id}',[App\Http\Controllers\adminController::class, 'readSentMail']);
                // send mail to single user
                 Route::get('administrator/send-mail',[App\Http\Controllers\adminController::class, 'sendMail'])->name(('send-mail'));

                  // send mail to single user
                  Route::get('administrator/sent-mail',[App\Http\Controllers\adminController::class, 'sentMail'])->name(('sent-mail'));

                 // send mail to all users
                 Route::get('administrator/send-mail-to-all-users',[App\Http\Controllers\adminController::class, 'sendMailToAllUsers'])->name(('send-mail-to-all-users'));
                  // send mail to all users
                  Route::post('administrator/send-mail-to-all-users',[App\Http\Controllers\AdminSendMail::class, 'sendMailToAllUsers'])->name(('send-mail-to-all-users'));
                 //send mail
                 Route::post('administrator/send-mail',[App\Http\Controllers\AdminSendMail::class, 'sendMail'])->name('new-mail');

                # admin log out
                Route::post('admin/logout', [App\Http\Controllers\adminController::class, 'logout']);
        });
        Route::group(['Compound' => 'Compound'], function () {

                # supplies admin all available  compound
                Route::get('administrator/Manage_Compounds', [App\Http\Controllers\adminController::class, 'Manage_Compounds']);
                #create Compound
                Route::post('administrator/Manage_Compounds', [App\Http\Controllers\adminController::class, 'Create_Compound']);
                # pass compound id to the page to be edited
                Route::get('administrator/Edit_Compound/{id}', [App\Http\Controllers\adminController::class, 'Edit_Compound']);
                # admin delete compound
                Route::get('administrator/Delete_Compound/{id}', [App\Http\Controllers\adminController::class, 'Delete_Compound']);
                # post the update data from edit compound page to the table compound
                Route::post('administrator/Update_Compound', [App\Http\Controllers\adminController::class, 'Update_Compound']);
                // change Compound dp
                Route::post('administrator/ChangeCompoundDp', [App\Http\Controllers\adminController::class, 'ChangeCompoundDp']);
        });
        Route::group(['Sports' => 'Sports'], function () {

                # renders all sports directors
                Route::get('administrator/Manage_Sports', [App\Http\Controllers\adminController::class, 'Manage_Sports']);
                #create Sport
                Route::post('administrator/Manage_Sports', [App\Http\Controllers\adminController::class, 'Create_Sport']);
                # pass sport id to the page to be edited
                Route::get('administrator/Edit_Sports/{id}', [App\Http\Controllers\adminController::class, 'Edit_Sports']);
                # post the update data from edit sport page to the table sport
                Route::post('administrator/Update_Sports', [App\Http\Controllers\adminController::class, 'Update_Sports']);
                # admin delete sport
                Route::get('administrator/Delete_Sports/{id}', [App\Http\Controllers\adminController::class, 'Delete_Sports']);
                #Change Profile dp
                Route::post('/administrator/ChangeSportDp', [App\Http\Controllers\adminController::class, 'ChangeSportDp'])->name('image.upload.post');


        });




        Route::group(['MISS ASU' => 'MISS ASU'], function () {
                # renders all sports directors
                Route::get('administrator/Manage_MissAsu', [App\Http\Controllers\adminController::class, 'Manage_MissAsu']);
                #create MISSASU
                Route::post('administrator/Manage_MissAsu', [App\Http\Controllers\adminController::class, 'Create_MissAsu']);
                # pass sport id to the page to be edited
                Route::get('administrator/Edit_MissAsu/{id}', [App\Http\Controllers\adminController::class, 'Edit_MissAsu']);
                # post the update data from edit sport page to the table sport

                Route::post('administrator/Update_MissAsu', [App\Http\Controllers\adminController::class, 'Update_MissAsu']);
                # admin delete sport
                Route::get('administrator/Delete_MissAsu/{id}', [App\Http\Controllers\adminController::class, 'Delete_MissAsu']);

                #Change Profile dp
                Route::post('/administrator/ChangeMissAsuDp', [App\Http\Controllers\adminController::class, 'ChangeMissAsuDp'])->name('image.upload.post');
        });

        Route::group(['NATIONAL_PRESIDENT' => 'NATIONAL_PRESIDENT'], function () {
                # renders all NATIONAL PRESIDENT PAGE
                Route::get('administrator/Manage_National_President', [App\Http\Controllers\adminController::class, 'Manage_National_President']);
                #create NATIONAL PRESIDENT
                Route::post('administrator/Manage_National_President', [App\Http\Controllers\adminController::class, 'Create_National_President']);
                # pass NATIONAL id to the page to be edited
                Route::get('administrator/Edit_National_President/{id}', [App\Http\Controllers\adminController::class, 'Edit_National_President']);
                # post the update data from edit NATIONAL PRESIDENT page to the table NationalPresident

                Route::post('administrator/Update_National_President', [App\Http\Controllers\adminController::class, 'Update_National_President']);
                # admin delete sport
                Route::get('administrator/Delete_National_President/{id}', [App\Http\Controllers\adminController::class, 'Delete_National_President']);
                #Change Profile dp
                Route::post('/administrator/ChangeNationalDp', [App\Http\Controllers\adminController::class, 'ChangeNationalDp'])->name('image.upload.post');
        });

        Route::group(['NATIONAL_EXECUTIVE' => 'NATIONAL_EXECUTIVE'], function () {
                # renders all NATIONAL PRESIDENT PAGE
                Route::get('administrator/NationalExecutive', [App\Http\Controllers\adminController::class, 'Manage_National_Executive']);
                #create NATIONAL Executive
                Route::post('administrator/NationalExecutive', [App\Http\Controllers\adminController::class, 'Create_National_Executive']);
                # pass NATIONAL id to the page to be edited
                Route::get('administrator/EditNationalExecutive/{id}', [App\Http\Controllers\adminController::class, 'Edit_National_Executive']);
                # post the update data from edit NATIONAL Executive page to the table NationalExecutive

                Route::post('administrator/UpdateNationalExecutive', [App\Http\Controllers\adminController::class, 'Update_National_Executive']);
                # admin delete sport
                Route::get('administrator/DeleteEditNationalExecutive/{id}', [App\Http\Controllers\adminController::class, 'Delete_National_Executive']);
                #Change Profile dp
                Route::post('/administrator/ChangeExecutiveDp', [App\Http\Controllers\adminController::class, 'ChangeExecutiveDp'])->name('image.upload.post');
        });

        Route::group(['CHAPTER_PRESIDENT' => 'CHAPTER_PRESIDENT'], function () {
                # renders all Chapter PRESIDENT PAGE
                Route::get('administrator/Manage_Chapter_President', [App\Http\Controllers\adminController::class, 'Manage_Chapter_President']);
                #create Chapter PRESIDENT
                Route::post('administrator/Manage_Chapter_President', [App\Http\Controllers\adminController::class, 'Create_Chapter_President']);
                # pass Chapter id to the page to be edited
                Route::get('administrator/Edit_Chapter_President/{id}', [App\Http\Controllers\adminController::class, 'Edit_Chapter_President']);
                # post the update data from edit Chapter PRESIDENT page to the table ChapterPresident

                Route::post('administrator/Update_Chapter_President', [App\Http\Controllers\adminController::class, 'Update_Chapter_President']);
                # admin delete sport
                Route::get('administrator/Delete_Chapter_President/{id}', [App\Http\Controllers\adminController::class, 'Delete_Chapter_President']);

                #Change Profile dp
                Route::post('/administrator/ChangeChapterDp', [App\Http\Controllers\adminController::class, 'ChangeChapterDp'])->name('image.upload.post');
        });


        # renders all Chapter inbox PAGE
        Route::get('administrator/Inbox', [App\Http\Controllers\adminController::class, 'Inbox']);
        Route::get('administrator/ReadMessage{id}', [App\Http\Controllers\adminController::class, 'ReadMessage']);
});
