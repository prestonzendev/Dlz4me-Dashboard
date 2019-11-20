@extends('frontend.layouts.app')
@push('forced-styles')
{!! Html::style('css/emojione.css') !!}
@endpush
@section('content')
<div class="inside-wrapper search-page">
  <div class="container">
    @if($flash_info)
  
        <p>&nbsp;</p>
        <div class="row">
    <div class="col-md-12">
        <p class="alert alert-info">{{$flash_info}}</p>
    </div>
</div>

@endif
    <div class="inside-wrapperInner">
      @php
        $route = Route::currentRouteName();
      @endphp
      @if($route != 'frontend.user.mymatches')
      {{ Form::open(['route' => $route, 'class' => 'form-horizontal form-prevent-multiple-submissions', 'id' => 'viewlogs']) }}
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-1">
                <span class="link">Filter</span>
              </div>
              <div class="col-md-3">
              {{ Form::select('viewby', ['Pending Requests', 'Rejected Requests'], $viewby, ['class' => 'form-control categories box-size', 'onchange' => 'this.form.submit();']) }}
              </div>
            </div>
            {{ Form::close() }}
      @endif
            <div class="row">
              <div class="col-md-1">&nbsp;</div></div>
      @if($logs)
      @php
        $userids = [];
      @endphp
      @foreach ($logs as $userinfo)
      @php
        if (in_array($userinfo->uid, $userids)) continue;
        $userids[] = $userinfo->uid;
      @endphp
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-11">
          <div class="search-detsilsBlock">
            <div class="row">
              <div class="col-sm-1">
                <div class="img-block">
                  @if(!empty($userinfo->profilepic) && $userinfo->picapproved)
                  <img src="{{env('IMG_URL')}}/storage/app/public/img/profilepic/{{$userinfo->profilepic}}">
                  @else
                    <img src="{{url('images/noimagefound.jpg')}}" width="231px">
                  @endif
                </div>
              </div>
              <div class="col-sm-11">
                <div class="content d-flex justify-content-between flex-column h-100">
                  {{ Form::open(['route' => 'frontend.user.setviewdetails', 'class' => 'form-horizontal form-prevent-multiple-submissions', 'files' => true]) }}
                  <ul class="detsils-listing">
                    <li><strong>Name :</strong> {{$userinfo->accountname}}</li>
                    <li><strong>Location :</strong> {{$userinfo->city}} , {{$userinfo->state}}</li>
                    <li><strong>Contact Request sent :</strong> {{date("d/m/Y h:i:s a", strtotime($userinfo->updated_at))}}</li>
                    <li><strong>Request Status :</strong> 
                      @if($userinfo->accept_status == 1) 
                        <label class="badge badge-success">Accepted</label> 
                      @elseif($userinfo->accept_status == 2) 
                        <label class="badge badge-danger">Rejected</label> 
                      @else 
                        <label class="badge badge-danger">Pending</label> 
                      @endif 
                    </li>
                    <li>
                      {{ Form::input('hidden', 'refid', encrypt('view_' . $userinfo->uid)) }}
                      <input class="blue-btn" type="submit" name="actfor" value="View Details">
                      @if(isset($currentuser))
                        @if($currentuser != $userinfo->uid)
                         @if($userinfo->accept_status == 0)
                        <input class="blue-btn" name="actfor" type="submit" value="Reject">
                        @endif
                         @if($userinfo->accept_status != 1)
                        <input class="blue-btn" type="submit" name="actfor" value="Accept">
                        @endif
                      @endif
                      @endif
                      @if($userinfo->accept_status == 1) 
                        <span class="blue-btn chatnow" id="{{$userinfo->uid}}_{{$userinfo->accountname}}" >Chat Now</span> 
                        @if(isset($userUnseenChats[$userinfo->uid]))
                        <i class="far fa-comments">({{$userUnseenChats[$userinfo->uid]->total}})</i>
                        @endif
                      @endif
                    </li>
                  </ul>
                  {{ Form::close() }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
  </div>
@endsection

@push('forced-scripts')
    {!! Html::script('js/emojione.js') !!}
@endpush
