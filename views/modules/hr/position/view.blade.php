@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumb'=>'hr.position.view'])
    {{ $position->name }} - {{ $position->reference_no }}
    @endcomponent

    <section class="section-padding md-p-top-bot-50 section-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Rererans No : {{ $position->reference_no }}</h2><br/>
                    <div class="card">
                        <h4 class="card-title">{{ trans('hr::positions.form.qualification') }}</h4>
                        <div class="card-body">
                            {!! $position->qualification !!}
                        </div>
                    </div>
                    <div class="card">
                        <h4 class="card-title">{{ trans('hr::positions.form.job_description') }}</h4>
                        <div class="card-body">
                            {!! $position->job_description !!}
                        </div>
                    </div>
                    <div class="card">
                        <h4 class="card-title">{{ trans('hr::positions.title.personal_criteria') }}</h4>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>{{ trans('hr::positions.form.criteria.experience') }}</th>
                                    <td>{{ $position->present()->criteria('experience') }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('hr::positions.form.criteria.military') }}</th>
                                    <td>{{ $position->present()->criteria('military') }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('hr::positions.form.criteria.education') }}</th>
                                    <td>{{ $position->present()->criteria('education') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <h4 class="card-title">{{ trans('hr::positions.title.position_information') }}</h4>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>{{ trans('hr::positions.form.personal_number') }}</th>
                                    <td>{{ $position->personal_number }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('hr::positions.form.position.level') }}</th>
                                    <td>{{ $position->present()->position('level') }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('hr::positions.form.position.worktime') }}</th>
                                    <td>{{ $position->present()->position('worktime') }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('hr::positions.form.position.department') }}</th>
                                    <td>{{ $position->present()->position('department') }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('hr::positions.form.position.city') }}</th>
                                    <td>{{ $position->present()->position('city') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a class="btn btn-primary waves-effect waves-light" href="{{ route('hr.application.form', ['position_id'=>$position->id]) }}">Başvuru Yap</a>
                </div>
            </div>
        </div>
    </section>
@endsection