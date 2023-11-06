@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@section('auth_header', __('Первоначальные настройки'))

@section('auth_body')
    <form id="site_settings" action="{{ route('admin.site-settings.store') }}" method="post">
        @csrf

        {{-- Email field --}}
        <div class="input-group mb-3">
            <select name="site_type" id="site_type" class="form-control @error('site_type') is-invalid @enderror" required>
                <option value="multi_domain">Мульти доменный</option>
                <option value="multi_language">Мульти язычный</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <input name="name" id="name" type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Наименование сайта" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input name="locale_name" id="locale_name" type="text" value="{{ request()->getHost() }}" class="form-control @error('name') is-invalid @enderror" placeholder="Доменное имя" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input name="code" id="code" type="text" value="" class="form-control @error('code') is-invalid @enderror" placeholder="Машинное имя (kz_KZ)" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
        </div>

        {{-- Login field --}}
        <div class="row">
            <div class="col-5">
                <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                    <span class="fas fa-sign-in-alt"></span>
                    {{ __('Далее') }}
                </button>
            </div>
        </div>

    </form>
@stop
