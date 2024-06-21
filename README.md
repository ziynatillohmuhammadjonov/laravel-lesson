# 1-dars

Routelar bilan ishlashda uni ichiga dinakik qismini berib yuborish argument deyiladi. Bunda uni 
```
Route::get('/test/{id}/name/{name?}', function ($id, $name=null) {
    return view('test', compact('id','name'));
});
```
orqali qilamiz. Bunda uni ixtiyoriy qilishimiz va un ibir nechta berishimiz mumkin. Olayotganda qiymatlarni uni ketma ketlik bo'yicha oladi nom bo'yciha emas.

# 2-dars

Routerlarga nom berish va u orqali unga murojaat qilish.
Bu orali biz routlarni ishashga qulay tarizda nomlab uni `route(name)` - laravel funksiyasi orqali ishlatishimiz mumkin.
```
Route::get('/users', function () {
    return 'Users routesi';
})->name('users')
```
Ishlatish:
```
<a href="<?php echo route('users')?>">Users sahifasi</a>
```
Agar argumetnli bo'lsa:
```
Route::get('/users/id/{id}/name/{name}', function ($id, $name){
    return view('users', compact('id','name'));
})->name('users');
```
Ishlatish:
```
<a href="<?php echo route('users', 15)?>">Users sahifasi</a> 
<!-- Agar argument bitta bo'lsa oddiy ko'rinishda agar ko'p bo'lsa ass. array ko'rinishida beriladi. -->
<a href="<?php echo route('users', ['id'=>15, 'name'=>'Alex'])?>">Users sahifasi</a> 
```

# 3-dars 
Routlarni guruhlash. Bu orqali routlarni prefix ya'ni boshlanish qismini ummumiy qilib uni ummumiy qilib o'zgartisak bo'ladi.
```
Route::prefix('site')->group(function () {
    Route::get('/post', function(){
        return '/site/post - routeri';
    })->name('post');
    Route::get('/students', function () {
        return '/site/students - routeri';
    })->name('students');
});

Route::prefix('admin')->group(function () {
    Route::get('/users', function(){
        return '/admin/users - routeri';
    })->name('admin.users');

    Route::get('/checkotus', function(){
        return '/admin/checkouts - routeri';
    })->name('admin.checkouts');
});
```
Yoki bo'lmasa `name` ni ham ummumiy qilish uchun:
```
Route::prefix('site')->name('site.')->group(function () {
    Route::get('/post', function(){
        return '/post - routeri';
    })->name('post');
    Route::get('/students', function () {
        return '/students - routeri';
    })->name('students');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', function(){
        return '/users - routeri';
    })->name('users');

    Route::get('/checkotus', function(){
        return '/checkouts - routeri';
    })->name('checkouts');
});
```
Foydalanishi:
```
 <a href="<?php echo route('admin.users')?>">Admin users</a>
```

# 4-dars
Redayrekt qilish.
