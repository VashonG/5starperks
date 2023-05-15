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
                            <a class="nav-link nav-tab" id="editor-data-tab" data-bs-toggle="pill" aria-expanded="true">Editor Choice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-tab active" id="peer-data-tab" data-bs-toggle="pill"  aria-expanded="false">Peer Choice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-tab" id="normal-data-tab" data-bs-toggle="pill"  aria-expanded="false">Normal Products</a>
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
                                    <p class="card-text text-white"></p>
                                <h4 class="card-title">{{ $product->title }}</h4>
                                <p class="card-text" >
                                {{ strlen($product->description) > 120 ? substr($product->description, 0, 120)."..." : $product->description }}   
                            </p>
                                <div style="display: flex; flex-direction :row;justify-content:space-between">
                                    <a onclick="viewProduct({{ $product->id }},'{{ $product->link }}')" id="view-histories" class="btn btn-outline-primary">Visit Website</a>
                                    @if($product->histories->count() > 0 )
                                    <div class="avatar-group">
                                    @foreach($product->histories->slice(0,min([$product->histories->count(),3])) as $history)
                                        @if($history->user->image)
                                            <div class="avatar pull-up">
                                                <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $history->user->name}}" class="avatar pull-up">
                                                    <img src="{{$history->user->image}}" alt="Avatar" height="32" width="32" />
                                                </div>   
                                            </div>   
                                        @else    
                                            <?php 
                                            if (strpos($history->user->name, " ") !== false) {
                                                $nameList = array_values(array_filter(explode(" ",$history->user->name)));
                                                $subName = substr($nameList[0],0,1).substr($nameList[1],0,1);   
                                            }else{
                                                $subName = $history->user->name;
                                                $subName = substr($subName, 0, 2); 
                                            }
                                            $subName =  strtoupper( $subName );
                                            ?>
                                        <div class="avatar ">
                                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $history->user->name}}" class="avatar pull-up">
                                                        <span class="avatar-content {{ \App\Helpers\randomElementOfArray(['bg-secondary','bg-primary','bg-success','bg-danger','bg-warning','bg-info'])}}">{{ $subName}}</span>

                                            </div>                            
                                        </div>
                                        @endif
                                    @endforeach
                                    @if($product->histories->count() > 3 )
                                        <div class="avatar">
                                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom" title="{{ $product->histories->map(function($x,$i) use ($product) { $names = ''; if($i ==0 ){ $name = "<ul>";} $name = '<li>'.$x->user->name.'</li>';  if($i == $product->histories->count() ){ $name = "</ul>";}  return $name; })->join("")}}" data-bs-html='true'   class="avatar pull-down">
                                                <div class="avatar-content  bg-primary">{{"+".$product->histories->count() - 3}}</div>
                                            </div>
                                        </div>
                                    @endif   
                                </div>
                                @endif
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
                        <p class="card-text text-white"></p>
                    <h4 class="card-title">{{ $product->title }}</h4>
                    <p class="card-text" >
                    {{ strlen($product->description) > 120 ? substr($product->description, 0, 120)."..." : $product->description }}   
                </p>
                    <div style="display: flex; flex-direction :row;justify-content:space-between">
                        <a onclick="viewProduct({{ $product->id }},'{{ $product->link }}')" id="view-histories" class="btn btn-outline-primary">Visit Website</a>
                        @if($product->histories->count() > 0 )
                            <div class="avatar-group">
                                @foreach($product->histories->slice(0,min([$product->histories->count(),3])) as $history)
                                    @if($history->user->image)
                                        <div class="avatar pull-up">
                                            <img src="{{$history->user->image}}" alt="Avatar" height="32" width="32" />
                                        </div>   
                                    @else    
                                        <?php 
                                        if (strpos($history->user->name, " ") !== false) {
                                            $nameList = array_values(array_filter(explode(" ",$history->user->name)));
                                            $subName = substr($nameList[0],0,1).substr($nameList[1],0,1);
                                        }else{
                                            $subName = $history->user->name;
                                            $subName = substr($subName, 0, 2); 
                                        }
                                        $subName =  strtoupper( $subName );
                                    
                                        ?>
                                    <div class="avatar ">
                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $history->user->name}}" class="avatar pull-up">
                                                     <span class="avatar-content {{ \App\Helpers\randomElementOfArray(['bg-secondary','bg-primary','bg-success','bg-danger','bg-warning','bg-info'])}}">{{ $subName}}</span>
                                        </div>                            
                                    </div>
                                    @endif
                                @endforeach
                                @if($product->histories->count() > 3 )
                                    <div class="avatar">
                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" title="{{ $product->histories->map(function($x,$i) use ($product) { $names = ''; if($i ==0 ){ $name = "<ul>";} $name = '<li>'.$x->user->name.'</li>';  if($i == $product->histories->count() ){ $name = "</ul>";}  return $name; })->join("")}}"data-bs-html='true' class="avatar pull-down">
                                            <div class="avatar-content  bg-primary">{{"+".$product->histories->count() - 3}}</div>
                                        </div>
                                    </div>
                                    @endif   
                            </div>
                            @endif
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
                            <p class="card-text text-white"></p>
                        <h4 class="card-title">{{ $product->title }}</h4>
                        <p class="card-text" >
                        {{ strlen($product->description) > 120 ? substr($product->description, 0, 120)."..." : $product->description }}   
                    </p>
                        <div style="display: flex; flex-direction :row;justify-content:space-between">
                            <a onclick="viewProduct({{ $product->id }},'{{ $product->link }}')" id="view-histories" class="btn btn-outline-primary">Visit Website</a>
                            @if($product->histories->count() > 0 )
                            <div class="avatar-group">
                                @foreach($product->histories->slice(0,min([$product->histories->count(),3])) as $history)
                                    @if($history->user->image)
                                        <div class="avatar pull-up">
                                            <img src="{{$history->user->image}}" alt="Avatar" height="32" width="32" />
                                        </div>   
                                    @else    
                                        <?php 
                                        if (strpos($history->user->name, " ") !== false) {
                                            $nameList = array_values(array_filter(explode(" ",$history->user->name)));
                                            $subName = substr($nameList[0],0,1).substr($nameList[1],0,1);
                                        }else{
                                            $subName = $history->user->name;
                                            $subName = substr($subName, 0, 2); 
                                        }
                                        $subName =  strtoupper( $subName );
                                    
                                        ?>
                                    <div class="avatar ">
                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $history->user->name}}" class="avatar pull-up">
                                                    <span class="avatar-content {{ \App\Helpers\randomElementOfArray(['bg-secondary','bg-primary','bg-success','bg-danger','bg-warning','bg-info'])}}">{{ $subName}}</span>
                                        </div>                            
                                    </div>
                                    @endif
                                @endforeach
                                @if($product->histories->count() > 3 )
                                    <div class="avatar">
                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" title="{{ $product->histories->map(function($x,$i) use ($product) { $names = ''; if($i ==0 ){ $name = "<ul>";} $name = '<li>'.$x->user->name.'</li>';  if($i == $product->histories->count() ){ $name = "</ul>";}  return $name; })->join("")}}"  data-bs-html='true'   class="avatar pull-down">
                                            <div class="avatar-content  bg-primary">{{"+".$product->histories->count() - 3}}</div>
                                        </div>
                                    </div>
                                    @endif   
                            </div>
                            @endif
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
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/js/scripts/pages/app-user-edit.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/components/components-navs.js')}}"></script>
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
        url: `{{ url('/products') }}${queryParam}`,
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
                        paginateCard += '<p class="card-text" >';
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
            url: `{{ url('/products') }}/${id}/view?redirect_url=${url}`,
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

$(".nav-tab").click(function(event){
    event.preventDefault();
    var id = $(this).attr("id");

    $(`.tab-pane`).removeClass('active');
    $(`[aria-labelledby="${id}"]`).addClass('active');
})
</script>

@endsection