<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProductController extends Controller
{
    public function handleUploadFiles(Request $request){
        if ($request->hasFile('photos')) {
            $urlPhotos=array();
             foreach ($request->file('photos') as $file) {
            
             $image=$file;
             $url=time().'-'.$image->getClientOriginalName();
             $destinationPath = 'uploads/products';
             if( $image->move($destinationPath,$url)){
                  array_push($urlPhotos,$url);
                 }
              }
              return $urlPhotos;
             }  
    }
    public function handleUploadFile(Request $request){
        if ($request->hasFile('photo')) {           
             $image=$request->file('photo');
             $url=time().'-'.$image->getClientOriginalName();
             $destinationPath = 'uploads/users';
             if( $image->move($destinationPath,$url)){
                  return $url;
                 }
            }  
    }
    public function showUserProducts(){
     $products=Product::with("images")->get();
      return $products;
    
      
    }
    public function showUserCategories(){
        $categories=Category::all();
        return $categories;
    }
    public function showUserProduct($id){
        $product=Product::where('id',$id)->with("images")->get();
        return $product;
    }
    public function showUserProductsByCategory($id_category){
        $resultat=Category::fin($id_category);
        if($resultat){
            $products=Product::where('category_id',$id_category)->with('images')->get();
            return $products;
        }     
    }
    public function showUserProductsByUser(){
        if(!Auth::user()){
            return back();
        }
        $products=Product::where('user_id',Auth::user()->id)->get();
        return $products;
    }
    public function handleAdminAddProduct(Request $request){
        
       $data = $request->all();
      
       $rules = [
           'title'=>'required',         
           'description' => 'required',
           'price' =>'required',
           'color' =>'required',
           'size'  =>'required'                  
       ];

       $messages = [
           'title.required' => 'Le titre est obligatoire',
           'description.required' => 'La description est obligatoire',
           'tarif.required' => 'Le prix est obligatoire'        
       ];

       $validation = Validator::make($data, $rules, $messages);

       if ($validation->fails()) {
           return $validation->errors();
       }
       $productData=[
           'title' => $data['title'],
           'description' => $data['description'],
           'price' => $data['price'],
           'size' => $data['size'],
           'color' => $data['color'],
           'category_id' =>$data['category'],
           'user_id' => $data['user_id']
       ];
       $product = Product::create($productData);
      if($product) {
        for($i=0;$i<count($data['photos']);$i++){
            Image::create(['product_id'=>$product->id,'name'=>$data['photos'][$i]]);
        }
        return $product;
      }
    }
    public function showAdminCategories(){
        return Category::all();
    }
    public function showAdminProducts(){
        return Product::with("images")->get();
    }
    public function showAdminProduct($id){
        return Product::where('id',$id)->with("images")->get();
    }
    public function showAdminProductsByCategory($id){
        $resultat= Category::find($id);
        if ($resultat){
            return Product::where('category_id',$id)->with("images")->get();
        }
    }
    public function handleAdminDeleteProduct($id){
      $res=Product::find($id);
      if($res){
          Image::where('product_id',$id)->delete();
          Product::find($id)->delete();
          return 'ok';
      }
    }
    public function handleAdminUpdateProduct(Request $request,$id){
     $resultat=Product::find($id);
     if($resultat){
        $data=$request->all(); 
        $productData=[
            'title'=> $data['title'],
            'price' => $data['price'],
            'size' => $data['size'],
            'color' => $data['color'],
            'category_id' => $data['category_id'],
            'description' => $data['description']
        ];
       return Product::where('id',$id)->update($productData);
     }
    }
    public function showAdminUsers(){
        return User::all();
    }
}
