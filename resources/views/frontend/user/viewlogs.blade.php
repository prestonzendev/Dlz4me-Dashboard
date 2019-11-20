@extends('frontend.layouts.app')

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
      {{ Form::open(['route' => 'frontend.user.viewlogs', 'class' => 'form-horizontal form-prevent-multiple-submissions', 'id' => 'viewlogs']) }}
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-1">
          <span class="link">Filter</span>
        </div>
        <div class="col-md-3">
        {{ Form::select('viewby', ['Who Viewed My Profile', 'Viewed by Me'], $viewby, ['class' => 'form-control categories box-size', 'onchange' => 'this.form.submit();']) }}
        </div>
      </div>
      {{ Form::close() }}
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-11">
          &nbsp;
        </div>
      </div>
      @if($logs)
      @foreach ($logs as $userinfo)
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-11">
          <div class="search-detsilsBlock">
            <div class="row">
              <div class="col-sm-2">
                <div class="img-block">
                  @if(!empty($userinfo->profilepic) && $userinfo->picapproved)
                  <img src="{{env('IMG_URL')}}/storage/app/public/img/profilepic/{{$userinfo->profilepic}}" alt="Profile Photo">
                  @else
                    <img src="{{url('images/noimagefound.jpg')}}" width="231px" alt="Profile Photo">
                  @endif
                </div>
              </div>
              <div class="col-sm-10">
                <div class="content d-flex justify-content-between flex-column h-100">
                  {{ Form::open(['route' => 'frontend.user.setviewdetails', 'target'=>'_blank', 'class' => 'form-horizontal form-prevent-multiple-submissions', 'files' => true]) }}
                  <ul class="detsils-listing">
                    <li><strong>Name :</strong> {{$userinfo->accountname}}</li>
                    <li><strong>Location :</strong> {{$userinfo->city}} , {{$userinfo->state}}</li>
                    <li><strong>View at :</strong> {{date("d/m/Y h:i:s a", strtotime($userinfo->created_at))}}</li>
                    <li>
                      {{ Form::input('hidden', 'refid', encrypt('view_' . $userinfo->uid)) }} 
                      <input class="blue-btn" type="submit" value="View Details">
                    </li>
                  </ul>
                  {{ Form::close() }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        @php echo $logs->appends(['viewby' => $viewby])->render(); @endphp
      </div>
      @endforeach
      @endif
    </div>
  </div>
  </div>
@endsection