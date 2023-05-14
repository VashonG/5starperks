@extends('Admin.layouts.master')
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
        <section class="app-user-view-account">
            <div class="row">
                <!-- User Sidebar -->
                <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                    <!-- User Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="user-avatar-section">
                                <div class="d-flex align-items-center flex-column">
                                    <img class="img-fluid rounded mt-3 mb-2" src="../../../app-assets/images/portrait/small/avatar-s-2.jpg" height="110" width="110" alt="User avatar" />
                                    <div class="user-info text-center">
                                        <h4>{{$data->name}}</h4>
                                        <span class="badge bg-light-secondary">Customers</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-around my-2 pt-75">
                                <div class="d-flex align-items-start me-2">
                                    <span class="badge bg-light-primary p-75 rounded">
                                        <i data-feather="check" class="font-medium-2"></i>
                                    </span>
                                    <div class="ms-75">
                                        <h4 class="mb-0">1.23k</h4>
                                        <small>Tasks Done</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start">
                                    <span class="badge bg-light-primary p-75 rounded">
                                        <i data-feather="briefcase" class="font-medium-2"></i>
                                    </span>
                                    <div class="ms-75">
                                        <h4 class="mb-0">568</h4>
                                        <small>Projects Done</small>
                                    </div>
                                </div>
                            </div>
                            <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                            <div class="info-container">
                                <ul class="list-unstyled">
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Username:</span>
                                        <span>violet.dev</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Billing Email:</span>
                                        <span>vafgot@vultukir.org</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Status:</span>
                                        <span class="badge bg-light-success">Active</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Role:</span>
                                        <span>Author</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Tax ID:</span>
                                        <span>Tax-8965</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Contact:</span>
                                        <span>+1 (609) 933-44-22</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Language:</span>
                                        <span>English</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Country:</span>
                                        <span>Wake Island</span>
                                    </li>
                                </ul>
                                <div class="d-flex justify-content-center pt-2">
                                    <a href="javascript:;" class="btn btn-primary me-1" data-bs-target="#editUser" data-bs-toggle="modal">
                                        Edit
                                    </a>
                                    <a href="javascript:;" class="btn btn-outline-danger suspend-user">Suspended</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /User Card -->
                    <!-- Plan Card -->
                    <div class="card border-primary">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <span class="badge bg-light-primary">Standard</span>
                                <div class="d-flex justify-content-center">
                                    <sup class="h5 pricing-currency text-primary mt-1 mb-0">$</sup>
                                    <span class="fw-bolder display-5 mb-0 text-primary">99</span>
                                    <sub class="pricing-duration font-small-4 ms-25 mt-auto mb-2">/month</sub>
                                </div>
                            </div>
                            <ul class="ps-1 mb-2">
                                <li class="mb-50">10 Users</li>
                                <li class="mb-50">Up to 10 GB storage</li>
                                <li>Basic Support</li>
                            </ul>
                            <div class="d-flex justify-content-between align-items-center fw-bolder mb-50">
                                <span>Days</span>
                                <span>4 of 30 Days</span>
                            </div>
                            <div class="progress mb-50" style="height: 8px">
                                <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="65" aria-valuemax="100" aria-valuemin="80"></div>
                            </div>
                            <span>4 days remaining</span>
                            <div class="d-grid w-100 mt-2">
                                <button class="btn btn-primary" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">
                                    Upgrade Plan
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /Plan Card -->
                </div>
                <!--/ User Sidebar -->

                <!-- User Content -->
                <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                    <!-- User Pills -->
                    
                    <ul class="nav nav-pills mb-2">
                        <li class="nav-item">
                            <a class="nav-link active" href="#account"  id="account-tab" data-bs-toggle="pill" aria-expanded="true">
                                <i data-feather="user" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Account</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#security"  id="security-tab" data-bs-toggle="pill" aria-expanded="true">
                                <i data-feather="lock" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Security</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#billing"  id="billing-tab" data-bs-toggle="pill" aria-expanded="true">
                                <i data-feather="bookmark" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Billing & Plans</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="#feed"  id="feed-tab" data-bs-toggle="pill" aria-expanded="true">
                                <i data-feather="bell" class="font-medium-3 me-50"></i><span class="fw-bold">Feed</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#agreements"  id="agreements-tab" data-bs-toggle="pill" aria-expanded="true">
                                <i data-feather="link" class="font-medium-3 me-50"></i><span class="fw-bold">Agreements</span>
                            </a>
                        </li>
                    </ul>
                    <!--/ User Pills -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="account" aria-labelledby="account-tab" aria-expanded="true">
                            <!-- Project table -->
                            <div class="card">
                                <h4 class="card-header">User's Projects List</h4>
                                <div class="table-responsive">
                                    <table class="table datatable-project">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Project</th>
                                                <th class="text-nowrap">Total Task</th>
                                                <th>Progress</th>
                                                <th>Hours</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <!-- /Project table -->

                            <!-- Activity Timeline -->
                            <div class="card">
                                <h4 class="card-header">User Activity Timeline</h4>
                                <div class="card-body pt-1">
                                    <ul class="timeline ms-50">
                                        <li class="timeline-item">
                                            <span class="timeline-point timeline-point-indicator"></span>
                                            <div class="timeline-event">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                    <h6>User login</h6>
                                                    <span class="timeline-event-time me-1">12 min ago</span>
                                                </div>
                                                <p>User login at 2:12pm</p>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <span class="timeline-point timeline-point-warning timeline-point-indicator"></span>
                                            <div class="timeline-event">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                    <h6>Meeting with john</h6>
                                                    <span class="timeline-event-time me-1">45 min ago</span>
                                                </div>
                                                <p>React Project meeting with john @10:15am</p>
                                                <div class="d-flex flex-row align-items-center mb-50">
                                                    <div class="avatar me-50">
                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" width="38" height="38" />
                                                    </div>
                                                    <div class="user-info">
                                                        <h6 class="mb-0">Leona Watkins (Client)</h6>
                                                        <p class="mb-0">CEO of pixinvent</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
                                            <div class="timeline-event">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                    <h6>Create a new react project for client</h6>
                                                    <span class="timeline-event-time me-1">2 day ago</span>
                                                </div>
                                                <p>Add files to new design folder</p>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <span class="timeline-point timeline-point-danger timeline-point-indicator"></span>
                                            <div class="timeline-event">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                    <h6>Create Invoices for client</h6>
                                                    <span class="timeline-event-time me-1">12 min ago</span>
                                                </div>
                                                <p class="mb-0">Create new Invoices and send to Leona Watkins</p>
                                                <div class="d-flex flex-row align-items-center mt-50">
                                                    <img class="me-1" src="../../../app-assets/images/icons/pdf.png" alt="data.json" height="25" />
                                                    <h6 class="mb-0">Invoices.pdf</h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Activity Timeline -->

                            <!-- Invoice table -->
                            <div class="card">
                                <table class="invoice-table table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>#ID</th>
                                            <th><i data-feather="trending-up"></i></th>
                                            <th>TOTAL Paid</th>
                                            <th class="text-truncate">Issued Date</th>
                                            <th class="cell-fit">Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /Invoice table -->
                        </div>
                        <div role="tabpanel" class="tab-pane " id="security" aria-labelledby="security-tab" aria-expanded="true">
                            
                            <!-- Change Password -->
                            <div class="card">
                                <h4 class="card-header">Change Password</h4>
                                <div class="card-body">
                                    <form id="formChangePassword" method="POST" onsubmit="return false">
                                        <div class="alert alert-warning mb-2" role="alert">
                                            <h6 class="alert-heading">Ensure that these requirements are met</h6>
                                            <div class="alert-body fw-normal">Minimum 8 characters long, uppercase & symbol</div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-2 col-md-6 form-password-toggle">
                                                <label class="form-label" for="newPassword">New Password</label>
                                                <div class="input-group input-group-merge form-password-toggle">
                                                    <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                    <span class="input-group-text cursor-pointer">
                                                        <i data-feather="eye"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="mb-2 col-md-6 form-password-toggle">
                                                <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary me-2">Change Password</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--/ Change Password -->

                        </div>
                        <div role="tabpanel" class="tab-pane " id="billing" aria-labelledby="billing-tab" aria-expanded="true">
                                   <!-- current plan -->
                                   <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Current plan</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-2 pb-50">
                                                    <h5>Your Current Plan is <strong>Basic</strong></h5>
                                                    <span>A simple start for everyone</span>
                                                </div>
                                                <div class="mb-2 pb-50">
                                                    <h5>Active until Dec 09, 2021</h5>
                                                    <span>We will send you a notification upon Subscription expiration</span>
                                                </div>
                                                <div class="mb-2 mb-md-1">
                                                    <h5>$199 Per Month <span class="badge badge-light-primary ms-50">Popular</span></h5>
                                                    <span>Standard plan for small to medium businesses</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="alert alert-warning mb-2" role="alert">
                                                    <h6 class="alert-heading">We need your attention!</h6>
                                                    <div class="alert-body fw-normal">your plan requires update</div>
                                                </div>
                                                <div class="plan-statistics pt-1">
                                                    <div class="d-flex justify-content-between">
                                                        <h5 class="fw-bolder">Days</h5>
                                                        <h5 class="fw-bolder">4 of 30 Days</h5>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <p class="mt-50">4 days remaining until your plan requires update</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary me-1 mt-1" data-bs-toggle="modal" data-bs-target="#upgradePlanModal">
                                                    Upgrade Plan
                                                </button>
                                                <button class="btn btn-outline-danger cancel-subscription mt-1">Cancel Subscription</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- / current plan -->
    
                                <!-- payment methods -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-50">Payment Methods</h4>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addNewCard">
                                            <i data-feather="plus"></i>
                                            <span>Add Card</span>
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <div class="added-cards">
                                            <div class="cardMaster rounded border p-2 mb-1">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                    <div class="card-information">
                                                        <img class="mb-1 img-fluid" src="../../../app-assets/images/icons/payments/mastercard.png" alt="Master Card" />
                                                        <div class="d-flex align-items-center mb-50">
                                                            <h6 class="mb-0">Tom McBride</h6>
                                                            <span class="badge badge-light-primary ms-50">Primary</span>
                                                        </div>
                                                        <span class="card-number">∗∗∗∗ ∗∗∗∗ 9856</span>
                                                    </div>
                                                    <div class="d-flex flex-column text-start text-lg-end">
                                                        <div class="d-flex order-sm-0 order-1 mt-1 mt-sm-0">
                                                            <button class="btn btn-outline-primary me-75" data-bs-toggle="modal" data-bs-target="#editCard">
                                                                Edit
                                                            </button>
                                                            <button class="btn btn-outline-secondary">Delete</button>
                                                        </div>
                                                        <span class="mt-2">Card expires at 12/24</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cardMaster border rounded p-2 mb-1">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                    <div class="card-information">
                                                        <img class="mb-1 img-fluid" src="../../../app-assets/images/icons/payments/visa.png" alt="Visa Card" />
                                                        <h6>Mildred Wagner</h6>
                                                        <span class="card-number">∗∗∗∗ ∗∗∗∗ 5896</span>
                                                    </div>
                                                    <div class="d-flex flex-column text-start text-lg-end">
                                                        <div class="d-flex order-sm-0 order-1 mt-1 mt-sm-0">
                                                            <button class="btn btn-outline-primary me-75" data-bs-toggle="modal" data-bs-target="#editCard">
                                                                Edit
                                                            </button>
                                                            <button class="btn btn-outline-secondary">Delete</button>
                                                        </div>
                                                        <span class="mt-2">Card expires at 02/24</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cardMaster border rounded p-2">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                    <div class="card-information">
                                                        <img class="mb-1 img-fluid" src="../../../app-assets/images/icons/payments/american-ex.png" alt="Visa Card" />
                                                        <h6>Mildred Wagner</h6>
                                                        <span class="card-number">∗∗∗∗ ∗∗∗∗ 5896</span>
                                                    </div>
                                                    <div class="d-flex flex-column text-start text-lg-end">
                                                        <div class="d-flex order-sm-0 order-1 mt-1 mt-sm-0">
                                                            <button class="btn btn-outline-primary me-75" data-bs-toggle="modal" data-bs-target="#editCard">
                                                                Edit
                                                            </button>
                                                            <button class="btn btn-outline-secondary">Delete</button>
                                                        </div>
                                                        <span class="mt-2">Card expires at 02/24</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- / payment methods -->
    
                                <!-- Billing Address -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-50">Billing Address</h4>
                                        <button class="btn btn-primary btn-sm edit-address" type="button" data-bs-toggle="modal" data-bs-target="#addNewAddressModal">
                                            Edit address
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-7 col-12">
                                                <dl class="row mb-0">
                                                    <dt class="col-sm-4 fw-bolder mb-1">Company Name:</dt>
                                                    <dd class="col-sm-8 mb-1">PIXINVENT</dd>
    
                                                    <dt class="col-sm-4 fw-bolder mb-1">Billing Email:</dt>
                                                    <dd class="col-sm-8 mb-1">themeselection@ex.com</dd>
    
                                                    <dt class="col-sm-4 fw-bolder mb-1">Tax ID:</dt>
                                                    <dd class="col-sm-8 mb-1">TAX-357378</dd>
    
                                                    <dt class="col-sm-4 fw-bolder mb-1">VAT Number:</dt>
                                                    <dd class="col-sm-8 mb-1">SDF754K77</dd>
    
                                                    <dt class="col-sm-4 fw-bolder mb-1">Billing Address:</dt>
                                                    <dd class="col-sm-8 mb-1">100 Water Plant Avenue, Building 1303 Wake Island</dd>
                                                </dl>
                                            </div>
                                            <div class="col-xl-5 col-12">
                                                <dl class="row mb-0">
                                                    <dt class="col-sm-4 fw-bolder mb-1">Contact:</dt>
                                                    <dd class="col-sm-8 mb-1">+1 (605) 977-32-65</dd>
    
                                                    <dt class="col-sm-4 fw-bolder mb-1">Country:</dt>
                                                    <dd class="col-sm-8 mb-1">Wake Island</dd>
    
                                                    <dt class="col-sm-4 fw-bolder mb-1">State:</dt>
                                                    <dd class="col-sm-8 mb-1">Capholim</dd>
    
                                                    <dt class="col-sm-4 fw-bolder mb-1">Zipcode:</dt>
                                                    <dd class="col-sm-8 mb-1">403114</dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Billing Address -->
                        </div>         
                        <div role="tabpanel" class="tab-pane " id="feed" aria-labelledby="feed-tab" aria-expanded="true">
                        </div>
                        <div role="tabpanel" class="tab-pane " id="agreements" aria-labelledby="agreements-tab" aria-expanded="true">
                        </div>
                </div>
                <!--/ User Content -->
            </div>
        </section>
        <!-- Edit User Modal -->
        <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Edit User Information</h1>
                            <p>Updating user details will receive a privacy audit.</p>
                        </div>
                        <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false">
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserFirstName">First Name</label>
                                <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName" class="form-control" placeholder="John" value="Gertrude" data-msg="Please enter your first name" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserLastName">Last Name</label>
                                <input type="text" id="modalEditUserLastName" name="modalEditUserLastName" class="form-control" placeholder="Doe" value="Barton" data-msg="Please enter your last name" />
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="modalEditUserName">Username</label>
                                <input type="text" id="modalEditUserName" name="modalEditUserName" class="form-control" value="gertrude.dev" placeholder="john.doe.007" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserEmail">Billing Email:</label>
                                <input type="text" id="modalEditUserEmail" name="modalEditUserEmail" class="form-control" value="gertrude@gmail.com" placeholder="example@domain.com" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserStatus">Status</label>
                                <select id="modalEditUserStatus" name="modalEditUserStatus" class="form-select" aria-label="Default select example">
                                    <option selected>Status</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                    <option value="3">Suspended</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditTaxID">Tax ID</label>
                                <input type="text" id="modalEditTaxID" name="modalEditTaxID" class="form-control modal-edit-tax-id" placeholder="Tax-8894" value="Tax-8894" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserPhone">Contact</label>
                                <input type="text" id="modalEditUserPhone" name="modalEditUserPhone" class="form-control phone-number-mask" placeholder="+1 (609) 933-44-22" value="+1 (609) 933-44-22" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserLanguage">Language</label>
                                <select id="modalEditUserLanguage" name="modalEditUserLanguage" class="select2 form-select" multiple>
                                    <option value="english">English</option>
                                    <option value="spanish">Spanish</option>
                                    <option value="french">French</option>
                                    <option value="german">German</option>
                                    <option value="dutch">Dutch</option>
                                    <option value="hebrew">Hebrew</option>
                                    <option value="sanskrit">Sanskrit</option>
                                    <option value="hindi">Hindi</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserCountry">Country</label>
                                <select id="modalEditUserCountry" name="modalEditUserCountry" class="select2 form-select">
                                    <option value="">Select Value</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Canada">Canada</option>
                                    <option value="China">China</option>
                                    <option value="France">France</option>
                                    <option value="Germany">Germany</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Korea">Korea, Republic of</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Russia">Russian Federation</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center mt-1">
                                    <div class="form-check form-switch form-check-primary">
                                        <input type="checkbox" class="form-check-input" id="customSwitch10" checked />
                                        <label class="form-check-label" for="customSwitch10">
                                            <span class="switch-icon-left"><i data-feather="check"></i></span>
                                            <span class="switch-icon-right"><i data-feather="x"></i></span>
                                        </label>
                                    </div>
                                    <label class="form-check-label fw-bolder" for="customSwitch10">Use as a billing address?</label>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-2 pt-50">
                                <button type="submit" class="btn btn-primary me-1">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                    Discard
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Edit User Modal -->
        <!-- upgrade your plan Modal -->
        <div class="modal fade" id="upgradePlanModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-upgrade-plan">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-5 pb-2">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Upgrade Plan</h1>
                            <p>Choose the best plan for user.</p>
                        </div>
                        <form id="upgradePlanForm" class="row pt-50" onsubmit="return false">
                            <div class="col-sm-8">
                                <label class="form-label" for="choosePlan">Choose Plan</label>
                                <select id="choosePlan" name="choosePlan" class="form-select" aria-label="Choose Plan">
                                    <option selected>Choose Plan</option>
                                    <option value="standard">Standard - $99/month</option>
                                    <option value="exclusive">Exclusive - $249/month</option>
                                    <option value="Enterprise">Enterprise - $499/month</option>
                                </select>
                            </div>
                            <div class="col-sm-4 text-sm-end">
                                <button type="submit" class="btn btn-primary mt-2">Upgrade</button>
                            </div>
                        </form>
                    </div>
                    <hr />
                    <div class="modal-body px-5 pb-3">
                        <h6>User current plan is standard plan</h6>
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div class="d-flex justify-content-center me-1 mb-1">
                                <sup class="h5 pricing-currency pt-1 text-primary">$</sup>
                                <h1 class="fw-bolder display-4 mb-0 text-primary me-25">99</h1>
                                <sub class="pricing-duration font-small-4 mt-auto mb-2">/month</sub>
                            </div>
                            <button class="btn btn-outline-danger cancel-subscription mb-1">Cancel Subscription</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ upgrade your plan Modal -->

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