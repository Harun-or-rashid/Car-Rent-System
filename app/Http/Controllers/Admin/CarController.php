<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\CarType;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /*show car list*/
    public function index()
    {
        $cars = Car::with('category', 'user', 'car_type')->where('status', '1')->get();
        return view('admin.cars.all_cars', compact('cars'));
    }


    /*show add new car form*/
    public function create()
    {
        $categories = Category::all();
        $car_types = CarType::all();
        return view('admin.cars.add_new_car', compact('categories', 'car_types'));
    }


    /*store new car*/
    public function store(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'car_name' => ['required'],
            'category' => ['required'],
            'car_type' => ['required'],
            'num_of_sits' => ['required'],
            'price_per_km' => ['required'],
        ]);

        if ($validateData->fails()) {
            return redirect()->back()->withInput()->withErrors($validateData);
        }

        try {

            $addCar = Car::create([
                'car_no' => $request->car_no,
                'car_name' => $request->car_name,
                'user_id' => Auth::id(),
                'category_id' => $request->category,
                'car_type_id' => $request->car_type,
                'num_of_sits' => $request->num_of_sits,
                'price_per_km' => $request->price_per_km,
                'car_details' => $request->car_details,
            ]);

            if ($addCar == true) {
                if ($request->hasFile('car_image')) {
                    $files = $request->file('car_image');
                    $name = str_random(20) . $addCar->id . '.' . $files->getClientOriginalExtension();
                    $destinationPath = 'assets/uploads/Cars';
                    $url = $destinationPath . "/" . $name;
                    $files->move($destinationPath, $name);
                    Car::where('id', $addCar->id)->update([
                        'image' => $name,
                    ]);
                }

                session()->flash('type', 'success');
                session()->flash('message', 'Successfully added new car....!');

                $cars = Car::with('category', 'user', 'car_type')->where('status', '1')->get();
                return redirect()->route('admin.cars.index', compact('cars'));
            } else {
                session()->flash('type', 'danger');
                session()->flash('message', 'something went wrong to create car. please try again later..');
                return redirect()->back();
            }

        } catch (\Exception $e) {
            session()->flash('type', 'danger');
            session()->flash('message', 'something went wrong to create car. please try again later..' . $e->getMessage());
            return redirect()->back();
        }
    }


    /*show car edit form*/
    public function edit($id)
    {
        $carDetail = Car::where('id', $id)->first();
        if ($carDetail) {
            $categories = Category::all();
            $car_types = CarType::all();
            return view('admin.cars.edit_car', compact('carDetail', 'categories', 'car_types'));

        } else {
            session()->flash('type', 'danger');
            session()->flash('message', 'Unknown car. please try again later..');
            return redirect()->back();
        }
    }


    /*update car*/
    public function update(Request $request, $id)
    {
        $validateData = Validator::make($request->all(), [
            'car_name' => ['required'],
            'category' => ['required'],
            'car_type' => ['required'],
            'num_of_sits' => ['required'],
            'price_per_km' => ['required'],
        ]);

        if ($validateData->fails()) {
            return redirect()->back()->withInput()->withErrors($validateData);
        }

        try {
            $updCar = Car::where('id', $id)->first();
            $addCar = Car::create([
                'car_no' => $request->car_no,
                'car_name' => $request->car_name,
                'user_id' => Auth::id(),
                'category_id' => $request->category,
                'car_type_id' => $request->car_type,
                'num_of_sits' => $request->num_of_sits,
                'price_per_km' => $request->price_per_km,
                'car_details' => $request->car_details,
            ]);

            if ($updCar) {

                $updCar->car_no = $request->car_no;
                $updCar->car_name = $request->car_name;
                $updCar->category_id = $request->category;
                $updCar->car_type_id = $request->car_type;
                $updCar->num_of_sits = $request->num_of_sits;
                $updCar->price_per_km = $request->price_per_km;
                $updCar->car_details = $request->car_details;

                if ($request->hasFile('car_image')) {
                    $files = $request->file('car_image');
                    $name = str_random(20) . $addCar->id . '.' . $files->getClientOriginalExtension();
                    $destinationPath = 'assets/uploads/Cars';
                    $url = $destinationPath . "/" . $name;
                    $files->move($destinationPath, $name);
                    $updCar->image = $name;
                }

                $updCar->save();

                session()->flash('type', 'success');
                session()->flash('message', 'Successfully update car....!');

                $cars = Car::with('category', 'user', 'car_type')->where('status', '1')->get();
                return redirect()->route('admin.cars.index', compact('cars'));
            } else {
                session()->flash('type', 'danger');
                session()->flash('message', 'Unknown car....!');
                return redirect()->back();
            }

        } catch (\Exception $e) {
            session()->flash('type', 'danger');
            session()->flash('message', 'something went wrong to update car. please try again later..' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function delete($id)
    {
        try {

            Car::where('id', $id)->delete();
            session()->flash('type', 'success');
            session()->flash('message', 'Successfully deleted car....!');

            return redirect()->back();

        } catch (\Exception $e) {
            session()->flash('type', 'danger');
            session()->flash('message', 'something went wrong to update car. please try again later..' . $e->getMessage());
            return redirect()->back();
        }
    }
}
