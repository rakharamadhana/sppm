@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-home"></i> @lang('navs.general.home')
                </div>
                <div class="card-body">
                    @lang('strings.frontend.welcome_to', ['place' => app_name()])
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-calculator"></i> Kalkulator SPP
                </div>
                <div class="card-body">
                    {{ html()->form('POST', route('frontend.calculate'))->open() }}
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
                            <h3>Input: {{ $value ?? '0' }}</h3>
                            <tr>
                                <th>IWB & IWDI</th>
                                <td>{{ $iwb ?? '0' }}</td>

                            </tr>
                            <tr>
                                <th>IW Personal</th>
                                <td>{{ $iwpersonal ?? '0' }}</td>
                            </tr>
                            <tr>
                                <th>Dana Ta'awun</th>
                                <td>{{ $danataawun ?? '0' }}</td>
                            </tr>
                            <tr>
                                <th>Zakat Profesi</th>
                                <td>{{ $zakatprofesi ?? '0' }}</td>
                            </tr>
                            <tr class="table-success">
                                <th>Total</th>
                                <td>{{ $total ?? '0' }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!--table-responsive-->
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
