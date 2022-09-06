<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Book;
use App\Models\Category;
use App\Models\Writer;
use App\Models\Publisher;
use App\Models\WriterBook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AssistantController extends Controller
{   //Görüntüleyici
    public function index(){
        $data1["books"]=DB::table('books')->count();
        $data1["users"]=DB::table('users')->count();
        $data1["writers"]=DB::table('writers')->count();
        $data1["actions"]=DB::table('actions')->count();
        $data["title"]="Asistan Anasayfa";
        $data["page_title"]="Asistan Anasayfa";
        $data["content"]=view("users.assistant.anasayfa.anasayfa",$data1);
        return view("users.assistant.main",$data);
    }
    public function books(){

       
        $data1["books"] = DB::table("books as t1")
        ->select("t1.id","t1.kitap_adi","t2.category_name","t3.yayinevi_adi","t1.basim_yili","t1.image")
        ->join("categories as t2","t2.id","=","t1.kategori_id")
        ->join("publishers as t3","t3.id","=","t1.yayinevi_id")
        ->paginate(10);


       
        $data1["cats"]=Category::all();
        $data1["publishers"]=Publisher::all();
        $data1["writers"]=Writer::all();
        $data1["writer_books"]=WriterBook::all();
        $data["title"] = "Kitaplar";
        $data["page_title"] = "Kitaplar";
        $data["content"] = view("users.assistant.books.books", $data1);
        return view("users.assistant.main", $data);
    }
    public function category(){
        $data1["category"] = Category::paginate(10);

        $data["title"] = "Kategori";
        $data["page_title"] = "Kategori";
        $data["content"] = view("users.assistant.category.category", $data1);
        return view("users.assistant.main", $data);
    }
    public function writers(){
        $data1["writers"] = Writer::paginate(10);

        $data["title"] = "Yazarlar";
        $data["page_title"] = "Yazarlar";
        $data["content"] = view("users.assistant.writers.writers", $data1);
        return view("users.assistant.main", $data);
    }
    public function actions(){
        $data1["actions"] = DB::table("actions as t1")
        ->join("users as t2","t2.id","=","t1.user_id")
        ->join("books as t3","t3.id","=","t1.kitap_id")->paginate(10);

        $data1["books"] = Book::all();
        $data1["users"] = User::all();

        $data["title"] = "Kitap Ödünç Sistemi";
        $data["page_title"] = "Kitap Ödünç Sistemi";
        $data["content"] = view("users.assistant.actions.actions", $data1);
        return view("users.assistant.main", $data);
    }
    public function publishers(){
            $data1["publishers"] = Publisher::paginate(10);
    
            $data["title"] = "Yayınevleri";
            $data["page_title"] = "Yayınevleri";
            $data["content"] = view("users.assistant.publishers.publishers", $data1);
            return view("users.assistant.main", $data);
    }        
    //kitaplar
    public function addBook(Request $request){

        $error_message = [
            "required" => ":attribute alanı boş geçmeyiniz.",
            "unique" => "Aynı :attribute ile birden fazla kayıt oluşturulamaz!!",
            
        ];

        Validator::make($request->all(), [
            "kitap_adi" => "required",
            "catid"=>"required",
            "yayinevi_id"=>"required",
           
        ], $error_message)->validate();
        $fileName=time().$request->file('image')->getClientOriginalName();
        
        $book = new Book();
        $book->kitap_adi=$request->kitap_adi;
        $book->kategori_id=$request->catid;
        $book->yayinevi_id=$request->yayinevi_id;
        $book->basim_yili=$request->basim_yili;
        $book->image=Storage::put("public/product_img",$request->image);
        $book->save();
        
        return redirect()->route("assistant.books");
    }
    public function getBook($id){
      
        $data1["book"]=Book::find($id);
        $data1["cats"]=Category::all();
        $data1["publishers"]=Publisher::all();
        $data1["writers"]=Writer::all();


        // $data1["writer_book"]=DB::table("books as t1")
        // ->Join("writer_books as t2","t1.id","=","t2.kitap_id")
        // ->Join("writers as t3","t2.yazar_id","=","t3.id")
        // ->where("t1.id",$id)
        // ->get();

        // $data1["writer_book"]=Book::with("aratablo")->find($id);
        $data1["writer_book"]=Book::find($id)->aratablo;

        if(!isset($data1["book"]->id))return redirect()->route("assistant.addBook");
        $data["title"]="Kitap Bilgileri";
        $data["page_title"]="Kitap Güncelleme İşlemi";
        $data["content"]=view("users.assistant.books.book",$data1);
        //return  json_encode($data1["book"]);
        return view("users.assistant.main",$data);
    }
    public function deleteBook($id){    
         Book::where("id",$id)->delete();
         return redirect()->route("assistant.books");
    }
    public function updateBook(Request $request){
        $mesaj = [
            "required" => ":attribute zorunlu alandır.",
            "min"=>":attribute alanında eksik değer",
            "max"=>":attribute alanında fazla değer"
        ];

        Validator::make($request->all(), [
            "kitap_adi" =>["required","min:2","max:50"],
            "catid"=>"required",
            "yayinevi_id"=>"required",
        ], $mesaj)->validate();
      
        $book=Book::find($request->book_id);
        $book->kitap_adi=$request->kitap_adi;
        $book->kategori_id=$request->catid;
        $book->yayinevi_id=$request->yayinevi_id;
        $book->basim_yili=$request->basim_yili;
        $book->save();
 
        return redirect()->route("assistant.book",$request->book_id);
    }
    public function updateWriterBook(Request $request){

      //  $book=Book::find($request->book_id);
        $val=WriterBook::where([
            "yazar_id"=>$request->yazar_id,
            "kitap_id"=>$request->book_id
        ])->first();

        if(isset($val))
        {
            return redirect()->route("assistant.book",$request->book_id)->with(["result"=>true,"message"=>"Bu yazar daha önce eklendi."]); 
        }
        else
        {
            $writer_book= new WriterBook();
            $writer_book->yazar_id=$request->yazar_id;
            $writer_book->kitap_id=$request->book_id;
            $writer_book->save();

          return redirect()->route("assistant.book",$request->book_id);
        }
        
    }
    public function getWriterBook($id){

        $data1["writer"]=Writer::find($id);

        $data1["writer_book"]=DB::table('writer_books as t1')
        ->select('t1.kitap_id','t1.yazar_id',"t2.id","t2.image","t2.kitap_adi")
        ->join("books as t2","t2.id","=","t1.kitap_id")
        ->where('yazar_id',$id)
        ->get();
     
       
        $data["title"]="Yazarın Kitapları";
        $data["page_title"]="Yazarın Kitapları";
        $data["content"]=view("users.assistant.writerbooks.writerbooks",$data1);
        return view("users.assistant.main",$data);
    }
    //kategori
    public function addCategory(Request $request){
   
           $error_message = [
               "required" => ":attribute alanı boş geçmeyiniz.",
           ];
           Validator::make($request->all(), [
               "category_name" => "required",
              
           ], $error_message)->validate();
           $category = new category();
           $category->category_name=$request->category_name;
           $category->save();
           return redirect()->route("assistant.category");
    }
    public function getCat($id){
            $data1["categoryek"]=Category::find($id);
            $data["title"]="Kategori Bilgileri";
            $data["page_title"]="Kategori Güncelleme İşlemi";
            $data["content"]=view("users.assistant.category.categoryek",$data1);
            return view("users.assistant.main",$data);
    }    
    public function deleteCat($id){    
            Category::where("id",$id)->delete();
            return redirect()->route("assistant.category");
    }
    public function updateCat(Request $request){
        $mesaj = [
            "required" => ":attribute zorunlu alandır.",
            "min"=>":attribute alanında eksik değer",
            "max"=>":attribute alanında fazla değer"
        ];

        Validator::make($request->all(), [
            "category_name" =>["required","min:2","max:50"],
        ], $mesaj)->validate();
        $categoryek=Category::find($request->categoryek_id);
        $categoryek->category_name=$request->category_name;

        $categoryek->save();
        return redirect()->route("assistant.categoryek",$request->categoryek_id);
    }
    //yazarlar
    public function addWriters(Request $request){
        $error_message = [
            "required" => ":attribute alanı boş geçmeyiniz.",
            "email" => ":attribute uygun formatta değil."
        ];
        Validator::make($request->all(), [
            "writer_name" => "required",
            "email"=>"email"
        ], $error_message)->validate();
        $writer = new Writer();
        $writer->writer_name=$request->writer_name;
        $writer->email=$request->email;
        $writer->phone=$request->phone;
        $writer->save();
        return redirect()->route("assistant.writers");
    }
    public function getWriter($id){
        $data1["writer"]=Writer::find($id);
        $data["title"]="Yazar Bilgileri";
        $data["page_title"]="Yazar Güncelleme İşlemi";
        $data["content"]=view("users.assistant.writers.writer",$data1);
        return view("users.assistant.main",$data);
    }
    public function deleteWriter($id){    
        Writer::where("id",$id)->delete();
        return redirect()->route("assistant.writers");
    }
    public function updateWriter(Request $request){
       $mesaj = [
           "required" => ":attribute zorunlu alandır.",
           "min"=>":attribute alanında eksik değer",
           "max"=>":attribute alanında fazla değer"
       ];

       Validator::make($request->all(), [
           "writer_name" =>["required","min:2","max:50"]

       ], $mesaj)->validate();
       $writer=Writer::find($request->writer_id);
       $writer->writer_name=$request->writer_name;
       $writer->email=$request->email;
       $writer->phone=$request->phone;
       $writer->save();
       return redirect()->route("assistant.writer",$request->writer_id);
    }
    //aksiyon
    public function addAction(Request $request){

        $error_message = [
            "required" => ":attribute alanı boş geçmeyiniz.",
            "unique" => "Aynı :attribute ile birden fazla kayıt oluşturulamaz!!",
            
        ];
        Validator::make($request->all(), [
            "user_id" => "required",
            "kitap_id"=>"required",
            "k_verilis_tarih" => "required",
            "k_teslim_tarih" => "required"   
        ], $error_message)->validate();
        $action = new Action();
        $action->user_id=$request->user_id;
        $action->kitap_id=$request->kitap_id;
        $action->k_verilis_tarih=$request->k_verilis_tarih;
        $action->k_teslim_tarih=$request->k_teslim_tarih;
       
        $action->save();
        return redirect()->route("assistant.actions");
    }
    //yayinevi
    public function addPublishers(Request $request){
        $error_message = [
            "required" => ":attribute alanı boş geçmeyiniz.",
        ];
        Validator::make($request->all(), [
            "yayinevi_adi" => "required",
        ], $error_message)->validate();
        $publisher = new Publisher();
        $publisher->yayinevi_adi=$request->yayinevi_adi;
        $publisher->yayinevi_adres=$request->yayinevi_adres;
        $publisher->yayinevi_tel=$request->yayinevi_tel;
        $publisher->save();
        return redirect()->route("assistant.publishers");
    }
    public function dellPublishers($id){
        Publisher::where("id",$id)->delete();
        return redirect()->route("assistant.publishers");
    }
        

}
