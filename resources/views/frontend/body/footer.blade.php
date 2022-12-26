@php

    $contacts = App\Models\Home\HomeContact::findOrFail(1);
    $services = App\Models\Home\HomeService::all();
    $abouts = App\Models\Home\HomeAbout::findOrFail(1);

@endphp

 <!-- Footer -->
 <footer class="footer clearfix">
    <div class="container">
        <!-- First footer -->
        <div class="first-footer">
            <div class="row">
                <div class="col-md-12">
                    <div class="links dark footer-contact-links">
                        <div class="footer-contact-links-wrapper">
                            <div class="footer-contact-link-wrapper">
                                <div class="image-wrapper footer-contact-link-icon">
                                    <div class="icon-footer"> <i class="norc-phone"></i> </div>
                                </div>
                                <div class="footer-contact-link-content">
                                    <h6>Call us</h6>
                                    <p>+{{$contacts->phone_1}}</p>
                                </div>
                            </div>
                            <div class="footer-contact-links-divider"></div>
                            <div class="footer-contact-link-wrapper">
                                <div class="image-wrapper footer-contact-link-icon">
                                    <div class="icon-footer"> <i class="norc-mail"></i> </div>
                                </div>
                                <div class="footer-contact-link-content">
                                    <h6>Write to us</h6>
                                    <p>{{$contacts->email_1}}</p>
                                </div>
                            </div>
                            <div class="footer-contact-links-divider"></div>
                            <div class="footer-contact-link-wrapper">
                                <div class="image-wrapper footer-contact-link-icon">
                                    <div class="icon-footer"> <i class="norc-property-location"></i> </div>
                                </div>
                                <div class="footer-contact-link-content">
                                    <h6>Address</h6>
                                    <p>{{strip_tags($contacts->address)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Second footer -->
        <div class="second-footer">
            <div class="row">
                <!-- about & social icons -->
                <div class="col-md-4 widget-area">
                    <div class="widget clearfix">
                        <h3 class="widget-title">About {{$abouts->coy_name}}</h3>
                        <div class="widget-text">
                            <p>{{strip_tags($abouts->content_long)}}</p>
                            <div class="social-icons">
                                <ul class="list-inline">
                                    <li><a href="{{$abouts->phone_2}}"><i class="fa fa-whatsapp"></i></a></li>
                                    <li><a href="{{$abouts->phone_3}}"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{$abouts->phone_4}}"><i class="fa fa-instagram"></i></a></li>
                                    {{-- <li><a href="#"><i class="fa fa-youtube-play"></i></a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- quick links -->
                <div class="col-md-3 offset-md-1 widget-area">
                    <div class="widget clearfix usful-links">
                        <h3 class="widget-title">Quick Links</h3>
                        <ul>
                            <li><a href="{{ route('about.page') }}">About</a></li>
                            <li><a href="{{ route('services.page') }}">Services</a></li>
                            <li><a href="{{ route('project.page') }}">Projects</a></li>
                            <li><a href="{{ route('contact.page') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <!-- subscribe -->
                <div class="col-md-4 widget-area">
                    <div class="widget clearfix">
                        <h3 class="widget-title">Subscribe</h3>
                        <p>Want to be notified about our news. Just sign up and we'll send you a notification by email.</p>
                        <div class="widget-newsletter">
                            <form action="#">
                                <input type="email" placeholder="Email Address" required>
                                <button type="submit">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom footer -->
        <div class="bottom-footer-text">
            <div class="row copyright">
                <div class="col-md-12">
                    <p class="mb-0">©2022 <a href="">Alphacloud Technology Solutions</a>. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
