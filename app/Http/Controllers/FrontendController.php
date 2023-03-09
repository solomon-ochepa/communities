<?php

namespace App\Http\Controllers;

use jwt;
use App\Models\VisitingDetails;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\JwtTokenService;
use App\Models\Visitor;
use Illuminate\Support\Facades\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Notifications\VisitorConfirmation;
use App\Models\User;

class FrontendController extends Controller
{
    public $data = [];
    protected $jwtTokenService;

    public function __construct(JwtTokenService $jwtTokenService)
    {
        $this->data['site-title'] = 'Frontend';
        $this->jwtTokenService = $jwtTokenService;
    }
    public function changeStatus($status, $token)
    {
        try {
            $data =  $this->jwtTokenService->jwtTokenDecode($token);
            if (auth()->user()) {
                $this->jwtTokenService->changeStatus($data->visitorID, $status);
                return redirect()->route('office.dashboard')->withSuccess('The Status Change successfully!');
            } else {
                $result = User::findorFail($data->employee_user_id);
                if ($result) {
                    Auth::login($result);
                    $this->jwtTokenService->changeStatus($data->visitorID, $status);
                    return redirect()->route('office.dashboard')->withSuccess('The Status Change successfully!');
                } else {
                    return redirect()->route('/')->withError('These credentials do not match our records');
                }
            }
        } catch (\Exception $e) {
            //
        }
    }

    public function qrcode($number)
    {
        $visitor = Visitor::select('barcode')->where('phone', $number)->first();

        return view('frontend.check-in.qrcode', compact('visitor'));
    }
}
