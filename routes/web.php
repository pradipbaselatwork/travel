<?php

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

// Route for front

//home
Route::get('/', 'HomeController@index')->name('home');

//navbar 
Route::get('/pages={url?}{id?}', 'HomeController@nav')->name('page');

//contact 
Route::post('/contact-us', 'ContactController@addContact')->name('contact');
// Route::post('contact', 'ContactController@Contact')->name('contacts');

//comments
// Route::get('/detail/{id}', 'GiftController@detail')->name('detail');
Route::post('/comment', 'CommentController@addComment')->name('comment');
Route::post('/comment-review', 'CommentController@commentReview')->name('comment.review');

//AboutContact 
Route::post('/about-us-contact', 'AboutContactController@addAboutUsContact')->name('about.us.contact');
// Route::get('about-contact', 'aboutContactController@aboutContact')->name('aboutContact');


//search 
Route::get('/search', 'HomeController@search')->name('search');

//for minimum maximum
Route::get('/average', 'HomeController@average')->name('average');
// Route::get('/ajax-package-filter', 'HomeController@search')->name('search');
            //package detail
            Route::get('/package-detail{id}', 'PackageController@PackageDetail')->name('package.detail');
            //search detail
            Route::get('/search-detail{id}', 'PackageController@SearchDetail')->name('search.detail');
            //Service Detail
            Route::get('/service-detail{id}', 'ServiceController@serviceDetail')->name('service.detail');
            //project Detail
            Route::get('/project-detail{id}', 'ProjectController@projectDetail')->name('project.detail');

//login /resgister for froendend
Route::match(['get','post'],'/login','UserController@login')->name('login');
Route::match(['get','post'],'/register','UserController@register')->name('register');

//checkout/orderreveiw route of frontend 
Route::match(['get','post'],'/placeorder','CartController@placeorder')->name('placeorder');

Route::match(['get','post'],'/checkout','CartController@checkout')->name('checkout');
Route::get('/order-review','CartController@orderreview')->name('orderreview');
Route::get('order-detail', 'CartController@orderdetail')->name('orderdetail');
Route::get('see-order-detail{id}', 'CartController@seeorderdetail')->name('seeorderdetail');

        //add cart form front
Route::post('/add-to-cart', 'CartController@addToCart')->name('add.to.cart');

Route::group(['middleware'=>['auth']],function()
{
    
        //update user account details
        Route::match(['get','post'],'update-user-account','UserController@updateUserAccount')->name('update.user.account');
        //update user password
        Route::match(['get','post'],'update-user-password','UserController@updateUserPassword')->name('update.user.password');

        //front logout
        Route::get('logout','UserController@logout')->name('logout');

            //add cart form front
        // Route::post('/add-to-cart', 'CartController@addToCart')->name('add.to.cart');

        //cart data front
        Route::get('/cart', 'CartController@cart')->name('cart');

           //delete added cart route front
        Route::get('/delete-cart/{id?}', 'CartController@deleteCart')->name('delete.cart');

        //Checkout route of front-end
        // Route::get('/checkout', 'CartController@checkout')->name('checkout');

});



