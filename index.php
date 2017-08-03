<?php
  include('includes/dbconn.php');
  include('includes/helper.php');
  session_start();
 ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aganon's Catering Services</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <!--banner-->
    <section id="banner">
      <div class="bg-color">
        <header id="header">
            <div class="container">
                <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <a href="#about">About</a>
                  <a href="#event">Event</a>
                  <a href="#menu-list">Menu</a>
                  <a href="#contact">Reserve Now</a>
                </div>
                <!-- Use any element to open the sidenav -->
                <span onclick="openNav()" class="pull-right menu-icon">☰</span>
            </div>
        </header>
        <div class="container">
        <div class="row">
          <div class="inner text-center">
            <h1 class="logo-name">Aganon's Catering</h1>
            <h2>2027 E.Florentino Sampaloc, Manila.</h2>
            <p>Specialized in Filipino Cuisine!</p>
          </div>
        </div>
        </div>
      </div>
    </section>
    <!-- / banner -->
    <!--about-->
    <section id="about" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center marb-35">
                    <h1 class="header-h">Delicious Journey</h1>
                    <p class="header-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                    <br>nibh euismod tincidunt ut laoreet dolore magna aliquam. </p>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="col-md-6 col-sm-6">
                        <div class="about-info">
                            <h2 class="heading">vel illum qui dolorem eum</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero impedit inventore culpa vero accusamus in nostrum dignissimos modi, molestiae. Autem iusto esse necessitatibus ex corporis earum quaerat voluptates quibusdam dicta!</p>
                            <div class="details-list">
                                <ul>
                                    <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                                    <li><i class="fa fa-check"></i>Quisque finibus eu lorem quis elementum</li>
                                    <li><i class="fa fa-check"></i>Vivamus accumsan porttitor justo sed </li>
                                    <li><i class="fa fa-check"></i>Curabitur at massa id tortor fermentum luctus</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <img src="img/res01.jpg" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>
    <!--/about-->
    <!-- event -->
    <section id="event">
        <div class="bg-color" class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center" style="padding:60px;">
                      <h1 class="header-h">Check Reservation Status</h1>
                      <!-- <p class="header-p">Decorations 100% complete here</p> -->
                    </div>
                    <div class="col-md-12" style="padding-bottom:60px;">
                        <div class="item active left">
                          <div class="col-md-4 col-sm-4">
                          </div>
                          <div class="col-md-4 col-sm-4 details-text">
                            <div class="content-holder">
                              <center><h2>Enter Reservation Code</h2></center>
                              <form target="_blank" action="view_reservation.php" method="post" role="form" class="contactForm">
                                <div class="col-md-12 col-sm-12 contact-form pad-form">
                                    <div class="form-group">
                                        <input type="text"  class="form-control w label-floating is-empty" name="rcode" required/>
                                    </div>
                                </div>
                                <div class="col-md-12 btnpad">
                                    <div class="contacts-btn-pad">
                                        <button name="search" class="btn-success btn-block">SEARCH</button>
                                    </div>
                                </div>
                              </form>
                            </div>
                         </div>
                         <div class="col-md-4 col-sm-4">
                         </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ event -->
    <!-- menu -->
    <section id="menu-list" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center marb-35">
                    <h1 class="header-h">Menu List</h1>
                    <p class="header-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                    <br>nibh euismod tincidunt ut laoreet dolore magna aliquam. </p>
                </div>
                <div class="col-md-12  text-center gallery-trigger">
                    <ul>
                        <li><a class="filter" data-filter="all">Show All</a></li>
                        <?php
                          $sql = "SELECT * FROM menu_category";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                              $cat_id = $row['category_id'];
                              $cat_name= $row['category_name'];
                        ?>
                            <li><a class="filter" data-filter=".<?php echo $cat_id; ?>"><?php echo $cat_name; ?></a></li>
                        <?php }} ?>
                    </ul>
                </div>
                <div id="Container">
                    <?php
                      $sql = "SELECT * FROM menus";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          $menu_id = $row['menu_id'];
                          $cat_id= $row['category_id'];
                          $menu_name = $row['menu_name'];
                          $desc = $row['description'];
                          $price = $row['price'];
                          $image = $row['image'];
                    ?>
                    <div class="mix <?php echo $cat_id; ?> menu-restaurant" data-myorder="2">
                        <span class="clearfix">
                        <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg"><?php echo $menu_name; ?></a>
                        <span style="left: 166px; right: 44px;" class="menu-line"></span>
                        <span class="menu-price"><?php echo "&#8369;".$price; ?></span>
                      </span>
                      <span class="menu-subtitle"><?php echo $desc; ?></span>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </section>
    <!--/ menu -->
    <!-- contact -->
    <section id="contact" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="header-h">Reserve Now</h1>
                    <p class="header-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                    <br>nibh euismod tincidunt ut laoreet dolore magna aliquam. </p>
                </div>
            </div>
            <div class="row msg-row">
                <div class="col-md-4 col-sm-4 mr-15">
                    <div class="media-2">
                        <div class="media-left">
                            <div class="contact-phone bg-1 text-center"><span class="phone-in-talk fa fa-mobile"></span></div>
                        </div>
                        <div class="media-body">
                            <h4 class="dark-blue regular">Mobile Number</h4>
                            <p class="light-blue regular alt-p">09214670134
                        </div>
                    </div>
                    <div class="media-2">
                        <div class="media-left">
                            <div class="contact-email bg-14 text-center"><span class="hour-icon fa fa-clock-o"></span></div>
                        </div>
                        <div class="media-body">
                            <h4 class="dark-blue regular">Opening Hours</h4>
                            <p class="light-blue regular alt-p"> Monday to Friday 09.00 - 24:00</p>
                            <p class="light-blue regular alt-p">
                                 Friday and Sunday 08:00 - 03.00
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8">
                    <form action="index.php" method="post" role="form" class="contactForm">
                    <div id="sendmessage">Your booking request has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    <div class="col-md-6 col-sm-6 contact-form pad-form">
                        <div class="form-group label-floating is-empty">
                          <input type="hidden" name="rcode" class="form-control"/>
                          <input type="hidden" name="total_price" class="form-control"/>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                            <div class="validation"></div>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-6 contact-form pad-form">
                        <div class="form-group">
                            <input type="email" class="form-control label-floating is-empty" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" required/>
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 contact-form">
                        <div class="form-group">
                            <input type="date" class="form-control label-floating is-empty" name="date" id="date" placeholder="Date" data-rule="required" data-msg="This field is required" required/>
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 contact-form">
                        <div class="form-group">
                            <input type="time" class="form-control label-floating is-empty" name="time" id="time" placeholder="Time" data-rule="required" data-msg="This field is required" required/>
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control label-floating is-empty" name="contact_num" id="phone" placeholder="Contact Number" data-rule="required" data-msg="This field is required" required/>
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control label-floating is-empty" name="address" data-rule="required" data-msg="Please write your address" placeholder="Address" required/>
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control label-floating is-empty" name="venue" placeholder="Venue" data-rule="required" data-msg="This field is required" required/>
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control label-floating is-empty" name="pax" placeholder="No of Pax" data-rule="required" data-msg="This field is required" required/>
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating is-empty">
                          <!-- Trigger the modal with a button -->
                          <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#myModal">Select Menu</button>

                          <!-- Modal -->
                          <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Choose your menu: </h4>
                                </div>
                                <div class="modal-body">
                                  <?php
                                    $sql = "SELECT * FROM menu_category";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                      while($row = $result->fetch_assoc()) {
                                        $cat_id = $row['category_id'];
                                        $cat_name = $row['category_name'];
                                        //echo
                                        $sql2 = "SELECT * FROM menus WHERE category_id = $cat_id";
                                        $result2 = $conn->query($sql2);
                                        if($result2->num_rows > 0){
                                          while($row = $result2->fetch_assoc()){
                                            $menu_id = $row['menu_id'];
                                            $menu_name = $row['menu_name'];
                                   ?>
                                   <div class="list-group">
                                    <li class="list-group-item active">
                                      <?php echo $cat_name; ?>
                                    </li>
                                    <div class="checkbox list-group-item">
                                    <label><input name="menus[]" type="checkbox" value="<?php echo $menu_name; ?>"><?php echo $menu_name; ?></label>
                                    </div>
                                  </div>
                                  <?php }}}} ?>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 col-sm-12">
                          <div class="form-group">
                            <div class="checkbox">
                              <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="option1" required=""> I agree to the <a href="#facilities" data-toggle="modal">terms and condtion</a> of the Aganon's Catering
                              </label>
                              <div id="facilities" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            	<div class="modal-dialog">
                            	  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                      <h4 class="modal-title center"><i class = "fa fa-pagelines green"></i>Terms And Condition</h4>
                                    </div>
                                     <div class="modal-body">
                            					<p>  1. Catering is within the area of METRO MANILA only.</p>

                            					<p>  2. MINIMUM Pax for catering servies is 50 PAX.</p>

                            					<p>3. Costumer must pay 50% of the actual price as an advance payment 3 days after confirmation, if the costumer failed to pay the said advance payment reservation will be cancelled.</p>

                            					<p>4. The management will call the costumer about the payment details.</p>

                            					<p>5. If the costumer wants to cancel its confirmed reservation due to personal reason, the management will get 25% from the advance payment he/she made as charge for the damages.</p>

                            					<p>6. 50 percent should be paid before the approval of reservation, 3 days without payments will resolve to the termination of reservation.</p>

                            					<p>7. Terms of payments will be via padala center cebuana or palawan center or personal payments.</p>
                            				</div>
                                </div>
                            </div>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-12 btnpad">
                        <div class="contacts-btn-pad">
                            <button name="submit" class="contacts-btn">RESERVE NOW</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- / contact -->
    <!-- footer -->
    <footer class="footer text-center">
        <div class="footer-top">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div class="widget">
                        <h4 class="widget-title">Aganon's Catering</h4>
                        <address>2027 E.Florentino St.<br>Sampaloc Manila</address>
                        <div class="social-list">
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </div>
                        <p class="copyright clear-float">
                            © Aganon's Catering Services. All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- / footer -->

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mixitup.min.js"></script>
    <script src="js/custom.js"></script>
