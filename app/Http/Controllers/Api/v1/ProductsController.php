<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\StoreProductPost;
use App\Http\Resources\v1\ProductCollection;
use \App\Http\Resources\v1\Product as ProductResource;
use App\Product;
use App\Service\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->only(['store','update','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['user'])->get();
        return new ProductCollection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductPost $request)
    {
        $product = ProductService::create($request);
        return new ProductResource($product);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = cache()->remember('product'.$id, 120, function () use ($id){
              $product = Product::find($id);
            return  new ProductResource($product);
        });
        return $product;

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
        $product = ProductService::update($id,$request);
        return  new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductService::delete($id);
        return response()->json([
            'data' => [
                'message'=>'delete products'
            ],
            'error' => [],
            'status' => 'success'
        ], 200);
    }
}
