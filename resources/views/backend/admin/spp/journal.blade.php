@extends('backend.layouts.app')

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
                    {{ html()->form('POST', route('admin.spp.journal.filter'))->open() }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Bulan'))->for('group') }}

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
                    <div class="table-responsive-sm table-responsive-lg">
                        <table class="table">
                            <thead>
                            <tr class="table-secondary">
                                <th>User ID</th>
                                <th>Waktu Input</th>
                                <th>Kode</th>
                                <th>Tahun</th>
                                <th>Bulan</th>
                                <th>Jumlah Setoran</th>
                                <th>Bukti Setoran SPP</th>
                                <th>Form SPP</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($journals as $key => $value)
                            <tr>
                                <td>{{ $value->user_id }}</td>
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
                                <td>
                                    <div class="btn-group btn-group" role="group">
                                        <button id="journalActions" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="journalActions">
                                            <a class="dropdown-item bg-primary" href="{{ $value->id }}/pending">
                                                <i class="fas fa-spinner text-white"></i> Pending
                                            </a>
                                            <a class="dropdown-item bg-success" href="{{ $value->id }}/accept">
                                                <i class="fas fa-check text-white"></i> Accept
                                            </a>
                                            <a class="dropdown-item bg-danger" href="{{ $value->id }}/reject">
                                                <i class="fas fa-times text-white"></i> Reject
                                            </a>
                                        </div>
                                    </div>
                                </td>

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
