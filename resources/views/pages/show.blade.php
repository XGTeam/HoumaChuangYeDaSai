@extends('layouts.default')

@section('title')
{{ $page->title }}
@stop

@section('content')
@if (Config::get('cms.eval', false))
<?php eval('?>'.$page->body); ?>
@else
{!! $page->body !!}
@endif
@stop

@section('css')
{!! $page->css !!}
@stop

@section('js')
{!! $page->js !!}
@stop
