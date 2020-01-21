@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('Status') )

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
                                {{ html()->label(__('Bulan'))->for('month') }}

                                {{ html()->select('month')
                                    ->options($months)
                                    ->class('form-control')
                                    ->placeholder(__('Pilih Bulan'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--form-group-->
                        </div><!--col-->

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

                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Status'))->for('status') }}

                                {{ html()->select('status')
                                    ->options('Diterima')
                                    ->options('Ditolak')
                                    ->options('Pending')
                                    ->class('form-control')
                                    ->placeholder(__('Pilih Status'))
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
                                <th>ID</th>
                                <th>Kode</th>
                                <th>Tahun</th>
                                <th>Bulan</th>
                                <th>Jumlah Setoran</th>
                                <th>Bukti Setoran SPP</th>
                                <th>Form SPP</th>
                                <th>Status</th>
                                <th>Invoice</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($journals as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->code }}</td>
                                <td>{{ $value->year }}</td>
                                <td>{{ $value->month }}</td>
                                <td>Rp. {{ number_format($value->amount) }}</td>
                                <td>{{ $value->receipt }}</td>
                                <td>{{ $value->form }}</td>

                                <td><span class="badge badge-primary">{{ $value->status }}</span></td>
                                <td></td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="table-success">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Rp. {{ number_format($total) }}</td>
                                <td></td>
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
