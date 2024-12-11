<?php

use App\Http\Controllers\PersonsController;
use App\Http\Controllers\PrintContent;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Number;
use Tenants\Http\Controllers\TenantsController;
use \Support\Attributes\ListensTo;
use \Support\Attributes\Property;

class MyClass {
    public function returnHello()
    {
        $currency = Number::useLocale('en');
        // $currency->currency('1000');
        return $currency;
    }
}
trait MyTrait {
    public function traitMessage()
    {
        return( 'trait message');
    }
}
interface MyInterface {
    public function message();
}
abstract class myAbstract {
    public function myMessage() {
        return('abscract message');
    }
}

// #[ReadOnly]
class Web extends MyClass implements MyInterface {
    use MyTrait;
    public function message () {

    }

    public function traitMessage() {
        return $this->returnHello();
    }

}

Route::get('test', function () {
    phpinfo();
});

Route::view('template', 'print-template');

Route::get('print', [PrintContent::class, 'print']);

Route::get('google_otp', [TenantsController::class, 'index']);
Route::get('firebase_otp', [TenantsController::class, 'otpVerification']);

Route::prefix('persons')->controller(PersonsController::class)->group(function () {
    Route::get('/', 'index')->name('persons.index');
    Route::get('/create', 'create')->name('persons.create');
    Route::post('/store', 'store')->name('persons.store');
    Route::prefix('{person_id}')->group(function () {
        Route::get('/', 'show')->name('persons.show');
        Route::get('/edit', 'edit')->name('persons.edit');
        Route::post('/update', 'update')->name('persons.update');
        Route::get('/delete', 'delete')->name('persons.delete');
    });
});
