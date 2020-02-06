@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('Setoran') )

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-money-bill"></i> Setoran SPP
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    {{ html()->form('POST', route('frontend.user.spp.store'))->attribute('enctype','multipart/form-data')->open() }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Jenis Kelamin'))->for('gender') }}

                                {{ html()->select('gender')
                                    ->options($genders)
                                    ->class('form-control')
                                    ->placeholder(__('Pilih Jenis Kelamin'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Kode Kelompok'))->for('group') }}

                                {{ html()->select('group')
                                    ->options($groups)
                                    ->class('form-control')
                                    ->placeholder(__('Pilih Kode Kelompok'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Tahun Pembayaran'))->for('year') }}

                                {{ html()->select('year')
                                    ->options($years)
                                    ->class('form-control')
                                    ->placeholder(__('Pilih Tahun Pembayaran'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Bulan Pembayaran'))->for('group') }}

                                {{ html()->select('month')
                                    ->options($months)
                                    ->class('form-control')
                                    ->placeholder(__('Pilih Bulan Pembayaran'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Jumlah yang Dibayarkan'))->for('amount') }}

                                {{ html()->input('number','amount')
                                    ->class('form-control')
                                    ->placeholder(__('0'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Bukti Pembayaran'))->for('receipt') }}

                                {{ html()->input('file','receipt')
                                    ->class('form-control-file') }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('Form Rekap SPP'))->for('form') }}

                                {{ html()->input('file','form')
                                    ->class('form-control-file') }}
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
                                {{ form_submit(__('Kirim Data')) }}
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->
                    {{ html()->form()->close() }}
                </div><!--card-body-->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->
@endsection
