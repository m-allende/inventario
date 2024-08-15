<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use App\Models\Sale;
use App\Models\Price;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(["brand", "category", "presentation", "lastPrice", "lastPhoto"])
                            ->whereHas('lastPrice', function ($query) {
                                $query->where('price', '>', '0');
                            })
                            ->take(6)
                            ->get();
        $categories = Category::with(["lastPhoto"])->take(6)->get();
        $services = Service::with(["lastPhoto"])->take(6)->get();

        return view('index', ['products' => $products, 'categories' => $categories, 'services' => $services]);
    }

    public function about(Request $request)
    {
        $brands = Brand::take(6)->get();
        $cant_prod = Product::whereHas('lastPrice', function ($query) {
            $query->where('price', '>', '0');
        })->count();
        return view('about', ['brands' => $brands, 'cant_prod' => $cant_prod]);
    }

    public function contact(Request $request)
    {
        return view('contact');
    }

    public function catalog(Request $request){
        if ($request->ajax()) {
            $input = $request->all();
            $take = (isset($input["take"])?$input["take"]:10);
            $page = (isset($input["page"])?$input["page"]:1);
            $search = (isset($input["search"])?$input["search"]:"");
            $category = (isset($input["category"])?$input["category"]:0);
            $brand = (isset($input["brand"])?$input["brand"]:0);
            $price_range = (isset($input["price_range"])?$input["price_range"]:"1,10000000");
            $price_range = explode(",",$price_range);
            $orderbyid = 1;
            $orderby = "name";
            $orderdir = "asc";


            if(isset($input["orderby"])){
                $orderbyid = $input["orderby"];
                switch ($input["orderby"]) {
                    case '2':
                        $orderby = "created_at";
                        $orderdir = "desc";
                        break;
                    case '3':
                        $orderby = "updated_at";
                        $orderdir = "desc";
                        break;
                    case '4':
                        $orderby = "last_price_price";
                        $orderdir = "desc";
                        break;
                    case '5':
                        $orderby = "last_price_price";
                        $orderdir = "asc";
                        break;
                    default:
                        $orderby = "name";
                        $orderdir = "asc";
                        break;
                }
            }

            $products = Product::with(["brand", "category", "presentation", "lastPrice", "lastPhoto"])
                    ->withAggregate('lastPrice','price')
                    ->where(function ($query) use($search, $category, $brand){
                        if($search != ""){
                            $query->where('name', "like", "%". $search. "%");
                        }
                        if($category != 0){
                            $query->where('category_id', "=", $category);
                        }
                        if($brand != 0){
                            $query->where('brand_id', "=", $brand);
                        }
                    })
                    ->whereHas('lastPrice', function ($query) use($price_range) {
                        $query->where('price', '>', '0')
                                ->whereBetween('price', $price_range);
                    })
                    ->skip(($page-1)*$take)
                    ->take($take)
                    ->orderby($orderby, $orderdir)
                    ->get();

            return $products;
        }
        $categories = Category::with(["lastPhoto"])
                                ->take(6)
                                ->get();

        $prod_by_category = Product::selectRaw("count(id) as quantity, category_id as category")
                                ->whereHas('lastPrice', function ($query) {
                                    $query->where('price', '>', '0');
                                })
                                ->groupby("category_id")
                                ->get();

        $brands = Brand::take(6)->get();

        $prod_by_brand = Product::selectRaw("count(id) as quantity, brand_id as brand")
                                ->whereHas('lastPrice', function ($query) {
                                    $query->where('price', '>', '0');
                                })
                                ->groupby("brand_id")
                                ->get();

        $cant_prod = Product::whereHas('lastPrice', function ($query) {
                                    $query->where('price', '>', '0');
                                })->count();

        $prices = DB::table("prices")
                        ->selectRaw("max(price) as price_max, min(price) as price_min")
                        ->where("price", ">","0")
                        ->get();

        return view('catalog', ['categories' => $categories,
                                'prices' => $prices,
                                'prod_by_category' => $prod_by_category,
                                'cant_prod' => $cant_prod,
                                'brands' => $brands,
                                'prod_by_brand' => $prod_by_brand,
                            ]);
    }

    public function services(Request $request){
        if ($request->ajax()) {
            $input = $request->all();
            $take = (isset($input["take"])?$input["take"]:10);
            $page = (isset($input["page"])?$input["page"]:1);
            $search = (isset($input["search"])?$input["search"]:"");
            $price_range = (isset($input["price_range"])?$input["price_range"]:"1,10000000");
            $price_range = explode(",",$price_range);
            $orderbyid = 1;
            $orderby = "name";
            $orderdir = "asc";


            if(isset($input["orderby"])){
                $orderbyid = $input["orderby"];
                switch ($input["orderby"]) {
                    case '2':
                        $orderby = "created_at";
                        $orderdir = "desc";
                        break;
                    case '3':
                        $orderby = "updated_at";
                        $orderdir = "desc";
                        break;
                    case '4':
                        $orderby = "last_price_price";
                        $orderdir = "desc";
                        break;
                    case '5':
                        $orderby = "last_price_price";
                        $orderdir = "asc";
                        break;
                    default:
                        $orderby = "name";
                        $orderdir = "asc";
                        break;
                }
            }

            $products = Service::with(["lastPrice", "lastPhoto"])
                    ->withAggregate('lastPrice','price')
                    ->where(function ($query) use($search){
                        if($search != ""){
                            $query->where('name', "like", "%". $search. "%");
                        }
                    })
                    ->whereHas('lastPrice', function ($query) use($price_range) {
                        $query->where('price', '>', '0')
                                ->whereBetween('price', $price_range);
                    })
                    ->skip(($page-1)*$take)
                    ->take($take)
                    ->orderby($orderby, $orderdir)
                    ->get();

            return $products;
        }

        $cant_serv = Service::whereHas('lastPrice', function ($query) {
                                    $query->where('price', '>', '0');
                                })->count();

        $prices = DB::table("prices")
                        ->selectRaw("max(price) as price_max, min(price) as price_min")
                        ->where("price", ">","0")
                        ->get();

        return view('services', ['prices' => $prices,
                                'cant_serv' => $cant_serv
                            ]);
    }
}
