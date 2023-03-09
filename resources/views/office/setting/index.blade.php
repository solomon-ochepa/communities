@extends('office.layouts.master')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Settings') }}</h1>

            @yield('office.setting.breadcrumbs')
        </div>
    </section>

    <div class="row">
        <div class="col-md-3">
            <div class="bg-light card">
                <div class="list-group list-group-flush">
                    <a href="{{ route('office.setting.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('office/setting') ? 'active' : '' }} ">{{ __('setting_menu.site_setting') }}</a>
                    <a href="{{ route('office.setting.sms') }}"
                        class="list-group-item list-group-item-action {{ request()->is('office/setting/sms') ? 'active' : '' }}">{{ __('setting_menu.sms_setting') }}</a>
                    <a href="{{ route('office.setting.fcm') }}"
                        class="list-group-item list-group-item-action {{ request()->is('office/setting/fcm') ? 'active' : '' }}">{{ __('setting_menu.fcm_setting') }}</a>
                    <a href="{{ route('office.setting.email') }}"
                        class="list-group-item list-group-item-action {{ request()->is('office/setting/email') ? 'active' : '' }}">{{ __('setting_menu.email_setting') }}</a>
                    <a href="{{ route('office.setting.notification') }}"
                        class="list-group-item list-group-item-action {{ request()->is('office/setting/notification') ? 'active' : '' }}">{{ __('setting_menu.notification_setting') }}</a>
                    <a href="{{ route('office.setting.email-template') }}"
                        class="list-group-item list-group-item-action {{ request()->is('office/setting/emailtemplate') ? 'active' : '' }}">{{ __('setting_menu.email_sms_template_setting') }}</a>
                    <a href="{{ route('office.setting.homepage') }}"
                        class="list-group-item list-group-item-action {{ request()->is('office/setting/homepage') ? 'active' : '' }}">{{ __('setting_menu.front_end_setting') }}</a>
                    <a href="{{ route('office.setting.whatsapp-message') }}"
                        class="list-group-item list-group-item-action {{ request()->is('office/setting/whatsapp') ? 'active' : '' }}">{{ __('setting_menu.whats_app') }}</a>
                </div>
            </div>
        </div>

        @yield('office.setting.layout')
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('js/setting/create.js') }}"></script>
@endsection
