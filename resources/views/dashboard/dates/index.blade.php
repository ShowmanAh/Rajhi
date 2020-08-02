@extends('layouts.dashboard.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">

                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">@lang('site.dashboard')</a>
                                </li>
                                <li class="breadcrumb-item active"> @lang('site.dates')
                                </li>
                                <li class="breadcrumb-item  "><a href="{{route('admin.dates.create')}}">@lang('site.add')</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">  @lang('site.dates') </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>



                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered ">
                                            <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th> @lang('site.days')</th>

                                                <th> @lang('site.doctor')</th>
                                                <th> @lang('site.clinic')</th>
                                                <th>@lang('site.actions')</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                           @isset($dates)
                                           @foreach ($dates as $index => $date)
                                              <tr>

                                                  <td>{{ $index+1 }}</td>

                                                 <td>
                                                     @foreach ($date->days as $day)
                                                     <span class = "btn btn-success" style = "padding: 4px;border-radius: 5px;">@lang('site.' . $day . 'x')</span>

                                                     @endforeach
                                                    </td>
                                                  <td>{{ $date->doctors->name}}</td>
                                                  <td>{{ $date->clinics->name}}</td>
                                                  <td>
                                                      <a href="{{ route('admin.dates.edit', $date->id)}}"
                                                        class="btn btn-outline-primary btn-sm box-shadow-3 mr-1 mb-1">@lang('site.edit')</a>

                                                      <a href="{{ route('admin.dates.destroy', $date->id)}}"  class="btn btn-outline-danger btn-sm box-shadow-3 mr-1 mb-1 delete">@lang('site.delete')</a>
                                                  </td>
                                                </tr>
                                                  @endforeach

                                           @endisset

                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
