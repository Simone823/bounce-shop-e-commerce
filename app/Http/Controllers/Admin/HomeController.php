<?php

namespace App\Http\Controllers\Admin;

use App\Chart;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // middleware superadministrator
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {              
        // Auth user
        $user_auth = Auth::user();

        // users by month
        $users = User::select(DB::raw('COUNT(*) AS count'))
            ->whereYear('created_at', Carbon::now()->format('Y'))
            ->groupBy(DB::raw('Month(created_at)'))
            ->pluck('count');

        // months by user
        $months_user = User::select(DB::raw('Month(created_at) AS month'))
            ->whereYear('created_at', Carbon::now()->format('Y'))
            ->groupBy(DB::raw('Month(created_at)'))
            ->pluck('month');

        // users total month
        $users_total_month = array(0,0,0,0,0,0,0,0,0,0,0,0);

        // foreach months
        foreach ($months_user as $key => $month) {
            $users_total_month[$month -1] = $users[$key];
        }

        // Prepare the data for returning with the view
        $user_chart = new Chart();
        $user_chart->labels = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];
        $user_chart->dataset = $users_total_month;
        $user_chart->colours = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet', 'purple', 'pink', 'silver', 'gold', 'brown'];


        // orders by month
        $orders = Order::select(DB::raw('COUNT(*) AS count'))
            ->whereYear('created_at', Carbon::now()->format('Y'))
            ->where('status', '=', 1)
            ->groupBy(DB::raw('Month(created_at)'))
            ->pluck('count');

        // months by orders
        $months_order = Order::select(DB::raw('Month(created_at) AS month'))
            ->whereYear('created_at', Carbon::now()->format('Y'))
            ->where('status', '=', 1)
            ->groupBy(DB::raw('Month(created_at)'))
            ->pluck('month');

        // orders total month
        $orders_total_month = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        // foreach months order
        foreach ($months_order as $key => $month) {
            $orders_total_month[$month -1] = $orders[$key];
        }

        // Prepare the data for returning with the view
        $order_chart = new Chart();
        $order_chart->labels = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];
        $order_chart->dataset = $orders_total_month;
        $order_chart->colours = ['coral', 'gray', 'lightblue', 'chocolate', 'brown', 'crimson', 'lightgreen', 'gold', 'indigo', 'wheat', 'magenta', 'yellowgreen'];


        // return view admin home 
        return view('admin.home', compact('user_auth', 'user_chart', 'order_chart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