Route::prefix('/admin')->namespace('Admin')->as('admin.')->group(function(){
    // return 'dfds';
    //all the admin route we are going to add here :-
    Route::match(['get','post'],'/','AdminController@login');

    Route::group(['middleware'=>['admin']],function(){
        Route::get('dashboard','AdminController@dashboard');
        Route::get('settings','AdminController@settings');
        Route::get('logout','AdminController@logout');
        Route::post('check-current-pwd','AdminController@chkCurrentPassword');
        Route::post('update-current-pwd','AdminController@updateCurrentPassword');
        Route::match(['get','post'],'update-admin-details','AdminController@updateAdminDetails');

        // navbar 
        Route::get('navbar', 'NavbarController@Navbar')->name('navbar');
        Route::post('update-navbar-status', 'NavbarController@updateNavbarStatus')->name('update.navbar.status');
        Route::match(['get', 'post'], 'add-edit-navbar/{id?}', 'NavbarController@addEditNavbar')->name('add.edit.navbar');
        Route::get('delete-navbar/{id?}', 'NavbarController@deleteNavbar')->name('delete.navbar');

        // banner 
        Route::get('banner', 'BannerController@Banner')->name('banner');
        Route::match(['get', 'post'], 'add-edit-banner/{id?}', 'BannerController@addEditBanner')->name('add.edit.banner');
        Route::get('delete-banner-image/{id?}', 'BannerController@deleteBannerImage')->name('delete.banner.image');
        Route::get('delete-banner/{id?}', 'BannerController@deleteBanner')->name('delete.banner');

        //about
        Route::match(['get','post'],'edit-about-info/{id?}', 'AboutController@EditAboutInfo')->name('edit.about.info');

         //aboutUs
         Route::match(['get','post'],'edit-about-us/{id?}', 'AboutUsController@EditAboutUs')->name('edit.about.us');

        // package 
        Route::get('package', 'PackageController@Package')->name('package');
        Route::match(['get', 'post'], 'add-edit-package/{id?}', 'PackageController@addEditPackage')->name('add.edit.package');
        Route::get('delete-package-image/{id?}', 'PackageController@deletePackageImage')->name('delete.package.image');
        Route::get('delete-package/{id?}', 'PackageController@deletePackage')->name('delete.package');

        // packagetype 
        Route::get('packagetype', 'PackagetypeController@Packagetype')->name('packagetype');
        Route::match(['get', 'post'], 'add-edit-packagetype/{id?}', 'PackagetypeController@addEditPackagetype')->name('add.edit.packagetype');
        // Route::get('delete-packagetype-image/{id?}', 'PackagetypeController@deletePackagetypeImage')->name('delete.packagetype.image');
        Route::get('delete-packagetype/{id?}', 'PackagetypeController@deletePackagetype')->name('delete.packagetype');

         // service 
        Route::get('service', 'ServiceController@Service')->name('service');
        Route::match(['get', 'post'], 'add-edit-service/{id?}', 'ServiceController@addEditService')->name('add.edit.service');
        Route::get('delete-service-image/{id?}', 'ServiceController@deleteServiceImage')->name('delete.service.image');
        Route::get('delete-service/{id?}', 'ServiceController@deleteService')->name('delete.service');

        //serviceinfo
        Route::match(['get','post'],'edit-service-info/{id?}', 'ServiceInfoController@EditServiceInfo')->name('edit.service.info');

        // project 
        Route::get('project', 'ProjectController@Project')->name('project');
        Route::match(['get', 'post'], 'add-edit-project/{id?}', 'ProjectController@addEditProject')->name('add.edit.project');
        Route::get('delete-project-image/{id?}', 'ProjectController@deleteProjectImage')->name('delete.project.image');
        Route::get('delete-project/{id?}', 'ProjectController@deleteProject')->name('delete.project');

        // blog 
        Route::get('blog', 'BlogController@Blog')->name('blog');
        Route::match(['get', 'post'], 'add-edit-blog/{id?}', 'BlogController@addEditBlog')->name('add.edit.blog');
        Route::get('delete-blog-image/{id?}', 'BlogController@deleteBlogImage')->name('delete.blog.image');
        Route::get('delete-blog/{id?}', 'BlogController@deleteBlog')->name('delete.blog');

        // testimonial 
        Route::get('testimonial', 'TestimonialController@Testimonial')->name('testimonial');
        Route::match(['get', 'post'], 'add-edit-testimonial/{id?}', 'TestimonialController@addEditTestimonial')->name('add.edit.testimonial');
        Route::get('delete-testimonial-image/{id?}', 'TestimonialController@deleteTestimonialImage')->name('delete.testimonial.image');
        Route::get('delete-testimonial/{id?}', 'TestimonialController@deleteTestimonial')->name('delete.testimonial');

        // footer
        Route::match(['get','post'],'edit-footer/{id?}', 'FooterController@editFooter')->name('edit.footer');

        //contact
        // Route::get('contact', 'ContactController@contact')->name('contact');

          
        //about us Contact request 
        Route::get('aboutus-contact', 'AboutContactController@AboutContactIndex')->name('aboutus.contact');

        //Contact us request 
            Route::get('contact-us', 'ContactController@ContactIndex')->name('contact.us');


                    //showorder
        Route::get('showorder', 'OrderController@showorder')->name('showorder');
        Route::get('delete-order/{id?}', 'OrderController@deleteOrder')->name('delete.order');
        Route::get('see-order-detail{id}', 'OrderController@seeorderdetail')->name('see.order.detail');
      
        Route::post('update-order{id}', 'OrderController@updateorder')->name('updateorder');

        Route::get('users', 'OrderController@users')->name('users');

    });
});


