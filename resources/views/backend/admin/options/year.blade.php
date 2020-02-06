@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('List Tahun') )

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-search"></i> Tambah Tahun
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    {{ html()->form('POST', route('frontend.user.spp.store'))->attribute('enctype','multipart/form-data')->open() }}

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Tahun'))->for('amount') }}

                                {{ html()->input('text','year')
                                    ->class('form-control')
                                    ->placeholder(__('20XX'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    @if(config('access.captcha.contact'))
                        <div class="row">
                            <div class="col">
                                @captcha
                                {{ html()->hidden('captcha_status', 'true') }}
                            </div><!--col-->
                        </div><!--row-->
                    @endif

                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-0 clearfix">
                                {{ form_submit(__('Tambah Data')) }}
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
                        <i class="fas fa-money-check"></i> List Tahun
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="table-responsive-sm table-responsive-md table-responsive-lg">
                        <table class="table">
                            <thead>
                            <tr class="table-secondary">
                                <th>ID</th>
                                <th>Tahun</th>
                                <th>Tanggal Input</th>
                                <th>Tindakan</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($years as $key => $year)
                                <tr>
                                    <td>{{ $year->id}}</td>
                                    <td>{{ $year->year}}</td>
                                    <td>{{ $year->created_at}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href='#edit' type="button" class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href='#delete' type="button" class="btn btn-danger">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div><!--table-responsive-->
                </div><!--card-body-->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->
@endsection
