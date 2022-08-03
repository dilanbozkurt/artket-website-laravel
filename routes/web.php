<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Intro;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\TopListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\SpamManagementController;
use App\Http\Controllers\PostManagementController;
use App\Http\Controllers\PermissionManagementController;
use App\Http\Controllers\RoleManagementController;
use App\Http\Controllers\TagManagementController;
use App\Http\Controllers\TopListManagementController;
use App\Http\Controllers\CommentManagementController;
use App\Http\Controllers\ContactManagementController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminDashboardController;
use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Middleware\CheckPermission;
use App\Http\Middleware\CheckAdminPermission;

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

Route::get('/', function () {
    return view('intro');
});

//INTRO CONTROLLER
Route::get('/intro', [Intro::class, 'show']);

//CHAT CONTROLLER
Route::get('/chat', [MessageController::class, 'index'])->name('chat')->middleware(CheckPermission::class);
Route::get('/chat/{user_id}', [MessageController::class, 'show_message'])->name('show_message');
Route::post('/chat', [MessageController::class, 'send_message'])->name('send_message');

//SIGN UP CONTROLLER
Route::get('/sign_up', [SignUpController::class, 'index']) ->name('sign_up');
Route::post('/sign_up', [SignUpController::class, 'add_user']) ->name('sign_up_post');

//SIGN IN CONTROLLER
Route::get('/sign_in', [SignInController::class, 'index'])->name('sign_in');
Route::post('/sign_in', [SignInController::class, 'sign_in'])->name('sign_in_to_explore');

//LOG OUT CONTROLLER
Route::get('/logout', [SignInController::class, 'logout'])->name('logout');

//EXPLORE CONTROLLER
Route::get('/explore', [ExploreController::class, 'index'])->name('explore')->middleware(CheckPermission::class);
Route::get('/explore/{cat_id}', [ExploreController::class, 'show_with_category']);

//TOP LIST CONTROLLER
Route::get('/top_list', [TopListController::class, 'index'])->name('top_list')->middleware(CheckPermission::class);
Route::get('/top_list/{cat_id}', [TopListController::class, 'show_with_category'])->name('show_with_category');
Route::post('/top_list', [TopListController::class, 'search'])->name('search');

//POST CONTROLLER
Route::get('/post/{id}', [PostController::class, 'index'])->name('go_to_post')->middleware(CheckPermission::class);
Route::get('/post_next/{id}', [PostController::class, 'next'])->name('post_next');
Route::post('/post/comment/{id}', [PostController::class, 'make_comment']) ->name('make_comment');
Route::post('/post/vote/{id}', [PostController::class, 'vote']) ->name('vote');

Route::post('/repost/{post_id}', [PostController::class, 'repost'])->name('repost');

Route::get('/report_post/{message}/{id}', [PostController::class, 'report_post'])->name('report_post');

Route::get('/create_post/{type}', [PostController::class, 'view_create_post'])->name('view_create_post')->middleware(CheckPermission::class);
Route::post('/create_post/{type}', [PostController::class, 'create_post'])->name('create_post');

Route::get('/delete_own_post/{id}', [PostController::class, 'delete_own_post'])->name('delete_own_post');

//PROFILE CONTROLLER
Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile')->middleware(CheckPermission::class);
Route::get('/profile_post/{id}', [ProfileController::class, 'view_profile_post'])->name('profile_post');
Route::get('/profile_follow/{id}', [ProfileController::class, 'follow'])->name('follow');
Route::get('/profile_unfollow/{id}', [ProfileController::class, 'unfollow'])->name('unfollow');

Route::get('/followers/{id}', [ProfileController::class, 'view_followers_list'])->name('followers_list')->middleware(CheckPermission::class);
Route::get('/followings/{id}', [ProfileController::class, 'view_followings_list'])->name('followings_list')->middleware(CheckPermission::class);

Route::get('/report_user/{message}/{id}', [ProfileController::class, 'report_user'])->name('report_user');


//UPDATE_PROFILE CONTROLLER
Route::get('update_profile', [UpdateProfileController::class , 'index'])->name('update_profile')->middleware(CheckPermission::class);
Route::post('/update', [UpdateProfileController::class , 'update']);
Route::post('/update_cp', [UpdateProfileController::class , 'change_password'])->name('change_password');

//CONTACT CONTROLLER
Route::get('/contact', [ContactController::class, 'index'])->name('contact')->middleware(CheckPermission::class);
Route::post('/contact_message', [ContactController::class, 'send_message'])->name('contact_message');

