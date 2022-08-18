<footer class="footer">
  <?php 
use App\Footer;
$footer = Footer::first();
?>
    <div class="social_link">
      <div class="container">
        <h2>Get Touch with Us</h2>
        <ul class="social-icons">
          <li><a target="_blank" href="{{$footer->fb_url}}"><i class="fa-brands fa-facebook-f"></i></a></li>
          <li><a target="_blank" href="{{$footer->twitter_url}}"><i class="fa-brands fa-twitter"></i> </a></li>
          <li><a target="_blank" href="{{$footer->gmail_url}}"><i class="fa-brands fa-google-plus-g"></i></a></li>
          <li><a target="_blank" href="{{$footer->instagram_url}}"><i class="fa-brands fa-instagram"></i> </a> </li>
        </ul>
      </div>
    </div>

    <div class="footer_contents">  
      <div class="container">
        <div class="row">
     
          <div class="col col-sm-5 animatable fadeInLeft">
            <div class="contact_info">
              <address>
              <figure class="icon"><i class="fas fa-mobile-alt"></i></figure>
              <div class="details"> <span> <a href="tel:+977 01 4378381, 4378189" class="linkto">{{ $footer->number }}</a> </span> <span> <a href="tel:+977 98510 82775 (Nima)" class="linkto">+977 xxxxx xxxxx (Nima)</a> </span> </div>
              </address>
              <address>
              <figure class="icon"> <i class="fas fa-location-arrow"></i> </figure>
              <div class="details"> <span>{{ $footer->address }}</span> </div>
              </address>
              <address>
              <figure class="icon"><i class="far fa-envelope"></i> </figure>
              <div class="details"> <span> <a href="mailto:info@demomail.com" class="linkto">{{ $footer->mail }}</a> </span> </div>
              </address>
            </div>
          </div>
      
          <div class="col col-sm-7 animatable fadeInRight">
            <div class="contact_form">
              <form action="{{ route('contact') }}" method="post">
                @csrf
                <div class="row">
                  <div class="col col-6 form-group">
                    <input id="name" name="name" class="form-control" type="text" placeholder="Name:" title="Type your full name" required>
                  </div>
                  <div class="col-6 form-group">
                    <input id="phone" name="phone" class="form-control" type="tel" placeholder="Phone:" title="Type your pnone no" required>
                  </div>
                  <div class="col col-12 form-group">
                    <input id="email" name="email" class="form-control" type="email" placeholder="E-Mail:" title="Type your email" required>
                  </div>
                  <div class="col col-12 form-group">
                    <textarea id="message" name="description" class="form-control"  placeholder="Message..." title="Type your message" rows="5" required></textarea>
                  </div>
                  <div class="col col-12 form-group">
                    <p>
                      <input class="btn-submit btn" type="submit" value="Submit">
                    </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col col-sm-3 col-6 animatable bounce">
            <h3 class="footer_title">Travel agency</h3>
            <ul>
              <li><a href="about-us.html">About Us </a></li>
              <li><a href="packages.html">Packages</a></li>
              <li><a href="services.html">Services</a></li>
              <li><a href="projects.html">projects</a></li>
              <li><a href="blog.html">Blog </a></li>
              <li><a href="contact_us.html.html">Contact us</a></li>
            </ul>
          </div>
          <div class="col col-sm-3 col-6 animatable bounce">
            <h3 class="footer_title">Activities</h3>
            <ul>
              <li><a href="trekking.html">Trekking</a></li>
              <li><a href="peak_climbing.html">Peak Climbing</a></li>
              <li><a href="adventure.html">Adventure</a></li>
              <li><a href="Luxury_Treks.html">Luxury Treks</a></li>
              <li><a href="cultural_tours.html">Cultural Tours</a></li>
              <li><a href="yoga_trek.html">Yoga Trek</a></li>
              <li><a href="trip_extensions.html">Trip Extensions</a></li>
              <li><a href="bike_tour.html">Motorbike Tours</a></li>
              <li><a href="day_tour.html">Day Tours</a></li>
            </ul>
          </div>
          <div class="col col-sm-3 col-6 animatable bounce">
            <h3 class="footer_title">Useful Links</h3>
            <ul>
              <li><a href="trip_finder.html">Trip Finder</a></li>
              <li><a href="tailor_made.html">Tailor Made</a></li>
              <li><a href="faqs.html">FAQs</a></li>
              <li><a href="booking_terms.html">Booking Terms</a></li>
              <li><a href="registration_form.html">Registration Form</a></li>
            </ul>
          </div>
          <div class="col col-sm-3 col-6 animatable bounce">
            <h3 class="footer_title">Follows Us</h3>
            <div class="footer-social-icons">
              <ul>
                <li><a target="_blank" href="{{$footer->fb_url}}"><i class="fa-brands fa-facebook"></i> Facebook</a></li>
                <li><a target="_blank" href="{{$footer->twitter_url}}"><i class="fa-brands fa-twitter"></i> Twitter</a></li>
                <li><a target="_blank" href="{{$footer->gmail_url}}"><i class="fa-brands fa-google"></i>Gmail</a></li>
                <li><a target="_blank" href="{{$footer->instagram_url}}"><i class="fa-brands fa-instagram"></i>Instagram</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright">
        <div class="container">
          <p class="lft">© <script type="text/javascript" language="javascript">var date = new Date(); document.write(date.getFullYear());</script> All Rights Reserved.</p>
          <p class="rht"> Powered by : <a href="#" target="_blank" class="company_link" collator_asort="">Company</a> </p>
        </div>
      </div>
    </div>
  </footer>