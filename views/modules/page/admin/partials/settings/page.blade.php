<div class="row">
    <fieldset>
        <legend>Sayfa Gösterim Ayarları</legend>
        <div class="col-md-3">
            {!! Form::normalSelect("settings[show_menu]", "Menü göster", $errors, [0=>'Hayır', 1=>'Evet'], isset($page->settings->show_menu) ? $page->settings->show_menu : 0) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalSelect("settings[show_menu_location]", "Menü Gösterim Alanı", $errors, ['left'=>'Sol', 'right'=>'Sağ'], isset($page->settings->show_menu_location) ? $page->settings->show_menu_location : null) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalSelect("settings[full_page]", "Tam Sayfa Göster", $errors, [0=>'Hayır', 1=>'Evet'], isset($page->settings->full_page) ? $page->settings->full_page : 0) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalSelect("settings[show_content]", "İçerik Göster", $errors, [0=>'Hayır', 1=>'Evet'], isset($page->settings->show_content) ? $page->settings->show_content : 0) !!}
        </div>
    </fieldset>
</div>

<div class="row">
    <fieldset>
        <legend>Sayfa Listeleme Ayarları</legend>
        <div class="col-md-3">
            {!! Form::normalSelect("settings[list_page]", "Alt Sayfaları göster", $errors, [0=>'Hayır', 1=>'Evet'], isset($page->settings->list_page) ? $page->settings->list_page : 0) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalSelect("settings[list_per_page]", "Sayfalama", $errors, array(''=>'Seçiniz') + array_combine(range(1, 20, 1), range(1, 20, 1)), isset($page->settings->list_per_page) ? $page->settings->list_per_page : 6) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalSelect("settings[list_type]", "Liste Türü", $errors, ['grid'=>'Grid', 'list'=>'Liste'], isset($page->settings->list_type) ? $page->settings->list_type : 6) !!}
        </div>
        <div class="col-md-3">
            {!! Form::normalSelect("settings[list_grid]", "Grid", $errors, array(''=>'Seçiniz') + array_combine(range(1, 12, 1), range(1, 12, 1)), isset($page->settings->list_grid) ? $page->settings->list_grid : 6) !!}
        </div>
    </fieldset>
</div>

<div class="row">
    <fieldset>
        <legend>İkon Ayarları</legend>
        <div class="col-md-3">
            {!! Form::select("settings[iconmind]", array_combine(config('asgard.theme.config.iconmind'), config('asgard.theme.config.iconmind')), isset($page->settings->iconmind) ? $page->settings->iconmind : '', ['class'=>'selecticon']) !!}
        </div>
    </fieldset>
</div>
<br/>
<div class="row">
    <fieldset>
        <legend>Widget Ayarları</legend>
        <div class="col-md-3">
            {!! Form::checkbox("settings[widget_locations]", 1, old('settings.widget_locations', isset($page->settings->widget_locations) ? $page->settings->widget_locations : 0), ['class'=>'flat-blue']) !!}
            &nbsp; Lokasyonları Göster
        </div>
        <div class="col-md-3">
            {!! Form::checkbox("settings[show_docs]", 1, old('settings.widget_documents', isset($page->settings->show_docs) ? $page->settings->show_docs : 0), ['class'=>'flat-blue']) !!}
            &nbsp; Belgeleri Göster
        </div>
    </fieldset>
</div>

@push('js-stack')
    {!! Asset::setDomain('//') !!}
    {!! Asset::add('themes/wrapkit/vendor/fonticonpicker/jquery.fonticonpicker.min.js') !!}
    {!! Asset::add('themes/wrapkit/vendor/fonticonpicker/css/jquery.fonticonpicker.min.css') !!}
    {!! Asset::add('themes/wrapkit/vendor/fonticonpicker/themes/bootstrap-theme/jquery.fonticonpicker.bootstrap.css') !!}
    {!! Asset::add('themes/wrapkit/fonts/iconmind/iconmind.css') !!}
    {!! Asset::css() !!}
    {!! Asset::js() !!}
    <script>
        jQuery(document).ready(function($) {
            $('.selecticon').fontIconPicker({
                theme: 'fip-bootstrap'
            });
        });
    </script>
@endpush