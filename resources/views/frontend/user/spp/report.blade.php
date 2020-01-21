@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('Rekap') )

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-search"></i> Filter
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    {{ html()->form('POST', route('frontend.calculate'))->open() }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Tahun'))->for('year') }}

                                {{ html()->select('year')
                                    ->options($years)
                                    ->class('form-control')
                                    ->placeholder(__('Pilih Tahun'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--form-group-->
                        </div><!--col-->

                        <div class="col mt-4">
                            <div class="form-group">
                                {{ html()->button('Cari','submit')
                                    ->class('btn btn-lg btn-block btn-success') }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->
                    {{ html()->form()->close() }}
                </div><!--card-body-->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->

    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-tachometer-alt"></i> Rekap Setoran SPP
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="table-primary">
                                <th>Jenis</th>
                                <th>Nominal</th>

                            </tr>
                            </thead>
                            <tbody>
                            <h3>Total Penghasilan: {{ $value ?? '0' }}</h3>
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
                </div><!--card-body-->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->
@endsection
