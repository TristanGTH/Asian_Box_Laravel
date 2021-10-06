<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Exceptions\IncompletePayment;

class AbonnementController extends Controller
{
    public function abonnement()
    {
        $user = Auth::user();

        $subscription = DB::table('subscriptions')->where('user_id', $user->id)->first();

        if($subscription){
            $plan = DB::table('plans')->where('stripe_id', $subscription->stripe_price)->first();

            return view('auth.abonnements', ['subscribed' => false, 'subscription' => $subscription, 'plan' => $plan]);
        }else{
            return view('auth.abonnements', ['subscribed' => false, 'subscription' => null, 'plan' => null]);
        }

    }

    public function monthlyAbonnement(Request $request)
    {

        if(Auth::user()->stripe_id !== null){

            $oldSubscription = DB::table('subscriptions')->where('user_id', Auth::user()->id)->first();

            if ($oldSubscription) {
                if ($oldSubscription->stripe_status === 'active')
                    return redirect(route('abonnement'))->withErrors('Vous avez déjà un abonnement en cours !');
            }
        }

        $intent = $request->user()->createSetupIntent();
        $stripeKey = env('STRIPE_KEY');

        return view('auth.monthly-abonnement', compact('intent', 'stripeKey'));
    }


    public function storeMonthly(Request $request)
    {
        return redirect(route('abonnement'));
//        $request->request->add(['plan' => '1']);
//
//        $request->validate([
//            'titulaire' => 'required',
//            'payment_method' => 'required',
//            'plan' => 'required'
//        ]);
//
//        $plan = Plan::find($request->plan);
//
//        try {
//
//            $subscription = $request->user()
//                ->newSubscription('default', $plan->stripe_id)
//                ->create($request->payment_method);
//
//        } catch (IncompletePayment $exception) {
//
//
//            return redirect()->route('cashier.payment', [
//                $exception->payment->id, 'redirect' => route('abonnement')
//            ]);
//
//        }
//
//        $details = [
//            'family_name' => Auth::user()->family_name,
//            'given_name' => Auth::user()->given_name,
//            'email_address' => Auth::user()->email_address,
//            'content_email' => $plan,
//            'objet' => 'Merci de votre abonnement a Asian Box'
//        ];
//
//        \Mail::to(Auth::user()->email_address)->send(new \App\Mail\BuyersConfirmMail($details));
//
//        \Mail::to('admin@asian_box.com')->send(new \App\Mail\AdminBuyersMail($details));
//
//        return redirect(route('abonnement'))->with('success', 'Abonnement souscrit!');
    }


}
