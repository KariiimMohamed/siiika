@extends('dashboard.layouts.master')

@section('title')
 Edit Banners
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

        <form action="{{ route('admin.banners.update' , $banner->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="row">

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Title</span>
                    </label>
                    <input type="text" name="title_en" value="{{ old('name' , $banner->title_en) }}" class="form-control form-control-solid" placeholder="Enter name" >
                    @error('title_en') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>


                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Description</span>
                    </label>
                    <input type="desc_en" name="desc_en" value="{{ old('email' , $banner->desc_en) }}" class="form-control form-control-solid" placeholder="Enter email" >
                    @error('desc_en') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>


             

            </div>

            
            <div class="row">

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">link</span>
                    </label>
                    <input type="text" name="link" value="{{ old('link' , $banner->link) }}" class="form-control form-control-solid" placeholder="Enter password" >
                    @error('link') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container"></div>




            
            </div>

            <div class="row">

                
                <div class="col-md-6 col-12 mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control image" type="file" id="formFile"
                            name="img">

                        @error('img')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                </div>

                <div class="form-group prev">
                    <img src="{{ asset('storage/' . $banner->img) }}" style="width: 100px" class="img-thumbnail preview-formFile" alt="">
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


     