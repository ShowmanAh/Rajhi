@extends('layouts.dashboard.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="box-header with-border">
                <h3 class="box-title" style="margin-bottom: 20px"> <small> تخصص فرعى</small></h3>
                <!-- search data -->

            </div><!-- end of box header -->
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> اللغات </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> اللغات
                                </li>
                                <li class="breadcrumb-item  "><a href="{{route('admin.subspecializations.create')}}">اضافه تخصص فرعى</a>
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
                                    <h4 class="card-title"> جميع تخصصات الموقع الفرعيه </h4>
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
                                        @if ($subspecializations->count() > 0)
                                        <table
                                        class="table display nowrap table-striped table-bordered ">
                                        <thead>
                                        <tr>
                                            <th>#

                                            </th>
                                            <th> التخصص الفرعى</th>
                                            <th> التخصص الرئيسى</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                       @isset($subspecializations)
                                       @foreach ($subspecializations as $index => $sub)
                                          <tr>

                                              <td>{{ $index+1 }}</td>
                                              <td>{{ $sub->name}}</td>
                                              <td>{{ $sub->specialization->name}}</td>


                                              <td>
                                                  <a href="{{ route('admin.subspecializations.edit', $sub->id)}}"
                                                    class="btn btn-outline-primary btn-sm box-shadow-3 mr-1 mb-1">Edit</a>

                                                  <a href="{{ route('admin.subspecializations.destroy', $sub->id)}}"  class="btn btn-outline-danger btn-sm box-shadow-3 mr-1 mb-1 delete">Delete</a>
                                              </td>
                                            </tr>
                                              @endforeach

                                       @endisset

                                        </tbody>
                                    </table>
                                    {{ $subspecializations->appends(request()->query())->links() }}

                                    @else
                        <h2>لا يوجد بيانات لعرضها</h2>
                                        @endif

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
