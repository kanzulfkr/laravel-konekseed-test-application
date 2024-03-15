@extends('layouts.app')

@section('title', 'Edit Busines')

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
            <h1>Edit Business</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Business</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Business</h2>
            <div class="card">
                <form action="{{ route('businesses.update', $businesses) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Edit Business</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Business Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $businesses->name }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Owner</label>
                            <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{$businesses->user->name}}" readonly>
                            <input type="hidden" name="user_id" value="{{ $businesses->user_id }}">
                            <div class="invalid-feedback">
                                @error('officer_id')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-2">
                                <label>Logo</label>
                                <img src="{{ $businesses->logo }}" alt="Logo Bisnis" width="100">
                                </input>
                            </div>
                            <div class="form-group col-10">
                                <input type="text" class="form-control @error('logo') is-invalid @enderror" name="logo" value="{{ $businesses->logo}}">
                                @error('logo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Sector</label>
                            <input type="text" class="form-control @error('sector') is-invalid @enderror" name="sector" value="{{ $businesses->sector }}">
                            @error('sector')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="status" value="Active" class="selectgroup-input" @if ($businesses->status == 'Active') checked @endif>
                                    <span class="selectgroup-button">Active</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="status" value="Deactive" class="selectgroup-input" @if ($businesses->status == 'Deactive') checked @endif>
                                    <span class="selectgroup-button">Deactive</span>
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