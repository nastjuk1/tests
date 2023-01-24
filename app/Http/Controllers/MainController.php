<?php



namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class MainController extends Controller
{

    public function index()
    {

    $products = Product::paginate(3);
    return view('index', compact('products'));
    }
    public function categories()
   {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category($code)
    {
        $category = Category::where('code', $code)->first();
        $products = Product::where('category_id', $category->id)->get();
       return view('category', compact('category', 'products'));
    }

  public function product($category, $product = null)
  {
     return view('product', ['product' => $product]);
   }

   public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        }
        return view('basket', compact('order'));
    }
       public function basketPlace()
    {
        return view('order');
    }
    public function basketAdd($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create()->id;
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        $order->products()->attach($productId);

        return view('basket', compact('order'));
    }
   



}