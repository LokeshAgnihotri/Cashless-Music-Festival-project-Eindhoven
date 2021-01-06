<?php
require_once 'session.php';
?>

<section class="nav-bar ">
    <div class="nav-container">
      <div class="brand">
        <a href="./index.php">
          <span style="font-family: Pacifico; font-size: 27px; padding-bottom:30px;">Olala</span>
          <span style="font-family: arizonia; color: #DDA0DD; font-size: 25px;">Entertaintment</span>
        </a>
      </div>
      <nav id="js-menu">
        <div class="nav-mobile">
          <a id="nav-toggle" href="#"><span></span></a></div>
          <!-- If a link has different behaviour than open a new page then do not use href="" -->
        <ul class="nav-list" style="font-size:14px;">
          <li><a href="about-us.php">About us</a></li>
          <li> <a href="index.php">Home</a> </li>
          <li class="js-open-bookaticket"><a herf="index.php">Book a ticket</a> </li>

          <?php if (isset($_SESSION['user_is_logged_in']) && $_SESSION['user_is_logged_in'] == 1) {?>
          <li>
            <a href="#">
              <div class="dropdown dropdown2">
                <button class="dropbtn"><?php echo $_SESSION['firstname'] . " " . $_SESSION["lastname"]; ?></button>
                <div class="dropdown-content">
                  <a href="profile.php">Profile</a>
                  <a href="includes/auth/logout.php">Logout</a>
                </div>
            </div>
            </a>
          </li>
          <?php } else {?>
          <li><a href="includes/modals/login.modal.php">Sign in</a>  </li>
          <!-- <li>  <a onclick=" document.getElementById('modal-wrapper').style.display='block'" style="width:200px; margin-left:160px;"></a></li> -->
          <?php }?>
      </div>
        </ul>
      </nav>
    </div>


  </section>
