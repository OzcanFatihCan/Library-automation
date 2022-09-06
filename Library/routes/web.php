<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\LogoutController;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
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

Route::get('/', function(){
    return redirect()->Route("login");
});

Route::get("/guest", [GuestController::class, "index"])->name("guest");
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth',"verified"])->name('dashboard');



//ajax ile ilgili işlemler
Route::get("test",function(){
  $data["kategoriler"]=DB::table("categories")->get();//kategorideki tüm veriyi isteyen kod
    return view("test",$data);
});
Route::post("kategoriler",function(Request $request){
   $id= DB::table("categories")->insertGetId([
        "category_name"=>$request->kategori
    ]);
    if($id){
        return response()->json([
            "result"=>true,
            "kategori_id"=>$id
        ]);
    }
    else{
        return response()->json([
            "result"=>false
        ]);
    }

})->name("kategori.ekle");



Route::group(["prefix" => "admin", "middleware" => ["auth", "verified", "can:isAdmin"]], function () {
    Route::get("main",[AdminController::class,"index"])->name("admin.main");
    Route::get("users",[AdminController::class,"users"])->name("admin.users");
    Route::post("users",[AdminController::class,"addUser"])->name("admin.addUser");
    Route::get("user/{id}",[AdminController::class,"getUser"])->name("admin.user");
    Route::post("user",[AdminController::class,"updateUser"])->name("admin.updateUser");
    Route::delete("user/{id}",[AdminController::class,"deleteUser"])->name("admin.deleteUser");
});

Route::group(["prefix" => "super-admin", "middleware" => ["auth", "verified", "can:isSuperAdmin"]], function () {
    Route::get("anasayfa", function () {
        echo "<h1>Super Admin anasayfasına hos geldiniz!</h1>";
    })->name("super_admin");
});

Route::group(["prefix" => "assistant", "middleware" => ["auth", "verified", "can:isAssistant"]], function () {
    //asistan anasayfa
    Route::get("main",[AssistantController::class,"index"])->name("assistant.main");
    //kitaplar
    Route::get("books",[AssistantController::class,"books"])->name("assistant.books");
    Route::post("books",[AssistantController::class,"addBook"])->name("assistant.addBook");
    Route::get("book/{id}",[AssistantController::class,"getBook"])->name("assistant.book");
    Route::post("book",[AssistantController::class,"updateBook"])->name("assistant.updateBook");
    Route::delete("book/{id}",[AssistantController::class,"deleteBook"])->name("assistant.deleteBook");
    Route::post("writer-book",[AssistantController::class,"updateWriterBook"])->name("assistant.updateWriterBook");
    Route::get("writer-book/{id}",[AssistantController::class,"getWriterBook"])->name("assistant.Writerbook");
    //kategori
    Route::get("category",[AssistantController::class,"category"])->name("assistant.category");
    Route::post("category",[AssistantController::class,"addCategory"])->name("assistant.addCategory");
    Route::get("categoryek/{id}",[AssistantController::class,"getCat"])->name("assistant.categoryek");
    Route::post("categoryek",[AssistantController::class,"updateCat"])->name("assistant.updateCategory");
    Route::delete("categoryek/{id}",[AssistantController::class,"deleteCat"])->name("assistant.deleteCategory");
    //yazarlar
    Route::get("writers",[AssistantController::class,"writers"])->name("assistant.writers");
    Route::post("writers",[AssistantController::class,"addWriters"])->name("assistant.addWriters");
    Route::get("writer/{id}",[AssistantController::class,"getWriter"])->name("assistant.writer");
    Route::post("writer",[AssistantController::class,"updateWriter"])->name("assistant.updateWriter");
    Route::delete("writer/{id}",[AssistantController::class,"deleteWriter"])->name("assistant.deleteWriter");
    //aksiyon
    Route::get("actions",[AssistantController::class,"actions"])->name("assistant.actions");
    Route::post("actions",[AssistantController::class,"addAction"])->name("assistant.addAction");
    //yayinevi
    Route::get("publishers",[AssistantController::class,"publishers"])->name("assistant.publishers");
    Route::post("publishers",[AssistantController::class,"addPublishers"])->name("assistant.addPublishers");
    Route::get("publishers/{id}",[AssistantController::class,"dellPublishers"])->name("assistant.dellPublishers");
});




require __DIR__ . '/auth.php';
