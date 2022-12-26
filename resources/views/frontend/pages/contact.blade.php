@extends("frontend.home_master")



@section("home_frontend")

@php
    $abouts = App\Models\Home\HomeAbout::findOrFail(1);
    $contacts = App\Models\Home\HomeContact::findOrFail(1);
    $banner = App\Models\Home\Banner::findOrFail(1);
@endphp

@section('title')
    {{ $abouts->coy_name }} | Contact Us
@endsection
    <!-- Header Banner -->
    <section class="banner-header banner-img-top section-padding valign bg-img bg-fixed"
        data-overlay-dark="4" data-background="{{asset($banner->name)}}">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h6>Get in touch</h6>
                    <h1>Contact <span>Us</span></h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact -->
    <section class="contact section-padding">
        <div class="container">
            <div class="row mb-90">
                <div class="col-md-5 mb-60">
                    <h5>Contact Information</h5>
                    <p class="mb-30">Contact nullam usamcoen the drana duru metus utah osare asya mavna busnini viventa the ornare ipsum. Curabitur luctus mana numsation pellentesque the miss tenis mollie.</p>
                    <div class="contact-link">
                        <div class="contact-link-icon"><span class="norc-phone"></span></div>
                        <div class="contact-link-content">
                            <div class="contact-link-title">Call us</div>
                            <div class="contact-link-text">+{{$contacts->phone_1}}</div>
                        </div>
                    </div>
                    <div class="contact-link">
                        <div class="contact-link-icon"><span class="fa fa-fax"></span></div>
                        <div class="contact-link-content">
                            <div class="contact-link-title">Fax Number</div>
                            <div class="contact-link-text">+{{$contacts->phone_2}}</div>
                        </div>
                    </div>
                    <div class="contact-link">
                        <div class="contact-link-icon"><span class="norc-mail"></span></div>
                        <div class="contact-link-content">
                            <div class="contact-link-title">Send us an email</div>
                            <div class="contact-link-text">{{$contacts->email_1}}</div>
                        </div>
                    </div>
                    <div class="contact-link">
                        <div class="contact-link-icon"><span class="norc-square-pin"></span></div>
                        <div class="contact-link-content">
                            <div class="contact-link-title">Visit our office</div>
                            <div class="contact-link-text">{{$contacts->address}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 offset-md-2">
                    <div class="form-wrap">
                        <div class="form-box">
                            <h5>Get in touch</h5>
                            <form method="post" class="contact__form">
                                <!-- Form message -->
                                <div class="row">
                                    <div class="col-12">
                                        @if(session("success"))
                                            <div class="alert alert-success contact__msg" style="display:  " role="alert">
                                                {{ session("success") }}!
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- Form elements -->
                                <div class="row">
                                    <form method="POST" action="{{ route('contact.store') }}">
                                        @csrf
                                        <div class="col-md-12 form-group">
                                            <input name="name" type="text" placeholder="Your Name *" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input name="email" type="email" placeholder="Your Email *" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input name="phone" type="text" placeholder="Your Number *" required>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input name="subject" type="text" placeholder="Subject *" required>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <textarea name="message" id="message" cols="30" rows="4" placeholder="Message *" required></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="button-secondary mt-15" type="submit"><span>Send Message</span></button>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Map Section -->
            <div class="row">
                <div class="col-md-12 map-color animate-box" data-animate-effect="fadeInUp">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.381540192363!2d3.29077651244386!3d6.599415111103389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b91aef84ac8a1%3A0xa2cb6cf159c58d3b!2sAkowonjo%20Rd%2C%20Egbeda%2C%20Lagos!5e0!3m2!1sen!2sng!4v1671556490906!5m2!1sen!2sng" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1573147.7480448114!2d-74.84628175962355!3d41.04009641088412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25856139b3d33%3A0xb2739f33610a08ee!2s1616%20Broadway%2C%20New%20York%2C%20NY%2010019%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1646760525018!5m2!1str!2str" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}
                </div>
            </div>
        </div>
    </section>

<br><br>
@endsection
