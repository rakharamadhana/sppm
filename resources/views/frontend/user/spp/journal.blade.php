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
                    {{ html()->form('POST', route('frontend.user.spp.journal.filter'))->open() }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Bulan'))->for('month') }}

                                {{ html()->select('month')
                                    ->options($months)
                                    ->class('form-control')
                                    ->placeholder(__('Pilih Bulan'))
                                    ->attribute('maxlength', 191) }}
                            </div><!--form-group-->
                        </div><!--col-->

                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Tahun'))->for('year') }}

                                {{ html()->select('year')
                                    ->options($years)
                                    ->class('form-control')
                                    ->placeholder(__('Pilih Tahun'))
                                    ->attribute('maxlength', 191) }}
                            </div><!--form-group-->
                        </div><!--col-->

                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Status'))->for('status') }}

                                {{ html()->select('status')
                                    ->options($status)
                                    ->class('form-control')
                                    ->placeholder(__('Pilih Status'))
                                    ->attribute('maxlength', 191) }}
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
                        <i class="fas fa-money-check"></i> Status Setoran SPP
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="table-secondary">
                                <th>Waktu Input</th>
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
                                <td>{{ $value->created_at }}</td>
                                <td>{{ $value->code }}</td>
                                <td>{{ $value->year }}</td>
                                <td>{{ $value->month }}</td>
                                <td>Rp. {{ number_format($value->amount) }}</td>
                                <td>
                                    <a href='{{ Storage::url('spp/'.$value->year.'/'.$value->month.'/'.$value->receipt) }}' type="button" class="btn btn-warning badge" download>
                                        <i class="fa fa-download"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href='{{ Storage::url('spp/'.$value->year.'/'.$value->month.'/'.$value->form) }}' type="button" class="btn btn-warning badge" download>
                                        <i class="fa fa-download"></i>
                                    </a>
                                </td>
                                @if ($value->status === 'Pending')
                                    <td><span class="badge badge-primary">{{ $value->status }} <i class="fa fa-spinner"></i></span></td>
                                @elseif ($value->status === 'Accepted')
                                    <td><span class="badge badge-success">{{ $value->status }} <i class="fa fa-check"></i></span></td>
                                @elseif ($value->status === 'Rejected')
                                    <td><span class="badge badge-danger">{{ $value->status }} <i class="fa fa-times"></i></span></td>
                                @endif
                                @if ($value->status === 'Pending')
                                    <td></td>
                                @elseif ($value->status === 'Accepted')
                                    <td>
                                        <a href='#invoice' type="button" class="btn btn-warning badge">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </td>
                                @elseif ($value->status === 'Rejected')
                                    <td></td>
                                @endif

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!--table-responsive-->
                </div><!--card-body-->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->
@endsection
