# myinstagram
<?php 
    /*
    Plugin Name: Load More Instagram
    Plugin URI: http://www.vibhutitechnologies.net
    Description: This plugin connect with instgram and fetch all images by username after connect with instagram
    Author: Vibhutitech Technologies
    Version: 1.0 (Version Updated)
    Author URI: http://www.vibhutitechnologies.net
    */
?>
<?php
add_action( 'plugins_loaded', 'my_plugin_override' );

function my_plugin_override() {
    // update access token and userid when plugin loaded   
}

add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_menu() {
  add_menu_page( 'My Instagram', 'My Instagram', 'manage_options', 'myinstagram', 'myinstagram_admin_page', 'dashicons-rss', 111  ); // dashicons-tickets
  //call register settings function
  add_action( 'admin_init', 'register_my_instagram_plugin_settings' );
}

function register_my_instagram_plugin_settings() {
  //register our settings
  register_setting( 'myinstagram-values', 'myinstagram_token');
  register_setting( 'myinstagram-values', 'myinstagram_userid');
  register_setting( 'myinstagram-values', 'myinstagram_username');
  register_setting( 'myinstagram-values', 'myinstagram_fullname');
  register_setting( 'myinstagram-values', 'myinstagram_image');
  register_setting( 'myinstagram-values', 'myinstagram_columns');
  
  register_setting( 'myinstagram-values', 'myinstagram_posts');
  register_setting( 'myinstagram-values', 'myinstagram_followers');
  register_setting( 'myinstagram-values', 'myinstagram_following');
}


function myinstagram_admin_page(){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<style>
body{
margin:0px;
padding:0px;
}
.heading
{
margin-top:0px;
}
.bdp-admin-notice-pro-layouts
{
display:none;
}
.fade
{
display:none;
}
.error
{
display:none;
}
.wppb-serial-notification
{
display:none;
}
.input-xs {
  width:500px;
}
form #tokenform {
    margin-top: 25px;
}

button.btn.btn-primary.btninsta {
    margin-bottom: 25px;
}
input #token {
    width: 500px;
}

input #userid {
    width: 500px;
}

input #username {
    width: 500px;
}
.wp-admin select {
 width: 180px;
}
div #shortcode {
    margin-bottom: 50px;
}
#code{
	color:red;
}
#codeinfo{
margin-top:50px;
}
#loadmore
{
  margin-top:25px;
}

/* load more button */
#btn-instafeed-load {
  color: #fff;
  background: #26a3ff;
  font-size: 16px;
  margin: 20px auto;
  padding: 8px 40px;
  display: block;
  border: none;
}
#hightlight {
    color: red;
}
#dolly {
    display: none;
}
#posts{
color:red;
}
#followers{
color:green;
}
#following{
color:blue;
}

</style>

  <div class="row">
    <div class="col-sm-6 heading">
  <div class="wrap">
    <h2>Welcome To My Instagram By Vibhuti Technologies</h2>
    <p>This plugin add your info with instagram and show all images that having on instagram.</p>
    <hr/>
    <button type="button" class="btn btn-primary btninsta">Connect with Instgram</button>
  </div>

