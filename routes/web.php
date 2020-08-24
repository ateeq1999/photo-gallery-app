<?php


Route::get('/', function () {
    return redirect()->route('site.home');
});
Route::get('/clients', function () {
    return view('site.pages.clients');
});

Route::get('/categories/{category/show}', function () {
    return 'categories.show';
    // return view('site.categories.show');
})->name('categories.show');

Auth::routes(['register'=>true]);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        Route::get('home', 'HomeController@index')->name('site.home');
        Route::get('profile', 'HomeController@profile')->name('site.profile');
        Route::get('clients', 'HomeController@clients')->name('site.clients');
        Route::get('/categories/products/{product}', 'HomeController@category_product_show')->name('site.products.show');
        Route::get('/categories/{category}/products', 'HomeController@category_products')->name('site.category_products');
        Route::get('contact-us', 'HomeController@contact_us')->name('site.contact-us');
        Route::post('contact-us', 'HomeController@contact_us_store')->name('site.contact-us-store');
    });

