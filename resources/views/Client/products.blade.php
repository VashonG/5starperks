@extends('Client.layouts.master')

@section('title', 'Products')
@section('style')
<style>
    .no-data_card{
        min-height: 250px;
        background-color: #fff;
        display: grid;
        justify-content: center;
        align-items: center;
    }
    .nodata svg.feather.feather-hard-drive{
        height: 4rem;
         width: 4rem;
    }
</style>
@endsection
@section('content')
<div class="content-body">
    <section id="basic-and-outline-pills">
        <div class="row match-height">
            <!-- Basic pills starts -->
            <div class="col-xl-12 col-lg-12">
                <div class="card-body">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link" id="editor-data-tab" data-bs-toggle="pill" aria-expanded="true">Editor Choice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="peer-data-tab" data-bs-toggle="pill"  aria-expanded="false">Peer Choice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="normal-data-tab" data-bs-toggle="pill"  aria-expanded="false">Normal Products</a>
                        </li>                                
                    </ul>
                <div class="tab-content">
                <div role="tabpanel" class="tab-pane" id="editor" aria-labelledby="editor-data-tab" aria-expanded="true">
                <div id="editor-tab" class="row match-height">
                    @if(count($paginatedData["editorProducts"]["items"])==0)
                        <div class="col-md-12 col-lg-12">
                            <div class="card no-data_card">
                                <div class="nodata">
                                    <i data-feather='hard-drive'></i>
                                    <p>No Data</p>  
                                </div>
                            </div>
                        </div>
                    @else
                    @foreach($paginatedData["editorProducts"]["items"] as $product)
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <img class="card-img-top"  src="{{ $product->image }}" alt="Card image cap" />
                            <div class="card-body">
                            
                            @if (!empty($product->scheduled_at) && $product->scheduled_at > now())
                                <div style="float:right;" class="bg-info-gradient d-flex">
                                        <i style="margin-right: 10px; height: 1.4rem; color: #1aeaff; width: 2rem;" data-feather='clock'></i>
                                        <p class="card-text text-dark">{{  date("d-m-Y", strtotime($product->scheduled_at)) }}</p>
                                </div>
                                    @else
                                    <p class="card-text text-white"></p>
                                    @endif
                                <h4 class="card-title">{{ $product->title }}</h4>
                                <p class="card-text" style="min-height:84px;">
                                {{ strlen($product->description) > 120 ? substr($product->description, 0, 120)."..." : $product->description }}   
                            </p>
                                <div style="display: flex; flex-direction :row;justify-content:space-between">
                                    <a onclick="viewProduct({{ $product->id }},'{{ $product->link }}')" id="view-histories" class="btn btn-outline-primary">Visit Website</a>
                                    <a style="font-size:1.3rem" class="btn btn-default"><i style="height: 1.3rem; width: 1.8rem;" data-feather='activity'></i><span class="histories-count-{{ $product->id }}">  {{ $product->histories && count($product->histories) > 0  ? count($product->histories    ) : 0  }} </span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
        <!-- reload button -->
                    @if($paginatedData["editorProducts"]["last_page"] >$paginatedData["editorProducts"]["current_page"] )
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="button" class="btn btn-lg btn-primary block-element border-0 mb-1 load_editor" onclick="loadPaginatedData('editor',{{ $paginatedData['editorProducts']['current_page'] }})">Load More</button>
                        </div>
                    </div>
                    @endif
        <!--/ reload button -->
    
    </div>
    <div class="tab-pane active" id="peer"  role="tabpanel"  aria-labelledby="peer-data-tab" aria-expanded="false">
    <div id="peer-tab" class="row match-height">
        @if(count($paginatedData["peerProducts"]["items"])==0)
            <div class="col-md-12 col-lg-12">
                <div class="card no-data_card">
                    <div class="nodata">
                        <i data-feather='hard-drive'></i>
                        <p>No Data</p>  
                    </div>
                </div>
            </div>
        @else
        @foreach($paginatedData["peerProducts"]["items"] as $product)
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img-top"  src="{{ $product->image }}" alt="Card image cap" />
                <div class="card-body">
                @if (!empty($product->scheduled_at) && $product->scheduled_at > now())
                    <div style="float:right;" class="bg-info-gradient d-flex">
                            <i style="margin-right: 10px; height: 1.4rem; color: #1aeaff; width: 2rem;" data-feather='clock'></i>
                            <p class="card-text text-dark">{{  date("d-m-Y", strtotime($product->scheduled_at)); }}</p>
                    </div>
                        @else
                        <p class="card-text text-white"></p>
                        @endif
                    <h4 class="card-title">{{ $product->title }}</h4>
                    <p class="card-text" style="min-height:84px;">
                    {{ strlen($product->description) > 120 ? substr($product->description, 0, 120)."..." : $product->description; }}   
                </p>
                    <div style="display: flex; flex-direction :row;justify-content:space-between">
                        <a onclick="viewProduct({{ $product->id }},'{{ $product->link }}')" id="view-histories" class="btn btn-outline-primary">Visit Website</a>
                        <a style="font-size:1.3rem" class="btn btn-default"><i style="height: 1.3rem; width: 1.8rem;" data-feather='activity'></i><span class="histories-count-{{ $product->id }}">  {{ $product->histories && count($product->histories) > 0  ? count($product->histories    ) : 0  }} </span></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
        <!-- reload button -->
        @if($paginatedData["peerProducts"]["last_page"] >$paginatedData["peerProducts"]["current_page"] )
        <div class="row">
            <div class="col-12 text-center">
                <button type="button" class="btn btn-lg btn-primary block-element border-0 mb-1 load_peer" onclick="loadPaginatedData('peer',{{ $paginatedData['peerProducts']['current_page'] }})">Load More</button>
            </div>
        </div>
        @endif
        <!--/ reload button -->
    
        </div>
        <div class="tab-pane" id="normal-data-tab"  role="tabpanel"  aria-labelledby="normal-data-tab" aria-expanded="false">
        <div id="normal-tab" class="row match-height">
        @if(count($paginatedData["peerProducts"]["items"])==0)
            <div class="col-md-12 col-lg-12">
                <div class="card no-data_card">
                    <div class="nodata">
                        <i data-feather='hard-drive'></i>
                        <p>No Data</p>  
                    </div>
                </div>
            </div>
        @else    
         @foreach($paginatedData["normalProducts"]["items"] as $product)
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <img class="card-img-top"  src="{{ $product->image }}" alt="Card image cap" />
                    <div class="card-body">
                    
                    @if (!empty($product->scheduled_at) && $product->scheduled_at > now())
                        <div style="float:right;" class="bg-info-gradient d-flex">
                                <i style="margin-right: 10px; height: 1.4rem; color: #1aeaff; width: 2rem;" data-feather='clock'></i>
                                <p class="card-text text-dark">{{  date("d-m-Y", strtotime($product->scheduled_at)); }}</p>
                        </div>
                            @else
                            <p class="card-text text-white"></p>
                            @endif
                        <h4 class="card-title">{{ $product->title }}</h4>
                        <p class="card-text" style="min-height:84px;">
                        {{ strlen($product->description) > 120 ? substr($product->description, 0, 120)."..." : $product->description; }}   
                    </p>
                        <div style="display: flex; flex-direction :row;justify-content:space-between">
                            <a onclick="viewProduct({{ $product->id }},'{{ $product->link }}')" id="view-histories" class="btn btn-outline-primary">Visit Website</a>
                            <a style="font-size:1.3rem" class="btn btn-default"><i style="height: 1.3rem; width: 1.8rem;" data-feather='activity'></i><span class="histories-count-{{ $product->id }}">  {{ $product->histories && count($product->histories) > 0  ? count($product->histories    ) : 0  }} </span></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>
        <!-- reload button -->
        @if($paginatedData["normalProducts"]["last_page"] >$paginatedData["normalProducts"]["current_page"] )
        <div class="row">
            <div class="col-12 text-center">
                <button type="button" class="btn btn-lg btn-primary block-element border-0 mb-1 load_normal" onclick="loadPaginatedData('normal',{{ $paginatedData['normalProducts']['current_page'] }})">Load More</button>
            </div>
        </div>
        @endif
        <!--/ reload button -->
    
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            </div>
                    
                    <!-- Basic pills ends -->
                    </div>
            </section>
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
function loadPaginatedData(type,page){
    ++page;
    let queryParam = "?editorpage="+page;
    switch(type){
        case 'editor':
             queryParam = "?editorpage="+page;
             break;
        case 'normal':
             queryParam = "?normalpage="+page;
            break;
        case 'peer':
            queryParam = "?peerpage="+page;
            break;
            default:
            break
    }

        $.ajax({
        url: `products/${queryParam}`,
        type: "GET",
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
              
                let group = "editorProducts";
                switch(type){
                    case 'editor':
                        group = "editorProducts";
                    break;
                case 'normal':
                    group = "normalProducts";
                    break;
                case 'peer':
                    group = "peerProducts";
                    break;
                    default:
                            break
                    }
                    console.log("🚀 ~ file: products.blade.php:240 ~ loadPaginatedData ~ group:", group)
                    response[group].items.map(x=>{
                        let paginateCard = "";
                        paginateCard += '<div class="col-md-6 col-lg-4">';
                        paginateCard += '<div class="card">';
                        paginateCard += ` <img class="card-img-top"  src="${x.image}" alt="Card image cap" />`;
                        paginateCard += '<div class="card-body">';
                       
                        paginateCard += '<div style="float:right;" class="bg-info-gradient d-flex">';
                        paginateCard += `<i style="margin-right: 10px; height: 1.4rem; color: #1aeaff; width: 2rem;" data-feather='clock'></i>`;
                        paginateCard += `<p class="card-text text-dark">${formatDate(x.scheduled_at)}</p>`;
                        paginateCard += '</div>';
                        paginateCard += '<p class="card-text text-white"></p>';
                        paginateCard += `<h4 class="card-title">${ x.title }</h4>`;
                        paginateCard += '<p class="card-text" style="min-height:84px;">';
                        paginateCard += x.description && x.description.length > 120 ? x.description.substring(0, 120) + "..." : x.description;
                        paginateCard += ' </p>';
                        paginateCard += '  <div style="display: flex; flex-direction :row;justify-content:space-between">';
                        paginateCard += `<a onclick="viewProduct(${x.id},${x.link})" id="view-histories" class="btn btn-outline-primary">Visit Website</a>`;
                        paginateCard += `<a style="font-size:1.3rem" class="btn btn-default"><i style="height: 1.3rem; width: 1.8rem;" data-feather='activity'></i><span class="histories-count-${x.id}"> ${x.histories  ? x.histories.length : 0 }  </span></a>`;
                        paginateCard += '</div></div></div></div>';
                        let load_button_identefier = "load_editor";
                        switch(type){
                        case 'editor':
                            $("#editor-tab").append(paginateCard);
                            load_button_identefier = "load_editor";
                            break;
                        case 'normal':
                            $("#normal-tab").append(paginateCard);
                            load_button_identefier = "load_normal";
                            break;
                        case 'peer':
                            $("#peer-tab").append(paginateCard);
                            load_button_identefier = "load_peer";
                            break;
                        default:
                            break
                        }
                      
                        if(response[group].current_page >= response[group].last_page){
                         
                            $("."+load_button_identefier).css("display","none");
                        
                    }
                      
                    });    
            }
        }
    });   
    }
function formatDate(date){
    const scheduledAt = new Date(date); // Replace with your own value
    const day = scheduledAt.getDate().toString().padStart(2, '0');
    const month = (scheduledAt.getMonth() + 1).toString().padStart(2, '0');
    const year = scheduledAt.getFullYear().toString();
    const formattedDate = `${day}-${month}-${year}`;
   return formattedDate;
}
function viewProduct(id,url){
    $.ajax({
            url: `products/${id}/view?redirect_url=${url}` ,
            type: "GET",
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
                        title: "Product is successfully Viewed!"
                    });
                    $(".histories-count-"+id).html(response.length);
                    window.open(url);
                }
            }
        });
           
}

$(".nav-link").click(function(event){
    event.preventDefault();
    var id = $(this).attr("id");

    $(`.tab-pane`).removeClass('active');
    $(`[aria-labelledby="${id}"]`).addClass('active');
})
</script>

@endsection