</div>
</div> <!-- row -->

  <div class="col-sm-4">
  <form id="tokenform" method="post" action="options.php">
  <?php settings_fields( 'myinstagram-values' ); ?>
  <?php do_settings_sections( 'myinstagram-values' ); ?>
    <div class="form-group">
      <label for="usr">Token:</label>
      <input type="text" class="form-control input-xs" onclick="this.select()" name="myinstagram_token" value="<?php echo get_option( 'myinstagram_token' ); ?>" id="token">
    </div>
    
    <div class="form-group">
      <label for="usr">User ID:</label>
      <input type="text" class="form-control input-xs" onclick="this.select()" name="myinstagram_userid" value="<?php echo get_option( 'myinstagram_userid' ); ?>" id="userid">
    </div>

    <div class="form-group">
      <label for="usr">Username:</label>
      <input type="text" class="form-control input-xs" onclick="this.select()" name="myinstagram_username" value="<?php echo get_option('myinstagram_username'); ?>" id="username">
      <input type="hidden" class="form-control input-xs" name="myinstagram_fullname" value="<?php echo get_option('myinstagram_fullname'); ?>" id="fullname">
      <input type="hidden" class="form-control input-xs" name="myinstagram_image" value="<?php echo get_option('myinstagram_image'); ?>" id="profile_image">
      
      <input type="hidden" class="form-control input-xs" name="myinstagram_posts" value="<?php echo get_option('myinstagram_posts'); ?>" id="posts">
      <input type="hidden" class="form-control input-xs" name="myinstagram_followers" value="<?php echo get_option('myinstagram_followers'); ?>" id="followers">
      <input type="hidden" class="form-control input-xs" name="myinstagram_following" value="<?php echo get_option('myinstagram_following'); ?>" id="following">


    </div>

      <label for="sel1">Select Columns (Column):</label>
      <?php $options = get_option( 'myinstagram_columns' ); ?>
      
      <select class="form-control" id="sellcol" name="myinstagram_columns[column]">
        <option value="1" <?php selected( $options['column'], 1 ); ?> >1</option>
        <option value="2" <?php selected( $options['column'], 2 ); ?> >2</option>
        <option value="3" <?php selected( $options['column'], 3 ); ?> >3</option>
        <option value="4" <?php selected( $options['column'], 4 ); ?> >4</option>
        <option value="5" <?php selected( $options['column'], 5 ); ?> >5</option>
        <option value="6" <?php selected( $options['column'], 6 ); ?> >6</option>
        <option value="7" <?php selected( $options['column'], 7 ); ?> >7</option>
        <option value="8" <?php selected( $options['column'], 8 ); ?> >8</option>
        <option value="9" <?php selected( $options['column'], 9 ); ?> >9</option>
        <option value="10" <?php selected( $options['column'], 10 ); ?> >10</option>
        <option value="11" <?php selected( $options['column'], 11 ); ?> >11</option>
        <option value="12" <?php selected( $options['column'], 12 ); ?> >12</option>
      </select>

<?php submit_button(); ?>
  </form>
</div>
<div class="col-sm-4 profile_img">

	<div class="row">
	<div class="col-sm-4" style="border-style: solid;">
	<?php if(get_option('myinstagram_image') != '') { ?>
	<img src="<?php echo get_option('myinstagram_image'); ?>" onclick="window.open(this.src);">
	<?php } else { ?>
	<img src="https://thepurseclub.staging.wpengine.com/wp-content/uploads/2017/08/profile-icon.png" width="100px" height="100px">
	<?php } ?>
	</div>
	<div class="col-sm-2">
	
	<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Option
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li class="settinginsta"><a href="#">Settings</a></li>
    <li role="separator" class="divider"></li>
    <li class="logoutinsta"><a href="#">Logout</a></li>
  </ul>
</div>
	
	</div><!--Drop down column-->
	</div>

	<div class="row">
    <div class="col-sm-4" style=""><?php echo $instauser= get_option('myinstagram_fullname'); ?></div>
    </div> <!-- row -->
    
    <div class="row">
    <div class="col-sm-6 postinfo" style="">
    
    <?php echo get_option('myinstagram_posts'); ?> <span id="posts">posts</span> 
    <?php echo get_option('myinstagram_followers');  ?> <span id="followers">followers</span>
    <?php echo get_option('myinstagram_following'); ?> <span id="following">following</span> </div>
    
    </div> <!-- row -->
    <div class="row">
    <div class="col-sm-10" style="">
    <p>Use this shortcode <span id="hightlight">[myinstagram_load_images]</span> to show instagram posts.</p>    
    </div>	<!--  column -->
    </div>
    </div>
    
</div>	<!-- row --> 

<hr/>

<div id="instafeed" align="center">
</div>

