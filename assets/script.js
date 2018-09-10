jQuery(function (){
  jQuery('#type_post').change(function (){
    var type_post = jQuery(this).val()
    jQuery.ajax({
      type:'POST',
      data:{type_post: type_post},
      url:'/wp-admin/admin-ajax.php?action=get_posts',
      dataType:'json',
      success: function(data){
        if(data['success']){
          var posts = ''
          jQuery.each(data.data, function (key, val){
		posts += '<tr><td><input type="checkbox" name="postID[]" value="'+val.ID+'"></td><td>'+val.post_title+'</td></tr>'; });
          jQuery('.fields-post table').html(posts);
          jQuery('.form-pti').show();
        }else{
          jQuery('#ajax-message').html(data['data']);
          jQuery('#ajax-message').show();
        }
      }
    });
  });
});
