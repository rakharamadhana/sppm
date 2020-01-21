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

        $result['iwb'] = $this->countIwb($value);
        $result['iwpersonal'] = $this->countIwpersonal($value);;
        $result['danataawun'] = $this->countDanaTaawun($value);
        $result['zakatprofesi'] = $this->countZakatProfesi($value);
        $result['total'] = $this->sumTotal($result['iwb'],$result['iwpersonal'],$result['danataawun'],$result['zakatprofesi']);

        return view('frontend.index', ['value'=>$value, 'result' => $result]);
    }

    public function countIwb(float $amount) {
        return $amount * 0.015;
    }

    public function countIwpersonal(float $amount) {
        return $amount * 0.02;
    }

    public function countDanaTaawun(float $amount) {
        return $amount * 0.005;
    }

    public function countZakatProfesi(float $amount) {
        return $amount * 0.025;
    }

    private function sumTotal(float $a, float $b, float $c, float $d)
    {
        return $a + $b + $c + $d;
    }
}
