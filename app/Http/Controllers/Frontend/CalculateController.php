<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Calculator\CalculateRequest;

class CalculateController extends Controller
{
    public $nishab = 7000000;

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.calculator.calculator');
    }

    /**
     * @param CalculateRequest $request
     * @return mixed
     */
    public function calculate(CalculateRequest $request)
    {
        $value = $request->input('value');

        $result['iwb'] = $this->countIwb($value);
        $result['iwpersonal'] = $this->countIwpersonal($value);
        $result['danataawun'] = $this->countDanaTaawun($value);
        $result['ibk'] = $this->countIuranBulananKompetisi($value);
        $result['zakatprofesi'] = $this->countZakatProfesi($value);
        $result['total'] = $this->sumTotal($result['iwb'],$result['iwpersonal'],$result['danataawun'],$result['ibk'],$result['zakatprofesi']);

        return view('frontend.calculator.calculator', ['value'=>$value, 'result' => $result]);
    }

    public function countIwb(float $amount) { #IuranBulananKegiatan
        if($amount >= 3000000){
            return $amount * 0.015;
        }else{
            return 15000;
        }
    }

    public function countIwpersonal(float $amount) { #IuranBulananPembinaan
        if($amount >= 3000000){
            return $amount * 0.02;
        }else{
            return 0;
        }
    }

    public function countDanaTaawun(float $amount) { #IuranBulananSosial
        if($amount >= 3000000){
            return $amount * 0.005; //
        }else{
            return 0;
        }
    }

    public function countIuranBulananKompetisi (float $amount) { #IuranBulananKompetisi
        if($amount >= 3000000){
            return $amount * 0.005; //
        }else{
            return 0;
        }
    }

    public function countZakatProfesi(float $amount) { #Zakat Profesi (Zapro)
        if($amount >= $this->nishab){
            return $amount * 0.025;
        }else{
            return 0;
        }

    }

    private function sumTotal(float $a, float $b, float $c, float $d, float $e)
    {
        return $a + $b + $c + $d + $e;
    }
}
