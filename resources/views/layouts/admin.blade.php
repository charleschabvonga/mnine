@extends('layouts.app')

@include('partials.menu')
<div class="c-wrapper">
    <header class="c-header c-header-fixed px-3">
        <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
            <i class="fas fa-fw fa-bars"></i>
        </button>
        <button class="c-header-toggler mfs-3 d-md-down-none" type="button" responsive="true">
            <i class="fas fa-fw fa-bars"></i>
        </button>
        <ul class="c-header-nav ml-auto">
            @if(count(config('panel.available_languages', [])) > 1)
            <li class="c-header-nav-item dropdown d-md-down-none">
                <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    {{ strtoupper(app()->getLocale()) }}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    @foreach(config('panel.available_languages') as $langLocale => $langName)
                    <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                    @endforeach
                </div>
            </li>
            @endif
        </ul>
    </header>
    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                @yield('admin')
            </div>
        </main>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</div>