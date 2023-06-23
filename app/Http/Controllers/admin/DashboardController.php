<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $list_beli_kelas = Subscription::join('users', 'users.id', '=', 'subscription.user_id')
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

        $list_tarik_saldo = Withdrawal::join('wallet', 'wallet.id', '=', 'withdrawal.wallet_id')
        ->join('users', 'users.id', '=', 'wallet.user_id')
        ->select([
            'withdrawal.*',
            'users.name as name',
            'users.email as email',
            ])
        ->get();

        $list_kelas = Classes::join('chapters', 'chapters.class_id', '=', 'classes.id')
        ->join('users', 'users.id', '=', 'classes.user_id')
        ->select([
            'classes.id',
            'classes.user_id', 
            'classes.name',
            'classes.category',
            'users.name as user_name',
            'users.email as email',
            DB::raw('COUNT(chapters.id) as total_chapters')
        ])
            ->groupBy('classes.id', 'classes.user_id', 'classes.name', 'classes.category', 'users.name', 'users.email')
            ->get();

        $list_pengguna = User::join('role', 'role.id', '=', 'users.role_id')
        ->select([
            'users.*',
            'role.name as role_name',
        ])
        ->get();

        return view('admin.pages.dashboard.index', [
            'list_beli_kelas' => $list_beli_kelas,
            'list_tarik_saldo' => $list_tarik_saldo,
            'list_kelas' => $list_kelas,
            'list_pengguna' => $list_pengguna,
        ]);
    }

    public function confirmSubscription($id)
    {
        $subscription = Subscription::find($id);
        $subscription->status = 'paid';

        $subscription->save();

        $tutor_id = Subscription::join('classes', 'classes.id', '=', 'subscription.class_id')
            ->join('users', 'users.id', '=', 'classes.user_id')
            ->where('subscription.id', $subscription->id)->first();

        $increase_balance = Wallet::where('user_id', $tutor_id->id)->first();

        if ($increase_balance) {
            $increase_balance->user_id = $tutor_id->user_id;
            $increase_balance->balance += $tutor_id->price;

            $increase_balance->save();
        } else {
            $increase_balance = new Wallet;
            $increase_balance->user_id = $tutor_id->user_id;
            $increase_balance->balance = $tutor_id->price;

            $increase_balance->save();
        }
        
        return redirect()->route('admin.pages.dashboard.index')->with('success', 'Status konfirmasi berhasil diperbarui');
    }

    public function rejectSubscription($id)
    {

        $subscription = Subscription::find($id);

        if ($subscription) {
            $subscription->delete();
        }

        return redirect()->route('admin.pages.dashboard.index')->with('success', 'Data berhasil ditolak dan dihapus');
    }

    public function confirmTarikSaldo($id)
    {

        $withdrawal = WithDrawal::find($id);
        if ($withdrawal) {
            $withdrawal->status = 'done';
            $withdrawal->save();
        }

        $decrease_balance = Wallet::where('id', $withdrawal->wallet_id)->first();
        if ($decrease_balance) {
            $decrease_balance->balance -= $withdrawal->balance;
            $decrease_balance->save();
        }

        return redirect()->route('admin.pages.dashboard.index')->with('success', 'Status konfirmasi berhasil diperbarui');
    }

    public function rejectTarikSaldo($id)
    {

        $withdrawal = Withdrawal::find($id);

        if ($withdrawal) {
            $withdrawal->delete();
        }

        return redirect()->route('admin.pages.dashboard.index')->with('success', 'Data berhasil ditolak dan dihapus');
    }

    public function deleteKelas($id)
    {

        $delete = Classes::find($id);

        if ($delete) {
            $delete->delete();
        }

        return redirect()->route('admin.pages.dashboard.index')->with('success', 'Data berhasil ditolak dan dihapus');
    }

    public function deletePengguna($id)
    {

        $delete = User::find($id);

        if ($delete) {
            $delete->delete();
        }

        return redirect()->route('admin.pages.dashboard.index')->with('success', 'Data berhasil ditolak dan dihapus');
    }
    
}
