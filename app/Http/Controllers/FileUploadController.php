<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
class FileUploadController extends Controller
{
    /** 
     * Generate Upload View 
     * 
     * @return void 
    */  
    public  function dropzoneUi()  
    {  
        return view('dropzone-file-upload');  
    }  
    /** 
     * File Upload Method 
     * 
     * @return void 
     */  
    public  function dropzoneFileUpload(Request $request)  
    {
        $products = Product::all();
        foreach($products as $product){
            $last_product = $product;
        }
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension(); 
        $image->move(public_path('images'),$imageName);
        $image = new Image;
        $image->product_id = $last_product->id;
        $image->image = $imageName;
        $image->save();
        return response()->json(['success'=>$imageName]);
    }
}