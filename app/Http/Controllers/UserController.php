<?php

namespace App\Http\Controllers;

use App\Models\cities;
use App\Models\comments;
use App\Models\products;
use App\Models\requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\families;
use App\Models\contact;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function about()
    {
        return view('about');
    }
    public function home()
    {
        $products = DB::table('products')->where('status', '=', 'Publish')->get();
        return view('welcome')->with('products', $products);
    }
    public function product_view($id)
    {
        $families = families::all();
        $commets = comments::all();
        $product = products::find($id);
        return view('product_view')->with('id', $product)->with('commets', $commets)->with('families', $families);
    }
    public function products()
    {
        $products = DB::table('products')->where('status', '=', 'Publish')->get();
        return view('products')->with('products', $products);
    }
    public function order_store(Request $request)
    {
        $order = new requests;
        $order->product_id = $request->product_id;
        $order->user_id  = auth()->user()->id;
        $order->family_id  = $request->family_id;
        $order->username  = $request->username;
        $order->phone  = $request->phone;
        $order->amount  = $request->amount;
        $order->price  = $request->amount * $request->price;
        $order->save();
        Session::flash('message', 'The order has been created');
        Session::flash('alert-class', 'alert-success');

        return back();
    }
    public function comment_store(Request $request)
    {
        $commet = new comments;
        $commet->username = auth()->user()->name;
        $commet->msg = $request->comment;
        $commet->product_id = $request->product_id;
        $commet->user_id = auth()->user()->id;
        $commet->save();
        Session::flash('message', 'The comment has been created');
        Session::flash('alert-class', 'alert-success');

        return back();
    }
    public function user_update(Request $request)
    {
        $users = User::find(auth()->user()->id);
        $users->city = $request->city;
        $users->update();
        Session::flash('message', 'The city has been added');
        Session::flash('alert-class', 'alert-success');

        return back();
    }
    public function index()
    {
        $cities = cities::all();
        $families = DB::table('families')->limit(3)->inRandomOrder("created_at")->where('status', '=', 1)->get();
        $contacts = DB::table('contacts')->where('user_id', '=', auth()->user()->id)->count();
        $requests = DB::table('requests')->where('user_id', '=', auth()->user()->id)->count();
        return view('dashboard')->with('requests', $requests)->with('contacts', $contacts)->with('families', $families)->with('cities', $cities);
    }
    public function orders()
    {
        $orders = DB::table('requests')->where('user_id', '=', auth()->user()->id)->get();
        $families = families::all();
        $products = products::all();
        return view('users.orders')->with('products', $products)->with('orders', $orders)->with('families', $families);
    }
    public function order_delete($id)
    {

        $orders = requests::find($id);
        $orders->delete();
        Session::flash('message', 'The order has been deleted');
        Session::flash('alert-class', 'alert-danger');

        return back();
    }
    public function chat(){
        $family = families::all();
        return view('chat')->with('families'  ,$family);
    }
       public function view_chats(){
        $db = DB::table('contacts')->where('user_id', '=', auth()->user()->id)->orderByDesc("created_at")->get();
        $families = families::all();

        $contact = contact::all();
        return view('messages')->with('contacts'  ,$contact)->with('dbs', $db)->with('families', $families);
    }
    
    public function chat_store(Request $request){
            $contact = new contact;
            $contact->title = $request->title;
            $contact->subject = $request->subject;
            $contact->msg = $request->msg;
            $contact->family_id = $request->family_id;
            $contact->user_id = auth()->user()->id;
                        $contact->email = auth()->user()->email;
                        $contact->username = auth()->user()->name;
                                    $contact->phone = auth()->user()->phone;
                                    $contact->save();
                                    
                                    
            return redirect('customer/chats');
    }
}