//SEARCH CONTROLLER
Route::get('/user_search', [SearchController::class, 'index'])->name('user_search');
Route::post('/user_search', [SearchController::class, 'search']);


//-----------------------------------------ADMIN PART------------------------------------------------

//ADMİN LOGIN CONTROLLER
Route::get('/admin_login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::get('/admin_logout', [AdminLoginController::class, 'admin_logout'])->name('admin_logout');
Route::post('/admin_login', [AdminLoginController::class, 'admin_sign_in'])->name('admin_sign_in');

//USER MANAGEMENT CONTROLLER
Route::get('/user_management', [UserManagementController::class, 'index'])->name('user_management')->middleware(CheckAdminPermission::class);
Route::get('/update_permission/{role_id}/{per_id}/{is_checked}', [UserManagementController::class, 'update_permission'])->name('update_permission');
Route::get('/update_user/{label}/{id}', [UserManagementController::class, 'view_update_page'])->name('view_update_page');
Route::post('/update_user/{id}', [UserManagementController::class, 'update_user'])->name('update_user');
Route::get('/delete_user/{id}', [UserManagementController::class, 'delete_user'])->name('delete_user');
Route::get('/users_list/{label}', [UserManagementController::class, 'list_users'])->name('list_users');
Route::get('/create_new_user/{label}', [UserManagementController::class, 'get_create_form'])->name('get_create_form');
Route::post('/create_new_user/{label}', [UserManagementController::class, 'create_user'])->name('create_user');

//POST MANAGEMENT CONTROLLER
Route::get('/post_management', [PostManagementController::class, 'index'])->name('post_management')->middleware(CheckAdminPermission::class);
Route::get('/posts_list/{type}', [PostManagementController::class, 'list_posts'])->name('list_posts');
Route::get('/delete_post/{id}', [PostManagementController::class, 'delete_post'])->name('delete_post');
Route::get('/update_post/{id}', [PostManagementController::class, 'view_update_post'])->name('view_update_post');
Route::post('/update_post/{id}', [PostManagementController::class, 'update_post'])->name('update_post');

//PERMISSION MANAGEMENT CONTROLLER
Route::get('/permission_management', [PermissionManagementController::class, 'index'])->name('permission_management')->middleware(CheckAdminPermission::class);
Route::get('/delete_permission/{id}', [PermissionManagementController::class, 'delete_permission'])->name('delete_permission');
Route::get('/create_permission', [PermissionManagementController::class, 'create_permission'])->name('create_permission');

//ROLE MANAGEMENT CONTROLLER
Route::get('/role_management', [RoleManagementController::class, 'index'])->name('role_management')->middleware(CheckAdminPermission::class);
Route::get('/update_role_permission/{role_id}/{per_id}/{is_checked}', [RoleManagementController::class, 'update_role_permission'])->name('update_role_permission');

//TAG MANAGEMENT CONTROLLER
Route::get('/tag_management', [TagManagementController::class, 'index'])->name('tag_management')->middleware(CheckAdminPermission::class);
//TOP LIST MANAGEMENT CONTROLLER
Route::get('/top_list_management', [TopListManagementController::class, 'index'])->name('top_list_management')->middleware(CheckAdminPermission::class);
Route::get('/delete/{id}', [TopListManagementController::class, 'delete'])->name('delete');

//COMMENT MANAGEMENT CONTROLLER
Route::get('/comment_management', [CommentManagementController::class, 'index'])->name('comment_management')->middleware(CheckAdminPermission::class);
Route::get('/delete_comment/{id}', [CommentManagementController::class, 'delete_comment'])->name('delete_comment');

//CONTACT MANAGEMENT CONTROLLER
Route::get('/contact_management', [ContactManagementController::class, 'index'])->name('contact_management')->middleware(CheckAdminPermission::class);
Route::get('/delete_message/{id}', [ContactManagementController::class, 'delete_message'])->name('delete_message');
Route::get('/view_message/{id}', [ContactManagementController::class, 'view_message'])->name('view_message');

//DASHBOARD CONTROLLER
Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard')->middleware(CheckAdminPermission::class);

//SPAM MANAGEMENT CONTROLLER
Route::get('/spam_management', [SpamManagementController::class, 'index'])->name('spam_management')->middleware(CheckAdminPermission::class);
Route::get('/delete_post_spam/{id}', [SpamManagementController::class, 'delete_post_spam'])->name('delete_post_spam');
Route::get('/delete_user_spam/{id}', [SpamManagementController::class, 'delete_user_spam'])->name('delete_user_spam');