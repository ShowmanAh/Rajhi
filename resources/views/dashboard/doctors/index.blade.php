@extends('layouts.dashboard.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="box-header with-border">
                <h3 class="box-title" style="margin-bottom: 20px"> <small> الاطباء</small></h3>
                <!-- search data -->



            </div><!-- end of box header -->
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> اللالاطباءغات </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> الاطباء
                                </li>
                                <li class="breadcrumb-item  "><a href="{{route('admin.doctors.create')}}">اضافه  طبيب</a>
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
                                    <h4 class="card-title"> جميع   الاطباء </h4>
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
                                        @if ($doctors->count() > 0)
                                        <table
                                        class="table display nowrap table-striped table-bordered ">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class = "text-center">الصوره</th>
                                            <th class = "text-center">الإسم</th>

                                            <th class = "text-center">اللقب</th>

                                            <th class = "text-center">التخصص</th>


                                            <th>الإجراءات</th>
                                            <th class = "text-center">عرض</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                       @isset($doctors)
                                       @foreach ($doctors as $index => $doctor)
                                          <tr>

                                              <td>{{ $index+1 }}</td>
                                              <td><img src="{{ $doctor->image}}" alt="" style="width:50px; height:50px;"></td>
                                              <td>{{ $doctor->name}}</td>
                                              <td>{{ $doctor->title}}</td>

                                              <td>{{ $doctor->specialization ? $doctor->specialization->name : ''}}</td>


                                              <td>
                                                  <a href="{{ route('admin.doctors.edit', $doctor->id)}}"
                                                    class="btn btn-outline-primary btn-sm box-shadow-3 mr-1 mb-1">Edit</a>

                                                    <a href="{{ route('admin.doctors.destroy', $doctor->id)}}"  class="btn btn-outline-danger btn-sm box-shadow-3 mr-1 mb-1 delete">Delete</a>

                                              </td>

                                             <td>
                                                <a href="{{ route('admin.doctors.show', $doctor->id)}}" class="btn btn-success btn-sm">عرض</a>
                                             </td>
                                            </tr>
                                              @endforeach

                                       @endisset

                                        </tbody>
                                    </table>
                                    {{ $doctors->appends(request()->query())->links() }}

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