<button id="btn-instafeed-load" class="btn">Load more</button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/instafeed.js/1.4.1/instafeed.min.js"></script>
<script type="text/javascript">
//$(document).ready(function() {
  $(function(){
  	
  	$(document).on('click','.logoutinsta',function () {
  		/*$.post("/wp-admin/admin-ajax.php?action=share_referral_item_function", function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
    });*/
    $.post("/wp-admin/admin-ajax.php?action=myinstagram_logout_function",
        {
          //paramname1: "value1",
          //paramname2: "value2"
        },
        function(data,status){
            //alert("Data: " + data + "\nStatus: " + status);
            location.reload();
        });
  	});

    $(document).on('click', '.btninsta', function(){
        myInstaWindow();
    });

    function myInstaWindow() {
    var popupWidth = 700,
    popupHeight = 500,
    popupLeft = (window.screen.width - popupWidth) / 2,
    popupTop = (window.screen.height - popupHeight) / 2;

    //popup.open('https://api.pinterest.com/oauth?client_id='+instagramClientId+'&redirect_uri='+instagramRedirectUri+'&response_type=token&scope=read_public,write_public', '_self');
    var request_uri = 'https://api.instagram.com/oauth/authorize/?client_id=efbf2e29d5554bf6851cfa330f3fe5c2&redirect_uri=https://thepurseclub.staging.wpengine.com/wp-admin/admin.php?page=myinstagram&response_type=token';

    var win = window.open(request_uri,'', 'width='+popupWidth+',height='+popupHeight+',left='+popupLeft+',top='+popupTop+'');
    
          var interval = setInterval(function() {
          try {
            
            //check if hash exists
            if(win.location.hash.length) {
              //hash found, that includes the access token
              clearInterval(interval);
              accessToken = win.location.hash.slice(14); //slice #access_token= from string
              $('#token').val(accessToken);
              //localStorage.setItem('accessToken', accessToken);
              updateValue(accessToken);
              //console.log(accessToken);
              win.close();
              //location.reload();

            }
          }
          catch(evt) {
            //permission denied
          }
        }, 100);


}

function updateValue(accessToken){

//var insta_token = localStorage.getItem('accessToken');
var userid= '';
var username = '';
var image = '';
var fullname = '';

$.ajax({
        type: 'GET',
        dataType: "jsonp",
        url: 'https://api.instagram.com/v1/users/self/?access_token=' + accessToken,
        success: function(response){
          userid = response.data.id;
          username = response.data.username;
          fullname = response.data.full_name;
          image = response.data.profile_picture;
          
        $('#response_here').html(response);
        $('#userid').val(userid);
        $('#username').val(username);
        $('#fullname').val(fullname);
        $('#profile_image').val(image);
        
        $('#posts').val(response.data.counts.media);
        $('#followers').val(response.data.counts.followed_by);
        $('#following').val(response.data.counts.follows);
        
       },
      error: function (errorThrown) {
      alert('error: ' + errorThrown);
      }
      }); // ajax end

} // udpateValue function end


  var userFeed = new Instafeed({
    get: 'user',
    userId: '<?php echo get_option( 'myinstagram_userid' ); ?>',
    clientId: 'b6fe3b21737a4cbbb9a9376e1647c917',
    accessToken: '<?php echo get_option( 'myinstagram_token' ); ?>',
    target: 'instafeed',
    resolution: 'thumbnail',     // 'thumbnail', 'low_resolution', 'standard_resolution'
    template: '<a href="{{link}}" target="_blank" id="{{id}}"><img src="{{image}}" /></a>',
    sortBy: 'most-recent',
    limit: 6,
    links: false
  });
  //userFeed.run();

  /*var userFeed = new Instafeed({
        get: 'user',
        userId: 5592351858,
        accessToken: '5592351858.b6fe3b2.5f056c6957fd4763abcfc04f51ad9415',
        resolution: 'thumbnail',
        sortBy: 'most-recent',
        limit: 6,
        links: false
    });

    userFeed.run();*/

var btnInstafeedLoad = document.getElementById("btn-instafeed-load");
btnInstafeedLoad.addEventListener("click", function() {
  userFeed.next()
});

userFeed.run();

});
</script>

<?php
echo '<hr/>';
}
?>
