<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $list_tarik_saldo = Subscription::join('users', 'users.id', '=', 'subscription.user_id')
        ->join('classes', 'classes.id', '=', 'subscription.class_id')
        ->select([
            'subscription.*',
            'users.name as name',
            'users.email as email',
            'users.phone_number as phone_number',
            'classes.price as price',
            DB::raw("CONCAT('storage/photos/', subscription.photo) AS photo")
        ])
        ->get();

        return view('admin.pages.dashboard.index', [
            'list_tarik_saldo' => $list_tarik_saldo
        ]);
    }

    public function confirmSubscription($id)
    {
        $subscription = Subscription::find($id);
        $subscription->status = 'paid';
        $subscription->save();

        return redirect()->route('admin.pages.dashboard.index')->with('success', 'Status konfirmasi berhasil diperbarui');
    }
}