<?php
  if(isset($_POST['submit'])){
    //print_r($_POST);

      $string="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
      $code="";
      $limit=10;
      $i=0;
      while($i<=$limit)
      {
        $rand=rand(0,61);
        $code.=$string[$rand];
        $i++;
      }
      //echo $_SESSION['name'];
      include('includes/dbconn.php');
      $total_price;
      foreach($_POST['menus'] as $id){
        $sql = "SELECT * FROM menus where menu_name = '$id'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            $m_price = $row['price'];
            $price = $m_price * sanitizeString($_POST['pax']);
            $total_price = $total_price + $price;
          }
        }
      }
      $_SESSION['name'] = sanitizeString($_POST['name']);
      $_SESSION['email'] = sanitizeString($_POST['email']);
      $_SESSION['date'] = sanitizeString($_POST['date']);
      $_SESSION['time'] = sanitizeString($_POST['time']);
      $_SESSION['contact_num'] = sanitizeString($_POST['contact_num']);
      $_SESSION['address'] = sanitizeString($_POST['address']);
      $_SESSION['venue'] = sanitizeString($_POST['venue']);
      $_SESSION['pax'] = sanitizeString($_POST['pax']);
      //$_SESSION['choices'] = sanitizeString($_POST['menus']);
      $_SESSION['rcode'] = $code;
      $_SESSION['total_price'] = $total_price;
      $_SESSION['post'] = $_POST;
      header('Location: confirm.php');
  }elseif(isset($_POST['search'])){
    $rcode = $_POST['rcode'];
  }
 ?>
</body>
</html>
