@extends('admin.layouts.master')
@section('title', 'Customers')
@section('style')
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-user.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                   <section class="app-user-view">
                        <!-- User Card & Plan Starts -->
                        <div class="row">
                            <!-- User Card starts-->
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <div class="card user-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                                <div class="user-avatar-section">
                                                    <div class="d-flex justify-content-start">
                                                        <img class="img-fluid rounded" src="{{ asset('images/profile/user-upload/'.$data->profile_image) }}" height="104" width="104" alt="User avatar" />
                                                        <div class="d-flex flex-column ms-1">
                                                            <div class="user-info mb-1">
                                                                <h4 class="mb-0">{{ $data->name }}</h4>
                                                                <span class="card-text">{{ $data->email }}</span>
                                                            </div>
                                                            
                                                            <div class="d-flex flex-wrap">
                                                                <a href="{{ url('customers/'.$data->id.'/edit'); }}" class="btn btn-primary">Edit</a>
                                                                <button  onClick="delete_customer({{ $data->id }})" class="btn btn-outline-danger ms-1">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                                <div class="user-info-wrapper">
                                                    <div class="d-flex flex-wrap">
                                                        <div class="user-info-title">
                                                            <i data-feather="user" class="me-1"></i>
                                                            <span class="card-text user-info-title fw-bold mb-0">Username</span>
                                                        </div>
                                                        <p class="card-text mb-0">{{ $data->username }}</p>
                                                    </div>
                                                    <div class="d-flex flex-wrap my-50">
                                                        <div class="user-info-title">
                                                            <i data-feather="check" class="me-1"></i>
                                                            <span class="card-text user-info-title fw-bold mb-0">Status</span>
                                                        </div>
                                                        <p class="card-text mb-0">{{ $data->is_active?"Active":"InActive"}}</p>
                                                    </div>
                                                    <div class="d-flex flex-wrap my-50">
                                                        <div class="user-info-title">
                                                            <i data-feather="star" class="me-1"></i>
                                                            <span class="card-text user-info-title fw-bold mb-0">Role</span>
                                                        </div>
                                                        <p class="card-text mb-0">Customers</p>
                                                    </div>
                                                    <div class="d-flex flex-wrap my-50">
                                                        <div class="user-info-title">
                                                            <i data-feather="flag" class="me-1"></i>
                                                            <span class="card-text user-info-title fw-bold mb-0">Country</span>
                                                        </div>
                                                        <p class="card-text mb-0">{{ isset($data->country)?$data->country:''; }}</p>
                                                    </div>
                                                    <div class="d-flex flex-wrap">
                                                        <div class="user-info-title">
                                                            <i data-feather="phone" class="me-1"></i>
                                                            <span class="card-text user-info-title fw-bold mb-0">Contact</span>
                                                        </div>
                                                        <p class="card-text mb-0">{{ isset($data->phone_no)?$data->phone_no:"";}}</p>
                                                    </div>
                                                    <div class="d-flex flex-wrap">
                                                        <div class="user-info-title">
                                                            <i data-feather="sunrise" class="me-1"></i>
                                                            <span class="card-text user-info-title fw-bold mb-0">Date Of Birth</span>
                                                        </div>
                                                        <p class="card-text mb-0">{{ isset($data->date_of_birth)?$data->date_of_birth:"";}}</p>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /User Card Ends-->
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <div class="card plan-card border-primary">
                                    <div class="card-header d-flex justify-content-between align-items-center pt-75 pb-1">
                                        <h5 class="mb-0">Bio</h5>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                    {{ $data->bio}}
                                        <ul style="display:flex;flex-direction:row;" class="list-unstyled my-1">
                                            @if (isset($data->	facebook_url))
                                            <li class="m-1">
                                            
                                                <a href="{{ isset($data->facebook_url)?$data->facebook_url:'';}}" target="_blank">
                                                <i class="fa fa-facebook "></i>
                                                
                                                </a>
                                            </li>
                                            @endif
                                            @if (isset($data->google_url))
                                            <li class="m-1">
                                            <a href="{{ isset($data->google_url)?$data->google_url:'';}}" target="_blank">
                                                <i class="fa fa-google "></i>
                                                
                                                </a>
                                            </li>
                                            @endif
                                            @if (isset($data->linkdin_url))
                                            <li class="m-1">
                                            <a href="{{ isset($data->linkdin_url)?$data->linkdin_url:'';}}" target="_blank">
                                            <i class="fa fa-linkedin "></i>
                                            
                                                </a>
                                            </li>
                                            @endif
                                            @if (isset($data->twitter_url))
                                            <li class="m-1">
                                            <a href="{{ isset($data->twitter_url)?$data->twitter_url:'';}}" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                            
                                                </a>
                                            </li>
                                            @endif
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- User Card & Plan Ends -->

                        <!-- User Timeline & Permissions Starts -->
                        <div class="row">
                            <!-- information starts -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-2">User Timeline</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="timeline">
                                            <li class="timeline-item">
                                                <span class="timeline-point timeline-point-indicator"></span>
                                                <div class="timeline-event">
                                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                        <h6>12 Invoices have been paid</h6>
                                                        <span class="timeline-event-time">12 min ago</span>
                                                    </div>
                                                    <p>Invoices have been paid to the company.</p>
                                                    <div class="d-flex align-items-center">
                                                        <img class="me-1" src="../../../app-assets/images/icons/file-icons/pdf.png" alt="invoice" height="23" />
                                                        <div class="invoice-name">invoice.pdf</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <span class="timeline-point timeline-point-warning timeline-point-indicator"></span>
                                                <div class="timeline-event">
                                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                        <h6>Client Meeting</h6>
                                                        <span class="timeline-event-time">45 min ago</span>
                                                    </div>
                                                    <p>Project meeting with john @10:15am.</p>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar">
                                                            <img src="../../../app-assets/images/avatars/12-small.png" alt="avatar" height="38" width="38" />
                                                        </div>
                                                        <div class="user-info ms-50">
                                                            <h6 class="mb-0">John Doe (Client)</h6>
                                                            <span>CEO of Infibeam</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
                                                <div class="timeline-event">
                                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                        <h6>Create a new project for client</h6>
                                                        <span class="timeline-event-time">2 days ago</span>
                                                    </div>
                                                    <p class="mb-0">Add files to new design folder</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- information Ends -->

                        
                        </div>
                        <!-- User Timeline & Permissions Ends -->

                    
                    </section>
            </div>
        </div>


@endsection

@section('scripts')
<script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
<script src="../../../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
<script src="../../../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
<script src="../../../app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
<script src="../../../app-assets/js/scripts/forms/form-input-mask.js"></script>
<script>
      function delete_customer(id) {
    if (confirm("Are You sure want to Delete !")) {
        console.log(id);
        $.ajax({
            url: "/customers/" + id,
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
                   
                  $(window).attr('location', '/customers');
                    Toast.fire({
                        icon: "success",
                        title: "Customers is successfully deleted !"
                    })
                }
            }
        });
    }
}
</script>
@endsection