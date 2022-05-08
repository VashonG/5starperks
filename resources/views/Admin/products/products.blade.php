@extends('admin.layouts.master')
@section('title', 'Products')
@section('style')
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-user.css')}}">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-wizard.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/pickadate/pickadate.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
<style>
   @media (min-width: 576px){
   .modal-dialog {
   max-width: 900px !important;
   margin: 6.75rem auto !important;
   }
   }
   .bs-stepper{
   box-shadow:none !important;
   }
</style>
@endsection
@section('content')
<div class="content-wrapper container-xxl p-0">
   <div class="content-header row">
   </div>
   <div class="content-body">
   <section id="default-breadcrumb">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Products</h4>
                        </div>
                        <div class="card-body">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Products</a></li>

                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="col-md-12" style=" text-align: end; ">
             <a style="margin: 0px 18px 15px;" href="/addProduct"  style="margin: 18px 15px;float: right;" class="btn btn-primary">Add Product</a>
        </div>
        <div class="row match-height">
        @foreach($products as $product)
        <div class="col-md-6 col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="{{ $product->image }}" alt="Card image cap" />
                    <div class="card-body">
                        <div class="card-img-overlay">
                            <button class="btn btn-outline-danger text-nowrap px-1 waves-effect" style="float: right;" product_id="{{ $product->id}}"  onclick="deleteProduct(<?=  $product->id; ?>)" type="button">
                                <i data-feather='trash-2'></i>
                            </button>
                        </div>
                    @if (!empty($product->scheduled_at) && $product->scheduled_at > now())
                        <div style="float:right;" class="bg-info-gradient d-flex">
                             <i style="margin-right: 10px; height: 1.4rem; color: #1aeaff; width: 2rem;" data-feather='clock'></i>
                             <p class="card-text text-dark">{{  date("d-m-Y", strtotime($product->scheduled_at)); }}</p>

                        </div>
                            @else
                            <p class="card-text text-white"></p>
                            @endif
                        <h4 class="card-title">{{ $product->title }}</h4>
                        <p class="card-text">
                        {{ $product->description }}
                        </p>
                        <a href="{{ $product->link }}" target="blank" class="btn btn-outline-primary">Visit Website</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/app-user-edit.js"></script>
    <script src="../../../app-assets/js/scripts/components/components-navs.js"></script>
    <!-- END: Page JS-->

<script>
function deleteProduct(id) {
    if (confirm("Are You sure want to Delete Product ! ")) {
        $.ajax({
            url: "vewProducts/" + id,
            type: "DELETE",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.error_message) {
                    Toast.fire({
                        icon: 'error',
                        title: 'An error has been occured! Please Contact Administrator.'
                    })

                } else {


                    Toast.fire({
                        icon: "success",
                        title: "Product is successfully deleted !"
                    })
                    location.reload();
                }
            }
        });
    }
}
</script>

@endsection
