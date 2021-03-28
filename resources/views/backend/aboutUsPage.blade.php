@extends('layouts/admin')
@section('cxtraCss')
<!-- summernote css/js in ABOUTVIEW PAGE -->
<!-- include libraries(jQuery, bootstrap)  -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection

@section('adminContent')

@php
use App\Models\AboutUs;
$about = AboutUs::select('*')->first();
@endphp

@if ($about)

<div class="container">
    <div class="row">
        <div class="col-md-7 offset-3 mt-4">
            <div class="card-body">

                {{-- Toste Start--}}

            <div style="display: none;" id="successTost" class="alert alert-success">Your Ordered Task Is Done Successfully!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
            @if (session("success"))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Toste End--}}

                <form enctype="multipart/form-data" id="updateAboutForm" method="post" action="{{ route('uppAboutUs') }}">
                    @csrf
                    <input type="hidden" name="abtId" id="UpdateabtId" value="{{ $about->auId }}">
                    <div class="form-group">
                        <textarea class="form-control" name="summernote" id="summernote">{{ $about->auText }}</textarea>
                    </div>
                    <div class="form-group ">
                            <label for="curl" class="control-label col-lg-2">Video Link</label>
                            <div class="col-lg-10">
                                <input value="{{ $about->auVlink }}" class="form-control " id="updatecommonVlink" type="text" name="commonVlink">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-2">Previous Image</label>
                            <div class="col-lg-10">
                                <img class="img-circle img-thumbnail" alt="profile-image" src="{{ Storage::url($about->auPho) }}" width="20%">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-2">New Image</label>
                            <div class="col-lg-10">
                                <input class="form-control " id="updatecommonUpImage" type="file" name="commonUpImage">
                            </div>
                        </div>
                    <button type="submit" class="btn btn-success btn-block">Update About</button>
                </form>
                
            </div>
        </div>
    </div>
</div>

@else

<div class="container">
    <div class="row">
        <div class="col-md-7 offset-3 mt-4">
            <div class="card-body">

                <form enctype="multipart/form-data" id="addAboutForm" method="post" action="{{ route('addAboutUs') }}" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="summernote" id="summernote"></textarea>
                    </div>
                    <div class="form-group ">
                            <label for="curl" class="control-label col-lg-2">Video Link</label>
                            <div class="col-lg-10">
                                <input class="form-control " id="commonVlink" type="text" name="commonVlink">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-2">Image</label>
                            <div class="col-lg-10">
                                <input class="form-control " id="commonImage" type="file" name="commonImage">
                            </div>
                        </div>
                    <button type="submit" class="btn btn-success btn-block">Add About</button>
                </form>
                
            </div>
        </div>
    </div>
</div>

@endif

@endsection

@section('extraJS')
<!-- summernote css/js in ABOUTVIEW PAGE -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 400
    });
</script>
<!-- summernote css/js in ABOUTVIEW PAGE -->
@endsection