<?php
// app/Http/Controllers/Admin/CheckoutController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller {
    public function index() {
        $checkouts = Checkout::with('destinasi','user')->orderBy('created_at','desc')->paginate(20);
        return view('admin.checkouts.index', compact('checkouts'));
    }

    public function show(Checkout $checkout) {
        return view('admin.checkouts.show', compact('checkout'));
    }

    public function updateStatus(Request $r, Checkout $checkout) {
        $r->validate(['status'=>'required|in:pending,paid,cancelled,done']);
        $checkout->status = $r->status;
        $checkout->save();
        return back()->with('success','Status updated');
    }
}
