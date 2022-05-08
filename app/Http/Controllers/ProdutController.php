<?php

namespace App\Http\Controllers;

use Dusterio\LinkPreview\Client;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Announcement;
use Illuminate\Validation\ValidationException;
use Mockery\Undefined;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class ProdutController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::join('categories','products.category_id','=','categories.id')
                ->select('products.*','categories.name')->get();
        return view('admin.products.products', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('admin.products.addProducts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try{


        $validatedData = $this->validate($request, [
            'link'      => 'required|url',
      ]);
        $product = new Product();
        $product->link = $request->link;
         $product->category_id = $request->catagory;
         $product->title =  $request->product_title;
         $product->description = $request->product_description;
         $product->image = $request->product_image;
         $newDate = date("Y-m-d", strtotime($request->scheduled_date));
         $product->scheduled_at =  $newDate;
         $product->save();
        if($request->announcements == 'true'){
            $announcement = new Announcement();
            $announcement->description =  $request->product_description;
            $announcement->image =   $request->product_image;;
            $announcement->save();
        }

        return ['code' => '200','message'=>'Successfully Data is Inserted' ,'data'=>''];
      }
      catch(Exception $e){
        return redirect()->back()->with('error',$e->getMessage());
      }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data = Product::find($id);

            $data->delete();
            return ['code' => '200','message'=>'success'];
        }
        catch(\Exception $e){
            return ['code' => '200','error_message'=>$e->getMessage()];
        }
    }

    public function addProduct(){

        $Categories = Category::all();
        return view('admin.products.addProducts',compact('Categories'));
    }

    public function scrapUrlData(Request $request){
        try {

            $url = $request->input('url');
            $previewClient = new Client($url);
            $previews = $previewClient->getPreviews();
            $preview = $previewClient->getPreview('general');
            $preview = $preview->toArray();

            if(!empty($preview['cover'])){
                $image =  $preview['cover'];
           }
            else{
                if(!empty($preview['images'])){
                    $image =  $preview['images'][0];
                }
                else{
                    $image = 'https://via.placeholder.com/150';
                }
            }
            $data = [
                'title' => $preview['title'],
                'description' => $preview['description'],
                'image' => $image,
                'url' => $url,  //$preview['url'],

            ];
            return ['code' => '200','message'=>'success' ,'data'=>$data];
        } catch (\Throwable $th) {
            return ['code' => '200','error_message'=>$th->getMessage()];
        }


    }
    public function getProducts(Request $request){
        try {
            $url = $request->slug;
            $products = Product::join('categories','products.category_id','=','categories.id')
            ->select('products.*')
            ->where('categories.slug', '=',  $url)
            ->get();

            if (Auth::user()->hasRole('Salesman')) {
            return view('salesman.products',compact('products'));
            }
            elseif(Auth::user()->hasRole('Customer')){
                return view('client.products',compact('products'));
            }
        } catch (\Throwable $th) {
            return ['code' => '200','error_message'=>$th->getMessage()];
        }
    }
}
