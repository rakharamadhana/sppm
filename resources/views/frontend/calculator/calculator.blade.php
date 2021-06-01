@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('Kalkulator SPP'))

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-calculator"></i> Kalkulator SPP
                </div>
                <div class="card-body">
                    {{ html()->form('POST', route('frontend.calculator.calculate'))->open() }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Total Penghasilan'))->for('value') }}

                                {{ html()->input('number','value')
                                    ->class('form-control')
                                    ->placeholder('0')
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-0 clearfix">
                                {{ form_submit(__('Hitung')) }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->
                    {{ html()->form()->close() }}
                </div><!--card-body-->
                <div class="card-footer">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="table-primary">
                                <th>Jenis</th>
                                <th>Nominal</th>

                            </tr>
                            </thead>
                            <tbody>
                            <h3>Total Penghasilan: Rp. {{ number_format($value ?? '0') }}</h3>
                            <tr>
                                <th>Iuran Bulanan Pembinaan (IBP)</th>
                                <td>Rp. {{ number_format($result['iwpersonal'] ?? '0') }}</td>
                            </tr>
                            <tr>
                                <th>Iuran Bulanan Kegiatan (IBK)</th>
                                <td>Rp. {{ number_format($result['iwb'] ?? '0') }}</td>

                            </tr>
                            <tr>
                                <th>Iuran Bulanan Sosial (IBS)</th>
                                <td>Rp. {{ number_format($result['danataawun'] ?? '0') }}</td>
                            </tr>
                            <tr>
                                <th>Iuran Bulanan Kompetisi (IBKs)</th>
                                <td>Rp. {{ number_format($result['ibk'] ?? '0') }}</td>
                            </tr>
                            <tr>
                                <th>Zakat Profesi (Zapro)</th>
                                <td>Rp. {{ number_format($result['zakatprofesi'] ?? '0') }}</td>
                            </tr>
                            <tr class="table-success">
                                <th>Total</th>
                                <td>Rp. {{ number_format($result['total'] ?? '0') }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!--table-responsive-->
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
