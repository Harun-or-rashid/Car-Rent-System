<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarType;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::take(12)->inRandomOrder()->get();
        $categories = Category::take(6)->get();
        $car_models = Category::all();
        $car_types = CarType::all();
        return view('frontend.index', compact('cars', 'categories', 'car_types', 'car_models'));
    }

    public function search(Request $request)
    {
        if(($request->min_seat!=null) && ($request->max_seat!=null)){
            $cars = Car::where('car_type_id', 'like', '%'.$request->car_type.'%')->where('category_id', 'like', '%'.$request->car_model.'%')->where('num_of_sits', '>=', $request->min_seat)->where('num_of_sits', '<=', $request->max_seat)->paginate(4);
        }elseif ($request->min_seat!=null){
            $cars = Car::where('car_type_id', 'like', '%'.$request->car_type.'%')->where('category_id', 'like', '%'.$request->car_model.'%')->where('num_of_sits', '>=', $request->min_seat)->paginate(4);
        }elseif($request->max_seat!=null){
            $cars = Car::where('car_type_id', 'like', '%'.$request->car_type.'%')->where('category_id', 'like', '%'.$request->car_model.'%')->where('num_of_sits', '<=', $request->max_seat)->paginate(4);
        }else{
            $cars = Car::where('car_type_id', 'like', '%'.$request->car_type.'%')->where('category_id', 'like', '%'.$request->car_model.'%')->paginate(4);
        }
        $car_models = Category::all();
        $car_types = CarType::all();
        return view('frontend.search', compact('cars','request', 'car_types', 'car_models'));
    }

    public function car_details($id)
    {
        $car = Car::where('id',$id)->first();
        if($car) {
            return view('frontend.car_details', compact('car'));
        }else{
            $cars = Car::paginate(4);
            return redirect()->route('home.search', compact('cars'));
        }
    }


    public function contact_us()
    {
        return view('frontend.contact');
    }


    public function message(Request $request)
    {

        $validateData = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'message' => 'required',
        ]);

        if($validateData->fails()){
            return redirect()->back()->withInput()->withErrors($validateData);
        }

        try{
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'message' => $request->message,
            ]);

            session()->flash('type', 'success');
            session()->flash('message', 'Successfully sent message. we will contact you soon');
            return redirect()->back();
        }catch (\Exception $e){
            session()->flash('type', 'danger');
            session()->flash('message', 'Something went wrong to sent message. please try again...!');
            return redirect()->back();
        }
    }

}
