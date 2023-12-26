@extends('dashboard.layouts.master')

@section('title')
 ADD Banners
@endsection

@section('content')



<div class="card shadow mb-4">
 
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> Banners </h6>
        <div class="ml-auto">
            <a href="" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> Banners </span> 
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.banners.store') }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Title in English</span>
                    </label>
                    <input type="text" name="title_en" value="{{ old('title_en') }}" class="form-control form-control-solid" placeholder="Enter name" >
                    @error('title_en') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Title in Arabic</span>
                    </label>
                    <input type="text" name="title_ar" value="{{ old('title_ar') }}" class="form-control form-control-solid" placeholder="Enter name" >
                    @error('title_ar') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>


                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Description in English</span>
                    </label>
                    <input type="text" name="desc_en" value="{{ old('desc_en') }}" class="form-control form-control-solid" placeholder="Enter email" >
                    @error('desc_en') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Description in Arabic</span>
                    </label>
                    <input type="text" name="desc_ar" value="{{ old('desc_ar') }}" class="form-control form-control-solid" placeholder="Enter email" >
                    @error('desc_ar') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>


             

            </div>

            
            <div class="row">

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">link</span>
                    </label>
                    <input type="text" name="link" value="{{ old('link') }}" class="form-control form-control-solid" placeholder="Enter password" >
                    @error('link') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container"></div>




            
            </div>

            <div class="row">

                
                <div class="col-md-6 col-12 mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control image" type="file" id="formFile"
                            name="img" required>

                        @error('img')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                </div>

                <div class="form-group prev">
                    <img src="" style="width: 100px" class="img-thumbnail preview-formFile" alt="">
                </div>


            </div>

          

            <div class="text-center pt-15">
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">Please wait...</span>
                </button>
            </div>

        </form>

    </div>

</div>


@endsection


@section('js')
<script src="{{ asset('dashboard/assets/js/preview-image.js')}}"></script>
@endsection


     