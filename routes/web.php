<?php

Route::get('/', 'WelcomeController@index');
Route::get('/grants', 'GrandsController@index');
Route::view('/digital', 'digital');

Route::get('/digitalpdf/{id}', 'Admin\DigitalBrochuresController@get_digital_pdf');
Route::get('/news', 'PostsController@index');
Route::get('post/{post}', 'PostsController@show')->name('post');
Route::get('/post/{id}', 'PostsController@showBlogDetail');
Route::get('/categories/{id}', 'WelcomeController@showBlogDetail');
Route::get('/shop', 'ShopController@index');
Route::get('/exhibition/epost/{id}', 'WelcomeController@exhibitionPost');
Route::get('/exhibition/egallery/{id}', 'WelcomeController@exhibitionGallery');



// User
Route::group(['as' => 'client.', 'middleware' => ['auth']], function () {
    Route::get('home', 'HomeController@redirect');
    Route::get('dashboard', 'HomeController@index')->name('home');
    Route::get('change-password', 'ChangePasswordController@create')->name('password.create');
    Route::post('change-password', 'ChangePasswordController@update')->name('password.update');
});

Auth::routes();
// Admin
Route::any('/ckfinder/examples/{example?}', 'CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')
    ->name('ckfinder_examples');
    
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth.admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Content Categories
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tags
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Pages
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::resource('content-pages', 'ContentPageController');
    

       // Years
    Route::delete('years/destroy', 'YearController@massDestroy')->name('years.massDestroy');
    Route::resource('years', 'YearController');

    // Species
    Route::delete('species/destroy', 'SpeciesController@massDestroy')->name('species.massDestroy');
    Route::post('species/media', 'SpeciesController@storeMedia')->name('species.storeMedia');
    Route::resource('species', 'SpeciesController');

    // Ngos
    Route::delete('ngos/destroy', 'NgoController@massDestroy')->name('ngos.massDestroy');
    Route::post('ngos/media', 'NgoController@storeMedia')->name('ngos.storeMedia');
    Route::get('ngos/remove/{$id}', 'NgoController@remove');
    Route::resource('ngos', 'NgoController');

     // Sliders
    Route::delete('sliders/destroy', 'SliderController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SliderController@storeMedia')->name('sliders.storeMedia');
    Route::resource('sliders', 'SliderController');

    // Galleries
    Route::delete('galleries/destroy', 'GalleryController@massDestroy')->name('galleries.massDestroy');
    Route::post('galleries/media', 'GalleryController@storeMedia')->name('galleries.storeMedia');
    Route::resource('galleries', 'GalleryController');

    // Exhibitons
    Route::delete('exhibitons/destroy', 'ExhibitonsController@massDestroy')->name('exhibitons.massDestroy');
    Route::resource('exhibitons', 'ExhibitonsController');

    // Digital Brochures
    Route::delete('digital-brochures/destroy', 'DigitalBrochuresController@massDestroy')->name('digital-brochures.massDestroy');
    Route::post('digital-brochures/media', 'DigitalBrochuresController@storeMedia')->name('digital-brochures.storeMedia');
    Route::resource('digital-brochures', 'DigitalBrochuresController');

    // Advisors
    Route::delete('advisors/destroy', 'AdvisorController@massDestroy')->name('advisors.massDestroy');
    Route::post('advisors/media', 'AdvisorController@storeMedia')->name('advisors.storeMedia');
    Route::resource('advisors', 'AdvisorController');

    // Product Categories
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::resource('product-categories', 'ProductCategoryContphp artisan vendor:publish --tag=fm-assets --forceroller');

    // Product Tags
    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');
    Route::resource('product-tags', 'ProductTagController');

    // Products
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::resource('products', 'ProductController');

     // Exhibation Categories
    Route::delete('exhibation-categories/destroy', 'ExhibationCategoryController@massDestroy')->name('exhibation-categories.massDestroy');
    Route::post('exhibation-categories/media', 'ExhibationCategoryController@storeMedia')->name('exhibation-categories.storeMedia');
    Route::post('exhibation-categories/ckmedia', 'ExhibationCategoryController@storeCKEditorImages')->name('exhibation-categories.storeCKEditorImages');
    Route::resource('exhibation-categories', 'ExhibationCategoryController');

    // Exhibition Posts
    Route::delete('exhibition-posts/destroy', 'ExhibitionPostController@massDestroy')->name('exhibition-posts.massDestroy');
    Route::post('exhibition-posts/media', 'ExhibitionPostController@storeMedia')->name('exhibition-posts.storeMedia');
    Route::post('exhibition-posts/ckmedia', 'ExhibitionPostController@storeCKEditorImages')->name('exhibition-posts.storeCKEditorImages');
    Route::resource('exhibition-posts', 'ExhibitionPostController');

    // Exhibition Galleries
    Route::delete('exhibition-galleries/destroy', 'ExhibitionGalleryController@massDestroy')->name('exhibition-galleries.massDestroy');
    Route::post('exhibition-galleries/media', 'ExhibitionGalleryController@storeMedia')->name('exhibition-galleries.storeMedia');
    Route::post('exhibition-galleries/ckmedia', 'ExhibitionGalleryController@storeCKEditorImages')->name('exhibition-galleries.storeCKEditorImages');
    Route::resource('exhibition-galleries', 'ExhibitionGalleryController');

     // Pages
    Route::delete('pages/destroy', 'PageController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PageController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PageController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PageController');

     // \UniSharp\LaravelFilemanager\Lfm::routes();
    
    ctf0\MediaManager\MediaRoutes::routes();
});
Route::group(['prefix' => 'admin/laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });



Route::get('/years','GrandsController@testAry');



