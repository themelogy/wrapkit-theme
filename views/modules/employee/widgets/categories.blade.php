@foreach($categories as $category)
  <h3>{{ $category->name }}</h3>
  <table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th>@lang('themes::employee.table.name_surname')</th>
      <th>@lang('themes::employee.table.license_date')</th>
      <th>@lang('themes::employee.table.license_no')</th>
      <th>@lang('themes::employee.table.license_year')</th>
      <th>@lang('themes::employee.table.position')</th>
    </tr>
    </thead>
    <tbody>
      @foreach($category->employees()->orderBy('ordering', 'asc')->get() as $employee)
      <tr>
        <td>{{ $employee->full_name }}</td>
        <td>{{ $employee->license_date->format('d.m.Y') ?? '' }}</td>
        <td>{{ $employee->settings->license_no ?? '' }}</td>
        <td>{{ trans('themes::employee.table.year', ['year' => $employee->experience]) ?? '' }}</td>
        <td>{{ $employee->position }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endforeach