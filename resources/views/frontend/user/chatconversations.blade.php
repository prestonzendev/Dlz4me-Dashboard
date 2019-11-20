@if($chattingData)
    
  @foreach($chattingData as $chat)
    @if(!empty($user_id) && $user_id == $chat->sender_id)
       <div class="outgoing_msg logged-user-chat clearfix">
      <div class="incoming_msg_img">
        @php
          $path =  '/storage/app/public/img/profilepic/' . $users[$user_id]->profilepic;
          $docpath =  $_SERVER['DOCUMENT_ROOT'] . $path;
        @endphp
        @if(!empty($users[$user_id]->profilepic) && $users[$user_id]->picapproved == 1 && file_exists($docpath))
        <img src="{{env('IMG_URL') . $path}}" width="50px" alt="Me">
        @else
          <span><i class="fa fa-user-circle"></i></span>
        @endif
      </div>
      <div class="received_msg">
        @php
        $msg = nl2br($chat->message);
        @endphp
        <p>@emojione($msg)</p>
      </div>
    </div>
    @else

    <div class="incoming_msg target-user-chat clearfix">
      <div class="incoming_msg_img">
        @php
          $path =  '/storage/app/public/img/profilepic/' . $users[$otherUser_id]->profilepic;
          $docpath =  $_SERVER['DOCUMENT_ROOT'] . $path;
        @endphp
        @if(!empty($users[$otherUser_id]->profilepic) && $users[$otherUser_id]->picapproved == 1  && file_exists($docpath))
        <img src="{{env('IMG_URL')}}/storage/app/public/img/profilepic/{{$users[$otherUser_id]->profilepic}}" width="50px" alt="Other">
        @else
          <span><i class="fa fa-user-circle"></i></span>
        @endif
      </div>
      <div class="received_msg">
        @php
        $msg = nl2br($chat->message);
        @endphp
        <p>@emojione($msg)</p>
      </div>
    </div>
    @endif
  @endforeach
@endif
