@extends('layouts.master')

@section('content')
    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="page-title">
                <div class="container">
                    <h1>{{ trans('themes::contact.title') }}</h1>
                </div>
            </div>
            <div class="breadcrumbs">
                <div class="container">
                    {!! Breadcrumbs::renderIfExists('contact') !!}
                </div>
            </div>
            <div class="content-wrapper">
                <div class="container">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
                @locations('locations', 20)
            </div>
        </div>
    </div>
@stop
