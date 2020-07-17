@inject('model', 'App\Models\City')
@extends('layouts.dashboard.app')

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('admin.cities')}}"> المدن</a>
                            </li>
                            <li class="breadcrumb-item active"> اضافه  مدينه
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">

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
                            @include('layouts.dashboard.asside.success')

                            <div class="card-content collapse show">
                                {!! Form::model($model, [
                                   'method' => 'post',
                                   'route' => 'admin.cities.store',
                                   'role' => 'form',
                                   'class'=> 'form'
                                ]) !!}
                                <div class="card-body">
                                    @include('layouts.dashboard.asside.errors')
                                    <div class="row">
                                        <div class="form-group col-6">
                                            {!! Form::label('name', 'اسم المدينه') !!}
                                           {!! Form::text('name', old('name'),  ['class'=>'form-control', 'placeholder'=> 'ادخل اسم المدينه']) !!}
                                       </div>
                                    </div>
                                   {!! Form::submit('حفظ', ['class'=> 'btn btn-primary']) !!}

                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>


@endsection
