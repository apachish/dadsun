<?php
/**
 * Created by PhpStorm.
 * User: shahriar
 * Date: 3/4/19
 * Time: 12:21 PM
 */

namespace App\Service;


use App\Events\ProductCreated;
use App\Events\ProductUpdated;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;


class ProductService
{
    public static function create($data)
    {
        $product = Auth::user()->products()->create($data->except('_token'));
        if ($data->hasFile('image')) {
            $product = self::upload($data, $product);
        }
        event(new ProductCreated($product, Auth::user()));
        return $product;
    }

    public static function update($id, $data)
    {
        $product = Product::find($id);
        $product->update($data->only(['title', 'description', 'image']));
        if ($data->hasFile('image')) {
            $product = self::upload($data, $product);
        }
        event(new ProductUpdated($product,Auth::user()));
        return $product;
    }

    public static function delete($id)
    {
        $product = Product::find($id);
        $user = Auth::user();
        if($user->can('delete', $product)) {
            self::deleteFile($product);
            $product->delete();
            return true;
        }
        return false;
    }

    public static function deleteFile(Product $product)
    {
        Storage::delete('thumbnail/' . $product->image);
        Storage::delete('images/' . $product->image);
    }

    public static function upload(Request $request, Product $product)
    {

        $originalImage = $request->file('image');
        $ext = $originalImage->guessExtension();
        $thumbnailImage = Image::make($originalImage);

        $thumbnailPath = storage_path() . '/thumbnail/';
        if (!file_exists($thumbnailPath)) {
            mkdir($thumbnailPath);
        }
        $originalPath = storage_path() . '/images/';

        if (!file_exists($originalPath)) {
            mkdir($originalPath);
        }
        $fileName = time() . "_" . $product->id . "." . $ext;
        $thumbnailImage->save($originalPath . $fileName);
        $thumbnailImage->resize(150, 150);
        $thumbnailImage->save($thumbnailPath . $fileName);
        $product->update(['image' => $fileName]);
        return $product;
    }
}