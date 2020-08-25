<?php

     Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function(){
   
            Route::get('/index','DashboardController@index')->name('index');
            Route::resource('users','UserController')->except(['show']);
            Route::resource('profiles','ProfileController')->except(['show']);
            Route::resource('settings','SettingController')->except(['show']);
            Route::resource('categories','CategoryController')->except(['show']);
            Route::resource('awards','AwardController')->except(['show']);
            Route::resource('infos','InfoController')->except(['show']);
            Route::resource('locations','LocationController')->except(['show']);
            Route::resource('products','ProductController')->except(['show']);

            Route::resource('orders','OrderController');
            Route::get('/orders/{order}/products','OrderController@products')->name('orders.products');


            Route::resource('clients','ClientController')->except(['show']);
            Route::resource('clients.orders','Client\OrderController')->except(['show']);


            
        });   
    });

