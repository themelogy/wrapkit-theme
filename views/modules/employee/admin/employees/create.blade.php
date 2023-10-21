@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('employee::employees.title.create employee') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.employee.employee.index') }}">{{ trans('employee::employees.title.employees') }}</a></li>
        <li class="active">{{ trans('employee::employees.title.create employee') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.employee.employee.store'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <div class="col-md-12">
                        {!! Form::normalSelect('category_id', trans('employee::categories.title.categories'), $errors, $categoriesList) !!}
                    </div>
                    <div class="col-md-12">
                        {!! Form::normalSelect('user_id', trans('employee::employees.title.user'), $errors, $usersList) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::normalInput('first_name', trans('employee::employees.form.first_name'), $errors) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::normalInput('last_name', trans('employee::employees.form.last_name'), $errors) !!}
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label("settings.license_no", "Lisans Belge No".':') !!}
                            {!! Form::input('text', 'settings[license_no]', $employee->settings->license_no ?? '', ['class'=>'form-control']) !!}
                            {!! $errors->first("settings.license_no", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group">
                                {!! Form::label("settings[license_date]", "Lisans Tarihi") !!}
                                <div class='input-group date' id='license_date'>
                                    <input type='text' class="form-control" name="settings[license_date]" value="{{ old('settings.license_date') }}" />
                                    <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                                </div>
                                {!! $errors->first("license_date", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group">
                                {!! Form::label("settings[experience_year]", "İç Tescrübesi Başlangıç Yılı") !!}
                                <div class='input-group date' id='experience_year'>
                                    <input type='text' class="form-control" name="settings[experience_year]" value="{{ old('settings.experience_year') }}" />
                                    <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                                </div>
                                {!! $errors->first("experience_year", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('employee::admin.employees.partials.create-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="col-md-12">
                        {!! Form::normalInput('ordering', trans('employee::employees.form.ordering'), $errors) !!}
                    </div>

                    <div class="col-md-12">
                        @mediaSingle('employeeImage', null, null, trans('employee::employees.form.image'))
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.employee.employee.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
{!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).keypressAction({
                actions: [
                    {key: 'b', route: "<?= route('admin.employee.employee.index') ?>"}
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
    <script>
        $(".textarea").wysihtml5();
        //Date picker
        $('#license_date').datetimepicker({
            locale: '<?= App::getLocale() ?>',
            allowInputToggle: true,
            format: 'DD.MM.YYYY'
        });
        $('#experience_year').datetimepicker({
            locale: '<?= App::getLocale() ?>',
            allowInputToggle: true,
            format: 'YYYY',
            viewMode: "years"
        });
    </script>
@endpush
