<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Calculator\CalculateRequest;

class CalculateController extends Controller
{
    /**
     * @param CalculateRequest $request
     * @return mixed
     */
    public function calculate(CalculateRequest $request)
    {
        $value = $request->input('value');

        $iwb = $value * 0.015;
        $iwpersonal = $value * 0.02;
        $danataawun = $value * 0.005;
        $zakatprofesi = $value * 0.025;
        $total = $iwb + $iwpersonal + $danataawun + $zakatprofesi;

        return view('frontend.index',
            [
                'value' => "Rp. ".number_format($value),
                'iwb' => "Rp. ".number_format($iwb),
                'iwpersonal' => "Rp. ".number_format($iwpersonal),
                'danataawun' => "Rp. ".number_format($danataawun),
                'zakatprofesi' => "Rp. ".number_format($zakatprofesi),
                'total' => "Rp. ".number_format($total),
            ]);

    }
}
