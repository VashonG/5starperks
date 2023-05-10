<div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
        <li class="nav-item me-auto">
            <a class="navbar-brand" href="{{url('/')}}">
                <img class="logo" src="{{asset('/images/logo/logo.png')}}">
            </a>
        </li>
        <li class="nav-item nav-toggle">
            <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc" data-ticon="disc"></i>
            </a>
        </li>
    </ul>
</div>
<div class="shadow-bottom"></div>
<div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item {{ \Route::getFacadeRoot()->current()->uri() == 'customer_dashboard' ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{url('/')}}">
                <i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span>
            </a>
     </li>
         <?php $category  =  App\Models\Category::where('parent_id', '=', null)->get(); ?>
        @foreach($category as $cat)
            <li class=" nav-item  {{ \Route::getFacadeRoot()->current()->uri() == $cat->slug ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ url('products', ['slug'=>$cat->slug] ) }}  ">
                        <i data-feather="{{ $cat->icon }}"></i><span class="menu-title text-truncate" data-i18n="Category">{{ $cat->name }}</span>
                    </a>
                    @if(count($cat->childs))
                        @include('Client.layouts.categorymenu',['childs' => $cat->childs])
                    @endif
            </li>
        @endforeach
                 <li class="nav-item">
            <a  class="d-flex align-items-center"  href="#">
                <i data-feather='paperclip'></i>
                <span class="menu-title text-truncate" data-i18n="Email">Support</span>
            </a>
        </li>
    </ul>
</div>
@section('scripts')
<script>
  $(document).ready(function() {
    var settings = {
        "async": true,
        url: "{{ url('/sidebarCategory') }}",
        "method": "GET",
        "headers": {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        "processData": false,
        "contentType": false,
        "responsive": true,
    }
    $.ajax(settings).done(function(response) {
        if(response.errors){
            $.each( response.errors, function( index, value ){
                Toast.fire({
                    icon: 'error',
                    title: value
                })
            });
        }
        else if(response.error_message){
            Toast.fire({
                icon: 'error',
                title: response.error_message
            })
        }
        else{
            console.log(response.data);

        }



    });

    });



</script>
@endsection
