@extends('layouts.app')

@section('title', 'Input Targets')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Input Targets</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Targets</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Targets</h2>
            <div class="card">
                <form action="{{ route('targets.store') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h4>Input Text</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Targets Name</label>
                            <input type="text" class="form-control @error('name')
                                is-invalid
                            @enderror" name="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Business</label>
                            <select class="form-control select2 @error('business_id') is-invalid @enderror" name="business_id">
                                <option value="">Choose Business</option>
                                @foreach ($business as $business)
                                <option value="{{ $business->id }}">{{ $business->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                @error('business_id')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Product</label>
                            <select class="form-control select2 @error('product_id') is-invalid @enderror" name="product_id">
                                <option value="">Choose Product</option>
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                @error('product_id')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="category" value="Quantitative" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button">Quantitative</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="category" value="Qualitative" class="selectgroup-input">
                                    <span class="selectgroup-button">Qualitative</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Weight</label>
                            <input type="text" class="form-control @error('weight')
                                is-invalid
                            @enderror" name="weight">
                            @error('weight')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" class="form-control @error('start_date')
                                is-invalid
                            @enderror" name="start_date">
                            @error('start_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="date" class="form-control @error('end_date')
                                is-invalid
                            @enderror" name="end_date">
                            @error('end_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="status" value="To do" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button">To Do</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="status" value="In progress" class="selectgroup-input">
                                    <span class="selectgroup-button">In Progress</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="status" value="Done" class="selectgroup-input">
                                    <span class="selectgroup-button">Done</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
@push('scripts')
@endpush