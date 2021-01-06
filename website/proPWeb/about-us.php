<!DOCTYPE html>
<html lang="en">

<?php include 'includes/header.inc.php';?>
 <link rel="stylesheet" href="./assets/css/aboutusgrid.css" />

<body>
<?php include './includes/navbar.inc.php';?>
    <br>
    <div class="aboutInfo">
        <div class="about">
            <H1>Company</H1>
            <div class="wrapper">
                <img src="assets/img/aboutusmain.jpg" alt="main" style="height:238px">
                <div class="box">
                    <div class="info">
                        <h3 styel="font-family:Zilla slab Highlight;">Who are we? </h3>
                        <div class="text">
                        An Olala Festival is a fabulous opportunity for families and local communities to enjoy a fun packed music day out together at their local playing field,
                         sports field or college campus. It's a chance to meet up with friends and to listen to some great live bands. Each Festival makes a mark
                         on the local community and quickly becomes an annual event to look forward to. It is a great pleasure as we as an organisation proud to provide such an opportunity
                         to cheer them.
                            </br>
                            <span> <i> Olala management</i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="team">
            <h1>Directors </h1>
            <div class="wrapper">
                <img src="./assets/img/4.jpeg" alt="logo" style="width:470px;height:230px;" class="img-fluid" />
                <div class="box">
                    <div class="info">
                        <h3>Gul shirin Johnson</h3>
                        <h5 style="font-family: Raleway;text-align:center;">Tichnical Director  </h5>
                        <div class="text">
                        Most people know Mrs Johnson Keynote as the PowerPoint equivalent on Mac OS X — presentation software.
                        That is true, but it can also be used to produce surprisingly high-fidelity animations and prototypes...
                            </br>

                        </div>
                    </div>
                </div>

                <img src="./assets/img/2.jpeg" alt="logo" style="width:470px;height:230px;" class="img-fluid" />
                <div class="box">
                    <div class="info">
                        <h3 style="  text-transform: uppercase;">Brito Smith </h3>
                        <h5 style="font-family: Raleway;text-align:center;">Executive Director  </h5>
                        <div class="text">
                        Whether it’s playful refresh states, subtle icon movements or complex transitions,
                        beautiful animation is all around us. Once considered an aesthetic luxury, animation is now used so commonly...

                        </div>
                    </div>
                </div>
            </div>
            <!-- last two members -->
            <div class="wrapper b">
                <div class="box">
                    <div class="info">
                    <h3 style="  text-transform: uppercase;">Patel sharma </h3>
                        <h5 style="font-family: Raleway;text-align:center;">DJ Band Manager </h5>
                        <div class="text">
                        However, I found them all to be a bit of overkill for what I was trying to achieve. As a DJ professional,
                        I needed a rapid, easy-to-learn, familiar tool to boot my static sound. I needed to produce shack it dance Dj...
                            </br>

                        </div>
                    </div>
                </div>

                <img src="./assets/img/12.jpeg" alt="logo" style="width:470px;height:230px;" class="img-fluid" />
                <div class="box">
                    <div class="info">
                    <h3 style="  text-transform: uppercase;">John Abboud </h3>
                        <h5 style="font-family: Raleway;text-align:center;">Event Manager </h5>
                        <div class="text">
                        An event manager is, above all, a project manager who understands marketing and promotion techniques. We want
                        to see enthusiastic candidates with fresh ideas and the organizational skills required to not leave anything about an event to chance.
                            </br>

                        </div>
                    </div>
                </div>
                <img src="./assets/img/3.jpeg" alt="logo" style="width:470px;height:230px;" class="img-fluid" />
            </div>
        </div>
        <br/> <br/> <br/>

        <div class="flex-container" id="booktickets">
            <div class="day">
                <div class="dayContent">
                    <i class="fa fa-ticket icon" style="font-size:68px"></i>
                    <div class="title">Day Ticket</div>
                    <div class="price">
                        <h2> 30€</h2>
                    </div>
                    <p> Enjoy the whole event Only for specific day</p>
                    <p> Ticket you purchase are for personal use.</p>
                    <p> Standard ticket type with no previlages</p>
                    <p> Day ticket is valid only for one day.</p>
                    <p> The ticket is non refundable!</p>
                    <div> <a href="pay.php?ticket=1">Book your ticket</a></div>
                </div>
            </div>
            <div class="day">
                <div class="dayContent">
                    <i class="fa fa-ticket icon" style="font-size:68px"></i>
                    <div class="title">Event Ticket</div>
                    <div class="price">
                        <h2> 50€</h2>
                    </div>
                    <p> Enjoy unlimited music festival for the whole event </p>
                    <p> Ticket you purchase are for personal use.</p>
                    <p> Day ticket is valid only for one day.</p>
                    <p> Standard ticket type with previlages</p>
                    <p> The ticket is non refundable!</p>
                    <div> <a href="pay.php?ticket=2">Book your ticket</a></div>
                </div>

            </div>
            <div class="day">
                <div class="dayContent">
                    <i class="fa fa-ticket icon" style="font-size:68px"></i>
                    <div class="title">Weekend Ticket</div>
                    <div class="price">
                        <h2> 60€</h2>
                    </div>

                    <p> Event ticket is valid only for the weekend.</p>
                    <p> Event ticket is valid only for one Event.</p>
                    <p> Purchased ticket is for personal use.</p>
                    <p> enjoy the event in the weekend Only</p>
                    <p> The ticket is non refundable! </p>
                    <!-- <p> Special type ticket type with no previlages</p> -->

                    <div> <a href="pay.php?ticket=3">Book your ticket</a></div>
                </div>
            </div>
            <!-- <div class="day">
        <h3>That is day 2</h3>
        <p>Lorem ipsum dolor sit amet consectetur,
          adipisicing elit. Consequatur,
          velit ! </p>
      </div> -->
        </div>
    </div>
    <br><br>
    </div>


 <!-- footer -->
 <?php include './includes/footer.inc.php';?>
</body>

</html>