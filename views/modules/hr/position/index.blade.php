@extends('layouts.master')

@section('content')
    <div id="main-wrapper">
        <div class="page-wrapper">
            @component('partials.components.title', ['breadcrumbs'=>'hr.position.index'])
                <h1 class="title">    {{ trans_choice('hr::positions.title.positions',1) }}</h1>
            @endcomponent
            <div class="container">
                <div class="content-wrapper">
                    @if($page = Page::findBySlug('kariyer'))
                        {!! $page->body !!}
                    @endif

                        <hr/>

                    @if($positions->count()>0)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('hr::positions.form.reference_no') }}</th>
                            <th>{{ trans('hr::positions.form.name') }}</th>
                            <th>{{ trans('hr::positions.form.personal_number') }}</th>
                            <th>{{ trans('hr::positions.form.position.city') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($positions as $position)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $position->reference_no }}</td>
                                <td>{{ $position->name }}</td>
                                <td>{{ $position->personal_number }}</td>
                                <td>{{ $position->present()->position('city') }}</td>
                                <td><a class="btn btn-primary btn-sm waves-effect waves-light" href="{{ route('hr.position.view', [$position->slug]) }}">İncele</a>  <a class="btn btn-primary btn-sm waves-effect waves-light" href="{{ route('hr.application.form', ['position_id'=>$position->id]) }}">Başvuru Yap</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="alert alert-warning">Açık pozisyon bulunamadı.</div>
                        <a class="btn btn-themecolor" href="{{ LaravelLocalization::getLocalizedURL(locale(), route('hr.application.form')) }}">İş başvuru formu için tıklayınız.</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection