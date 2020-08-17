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
                                <li class="breadcrumb-item active"> @lang('site.clinics')
                                </li>
                                <li class="breadcrumb-item  "><a href="{{route('admin.clinics.create')}}">@lang('site.add')</a>
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
                                    <h4 class="card-title">  @lang('site.clinics') </h4>
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
                                    <div class="card-body  table-responsive">
                                        <table
                                            class="table display nowrap table-striped table-bordered ">
                                            <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th class="text-center"> @lang('site.name')</th>
                                                <th class="text-center"> @lang('site.center')</th>
                                                <th class="text-center"> @lang('site.city')</th>
                                                <th class="text-center"> @lang('site.area')</th>
                                                <th class="text-center"> @lang('site.phone')</th>
                                                <th class="text-center"> @lang('site.address')</th>
                                                <th class="text-center"> @lang('site.waiting_time')</th>
                                                <th class="text-center"> @lang('site.doctor')</th>
                                                <th class="text-center">@lang('site.actions')</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                           @isset($clinics)
                                           @foreach ($clinics as $index => $clinic)
                                              <tr>

                                                  <td>{{ $index+1 }}</td>
                                                  <td>{{ $clinic->name}}</td>
                                                  <td>
                                                      {{ $clinic->type==1 && $clinic->centers ? $clinic->centers->name : ''}}
                                                    </td>
                                                    <td>{{ $clinic->areas ? $clinic->areas->city->name : ''}}</td>
                                                    <td>{{ $clinic->areas ? $clinic->areas->name : ''}}</td>
                                                    <td>{{ $clinic->phone}}</td>
                                                    <td>{{ $clinic->address}}</td>
                                                    <td>{{ $clinic->waiting_time}} min</td>
                                                    <td><span class="btn btn-success btn-sm" style="border-radius: 4px;padding: 2px;margin: 5px 0 ;">
                                                        {{ $clinic->doctors ? $clinic->doctors->name : ''}}
                                                        </span></td>
                                                  <td>
                                                      <a href="{{ route('admin.clinics.edit', $clinic->id)}}"
                                                        class="btn btn-outline-primary btn-sm box-shadow-3 mr-1 mb-1">@lang('site.edit')</a>

                                                      <a href="{{ route('admin.clinics.destroy', $clinic->id)}}"  class="btn btn-outline-danger btn-sm box-shadow-3 mr-1 mb-1 delete">@lang('site.delete')</a>
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
