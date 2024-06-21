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

# 7-dars
Laravel blade. Bu bizga HTML ichida php kodlarini qo'shimcha <?php ?> larsiz ishlatish mumkin. Faqat buning uchun blade kengaytmasini yozish kerak hamma fayllarga. `fileName.bade.php` tartibida ishlatilishi:
```
    @php
            
    @endphp
    @foreach ($users as $user)
        <li>{{$user}}</li>
    @endforeach
```
batafsil ma'lumot: https://laravel.com/docs/11.x/blade#main-content

# 8-dars
Laravel layoutlari. Bir xil bo'limlarni layout yani qoliplarga ajratib ishlatish. Bu bizga saytni ummumiy bo'ladigan head header footer kabi qismlarini ummumiy qilib uni ichiga kontentlarni qismini dinamik qilib foydalaish imkonini beradi.
Ishlatish uchun ummimiy fayl ajratib olinib uni dinamik qismi uchun joyni `@yield(name)` ko'rinishida yozamiz. Keyin uni kerakli joyida chaqirib `@extension(fileNameWithPath)` `@section('yiledIchidagiNom')` ichida buni o'zgaruvchi qismi e'lon qilinadi.`@endsection`

# 9-dars
Maketlar bilan ishalsh. Laravelda contentni ichini ham yanada kichik maketlarga bo'lib ishlatishimiz mumkin. Bun uchun kerakli faylni ochib uni maketini nomlab ularni chaqirishda `@include(section.slider)` shaklida ichida ko'rsatiladi.

# 10-dars
Komponentlar bilan ishlash. Bular maketlar kabi bo'lib uni farqli ravishda ichini taxrirlash. Qayta qayta ishlatish ichini dinamik qilish uchun foydalanish mumkin. Uni ishlatish uchun `php artisan make:component componentName` - orqali ishlatiladi. So'ng uni ichiga parametr kiritib o'zgartirishimiz mumkin. Buni biz komponent yasaganimizda avtomat tarizda `app/View/Components` papkasida va `resources/views/components` ichida kerakli komponent ochiladi uni ishlatishda `<x-nameComponent/>` - ko'rinishida ishlatiladi uni ichiga qiymat berish va foydalanish uchun `app/View/Components` ichidagi komponent fayilini
```
<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $type;
    public $text;
    public function __construct($type, $text)
    {
        //
        $this->type = $type;
        $this->text=$text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
```
ichidagi maydonarni ishlatish uchun uni chaqirganda 
```
<x-button type='danger' text='Delete'/>
<x-button type='success' text='Done'/>
```
yuborilgan maydonni o'qish uchun `resources/views/components` ichidagi komponent ichida
```
<div>
    <!-- When there is no desire, all things are at peace. - Laozi -->
    <button class="btn btn-{{$type}}">{{$text}}</button>
</div>
```
ko'rinishida ishlatiladi.

# 11-dars
Agar komponentlarni ichiga php parametrlarin beradigan bo'lsak uni berish uchun:
```
    <x-select :regions="$regions" />// ko'rinishida bo'ladi bunda birinchi klass ichidagi qabul qilinadigan maydon nomi. Ikkinchisi esa berialdigan php parametr noi
```
Bundan tashqari komponentlarni ishlatayotganda uni chaqirganda `{{$attributes}}` ko'rinishini qo'shib qo'ysak tashqi barcha attributlarini o'zi avtomatik ravishda qo'yadi.
```
<div>
    <!-- An unexamined life is not worth living. - Socrates -->
    <select {{$attributes}}>
        @foreach ($regions as $region)
            <option value="">{{$region}}</option>
        @endforeach
    </select>
</div>
```
- Slotlar - bu bir komponentani ichida bir qancha o'rinda ini ichga ma'lumotlarni qo'yish imkonini beradigan joy xususiyat bo'lib u bitta bo'lsa shunchaki agar ko'p bo'lsa har birini nomlab uni chaqiriladi.
```
<x-alert>
        <x-slot name='title'>
            Title
        </x-slot>
        <x-slot name='description'>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores cum, iste quis reprehenderit suscipit porro
            sit tenetur id eum. Dolorem.
        </x-slot>
</x-alert>
```
views ichida 
```
<div class="alert alert-success">
    <!-- Order your soul. Reduce your wants. - Augustine -->
    <h1>{{$title}}</h1>
    <p>{{$description}}</p>
</div>
``` 
ko'rinishida ishlatiladi.
