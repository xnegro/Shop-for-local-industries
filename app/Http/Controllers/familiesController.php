<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\cities;
use App\Models\contact;
use App\Models\families;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\products;
use App\Models\requests;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class familiesController extends Controller
{

    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images/products'), $imageName);

        return response()->json($imageName);
    }


    public function index()
    {
        if (Auth::guard('families')->check()) {

            $requests = DB::table('requests')->where('family_id', '=', auth()->guard('families')->user()->id)->orderByDesc('created_at')->get();
            $products_count = DB::table('products')->where('family_id', '=', auth()->guard('families')->user()->id)->count();
            $requests_count = DB::table('requests')->where('family_id', '=', auth()->guard('families')->user()->id)->count();
            $contacts_count = DB::table('contacts')->where('family_id', '=', auth()->guard('families')->user()->id)->count();
            return view('families.index')->with('products_count', $products_count)->with('requests_count', $requests_count)->with('contacts_count', $contacts_count)->with('requests', $requests);
        } else {
            return redirect(route('family.login'));
        }
    }
    public function register()
    {
        $city = cities::all();
        $category = categories::all();
        return view('auth.family_register')->with('cates', $category)->with('cities', $city);
    }

    public function login()
    {
        return view('auth.family_login');
    }
    public function register_save(Request $request)
    {
        $request->validate([
            'name'         =>   'required',
            'email'        =>   'required|email|unique:families',
            'password'     =>   'required|min:6',
            'phone'     =>   'required',
            'city'     =>   'required',
            'category'     =>   'required',
        ]);

        $data = $request->all();

        DB::table('families')->insert([
            'name'  =>  $data['name'],
            'email' =>  $data['email'],
            'phone' =>  $data['phone'],
            'city' =>  $data['city'],
            'category' =>  $data['category'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect('family/login')->with('status', 'Registration Completed, now you can login');
    }


    function family_validate_login(Request $request)
    {
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('families')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            $this->middleware('auth:families');

            // return "s";
            return redirect('family/panel');
        }

        return redirect('family/login')->with('status', 'Login details are not valid');
    }
    public function orders_index($id)
    {
        $users = User::all();
        $products = products::all();
        $id = requests::find($id);
        return view('families.orders.index')->with('id', $id)->with('users', $users)->with('products', $products);
    }

    public function orders_completed($id)
    {
        $id = requests::find($id);
        $id->status = "successful";
        $id->update();
        Session::flash('message', 'The order has been updated');
        Session::flash('alert-class', 'alert-success');

        return redirect('/family/panel');
    }


    public function orders_cancel($id)
    {
        $id = requests::find($id);
        $id->status = "canceled";
        $id->update();
        Session::flash('message', 'The order has been canceled');
        Session::flash('alert-class', 'alert-warning');

        return redirect('/family/panel');
    }

    public function orders_delete($id)
    {
        $id = requests::find($id);
        $id->delete();
        Session::flash('message', 'The order has been deleted');
        Session::flash('alert-class', 'alert-danger');

        return redirect('/family/panel');
    }

    public function products_all()
    {
        if (Auth::guard('families')->check()) {

            $products = DB::table('products')->where('family_id', '=', auth()->guard('families')->user()->id)->get();

            return view('families.products.index')->with('products', $products);
        } else {
            return redirect(route('family.login'));
        }
    }
    public function products_new()
    {
                $category = categories::all();
        return view('families.products.new')->with('cates', $category);
    }
    public function products_store(Request $request)
    {

        $request->validate([
            'description'         =>   'required',
            'title'         =>   'required',
            'price'         =>   'required',
            'amount'         =>   'required',
        ]);
        $product = new products;
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

            // $product->img =  '/images/products' . $request->img;

            $product->img =  '/public/images/products/' . $request->img;
        }
        $product->amount = $request->amount;
        $product->family_id = auth()->guard('families')->user()->id;
        $product->save();
        Session::flash('message', 'The product has been added');
        Session::flash('alert-class', 'alert-success');

        return redirect(route('family.proud.all'));
    }
    public function product_edit($id)
    {
        $category = categories::all();
        $product = products::find($id);
        return view('families.products.edit')->with('id', $product)->with('cates', $category);
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
        $product->family_id = auth()->guard('families')->user()->id;
        $product->update();
        Session::flash('message', 'The product has been updated');
        Session::flash('alert-class', 'alert-success');

        return redirect(route('family.proud.all'));
    }

    public function product_delete($id)
    {
        $product = products::find($id);
        $product->delete();
        Session::flash('message', 'The product has been deleted');
        Session::flash('alert-class', 'alert-danger');

        return back();
    }
    public function settings()
    {
        $categories=categories::all();
        $cities = cities::all();

        $id = Auth::guard('families')->check();
        return view('families.profile.settings')->with('id', $id)->with('categories', $categories)->with('cities', $cities);
    }
    public function settings_info_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'category' => 'required',
        ]);
        $family = families::find(auth()->guard('families')->user()->id);
        $family->name = $request->name;
        $family->email = $request->email;
        $family->phone = $request->phone;
        $family->city = $request->city;
        $family->category = $request->category;

        if ($request->image != null) {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('images/avatars'), $imageName);
            $family->photo = '/public/images/avatars/' . $imageName;
        }
        $family->update();
        Session::flash('message', 'the information was successfully updated.');
        Session::flash('alert-class', 'alert-success');
        return back();
    }
    public function settings_pass_update(Request $request)
    {
        $family = families::find(auth()->guard('families')->user()->id);
        $family->password = Hash::make($request->password);
        $family->update();
        Session::flash('message', 'the information was successfully updated.');
        Session::flash('alert-class', 'alert-success');
        return back();
    }
    public function contacts()
    {
        if (Auth::guard('families')->check()) {

            $db = DB::table('contacts')->where('family_id', '=', auth()->guard('families')->user()->id)->orderByDesc("created_at")->get();
            return view('families.contact')->with('dbs', $db);
        } else {
            return redirect(route('family.login'));
        }
    }
    public function contacts_replay($id, Request $request)
    {
        $replay = contact::find($id);
        $replay->status = 1;
        $replay->replay = $request->replay;
        $replay->update();
        Session::flash('message', 'replay was sent successfully.');
        Session::flash('alert-class', 'alert-success');
        return back();
    }


    public function logout()
    {

        Auth::guard('families')->logout();

        return redirect('/');
    }
}
