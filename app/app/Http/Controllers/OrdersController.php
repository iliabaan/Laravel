<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function store(Request $request)
    {
        $db = file_get_contents('orders.json');
        $db = json_decode($db, 1);
        if (!isset($db)) {
            $db = [];
        }

        $order['name'] = $request->input('name');
        $order['tel'] = $request->input('tel');
        $order['email'] = $request->input('email');
        $order['order'] = $request->input('order');
        $order['date'] = date('d-m-Y H:m');

        array_push($db, $order);
        $db = json_encode($db);
        file_put_contents('orders.json', $db);
        return back()->withInput();
    }
}
