<!DOCTYPE html>
<html lang="en">

<?php include 'includes/header.inc.php';?>


<body>
    <!-- new nav start here -->
    <?php include 'includes/navbar.inc.php';?>
    <!-- new navbar ends here -->


    <div class="v-header container">
        <div class="hero-container">
            <video autoplay="autoplay" id="video" width="100%" height="auto" muted="" loop="">
                <source src="./assets/img/video/Home_Video.mp4" type="video/mp4" />
            </video>
        </div>
    </div>
    </div>
    <div class="header-overlay">
        <!-- <div class="row-layout"> -->
        <div class="banner">
            <div class="center-me">
                <h1>Welcome to Olala</h1>
                <p>The place your body takes shape and shack. expreince the best from our event </p>
            </div>
        </div>
        <!-- </div> -->
    </div>
    <div class="container">
        <div class="service-container ">
            <div class="service-item js-open-events" id="clk">
                <div class="service-content">
                    <div class="row box">
                        <i class="fa fa-calendar-check-o" style="font-size:35px"></i>
                        </span>
                        <!-- <img src="" alt="" > <span> Event</span> -->
                        <p>Check the Event </p>
                    </div>
                </div>
            </div>
            <div class="service-item js-open-bookaticket" id="chk">
                <div class="service-content">
                    <div class="row box">
                        <span class="image">
                            <i class='fa fa-barcode' style='font-size:35px'></i>
                        </span>
                        <!-- <img src="" alt="" > <span> Event</span> -->
                        <p>Book your Ticket</p>
                    </div>
                </div>
            </div>
            <div class="service-item js-open-lost-found">
                <div class="service-content">
                    <div class="row box">
                        <span class="image">
                            <i class='fa fa-upload' style='font-size:35px'></i>
                        </span>
                        <!-- <img src="" alt="" > <span> Event</span> -->
                        <p>Lost and Found </p>
                    </div>
                </div>
            </div>
            <div class="service-item js-open-reviews">
                <div class="service-content">
                    <div class="row box">
                        <span class="image">
                            <i class='fa fa-align-left' style='font-size:35px'></i>
                        </span>
                        <!-- <img src="" alt="" > <span> Event</span> -->
                        <p>Clients Review</p>
                    </div>
                </div>
            </div>
        </div>

        <br/> <br/><br/><br/>
        <!-- Book a ticket -->
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

        <!-- Events -->
        <div class="event-day-container ">
            <!-- <div class="row"> -->
            <div class="container-accordionPerBox">
                <div class="acc ">
                    <h3 style="text-align: center;">Day 1 Event</h3>
                    <div class="event-header">
                        <div class="event-content-inner">
                            <div class="event-description ">
                                <p
                                    style="font-family:'Zilla Slab Highlight';font-weight:250;font-size:35px;text-align:center; color:purple;padding-top:1rem;">
                                    Details of the Event<br></p>
                                <div class="details-specifications"
                                    style="font-family: 'Lato';font-size:1rem;text-align:center;">
                                    <p> <b>Theme: </b> <i>The Glow of stars </i> <br>
                                        <b>Artist: </b> <i>Anneke van Giersbergen </i> <br>
                                        <b>Venue: </b> <i>Rock Star Hall </i> <br>
                                        <b>Time: </b> <i>16:00 - 00:00</i> <br>
                                    </p>
                                </div>
                                <p
                                    style="text-align:justify;text-justify:inter-word;padding: 0 2.5rem 0 2.5rem;padding-bottom:1rem;font-family: 'Cabin', sans-serif;">
                                    The event entery starts at<b style="color:black;"> 15:30</b>. The guest will be
                                    welcome with a drink to the chioce. these can be obtains from food shop and the
                                    charges will be deducted from you account.
                                    we will be having at <b style="color:black;"> 18:30 </b>a small break of <i
                                        style="color:black;"> 20 </i>minutes and then on the event will go as planned
                                    till 20:00 hours.We request you to leave all <strong style="color:black;"> event
                                        belonging</strong> before check out.
                                    incase any loaned product defected by the user, please feel free to reach out our
                                    loan stand to settle your account.
                                    Event4 live music and belly Dance start at 22:30-23:30
                                    DJ Najwa Karam with belly Dancer
                                    Najwa Karam is a Lebanese multi-Platinum singer, songwriter, and fashion icon. <br>
                                    <br> <i style="color:purple; margin-top:140px;">For further info please visit FAQ
                                        section or cotact administration during the event.</i> </p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-accordionPerBox">
                <div class="acc">
                    <h3 style="text-align: center;">Day 2 Event</h3>
                    <div class="event-header">
                        <div class="event-content-inner">
                            <div class="event-description ">
                                <p
                                    style="font-family:'Zilla Slab Highlight';font-weight:250;font-size:35px;text-align:center; color:green;padding-top:1rem;">
                                    Details of the Event<br></p>
                                <div class="details-specifications"
                                    style="font-family: 'Lato';font-size:1rem;text-align:center;">
                                    <p> <b>Theme: </b> <i>The Belly dance of Saba </i> <br>
                                        <b>Artist: </b> <i>Teddy Afro </i> <br>
                                        <b>Venue: </b> <i>The Hall of Qalandars</i> <br>
                                        <b>Time: </b> <i>11:00 - 22:30</i> <br>
                                    </p>
                                </div>
                                <p
                                    style="text-align:justify;text-justify:inter-word;padding: 0 2.5rem 0 2.5rem;padding-bottom:1rem;font-family: 'Cabin', sans-serif;">

                                    17 July 2020 check -IN Time: 10h00 No check in<br />


                                    The event entery starts at<b style="color:black;"> 10:00</b>. The guest will be
                                    welcome with Ethopian authantic a drink "mashrobul sarabia". The enterance gate will
                                    be close<b style="color:red;"> 10:30.</b>

                                    <u>Event1 DJ music</u>start at <b> 12:30-15:00</b> by:
                                    DJ Kahlid - He is top Us DJ and He is well known in Stage control
                                    <u>Event2 Bely Dance </u>Event2 Bely Dance start at<b style="color:black">
                                        15:00-18:00</b> BAH BAh here
                                    comes Dancer Sami <b>Gamal and Zeinat Olwi </b> <u> Event3 live music</u> start at
                                    <b>18:30-22:00. </b> by Singer Mohamed Moneer. He is Arabic Bob Marley
                                    <u> Event4 Live </u>music start at 22:30-23:30 Singer Elissa She is the best singer
                                    of the Arab World. She has an incredible voice.<br />

                                    <!-- <b>Check- out</b> <br />
                                    Check out is possible from 11h30. Everyone must leave DreamVille before
                                    12h00. No exception. <br/> -->
                                    <br> <i style="color:green; margin-top:140px;">For further info please visit FAQ
                                        section or cotact administration during the event.</i> </p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-accordionPerBox">
                <div class="acc">
                    <h3 style="text-align: center;">Day 3 Event</h3>
                    <div class="event-header">
                        <div class="event-content-inner">
                            <div class="event-description ">
                                <p
                                    style="font-family:'Zilla Slab Highlight';font-weight:250;font-size:35px;text-align:center; color:#DAA520;padding-top:1rem;">
                                    Details of the Event<br></p>
                                <div class="details-specifications"
                                    style="font-family: 'Lato';font-size:1rem;text-align:center;">
                                    <p> <b>Theme: </b> <i>The Party Goers </i> <br>
                                        <b>Artist: </b> <i>Ali B </i> <br>
                                        <b>Venue: </b> <i>Mastana-Pagal Avenue</i> <br>
                                        <b>Time: </b> <i>11:00 - 23:00</i> <br>
                                    </p>
                                </div>
                                <p
                                    style="text-align:justify;text-justify:inter-word;padding: 0 2.5rem 0 2.5rem;padding-bottom:1rem;font-family: 'Cabin', sans-serif;">


                                    This event will be take place on 16 July 2020 Check-IN Time: <b
                                        style="color:black;">11:00</b>
                                    .The Entrance door fwill be close 11:30 sharply.
                                    <u> <b>Event1 DJ music</b></u> start at 12:30-15:00 by <b>DJ Tala Mortada </b>. He
                                    is
                                    creating full-on visual performances for partygoers.
                                    <u> <b> Event2 belly dance </b></u> start at <b>15:30-20:00 </b>
                                    Singer Soheir Zaki and Nadia Gamal
                                    Both of are the World belly dancing icons.
                                    They will put you on the moon. the only thing you need to take along with your self
                                    is: an Oxigyn.

                                    <u> <b>Event3 Live </b></u> start at <b>20:30-23:00 </b> by Singer Mohamed Fouad
                                    The Voice of the old days. When I recall my childhood, it's nothing without him.
                                    Really he represents the pure nature of Egypt. <br />
                                    <!-- Event4 live music and belly Dance start at 22h30 - 23h30
                                    DJ Najwa Karam with belly Dancer
                                    Najwa Karam is a Lebanese multi-Platinum singer, songwriter, and fashion icon. -->

                                    <!-- Check- out
                                    Check out is possible from 11h30. Everyone must leave DreamVille before
                                    12h00. No exception.<br /> -->



                                    <!-- The event entery starts at<b style="color:black;"> 15:30</b>. The guest will be
                                welcome with a drink to the chioce. these can be obtains from food shop and the
                                charges will be deducted from you account.
                                we will be having at <b style="color:black;"> 18:30 </b>a small break of <i
                                    style="color:black;"> 20 </i>minutes and then on the event will go as planned
                                till 20:00 hours.We request you to leave all <strong style="color:black;"> event
                                    belonging</strong> before check out.
                                incase any loaned product defected by the user, please feel free to reach out our
                                loan stand to settle your account. -->
                                    <br> <i style="color:#DAA520; margin-top:140px;">For further info please visit FAQ
                                        section or cotact administration during the event.</i>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of accordion -->
    <?php include 'includes/footer.inc.php';?>





</body>

</html>