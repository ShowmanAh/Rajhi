@extends('layouts.dashboard.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="box-header with-border">
                <h3 class="box-title" style="margin-bottom: 20px"> <small> المراكز الطبيه</small></h3>
                <!-- search data -->



            </div><!-- end of box header -->
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> المراكز الطبيه </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">الرئيسية</a>
                                </li>

                                </li>
                                <li class="breadcrumb-item  "><a href="{{route('admin.centers.create')}}">اضافه  مركز طبى</a>
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
                                    <h4 class="card-title"> جميع   المراكز الطبيه </h4>
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
                                        @if ($centers->count() > 0)
                                        <table
                                        class="table display nowrap table-striped table-bordered ">
                                        <thead>
                                        <tr>
                                            <th>#

                                            </th>
                                            <th class = "text-center">اللوجو</th>
                                            <th class = "text-center">اسم المركز</th>

                                            <th class = "text-center">المدينه</th>

                                            <th class = "text-center">المنطقه </th>
                                            <th class = "text-center">العنوان </th>

                                            <th>الإجراءات</th>
                                            <th class = "text-center">عرض</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                       @isset($centers)
                                       @foreach ($centers as $index => $center)
                                          <tr>

                                              <td>{{ $index+1 }}</td>
                                              <td><img src="{{ $center->logo}}" alt="logog" style="width:50px; height:50px;"></td>
                                              <td>{{ $center->name}}</td>
                                              <td>
                                                {{$center->city->name}}
                                            </td>
                                            <td>
                                                {{$center->areas->name}}
                                            </td>
                                              <td>{{ $center->address}}</td>
                                              <td>
                                                  <a href="{{ route('admin.centers.edit', $center->id)}}"
                                                    class="btn btn-outline-primary btn-sm box-shadow-3 mr-1 mb-1">Edit</a>

                                                    <a href="{{ route('admin.centers.destroy', $center->id)}}"  class="btn btn-outline-danger btn-sm box-shadow-3 mr-1 mb-1 delete">Delete</a>

                                              </td>

                                             <td>
                                                <a href="{{ route('admin.centers.show', $center->id)}}" class="btn btn-success btn-sm">عرض</a>
                                             </td>
                                            </tr>
                                              @endforeach

                                       @endisset

                                        </tbody>
                                    </table>
                                    {{ $centers->appends(request()->query())->links() }}

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
