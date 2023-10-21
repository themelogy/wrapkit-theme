@if(@$page->settings->widget_employees)
    @employeeCategories()
@endif

@if(@$page->settings->widget_locations)
    @locations('page')
@endif