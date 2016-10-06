<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
ob_start();
session_start();
if (isset($_SESSION["username"])==""){
header("location:login.php");
}
include("db.php");
include("parts/head.php");
?>

<body onload="load_msg();">

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    
    <div class="navbar-header">
        
        <a class="navbar-brand" rel="home" href="#"><h2><b>Chatman</b></h2></a>
    </div>
    
    <div class="navbar-collapse collapse" style="height: 1px;">
        <!--
        <ul class="nav navbar-nav">
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
        </ul>
        -->
        <div class="col-sm-3 col-md-3 pull-right">
        <button type="button" class="btn btn-default navbar-btn">Button</button>
        </div>
        
    </div>
</div> <!-- header -->


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" id="modalerr">Change PassWord</h3>
        </div>
        <div class="modal-body">
            <form onsubmit="return changepassword();" action="" method="post">
                <div class="form-group">
                  <label for="email">Current Password:</label><input type="hidden" id="oldstuff" value="<?= $_SESSION['password']; ?>">
                  <input type="password" id="old-password" class="form-control" id="old-pass" placeholder="Enter current password">
                </div>
                <div class="form-group">
                  <label for="pwd">New Password:</label>
                  <input type="password" id="new-password" class="form-control" id="pwd" placeholder="Enter password">
                </div>
                
                <button type="submit" id="change-btn" class="btn btn-default">Change</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<br><br><br><br>
<div class="container" style="margin:30px auto">
    <div class="col-md-12 col-lg-6">
        <div class="panel">
        	<!--Heading-->
    		<div class="panel-heading">
    			
    			<h2 class="panel-title">Public Chat</h2>
    		</div>
    
    		<!--Widget body-->
    		<div id="demo-chat-body" class="collapse in">
    			<div class="nano has-scrollbar" id="chat-his" style="height:380px">
    				<div class="nano-content pad-all" id="chat-hiso" tabindex="0" style="right: -17px;">
    					<ul class="list-unstyled media-block" id="messages-container">
    						<li class="mar-btm">
                                <div  id="loader" class="col-lg-12">
    							    <div class="col-lg-3 col-lg-offset-4"> <img src="Assets/ripple.gif"/></div>
                                </div>
    							<!--
    							
    							<div class="media-body pad-hor speech-right">
    								<div class="speech">
    									<a href="#" class="media-heading">Lucy Doe</a>
    									<p>Ok. Thanks for the answer. Appreciated.</p>
    									<p class="speech-time">
    									<i class="fa fa-clock-o fa-fw"></i> 09:28
    									</p>
    								</div>
    							</div> -->
    						</li>
    						
    					</ul>
    				</div>
    			<div class="nano-pane"><div class="nano-slider" style="height: 141px; transform: translate(0px, 0px);"></div></div></div>
    
    			<!--Widget footer-->
    			<div class="panel-footer">
    				<form method="post" action='' onsubmit="return send();">
                    <div class="row">
                        <input type="hidden" name="name" id="name" value="<?= $_SESSION['username']; ?>" />
    					<div class="col-xs-8">
    						<input type="text" placeholder="Enter your text" id="msg" class="form-control chat-input" >
    					</div>
    					<div class="col-xs-3">
    						<button id="send-btn" class="btn btn-primary btn-block" type="submit">Send<i id="send-anim" class="send-btn material-icons">send</i></button>

    					</div>
                    </form>

                        <div class="panel-control">
                            <button class="btn"><span>Account</span><i class="material-icons rippled">settings</i>
                            <ul class="dropdown">
                              <li><a href="#" data-toggle="modal" data-target="#myModal" >Change Password</a></li>
                              <li onclick="return showfooter();"><a href="#footer">About The Dev</a></li>
                              <li class="active"><a href="logout.php">Log Out</a></li>
                            </ul>
                          </button>
                        </div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>





    
    </div>
</div>



<footer class="fucked">
    <div class="footer" id="footer" >
    <button class="btn btn-danger" id="close" style="float:right"><i class="fa fa-close"></i></button>
        <div class="container">

            <div class="row">
                
                <div class="col-lg-6  col-md-2 col-sm-4 col-xs-6">
                    <h3>Hi, I am Safayat Jamil Sifat.</h3><p> I'm a Web Developer living in Dhaka, Bangladesh I love travelling and networking both in virtual and real world I am currently studying information Technologies at University of Greenwitch.Contact me! I'll be waiting :) 
                </div>
                <div class="col-lg-3  col-md-2 col-sm-4 col-xs-6">
                    <h3> Build with </h3>
                    <ul>
                        <li> <a href="#"> <b>Version 1.0(initial Release)</b> </a> </li>
                        <li> <a href="#"> - Ajax</a> </li>
                        <li> <a href="#"> - Jquery, JavaScript </a> </li>
                        <li> <a href="#"> - Bootstrap, Material Design for bootstrap</a> </li>
                        <li> <a href="#"> - Mysql, php</a> </li>
                        <li> <a href="#"> - Font awesome</a> </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3> Let's Talk </h3>
                    <ul class="social">
                        <li ><a href="https://twitter.com/saf_jammed"><i class="fa fa-twitter"></i></a></li>
                        <li ><a href="http://www.facebook.com/saf.jammed"><i class="fa fa-facebook"></i></a></li>
                        <li ><a href="https://bd.linkedin.com/in/safayat-jamil-652b22118"><i class="fa fa-linkedin"></i></a></li>
                        <li ><a href="https://google.com/+SafayatJamil"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                    <ul class="social">
                    
                        <li ><a href="https://www.freelancer.com/hireme/safjammed" title="freelancer"><b>FL</b></a></li>
                        <li ><a href="http://stackoverflow.com/users/6457169/safjammed"><i class="fa fa-stack-overflow"></i></a></li>
                        <li> <a href="https://www.youtube.com/channel/UCTCVRfatbLpug6-4Natyu9A"> <i class="fa fa-youtube">   </i> </a> </li>
                    </ul>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->
    
    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left" style="color:white"> Copyright © Safayat Jamil 2016. All right reserved. </p>

        </div>
    </div>
    <!--/.footer-bottom--> 
</footer>
</body>
<script type="text/javascript">
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
    $("#clsfooter").click(function(){
        $("#panel").slideToggle("slow");
    });
    emojify.run();
    $('#chat-history').scrollTop($('#chat-history')[0].scrollHeight);
</script>
</html>