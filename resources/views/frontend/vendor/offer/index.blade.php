@extends('frontend.layouts.app')

@section('content')
<div class="inside-wrapper dashboard-page">
    <div class="container">
        
      <div class="inside-wrapperInner">
      
      <div class="row">
        <div class="col-md-1">
          <h2>Offers</h2>
        </div>
        <div class="col-md-3">
        &nbsp;
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="search-detsilsBlock">
            <div class="row">
              
              <div class="col-sm-12">
                <div class="content d-flex justify-content-between flex-column h-100">

                  @if(count($offers)>0)
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Coupon Code</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($offers as $offer)
                      <tr>
                        <td>{{$offer->name}}</td>
                        <td>{{$offer->description}}</td>
                        <td>{{$offer->coupon_code}}</td>
                        <td>
                          <!-- <form action="{{ route('frontend.vendor.services.edit',$offer->id) }}" method="POST"> -->
                          <!-- <a class="btn btn-info" href="{{ route('frontend.vendor.services.edit',$offer->id) }}">Show</a> -->
                          <a class="btn btn-primary" href="{{ route('frontend.vendor.services.edit',$offer->id) }}">Edit</a>
                          @csrf
                          <!-- @method('DELETE')<button type="submit" class="btn btn-danger">Delete</button> -->
                          <!-- </form> -->
                        </td>
                      </tr>
                      @endforeach
                  @else
                    No offer found
                  @endif
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
       
      </div>
    </div>


    </div>
  </div>
@endsection

