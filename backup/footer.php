<!--start footer-area-->
<footer id="footer-area">
    <a href="https://wa.me/918928659569" target="_blank" class="floatwhatsapp">
        <img src="/assets/images/whatsapp-icon.webp" class="my-float1" alt=""></a>
    <!--start footer top area-->
    <div class="footer-top-area">
        <div class="container">
            <div class="row">
                <!--start footer widget-->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget logo">
                        <a href="#"><img src="/assets/images/logo-white-1.webp" alt="logo"></a>
                        <div class="footer-about-description">
                            <p>At G3B Education, we specialize in making the dream of studying abroad a reality for aspiring students. With a passion for transforming ambitions into success stories.</p>
                        </div>
                        <h6>Follow Us</h6>
                        <ul class="footer-social-icons">
                            <li><a href="#"><i class="icofont-facebook"></i></a></li>
                            <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                            <li><a href="#"><i class="icofont-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!--end footer widget-->
                <!--start footer widget-->
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget footer-cat">
                        <h4>Categories</h4>
                        <ul>
                            <li><a href="https://g3beducation.com/"><i class="icofont-rounded-right"></i> Home</a></li>
                            <li><a href="about-us.php"><i class="icofont-rounded-right"></i> About Us</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> Test Preparation</a></li>
                            <li><a href="contact-us.php"><i class="icofont-rounded-right"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <!--end footer widget-->
                <!--start footer widget-->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget recent-post">
                        <h4> Our Services</h4>
                        <ul>
                            <li><a href="comprehensive-study-abroad-solutions.php"><i class="icofont-rounded-right icon-orange"></i> Comprehensive Study Abroad Solutions</a></li>
                            <li><a href="personalized-counseling.php"><i class="icofont-rounded-right icon-orange"></i> Personalized Counseling</a></li>
                            <li><a href="university-applications.php"> <i class="icofont-rounded-right icon-orange"></i>University Applications</a></li>
                            <li><a href="test-preparation.php"> <i class="icofont-rounded-right icon-orange"></i>Test Preparation</a></li>
                            <li><a href="visa-assistance.php"> <i class="icofont-rounded-right icon-orange"></i>Visa Assistance⁠</a></li>
                            <li><a href="scholarship-and-financial-guidance.php"> <i class="icofont-rounded-right icon-orange"></i>Scholarship and Financial Guidance</a></li>
                            <li><a href="pre-departure-and-post-arrival-support.php"> <i class="icofont-rounded-right icon-orange"></i>Pre-Departure and Post-Arrival Support⁠</a></li>
                        </ul>
                    </div>
                </div>
                <!--end footer widget-->
                <!--start footer widget-->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget footer-contact">
                        <h4>Contact Us</h4>
                        <ul>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <p class="m-0">A-207, Om Sai Datta Niwas, Plot No. A32, Opp. Nerul-(W) Railway Station, Nerul, Navi Mumbai-400706</p>
                            </li>
                            <li>
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <p class="m-0"><a href="mailto:admissions.g3beducation@gmail.com"> admissions.g3beducation@gmail.com</a></p>
                            </li>
                            <li>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <p class="m-0"><a href="tel:+918928659569">+91-8928659569</a></p>
                                <p class="m-0"><a href="tel:+919820049389">+91-9820049389</a></p>
                            </li>

                        </ul>
                    </div>
                </div>
                <!--end footer widget-->
            </div>
        </div>
    </div>
    <!--end footer top area-->
    <!--start footer bottom-->
    <div class="footer-bottom-area text-center">
        <div class="container">
            <p class="m-0">Copyright © <script>
                    document.write(new Date().getFullYear())
                </script> <a href="https://g3beducation.com/" style="color: white;">, G3B Education, </a> All rights and reserved. Powered by <a href="https://www.itarsia.com/" target="_blank" class="text-white"> Itarsia India Limited</a></p>
        </div>
    </div>
    <!--end footer bottom-->
</footer>
<!--end footer-->
<!--jQuery js-->
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>

<!--proper js-->
<script src="assets/js/popper.min.js"></script>


<!--mainmenu js-->
<script src="assets/js/meanmenu.min.js"></script>
<!--counterup js-->
<script src="assets/js/counterup.min.js"></script>
<!--waypoints js-->
<script src="assets/js/waypoints.js"></script>
<!--magnic popup js-->

<!--owl carousel js-->
<script src="assets/js/owl.carousel.min.js"></script>
<!--syotimer js-->

<!--main js-->
<script src="assets/js/custom.js"></script>
</body>


</html>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<script>
    $(function() {
        $("#submitContact").click(function() {
            var v = grecaptcha.getResponse();
            if (v.length == 0) {
                document.getElementById('captcha').innerHTML = "Captcha Required";
                return false;
            } else {
                document.getElementById('captcha').innerHTML = "Captcha Verify";
                return true;
            }


            var cf_services = $("#cf_services").val();

            if (cf_services == "") {
                document.getElementById('services').innerHTML = "services is required";
                return false;
            } else {
                document.getElementById('services').innerHTML = "services is required";
                return true;
            }

        });
    });
</script>