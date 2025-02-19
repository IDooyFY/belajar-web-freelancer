<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Http\Requests\Dashboard\MyOrder\UpdateMyOrderRequest;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\OrderStatus;
use App\Models\Order;
use App\Models\Service;
use App\Models\AdvantageUser;
use App\Models\AdvantageService;
use App\Models\ThumbnailService;
use App\Models\Tagline;

class MyOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('freelancer_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('pages.dashboard.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return abort(404);

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $service = Service::where('id', $order['service_id'])->first();
        $thumbnail = ThumbnailService::where('service_id', $order['service_id'])->get();
        $advantage_service = AdvantageService::where('service_id', $order['service_id'])->get();
        $advantage_user = AdvantageUser::where('service_id', $order['service_id'])->get();
        $tagline = Tagline::where('service_id', $order['service_id'])->get();

        return view('pages.dashboard.order.detail', compact('order', 'thumbnail', 'advantage_service',
        'advantage_user', 'tagline', 'service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('pages.dashboard.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMyOrderRequest $request, Order $order)
    {
        $data = $request->all();

        if(isset($data['file'])){
            $data['file'] = $request->file('file')->store(
                'assets/order/attachment', 'public'
            );
        }

        $order = Order::find($order->id);
        $order->file = $data['file'];
        $order->note = $data['note'];
        $order->save();


        toast()->success('Submit order has been success');
        return redirect()->route('member.order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return abort(404);
    }



    // Custom

    public function accepted($id)
    {
        $order = order::find($id);
        $order->order_status_id = 2;
        $order->save();

        toast()->success('Accept order has been success');
        return back();
    }

    public function rejected($id)
    {
        $order = order::find($id);
        $order->order_status_id = 3;
        $order->save();

        toast()->success('Reject order has been success');
        return back();
    }
}
