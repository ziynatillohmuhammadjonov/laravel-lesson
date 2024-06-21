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
```
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', function(){
        return redirect('/admin/checkouts');
        // return '/users - routeri';
    })->name('users');

    Route::get('/checkotus', function(){
        return redirect()->route('admin.user');
        // return '/checkouts - routeri';
    })->name('checkouts');
});
```

# 5-dars Kontroller bilan ishlash.

MVC -arxitekturasiga ko'ra mijoz tomionidan ketgan so'rovlar avval controlerga keyin modelga undan mijozga javob tarizida qaytadi. Bunda biz `php artisan make:controller nameController` orqali kontorllerni nomini kitritsak uni avtomat ravishda `app/Http/Controllers`- papkasiga qo'shib beradi. So'ng unga public func qo'shib uni chaqirib qo'yamiz so'rovga javob berish uchun.
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index(){
        return view("welcome");
    }

    public function users(){
        return view("users");
    }
}
```
undan foydalanish:
```
Route::get('/', [SiteController::class,'index'])->name('home');
Route::get('/users', [SiteController::class,'users'])->name('users');
```
argumentlar ham eski tartibda beriladi.


# 6-dars So'rovlar bilan ishlash.
So'rovlar bilan ishla uchun kontroller ichida funksiya ochib unda kiruvchi parametr sifatida (Request $request) korinishida olib kirib undan foydalanamiz.
```

    public function create(Request $request){
        dd($request->query('test'));
        return view("users");
    }

    public function store(Request $request){
        // dd($request->path());//yo'lini olib beradi.
        dd($request->all());//barcha inutlarni qiymatlarini olib beradi.
    }
``` 
uni qolgan metodlari : https://laravel.com/docs/11.x/requests#main-content
Bundan tashqari post so'rovi bilan ishlayotganda dastlab xavsizlik yuzasidan 
```
?php echo csrf_field();?>
``` 
ni form ichiga yozib olishimiz kerak. Aks holda laravel xatolik beradi.