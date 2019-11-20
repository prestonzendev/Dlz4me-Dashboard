<div class="rlt-chat-box">
  <div class="chat-top-bar clearfix">
    <div class="on-name"></div>
    <div class="rlt-set">
      <a escape="false", onClick= "closeChatBox(event);" href="javascript:void(0);"><i class="fa fa-times"></i></a>
    </div>
  </div>
  
  <div class="msg_history"></div>
  <div class="chat-msg-box">
    {{ Form::open(['class' => 'form-horizontal form-prevent-multiple-submissions', 'novalidates'=>true, 'id'=>'ChatBoxForm', 'onSubmit'=>'chatMsgSend(event, this)']) }}
    
      {{ Form::hidden('logged_user_id', '', ['id'=>'loggedUserId']) }}
      {{ Form::hidden('target_user_id', '', ['id'=>'targetUserId']) }}
      
      {{ Form::textarea('message', null, ['class' => 'write_msg emojionearea', 'rows'=>'3', 'div'=>false, 'label'=>false, 'id'=>'chat_message', 'placeholder'=>'Type a message here']) }}

      <button class="msg_send_btn" alt="Send" type="submit">Send</button>
      <span style="display: none;"><input type="submit" name="Send"></span>
    
    {{ Form::close() }}
  </div>
</div>

@push('forced-scripts')
<script type="text/javascript">

    $(".emojionearea").emojioneArea({
        inline: false,
        saveEmojisAs:'shortname',
        search: false,
        recentEmojis: false,
        hidePickerOnBlur: true,
        hideSource: true,
        filters: {
          recent : false, // disable recent
          smileys_people: {
              icon: 'cat' // change smileys_people filter icon to "cat"
          },
          animals_nature: {
              title: 'Animals' // change animals_nature filter title to "Animals"
          },
          food_drink: {
              emoji: "smiley smile cat" // change emojis of the filter food_drink
          },
          objects: false, // disable objects filter
          symbols: false, // disable symbols filter
          flags : false // disable flags filter
        },
        events: {
              keyup: function(editor, evt) {
                if (evt.keyCode == 13)
                {
                  //$('#chat_message').val($('.emojionearea-editor').html());
                  //$('#ChatBoxForm').submit();
                  //$('.msg_send_btn').click();
                  //$('.emojionearea-editor').html('');
                  //$(this).val('');
                }
              }
        }
    });

</script>
@endpush