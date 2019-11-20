// Function to upload multiple images for add Feeds section
function uploadImage(obj){
    var fd = new FormData();
    var ins = obj.files.length;
    if(ins>1){
        for (var x = 0; x < ins; x++) {
            fd.append('images[][media_file]', obj.files[x]);
        }
    } else {
        fd.append('images[][media_file]', obj.files[0]);
    }
    jQuery.ajax({
        //url: "<?php echo $this->Url->build(['controller'=>'feeds', 'action'=>'image_upload', 'plugin'=>false]); ?>",
        url: baseurl+"feeds/image_upload/",
        type: 'post',
        data: fd,
        processData: false,
        contentType: false,
        dataType : 'json',
        beforeSend: function(xhr) {
            jQuery('.loader-overlay').show();
            xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
        },
        success:function(outputData){
            jQuery('.loader-overlay').hide();
            if(outputData.constructor === Array) {
                html = '';
                var functionName = "removeImage(this,'image')";
                for(var i=0; i<outputData.length;i++){
                    if(outputData[i].status == 'success'){
                        html += "<div class='imageBox' id='"+outputData[i].id+"'>";
                        html += "<a href='javascript:void(0);' onclick="+functionName+" data-id='"+outputData[i].id+"'><i class='fa fa-close'></i></a>";
                        html += "<img src="+outputData[i].data+" id='' width='100' height='100'>";
                        html += "</div>";
                    }
                }
                var existHtml = jQuery('.preview').html();
                if(existHtml){
                    jQuery('.preview').append(html);                            
                } else {
                    jQuery('.preview').html(html);
                } 
                $('.preview').show();
            } else {
                if(outputData.status == 'success'){
                    $("#img").attr("src",outputData.data);
                    jQuery('.removeImage').attr('data-id', outputData.id);
                    jQuery('.imageBox').attr('id', outputData.id);
                    $('.preview').show();
                } else {
                    alert('File not uploaded');
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

// Function to remove selected image for news feeds
function removeImage(obj, type){
    var imageId = jQuery(obj).attr('data-id');
    jQuery.ajax({
        //url: "<?php echo $this->Url->build(['controller'=>'feeds', 'action'=>'remove_image']); ?>",
        url: baseurl+"feeds/remove_image/",
        type: 'post',
        data: {'image_id':imageId, 'type':type},
        dataType : 'json',
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
        },
        success:function(outputData){
            if(outputData.status == 'success'){
                jQuery('#'+imageId).hide();
            } else {
                alert('File not uploaded');
            }

        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

// function to upload video
function uploadVideo(obj){
    var fd = new FormData();
    var ins = obj.files.length;
    if(ins>1){
        for (var x = 0; x < ins; x++) {
            fd.append('video[][media_file]', obj.files[x]);
        }
    } else {
        fd.append('video[][media_file]', obj.files[0]);
    }
    jQuery.ajax({
        url: baseurl+"feeds/video_upload/",
        type: 'post',
        data: fd,
        processData: false,
        contentType: false,
        dataType : 'json',
        beforeSend: function(xhr) {
            jQuery('.loader-overlay').show();
            xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
        },
        success:function(outputData){
            //console.log(outputData);
            jQuery('.loader-overlay').hide();
            if(outputData.constructor === Array) {
                html = '';
                var functionName = "removeImage(this,'video')";
                for(var i=0; i<outputData.length;i++){
                    if(outputData[i].status == 'success'){
                        html += "<div class='imageBox' id='"+outputData[i].id+"'>";
                        html += "<a href='javascript:void(0);' onclick="+functionName+" data-id='"+outputData[i].id+"'><i class='fa fa-close'></i></a>";
                        html += "<img src='images/video.jpg' id='' width='100' height='100'>";
                        html += "</div>";
                    }
                }

                var existHtml = jQuery('.preview').html();
                if(existHtml){
                    jQuery('.preview').append(html);                            
                } else {
                    jQuery('.preview').html(html);
                } 
                jQuery('.preview').removeAttr('style');
            } else {
                alert('gdgfdfgd');
                if(outputData.status == 'success'){
                    jQuery("#img").attr("src",'/images/video.jpg');
                    jQuery('.removeImage').attr('data-id', outputData.id);
                    jQuery('.imageBox').attr('id', outputData.id);
                    jQuery('.preview').removeAttr('style');
                } else {
                    if(outputData.error){
                        alert(outputData.error);
                    }
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

// JQuery Function to Sends Add Friend Request
function addFriendRequest(obj, username, type){
    jQuery.ajax({
        //url: "<?php echo $this->Url->build(['controller'=>'users', 'action'=>'add_friend', 'plugin'=>'UserManager']); ?>",
        url: baseurl+"users/add_friend/",
        type: 'post',
        data: {'username':username, 'type':type},
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
        },
        success: function(html) {
        	if(html){
                jQuery(obj).parent().html(html);
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

// Javascript function for ajax request to Accept Friend Request
function acceptFriendRequest(username, type){
    jQuery.ajax({
        url: baseurl+"users/accept_friend_request/",
        type: 'post',
        data: {'username':username, 'type':'single'},
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
        },
        success: function(html) {
            if(html){
                jQuery('.accept-request-button').html(html);       
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

// JQuery Function to Cancel Friend Request
function cancelFriendRequest(obj, username, type, operation){
    jQuery.ajax({
        url: baseurl+"users/cancel_friend/",
        type: 'post',
        data: {'username':username, 'type': type},
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
        },
        success: function(html) {
            if(html){
                if(operation=='unfriend' || operation=='decline'){
                    jQuery('.friend-button-'+username).html(html);                    
                } else {
                    jQuery(obj).parent().html(html);
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

// JQuery Function to Cancel Friend Request
function unfriend(username){
	jQuery.ajax({
        url: baseurl+"users/cancel_friend/",
        type: 'post',
        data: {'username':username},
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
        },
        success: function(html) {
        	if(html){
        		jQuery('.friend-button').html(html);
        	}
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}


// function to load more friends
function loadMoreFriends(offset, type){
    if(offset){
        var totalFriends = jQuery('#total_friends').val();
        jQuery.ajax({
            url: baseurl+"users/load_more_friends",
            type: 'post',
            data: {'type':type, 'skipFriends' : offset},
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
            },
            success:function(outputData){
                if(outputData){
                    if(type=='popup'){
                        jQuery('.tagging-friends').append(outputData);
                    } else if(type=='list'){
                        jQuery('.friend-list-sec ul').append(outputData);
                    }
                    offset = offset + 2; // Offset * Limit;
                    if(totalFriends > offset){
                        jQuery('.load-more-friends').attr('onClick', 'loadMoreFriends('+offset+', "'+type+'")');
                    } else {
                        jQuery('.load-more-friends').css('display', 'none');
                    }
                } else {
                    jQuery('.load-more-friends').css('display', 'none');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}

// function to load more friends
function loadMoreRecommendations(offset, type){
    if(offset){
        var totalFriends = jQuery('#total_friends').val();
        jQuery.ajax({
            url: baseurl+"users/load_more_recommendations",
            type: 'post',
            data: {'type':type, 'skipFriends' : offset},
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
            },
            success:function(outputData){
                if(outputData){
                    if(type=='popup'){
                        jQuery('.tagging-friends').append(outputData);
                    } else if(type=='list'){
                        jQuery('.friend-suggested-sec ul').append(outputData);
                    }
                    offset = offset + 2; // Offset * Limit;
                    if(totalFriends > offset){
                        jQuery('.load-more-friends').attr('onClick', 'loadMoreRecommendations('+offset+', "'+type+'")');
                    } else {
                        jQuery('.load-more-friends').css('display', 'none');
                    }
                } else {
                    jQuery('.load-more-friends').css('display', 'none');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}

// function to load more friends
function loadMoreAppreciations(offset){
    if(offset){
        var totalAppreciations = jQuery('#total_appreciations').val();
        jQuery.ajax({
            url: baseurl+"appreciations/load_more_appreciations",
            type: 'get',
            data: {'skipAppreciation' : offset},
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
            },
            success:function(outputData){
                if(outputData){
                    jQuery('.search-result-list ul').append(outputData);
                    offset = offset + 10; // Offset * Limit;
                    if(totalAppreciations > offset){
                        jQuery('.load-more-friends').attr('onClick', 'loadMoreAppreciations('+offset+')');
                    } else {
                        jQuery('.load-more-friends').css('display', 'none');
                    }
                } else {
                    jQuery('.load-more-friends').css('display', 'none');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}


// function to load more feeds
function loadMoreFeeds(offset, page, username){
    if(offset){
        var totalFeeds = jQuery('#total_feeds').val();
        jQuery.ajax({
            url: baseurl+"feeds/load_more_feeds/",
            type: 'get',
            data: {'skipFeeds':offset, 'page':page, 'username':username},
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', "CLIENT_TOKEN");
            },
            success:function(outputData){
                if(outputData){
                    jQuery('.feeds-listing').append(outputData);
                    offset = offset + 10; // Offset * Limit;
                    if(totalFeeds > offset){
                        if(page=='profile'){
                            jQuery('.load-more-feeds').attr('onclick', 'loadMoreFeeds('+offset+', "'+page+'", "'+username+'")');
                        } else {
                            jQuery('.load-more-feeds').attr('onclick', 'loadMoreFeeds('+offset+', "'+page+'")');                            
                        }
                    } else {
                        jQuery('.load-more-feeds').css('display', 'none');
                    }
                } else {
                    jQuery('.load-more-feeds').css('display', 'none');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}

/* 
Himanshu Sharma 
function to add users into a news feed.
*/
function tagfriendsToFeed(event, obj){
    event.preventDefault();
    jQuery.ajax({
        url: baseurl+"feeds/save_tag_friends/",
        type: 'post',
        dataType : 'json',
        data: jQuery('#tagFriendsForm').serialize(),
        beforeSend: function(xhr) {
            jQuery('.loader-overlay').show();
            xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
        },
        success:function(response){
            jQuery('.loader-overlay').hide();
            if(response.status == 'success'){
                jQuery("#tagFriendsPopup").modal('hide');                        
            } else if(response.status == 'validation'){
                jQuery('.tag-box-error-msg').show().html(response.message);
            } else {
                jQuery("#tagFriendsPopup").trigger('close');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}


/* 
Himanshu Sharma 
function to add a news feed.
*/
function createNewsFeedPost(event){
    event.preventDefault();
    jQuery.ajax({
        url: baseurl+"feeds/add_feeds",
        type: 'post',
        dataType : 'json',
        data: jQuery('#createFeeds').serialize(),
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
        },
        success:function(response){
            if(response.status == 'success'){
                location.reload();
            } else if(response.status == 'errorCategory'){
                //jQuery('.tag-box-error-msg').show().html(response.message);
                alert('Please select atleast a category');
            } else if(response.status == 'error'){
                jQuery("#blank_category").css('display', 'none'); 
                jQuery("#openCategoriesPopup").modal('hide'); 
                jQuery("#content").css('border-color', '#ff0000');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

/*
Himanshu Sharma
Function to get media files to show with the feeds
*/
function getMediaForFeeds(feedId){
    if(feedId){
        var html = '';
        jQuery.ajax({
            url: baseurl+"feeds/get_feeds_media",
            type: 'post',
            data: {'feeds_id':feedId},
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
            },
            success:function(response){
                if(response){
                    jQuery('#ModalCarousel').html(response);
                    jQuery('#ModalCarousel').addClass('show');
                    jQuery('#ModalCarousel').css('display', 'block');
                    jQuery('.modal-backdrop').show();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}


function closePopup(modalId){
    jQuery('#'+modalId).hide();
    jQuery('#'+modalId).removeClass('show');
    jQuery('.modal-backdrop').hide();
}



function updateNewsFeedPost(event, feedsId){
    event.preventDefault();
    var content = jQuery('#edit_content_'+feedsId).val();
    jQuery.ajax({
        url: baseurl+"feeds/edit_feeds",
        type: 'post',
        dataType:'json',
        data: {'feeds_id':feedsId, 'content':content},
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
        },
        success:function(response){
            if(response.status == 'success'){
                jQuery('#content_'+feedsId).html(content);
                jQuery("#editNewsFeedPopup"+feedsId).modal('hide'); 
            } else if(response.status == 'error'){
                jQuery("#editNewsFeedPopup"+feedsId).modal('hide'); 
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}


function reactOnFeed(obj, feedId, reaction){
    if(feedId && reaction){
        var countEmoji = jQuery('#feeds-emojicount-'+feedId).val();
        var defaultHtml = jQuery('.emoji-reactions-'+feedId+' a').html();
        jQuery.ajax({
            url: baseurl+"feeds/react_on_feed",
            type: 'post',
            data: {'feeds_id':feedId, 'react':reaction},
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
            },
            success:function(response){
                if(response){
                    console.log(response);
                    jQuery('.reaction-box-'+feedId+' li').removeClass('active');
                    jQuery('.emoji-reactions-'+feedId).html(response);
                    jQuery(obj).parent().addClass('active');
                    /*if(jQuery(obj).has('span').length) {
                        var count = jQuery(obj).children().find('span').html();
                        alert(count);
                    } else {
                        jQuery(obj).append('<span>1</span>');                        
                    }*/
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}

function shareOnFeed(event, obj, feedsId){
    event.preventDefault();
    if(feedsId){
        jQuery.ajax({
            url: baseurl+"feeds/share_feeds",
            type: 'get',
            dataType : 'json',
            data: {'feeds_id':feedsId},
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
            },
            success:function(response){
                if(response.status=='success'){
                    var username = response.username;
                    location.reload();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}


function deleteFeedPost(event, obj, feedsId){
    event.preventDefault();
    if (confirm("Are you sure want to delete this feed ?")) {
        if(feedsId){
            jQuery.ajax({
                url: baseurl+"feeds/delete_feeds",
                type: 'get',
                dataType : 'json',
                data: {'feeds_id':feedsId},
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
                },
                success:function(response){
                    if(response.status=='success'){
                        location.reload();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }  
    }
}


function openCommentBox(event, obj, feedsId){
    event.preventDefault();
    jQuery.ajax({
        url: baseurl+"feeds/get_comments",
        type: 'get',
        data: {'feeds_id':feedsId},
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
        },
        success:function(response){
            jQuery('#comment_box_'+feedsId).css('display','block');
            jQuery(obj).removeAttr('onClick');
            if(response){
                jQuery('#comment_box_'+feedsId).prepend(response);
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

function commentOnFeeds(event, obj, feedsId){
    event.preventDefault();
    var postQuery = jQuery(obj).serialize();
    var url = baseurl+"feeds/post_comment";
    jQuery.ajax({
        url: url,
        type: 'post',
        dataType:'text',
        data: postQuery,
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
        },
        success:function(response){
            if(response){
                jQuery(response).insertBefore('#post_comments_form_'+feedsId);
                jQuery(obj).trigger("reset");
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

function openReplyBox(event, obj, feedsId, commentId){
    event.preventDefault();
    jQuery.ajax({
        url: baseurl+"feeds/get_reply_on_comments",
        type: 'get',
        data: {'feeds_id':feedsId, 'comment_id':commentId},
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
        },
        success:function(response){
            //jQuery('#reply_comment_box_'+commentId+'_'+feedsId).load();
            jQuery(document).find('#reply_comment_box_'+commentId+'_'+feedsId).show();            
            if(response){
                jQuery('#reply_list_'+commentId+'_'+feedsId).prepend(response);
            }
            jQuery(obj).removeAttr('onclick');
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}


function replyOnComment(event, obj, feedsId, commentId){
    event.preventDefault();
    var postQuery = jQuery(obj).serialize();
    var url = baseurl+"feeds/post_reply_on_comment";
    jQuery.ajax({
        url: url,
        type: 'post',
        dataType:'text',
        data: postQuery,
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
        },
        success:function(response){
            if(response){
                jQuery(response).insertBefore('.reply-list-box'+'-'+commentId+'-'+feedsId);
                jQuery(obj).trigger("reset");
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}


/*
Himanshu Sharma
Function to open textbox to edit comment
*/
function editComment(event, obj, feedsId, commentId){
    event.preventDefault();
    var comment = jQuery(obj).parent().find('span').html();
    comment = comment ? comment.trim() : '';
    var html = "<form id='edit-comment-form-"+commentId+"-"+feedsId+"'>";
    html += "<input type='hidden' name='feeds_id' value="+feedsId+">";
    html += "<input type='hidden' name='comment_id' value="+commentId+">";
    html += "<input type='text' class='form-control user-comment-edit' id='comment-edit-textbox-"+commentId+"-"+feedsId+"' name='comment' value='"+comment+"'>";
    html += "<button class='comment-send btn btn-custom post-btn' onclick='editCommentSubmit(event, this, "+feedsId+", "+commentId+")'><i class='fa fa-paper-plane-o ml-1'></i></button>";
    html += "</form>";
    jQuery(obj).parent().html(html);
}

/*
Himanshu Sharma
Function to edit comments
*/
function editCommentSubmit(event, obj, feedsId, commentId){
    event.preventDefault();
    var newComment = jQuery('#comment-edit-textbox-'+commentId+'-'+feedsId).val();
    var url = baseurl+"feeds/edit_comments";
    jQuery.ajax({
        url: url,
        type: 'post',
        dataType:'text',
        data: jQuery('#edit-comment-form-'+commentId+'-'+feedsId).serialize(),
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
        },
        success:function(response){
            if(response){
                jQuery('.comment-per-name-'+feedsId+'-'+commentId).html(response);
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}


/*
Himanshu Sharma
Function to delete comments
*/
function deleteComment(event, obj, feedsId, commentId){
    event.preventDefault();
    if (confirm("Are you sure want to delete this comment ?")) {
        var url = baseurl+"feeds/delete_comments";
        jQuery.ajax({
            url: url,
            type: 'get',
            dataType:'json',
            data: {'comment_id':commentId, 'feeds_id':feedsId},
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
            },
            success:function(response){
                if(response){
                    jQuery('.comment-per-name-'+feedsId+'-'+commentId).parent().parent().hide();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}

function reactOnAppreciation(obj, appreciationId, reaction){
    if(appreciationId){
        var defaultHtml = jQuery(obj).html();
        jQuery.ajax({
            url: baseurl+"appreciations/reactOnAppreciation",
            type: 'post',
            dataType: 'json',
            data: {'appreciation_id':appreciationId,'reaction':reaction},
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
            },
            success:function(response){
                if(response.status == 'success'){
					if(response.message == 'liked' || response.message == 'thanked'){
					   jQuery(obj).addClass('active'); 
					} else { 
					   jQuery(obj).removeClass('active'); 
					}
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}


// function to load more friends
function loadMoreResults(offset, keyword){
    if(offset){
        var totalResults = jQuery('#total_results').val();
        jQuery.ajax({
            url: baseurl+"users/load_more_results",
            type: 'post',
            data: {'skipResults':offset, 'keyword':keyword},
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
            },
            success:function(outputData){
                if(outputData){
                    jQuery('.search-result-list ul').append(outputData);
                    offset = offset + 5; // Offset * Limit;
                    if(totalResults > offset){
                        jQuery('.load-more-friends').attr('onClick', 'loadMoreResults('+offset+')');
                    } else {
                        jQuery('.load-more-friends').css('display', 'none');
                    }
                } else {
                    jQuery('.load-more-friends').css('display', 'none');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}


function loadMoreActivities(offset){
    if(offset){
        var totalActivites = jQuery('#total_activities').val();
        jQuery.ajax({
            url: baseurl+"activity-logs/load_more_activities",
            type: 'get',
            data: {'skipActs':offset},
            dataType:'html',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
            },
            success:function(outputData){
                if(outputData){
                    jQuery('.search-result-list ul').append(outputData);
                    offset = offset + 5; // Offset * Limit;
                    if(total_activities > offset){
                        jQuery('.load-more-friends').attr('onClick', 'loadMoreActivities('+offset+')');
                    } else {
                        jQuery('.load-more-friends').css('display', 'none');
                    }
                } else {
                    jQuery('.load-more-friends').css('display', 'none');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}

function loadMoreNotifications(offset){
    if(offset){
        var totalNotifications = jQuery('#total_notifications').val();
        jQuery.ajax({
            url: baseurl+"notifications/load_more_notifications",
            type: 'get',
            data: {'skipNotifications':offset},
            dataType:'html',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
            },
            success:function(outputData){
                if(outputData){
                    jQuery('.search-result-list ul').append(outputData);
                    offset = offset + 5; // Offset * Limit;
                    if(totalNotifications > offset){
                        jQuery('.load-more-friends').attr('onClick', 'loadMoreNotifications('+offset+')');
                    } else {
                        jQuery('.load-more-friends').css('display', 'none');
                    }
                } else {
                    jQuery('.load-more-friends').css('display', 'none');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}


function openChatBox(event, friendId, friendName){
    event.preventDefault();
    jQuery('#loggedUserId').val(LoggedUserId);
    jQuery('#targetUserId').val(friendId);
    jQuery.ajax({
        url:baseurl+'chats/get_conversations',
        method:'get',
        data: {'sender_id':LoggedUserId, 'receiver_id':friendId},
        dataType:'html',
        success: function(response){
            if(response){
                jQuery('.msg_history').html(response);
            } else {
                jQuery('.msg_history').html('');                
            }
            jQuery('.rlt-chat-box').find('.on-name').html("<i class='fa fa-comments'></i> "+friendName);
            jQuery('.rlt-chat-box').show();
            jQuery(".msg_history").animate({scrollTop: jQuery(".msg_history")[0].scrollHeight}, 1000);
            jQuery('#chat_message').focus();
            var objDiv = jQuery(".rlt-chat-box");
            var h = objDiv.get(0).scrollHeight;
            objDiv.animate({scrollTop: h});
        }
    });
}


function openOnlyChatBox(event, friendId, friendName){
    event.preventDefault();
    jQuery('#loggedUserId').val(LoggedUserId);
    jQuery('#targetUserId').val(friendId);
    jQuery('.rlt-chat-box').find('.on-name').html("<i class='fa fa-comments'></i> "+friendName);
    jQuery('.rlt-chat-box').show();
}


jQuery('#chat_message').keypress(function(event){
    if(event.keyCode==13){
        event.preventDefault();
        jQuery('#ChatBoxForm').submit();
    }
});

function chatMsgSend(event, obj){
    event.preventDefault();
    var socket = io("http://111.93.56.212:8080/");
    var friendId = jQuery('#targetUserId').val();
    var message = jQuery('#ChatBoxForm').find('textarea').val();
    var completeData = {'sender':LoggedUserId, 'receiever':friendId, 'message':message};
    socket.emit("chat message",completeData);
}    

function closeChatBox(event){
    event.preventDefault();
    jQuery('.rlt-chat-box').hide();
    jQuery('.msg_history').html('');        
}


function loadMoreMessages(event, offset, receiverId){
    event.preventDefault();
    if(offset){
        var totalMessages = jQuery('#total_messages').val();
        jQuery.ajax({
            url: baseurl+"chats/load_more_messages",
            type: 'get',
            data: {'receiver_id':receiverId, 'skipMessages' : offset},
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
            },
            success:function(outputData){
                if(outputData){
                    console.log(outputData);
                    jQuery('.msg_history').prepend(outputData);
                    jQuery('.load-more-friends').css('display', 'none');
                    offset = offset + 10; // Offset * Limit;
                    if(totalMessages > offset){
                        jQuery('.msg_history').prepend('<a href="javascript:void(0);" onclick="loadMoreMessages(event, '+offset+', '+receiverId+')" class="load-more-friends">Load More Messages</a>');
                    } else {
                        jQuery('.load-more-friends').css('display', 'none');
                    }
                    var objDiv = jQuery('.msg_history');
                    objDiv.scrollTop = objDiv.scrollHeight;
                } else {
                    jQuery('.load-more-friends').css('display', 'none');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}


function filterFriends(event, obj){
    event.preventDefault();
    var keyword = jQuery(obj).val();
    jQuery.ajax({
        url: baseurl+"users/filterFriends",
        type: 'get',
        data: {'keyword':keyword},
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
        },
        success:function(outputData){
            if(outputData){
                jQuery('.tagging-friends').html(outputData);
                jQuery('.load-more-friends').hide();
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

}


/*
Himanshu Sharma
function to delete one simgle media file.
*/
function deleteFeedMedia(mediaId){
    if(mediaId){
        if (confirm("Are you sure want to delete this media ?")) {
            jQuery.ajax({
                url: baseurl+"feeds/delete_feed_media",
                type: 'get',
                dataType : 'json',
                data: {'media_id':mediaId},
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
                },
                success:function(response){
                    if(response.status=='success'){
                        location.reload();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    } else {

    }
}


/*
Himanshu Sharma
Function to open tagged user's list for feed title
*/
function taggedUsersPopup(e, obj, feedsId){
    e.preventDefault();
    if(feedsId){
        jQuery.ajax({
            url: baseurl+"users/tagged_users_list",
            type: 'get',
            data: {'feeds_id':feedsId},
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
            },
            success:function(response){
                console.clear();
                console.log(response);
                if(response){
                    jQuery('.tagged_users_list').html(response);
                    jQuery('#taggedUsersListPopup').show();
                    jQuery('#taggedUsersListPopup').modal({backdrop: 'static', keyboard: false});
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}


/* 
Himanshu Sharma
Fucntion to show reacted user's listing
*/
function reactedUsersPopup(event, obj, feedsId){
    event.preventDefault();
    if(feedsId){
        jQuery.ajax({
            url: baseurl+"users/reacted_users_list",
            type: 'get',
            data: {'feeds_id':feedsId},
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', CLIENT_TOKEN);
            },
            success:function(response){
                if(response){
                    jQuery('.tagged_users_list').html(response);
                    jQuery('#usersListingPopup').html('Friends Reacted');
                    jQuery('#taggedUsersListPopup').show();
                    jQuery('#taggedUsersListPopup').modal({backdrop: 'static', keyboard: false});
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}

