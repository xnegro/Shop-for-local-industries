<?php

namespace App\Http\Controllers;

use App\Models\cities;
use App\Models\requests;
use App\Models\User;
use App\Models\families;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\products;
use Illuminate\Support\Facades\Session;
use App\Models\categories;
use App\Models\comments;

class AdminController extends Controller
{
    public function login()
    {
        return view('auth.admin_login');
    }
    function admin_validate_login(Request $request)
    {
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            $this->middleware('auth:admins');

            // return "s";
            return redirect('admin');
        }

        return redirect('admin/login')->with('status', 'Login details are not valid');
    }
    public function index()
    {
        if (!Auth::guard('admins')->check()) abort(404);

        $requests = DB::table('requests')->orderByDesc('created_at')->limit(5)->get();
        $families_count = DB::table('families')->count();
        $products_count = DB::table('products')->count();
        $requests_count = DB::table('requests')->count();
        $customers_count = DB::table('users')->count();

        return view('admin.index')->with('products_count', $products_count)->with('requests_count', $requests_count)->with('customers_count', $customers_count)->with('families_count', $families_count)->with('requests', $requests);
    }
    public function products_all()
    {
        $products = DB::table('products')->orderByDesc('created_at')->get();
        $categories =  categories::all();
        return view('admin.products.index')->with('products', $products)->with('categories', $categories);
    }
    public function product_active($id)
    {
        $product = products::find($id);
        $product->status = "Publish";
        $product->update();
        Session::flash('message', 'The product has been updated');
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.proud.all'));
    }

    public function product_deactive($id)
    {
        $product = products::find($id);
        $product->status = "Draft";
        $product->update();
        Session::flash('message', 'The product has been updated');
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.proud.all'));
    }

    public function product_edit($id)
    {
        $families = families::all();
        $product = products::find($id);
        $categories = categories::all();
        return view('admin.products.edit')->with('id', $product)->with('categories', $categories)->with('families', $families);
    }


    public function product_update($id, Request $request)
    {
        $request->validate([
            'description'         =>   'required',
            'title'         =>   'required',
            'price'         =>   'required',
            'amount'         =>   'required',
        ]);

        $product = products::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        if ($request->status != null) {
            $product->status = $request->status;
        } else {
            $product->status = "off";
        }
        if ($request->img != 0) {

            $product->img = $request->img;
        }
        $product->amount = $request->amount;
        $product->family_id = $request->family_id;
        $product->update();
        Session::flash('message', 'The product has been updated');
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.proud.all'));
    }



    public function orders_index($id)
    {
        $users = User::all();
        $products = products::all();
        $id = requests::find($id);
        return view('admin.orders.index')->with('id', $id)->with('users', $users)->with('products', $products);
    }

    public function orders_completed($id)
    {
        $id = requests::find($id);
        $id->status = "successful";
        $id->update();
        Session::flash('message', 'The order has been updated');
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin');
    }


    public function orders_cancel($id)
    {
        $id = requests::find($id);
        $id->status = "canceled";
        $id->update();
        Session::flash('message', 'The order has been canceled');
        Session::flash('alert-class', 'alert-warning');

        return redirect('/admin');
    }

    public function orders_delete($id)
    {
        $id = requests::find($id);
        $id->delete();
        Session::flash('message', 'The order has been deleted');
        Session::flash('alert-class', 'alert-danger');

        return redirect('/admin');
    }
    public function contacts()
    {
        if (Auth::guard('admins')->check()) {
            $families = families::all();
            $db = DB::table('contacts')->orderByDesc("created_at")->get();
            return view('admin.contact')->with('dbs', $db)->with('families', $families);
        } else {
            return redirect(route('admin.login'));
        }
    }
    public function cities()
    {
        $cities = cities::all();
        return view('admin.cities.index')->with('cities', $cities);
    }
    public function city_new()
    {
        return view('admin.cities.new');
    }
    public function city_store(Request $request)
    {
        $cities = new cities;
        $cities->title = $request->title;
        $cities->save();
        Session::flash('message', 'This city has been added');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.cities'));
    }
    public function city_delete($id)
    {
        $cities = cities::find($id);
        $cities->delete();
        Session::flash('message', 'This city has been deleted');
        Session::flash('alert-class', 'alert-danger');
        return back();
    }
    public function categories()
    {
        $categories = categories::all();

        return view('admin.categories.index')->with('categories', $categories);
    }
    public function category_delete($id)
    {
        $cities = categories::find($id);
        $cities->delete();
        Session::flash('message', 'This category has been deleted');
        Session::flash('alert-class', 'alert-danger');
        return back();
    }


    public function category_new()
    {
        return view('admin.categories.new');
    }
    public function category_store(Request $request)
    {
        $cities = new categories();
        $cities->title = $request->title;
        $cities->save();
        Session::flash('message', 'This category has been added');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.category'));
    }
    public function users()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    public function user_delete($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('message', 'This User has been deleted');
        Session::flash('alert-class', 'alert-danger');
        return back();
    }
    public function families()
    {
        $families = families::all();
        return view('admin.families.index')->with('families', $families);
    }
    public function families_active($id)
    {

        $family = families::find($id);
        $family->status = "1";
        $family->update();
        Session::flash('message', 'This Family has been updated');
        Session::flash('alert-class', 'alert-success');
        return back();
    }

    public function families_deactive($id)
    {

        $family = families::find($id);
        $family->status = "0";
        $family->update();
        Session::flash('message', 'This Family has been updated');
        Session::flash('alert-class', 'alert-warning');
        return back();
    }

    public function families_delete($id)
    {

        $family = families::find($id);
        $family->delete();
        Session::flash('message', 'This Family has been deleted');
        Session::flash('alert-class', 'alert-danger');
        return back();
    }
    public function comments()
    {
        $products = products::all();
        $comments = DB::table('comments')->orderByDesc("created_at")->get();
        return view('admin.comments')->with('products', $products)->with('comments', $comments);
    }
    public function comments_delete($id)
    {
        $comment = comments::find($id);
        $comment->delete();
        Session::flash('message', 'This comment has been deleted');
        Session::flash('alert-class', 'alert-danger');
        return back();
    }


    public function logout()
    {

        Auth::guard('admins')->logout();

        return redirect('/');
    }
}
