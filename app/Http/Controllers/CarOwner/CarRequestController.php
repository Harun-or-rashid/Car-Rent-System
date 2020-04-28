<?php

namespace App\Http\Controllers\CarOwner;

use App\Models\Car;
use App\Models\CarRequests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class CarRequestController extends Controller
{
    //
    /*add new car request*/
    public function book_car(Request $request)
    {
        if(Auth::check()){
            $validateData = Validator::make($request->all(), [
                'pickUpLocation' => 'required',
                'car_id' => 'required',
            ]);

            if($validateData->fails()){
                return redirect()->back()->withInput()->withErrors($validateData);
            }

            try{
                $car_owner_id = Car::where('id', $request->car_id)->first();
                if($car_owner_id){
                    CarRequests::create([
                        'car_owner_id' => $car_owner_id->user_id,
                        'car_id' => $request->car_id,
                        'user_id' => Auth::id(),
                        'name' => Auth::user()->name,
                        'email' => Auth::user()->email,
                        'phone' => Auth::user()->phone,
                        'pickup_location' => $request->pickUpLocation,
                        'order_status' => '1',
                        'status' => '1',
                    ]);

                    session()->flash('type', 'success');
                    session()->flash('message', 'successfully order placed. please wait for car owner response......!');
                    return redirect()->back();
                }else{
                    session()->flash('type', 'danger');
                    session()->flash('message', 'something went wrong to place order. please try again......!');
                    return redirect()->back();
                }

            }catch (\Exception $e){
                session()->flash('type', 'danger');
                session()->flash('message', 'something went wrong to place order. please try again......!');
                return redirect()->back();
            }
        }else{
            $validateData = Validator::make($request->all(), [
                'pickUpLocation' => 'required',
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'car_id' => 'required',
            ]);

            if($validateData->fails()){
                return redirect()->back()->withInput()->withErrors($validateData);
            }

            try{
                $car_owner_id = Car::where('id', $request->car_id)->first();
                if($car_owner_id){
                    CarRequests::create([
                        'car_owner_id' => $car_owner_id->user_id,
                        'car_id' => $request->car_id,
                        'user_id' => null,
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'pickup_location' => $request->pickUpLocation,
                        'order_status' => '1',
                        'status' => '1',
                    ]);

                    session()->flash('type', 'success');
                    session()->flash('message', 'successfully order placed. please wait for car owner response......!');
                    return redirect()->back();
                }else{
                    session()->flash('type', 'danger');
                    session()->flash('message', 'something went wrong to place order. please try again......!');
                    return redirect()->back();
                }

            }catch (\Exception $e){
                session()->flash('type', 'danger');
                session()->flash('message', 'something went wrong to place order. please try again......!');
                return redirect()->back();
            }
        }
    }


    /*all car requests*/
    public function all_requests()
    {
        $car_requests = CarRequests::where(['car_owner_id'=>Auth::id()])->orderBy('id', 'desc')->get();
        $type = "All";
        $addClass = 'all_request_menu_class';
        return view('carOwner.car_requests.car_requests', compact('car_requests', 'type', 'addClass'));
    }


    /*pending requests*/
    public function pending_requests()
    {
        $car_requests = CarRequests::where(['car_owner_id'=>Auth::id(), 'order_status'=> '1'])->orderBy('id', 'desc')->get();
        $type = "Pending";
        $addClass = 'pending_request_menu_class';
        return view('carOwner.car_requests.car_requests', compact('car_requests', 'type', 'addClass'));
    }

    /*running requests*/
    public function running_requests()
    {
        $car_requests = CarRequests::where(['car_owner_id'=>Auth::id(), 'order_status'=> '2'])->orderBy('id', 'desc')->get();
        $type = "Running";
        $addClass = 'running_request_menu_class';
        return view('carOwner.car_requests.car_requests', compact('car_requests', 'type', 'addClass'));
    }

    /*completed requests*/
    public function completed_requests()
    {
        $car_requests = CarRequests::where(['car_owner_id'=>Auth::id(), 'order_status'=> '3'])->orderBy('id', 'desc')->get();
        $type = "Completed";
        $addClass = 'completed_request_menu_class';
        return view('carOwner.car_requests.car_requests', compact('car_requests', 'type', 'addClass'));
    }

    /*canceled requests*/
    public function canceled_requests()
    {
        $car_requests = CarRequests::where(['car_owner_id'=>Auth::id(), 'order_status'=> '0'])->orderBy('id', 'desc')->get();
        $type = "Canceled";
        $addClass = 'canceled_request_menu_class';
        return view('carOwner.car_requests.car_requests', compact('car_requests', 'type', 'addClass'));
    }



    /*view car request details*/
    public function view_request_details($id)
    {

        $car_request = CarRequests::where(['car_owner_id'=>Auth::id(), 'id'=> $id])->first();
        if($car_request) {
            return view('carOwner.car_requests.view_order', compact('car_request'));
        }else{
            $car_requests = CarRequests::where(['car_owner_id'=>Auth::id()])->orderBy('id', 'desc')->get();
            $type = "All";
            $addClass = 'all_request_menu_class';
            return redirect()->route('carOwner.car_request.index', compact('car_requests', 'type', 'addClass'));
        }
    }


    /*car request status update*/
    public function update(Request $request, $id)
    {
        try{
            $checkCarReq = CarRequests::where('id', $id)->first();
            if($checkCarReq){
                $checkCarReq->order_status = $request->order_status;
                if($request->order_status=='3'){
                    $checkCarReq->total_distance = $request->total_distance;
                    $total_cost = ($request->total_distance*$checkCarReq->car->price_per_km);
                    $checkCarReq->total_price = $total_cost;
                }

                $checkCarReq->save();

                session()->flash('type', 'success');
                session()->flash('message', 'Successfully updated this request. thanks for work with us. :)');
                return redirect()->back();

            }else{
                session()->flash('type', 'danger');
                session()->flash('message', 'something went wrong to update status. please try again later...!');
                return redirect()->back();
            }
        }
        catch (\Exception $e){
            session()->flash('type', 'danger');
            session()->flash('message', 'something went wrong to update status. please try again later...!');
            return redirect()->back();
        }
    }
}
