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
                    {{ html()->form('POST', route('frontend.user.spp.report.filter'))->open() }}
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
                        <i class="fas fa-money-check"></i> Rekap Setoran SPP
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="table-secondary">
                                <th>Bulan</th>
                                <th>Jumlah Setoran</th>
                                <th>Bukti Setoran</th>
                                <th>Form Rekap</th>
                                <th>Download Tanda Terima</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($months as $key => $month)
                                <tr>
                                    <td>{{ $month ?? 'Januari'}}</td>
                                    <td>Rp. {{ number_format($journals[$month] ?? '0') }}</td>
                                    <td>
                                        <a href='report/download/{{ date('Y') }}/{{ $month }}' type="button" class="btn btn-warning badge">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='#forms' type="button" class="btn btn-warning badge">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='#invoices' type="button" class="btn btn-warning badge">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="table-success">
                                <th>Total Setoran</th>
                                <th>Rp. {{ number_format($total ?? 0) }}</th>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!--table-responsive-->
                </div><!--card-body-->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->
@endsection
