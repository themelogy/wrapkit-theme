<div class="box-body">
    <div class="box-body">
        <div class='form-group{{ $errors->has("{$lang}[name]") ? ' has-error' : '' }}'>
            {!! Form::label("{$lang}[name]", trans('employee::categories.form.name')) !!}
            <?php $old = $category->hasTranslation($locale) ? $category->translate($lang)->name : '' ?>
            {!! Form::text("{$lang}[name]", old("{$lang}[name]", $old), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('employee::categories.form.name')]) !!}
            {!! $errors->first("{$lang}[name]", '<span class="help-block">:message</span>') !!}
        </div>
        <div class='form-group{{ $errors->has("{$lang}[slug]") ? ' has-error' : '' }}'>
            {!! Form::label("{$lang}[slug]", trans('employee::categories.form.slug')) !!}
            <?php $old = $category->hasTranslation($locale) ? $category->translate($lang)->slug : '' ?>
            {!! Form::text("{$lang}[slug]", old("{$lang}[slug]", $old), ['class' => 'form-control slug', 'data-slug' => 'target', 'placeholder' => trans('employee::categories.form.slug')]) !!}
            {!! $errors->first("{$lang}[slug]", '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class="box-group" id="accordion">
        <div class="panel box box-primary">
            <div class="box-header">
                <h4 class="box-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-{{$lang}}">
                        {{ trans('employee::categories.title.meta_data') }}
                    </a>
                </h4>
            </div>
            <div style="height: 0px;" id="collapseTwo-{{$lang}}" class="panel-collapse collapse">
                <div class="box-body">
                    {!! Form::i18nInput("meta_title", trans('employee::categories.form.meta_title'), $errors, $lang, $category) !!}

                    {!! Form::i18nTextarea("meta_description", trans('employee::categories.form.meta_description'), $errors, $lang, $category, ['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
