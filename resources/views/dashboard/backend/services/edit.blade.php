@extends('dashboard.layouts.master')

@section('title')
 Edit Service
@endsection

@section('content')



<div class="card shadow mb-4">
 
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> Service </h6>
        <div class="ml-auto">
            <a href="" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> Service </span> 
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.services.update' , $service->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="row">

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Name in English</span>
                    </label>
                    <input type="text" name="name_en" value="{{ old('name_en' , $service->name_en) }}" class="form-control form-control-solid" placeholder="Enter name" >
                    @error('name_en') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Name in Arabic</span>
                    </label>
                    <input type="text" name="name_ar" value="{{ old('name_ar' ,  $service->name_ar) }}" class="form-control form-control-solid" placeholder="Enter name" >
                    @error('name_ar') <span class="text-danger">{{ $message }}</span>  @enderror
                </div> 

            </div>

            <div class="row">

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Description in English</span>
                    </label>
                    <input type="text" name="desc_en" value="{{ old('desc_en' , $service->desc_en ) }}" class="form-control form-control-solid" placeholder="Enter description" >
                    @error('desc') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">Description in Arabic</span>
                    </label>
                    <input type="text" name="desc_ar" value="{{ old('desc_ar' , $service->desc_ar ) }}" class="form-control form-control-solid" placeholder="Enter description" >
                    @error('desc') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

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
                    <img src="{{ asset('storage/' . $service->img) }}" style="width: 100px" class="img-thumbnail preview-formFile" alt="">
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


     