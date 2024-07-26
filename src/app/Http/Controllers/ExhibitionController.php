<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Brand;
use App\Models\Condition;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExhibitionController extends Controller
{
    public function exhibition(Request $request) {
        $auth = Auth::user();
        
        $conditionId = ExhibitionController::conditionGet($request);
        $brandId = ExhibitionController::brandGet($request);
        
        $file_name = $request->image_path->getClientOriginalName();
        
        $request->image_path->storeAs('public/images/', $file_name);
        
        $param = [
            'seller_id' => $request->seller_id,
            'condition_id' => $conditionId,
            'brand_id' => $brandId,
            'name' => $request->name,
            'image_path' => 'storage/images/' . $file_name,
            'price' => $request->price,
            'description' => $request->description,
        ];
        
        $newProduct = Product::create($param);
        
        $newProductId = $newProduct->id;
        
        $categories = ExhibitionController::categoryGet($request, $newProductId);
        
        $product = Product::find($newProductId);
        $categoryIds = array_map(function($category) {
            return $category->id;
        }, $categories);
        $product->categories()->sync($categoryIds);
        
        return redirect('/thanks')->with('message', '商品を出品しました。');
    }
    
    public function categoryGet($request, $newProductId) {
        $tags = json_decode($request->input('tags'), true);
        
        $allCategories = [];
        
        foreach ($tags as $tag) {
            $category = DB::table('categories')
            ->where('name', $tag['value'])
            ->first();
            
            if ($category === null) {
                $params = [
                    'name' => $tag['value'],
                ];
                
                $newCategory = Category::create($params);
                $categoryId = $newCategory->id;
                $allCategories[] = $newCategory;
            } else {
                $categoryId = $category->id;
                $allCategories[] = $category;
            }
            
            DB::table('product_category')->insert([
                'product_id' => $newProductId,
                'category_id' => $categoryId,
            ]);
        }
        
        return $allCategories;
    }
    
    public function conditionGet($request) {
        $condition = DB::table('conditions')
        ->where('condition', $request['condition'])
        ->first();
        
        if($condition === null) {
            $params = [
                'condition' => $request['condition'],
            ];
            
            $newCondition = Condition::create($params);
            $conditionId = $newCondition->id;
        } else {
            $conditionId = $condition->id;
        }
        
        return($conditionId);
    }
    
    public function brandGet($request) {
        $brand = DB::table('brands')
        ->where('name', $request['brand'])
        ->first();
        
        if($brand === null) {
            $params = [
                'name' => $request['brand'],
            ];
            
            $newBrand = Brand::create($params);
            $brandId = $newBrand->id;
        } else {
            $brandId = $brand->id;
        }
        
        return($brandId);
    }
}
