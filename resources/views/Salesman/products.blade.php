@extends('salesman.layouts.master')

@section('title', 'Products')
@section('content')
<div class="content-body">
         <!-- Examples -->
        <section id="card-demo-example">
            <div class="row match-height">
                @if(count($products)>0)
                    @foreach($products as $product)
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                 <img class="img-fluid" style="max-height: 300px;min-height: 214px;" src="{{ $product->image }}"  alt="{{$product->name}}" />
                                  <div class="card-body">
                                        <h4 class="card-title">{{  isset($product->title)?$product->title:'' }}</h4>
                                        <p class="card-text">{{ isset($product->description)?$product->description:'' }}</p>
                                        <a href="{{ $product->link }}" class="btn btn-outline-primary">Visit Website</a>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                @else
                <div class="col-md-12 col-lg-12">
                    <div class="card no-data_card">
                        <div class="nodata">
                            <i data-feather='hard-drive'></i>
                            <p>No Data</p>  
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </section>
        <!-- Examples -->
 		<!-- reload button -->
        <!-- <div class="row">
            <div class="col-12 text-center">
                <button type="button" class="btn btn-sm btn-primary block-element border-0 mb-1">Load More</button>
            </div>
        </div> -->
        <!--/ reload button -->
    </div>		
@endsection
@section("script")
 <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    @endsection