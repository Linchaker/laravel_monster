@extends('adminlte::page')

@section('title', trans('product.products') )

@section('content_header')
    <h1>@lang('product.products')</h1>
@stop


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{$dataTable->table()}}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    {{$dataTable->scripts()}}
@endpush
