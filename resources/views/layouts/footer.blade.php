<footer data-w-id="5d3def44-2af0-a39e-d268-cb5e4a46cda3" class="footer">
    <div class="container-default-1209px w-container">
        <div data-w-id="5d3def44-2af0-a39e-d268-cb5e4a46cdf2" class="container-newsletter">
            <div class="split-content newsletter-left">
                <div class="newsletter-icon-wrapper">
                    <img src="{{ asset('assets/images/graphics/mail.svg') }}" alt="" class="newsletter-icon" />
                </div>
                <div class="newsletter-content">
                    <div class="title newsletter">Join our newsletter</div>
                    <div>Subscribe to get latest updates from BISJHINTUS.</div>
                </div>
            </div>
            <div class="form-block newsletter w-form">
                {{-- <form action="{{route('newsletter')}}" method="post" id="newsletter-form" class="form-newsletter"> --}}
                <form action="#" method="post" id="newsletter-form" class="form-newsletter">
                    @csrf
                    <input id="email" type="email" class="input newsletter w-input" maxlength="256" name="email"
                        data-name="email" placeholder="Enter your email" required="" />
                    <input id="subscribe_letter" type="submit" value="Subscribe" data-wait="Please wait..."
                        class="button-primary w-button" />
                </form>
                <div class="success-message w-form-done">
                    <div>Thank you! You are now subscribed!</div>
                </div>
                <div class="error-message w-form-fail">
                    <div>Oops! Something went wrong.</div>
                </div>
            </div>
        </div>
        <div class="footer-links-block">
            <div data-w-id="5d3def44-2af0-a39e-d268-cb5e4a46cda6" class="links-block footer-links">
                <a href="#top" class="brand w-inline-block">
                    <img src="{{ asset('assets/images/logo-full.png') }}" alt="" style="width: 200px;" />
                </a>
                <div class="social-media-wrapper footer-fine-print">
                    <a href="https://www.facebook.com/BISJHINTUS" class="social-media-icon-wrapper w-inline-block">
                        <div class="social-media-icon-footer"></div>
                    </a>
                    <div class="spacer social-media-footer"></div>
                    <a href="https://twitter.com/BISJHINTUS_lst" class="social-media-icon-wrapper w-inline-block">
                        <div class="social-media-icon-footer twitter"></div>
                    </a>
                    <div class="spacer social-media-footer"></div>
                    <a href="https://www.instagram.com/BISJHINTUS" class="social-media-icon-wrapper w-inline-block">
                        <div class="social-media-icon-footer"></div>
                    </a>
                    <div class="spacer social-media-footer"></div>
                    <a href="https://www.linkedin.com/company/bisjhintu-s-let-s-succeed-together/"
                        class="social-media-icon-wrapper w-inline-block">
                        <div class="social-media-icon-footer"></div>
                    </a>
                </div>
                <div class="social-media-wrapper footer-fine-print">
                    <a href="https://www.quora.com/profile/BISJHINTUS-Lets-Succeed-Together"
                        class="social-media-icon-wrapper w-inline-block">
                        <div class="fa fa-quora"></div>
                    </a>
                    <div class="spacer social-media-footer"></div>
                    <a href="https://in.pinterest.com/bisjhintus/" class="social-media-icon-wrapper w-inline-block">
                        <div class="fa fa-pinterest"></div>
                    </a>
                    <div class="spacer social-media-footer"></div>
                    <a href="https://www.youtube.com/channel/UCq9vBOTqYP3R5h-ELeBx8Hg"
                        class="social-media-icon-wrapper w-inline-block">
                        <div class="fa fa-youtube-play"></div>
                    </a>
                    <div class="spacer social-media-footer"></div>
                    <a href="https://bisjhintus.medium.com/" class="social-media-icon-wrapper w-inline-block">
                        <div class="fa fa-medium"></div>
                    </a>
                </div>
            </div>
            <div data-w-id="5d3def44-2af0-a39e-d268-cb5e4a46cda9" style="z-index:1" class="links-block _2">
                <div data-w-id="5d3def44-2af0-a39e-d268-cb5e4a46cdaa" class="footer-mobile-title">
                    <h3 class="footer-title">
                        Links <span class="dropdown-icon-footer"></span>
                    </h3>
                </div>
                <div class="footer-mobile-content">
                    <div class="footer-content-links">
                        <ul role="list" class="list-footer w-list-unstyled">
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com" aria-current="page" class="footer-link">Home</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/about" class="footer-link ">About</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/contact" class="footer-link ">Contact</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://pricing.bisjhintus.com/" class="footer-link">Subscription</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://learn.bisjhintus.com/register" class="footer-link">Learn Portal</a>
                            </li>

                            <li class="footer-list-item">
                                <a href="https://exam.bisjhintus.com/register" class="footer-link">Test Portal</a>
                            </li>

                            <li class="footer-list-item">
                                <a href="https://community.bisjhintus.com/user/register" class="footer-link">Community
                                    Portal</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://blog.bisjhintus.com/register" class="footer-link">Blog Portal</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="#" class="footer-link">News Portal</a>
                            </li>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://enterprise.bisjhintus.com/" class="footer-link">Enterprise LMS</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://jobscorporate.bisjhintus.com/register" class="footer-link">Job
                                    Portal</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://profilebuilder.bisjhintus.com/registration/step-1/regular/31"
                                    class="footer-link">Profile Builder</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://expert.bisjhintus.com/plan" class="footer-link">Expert Portal</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://webbuilder.bisjhintus.com/register" class="footer-link">Web
                                    Builder</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://forms.bisjhintus.com/request/create/eyJpdiI6InFZbzFNcWZoQndVaGJQd3gxM2hHT1E9PSIsInZhbHVlIjoiQ0VQWktEM3JRR05HNGZkdzNCemF5K0svUzFYVHlMOTFDZm1RckNOSUJ3Yz0iLCJtYWMiOiIyMTQwYmZkZjY3ZmJkNTViZGU2MTlhMmQxYmMxZDRlZjZmMmQyM2ZkNmNjMzg4MmFhZDU3OTM2ZTg2Y2JlMDI2IiwidGFnIjoiIn0="
                                    class="footer-link">Form Builder</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://podcast.bisjhintus.com/user/register" class="footer-link">Podcast
                                    Portal</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://charitycsr.bisjhintus.com/register" class="footer-link">CSR
                                    Contribute</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/instructor" class="footer-link ">Teach</a>
                            </li>

                        </ul>
                        <div class="spacer links-footer"></div>
                        <ul role="list" class="list-footer w-list-unstyled">
                            <li class="footer-list-item">
                                <a href="https://franchising.bisjhintus.com" class="footer-link">Franchise</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://worklife.bisjhintus.com/" class="footer-link">Career</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/teachers-module" class="footer-link "
                                    class="mega-menu-link">Teacher's Module</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/our-initiatives" class="footer-link ">Our
                                    Initiatives</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/partner-with-us" class="footer-link ">Partner with
                                    us</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/find-me-a-teacher" class="footer-link ">Find me a
                                    teacher</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/FAQ" class="footer-link ">FAQ</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/future-with-bisjhintus" class="footer-link ">Future
                                    with Bisjhintus</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/bisjhintus-for-business"
                                    class="footer-link ">Bisjhintus for Business</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/whiteboard" class="footer-link "
                                    target="_blank">White Board</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://verifyinternshipcertificate.bisjhintus.com/"
                                    class="footer-link">Verify Internship</a>
                            </li>
                            <li class="footer-list-item" id="moreClick">
                                <span id="moreClick" class="footer-link ">More<span
                                        style="color:#0c9db3;margin-left: 10px;"
                                        class="fa fa-angle-right"></span></span>
                            </li>
                            <div id="more_div"
                                style="display: none;position: absolute;background: #fff;border: solid 1px #aaa;z-index: 999999999999999999999;padding: 13px;border-radius: 20px;">
                                <ul role="list" class="list-footer w-list-unstyled">
                                    <li class="footer-list-item">
                                        <a href="https://bisjhintus.com/more#exam-corner-blog"
                                            class="footer-link">Exam corner blog</a>
                                    </li>
                                    <li class="footer-list-item">
                                        <a href="https://bisjhintus.com/more#crash-course" class="footer-link">Crash
                                            course</a>
                                    </li>
                                    <li class="footer-list-item">
                                        <a href="https://bisjhintus.com/more#help-and-support"
                                            class="footer-link">Help and support </a>
                                    </li>
                                    <li class="footer-list-item">
                                        <a href="https://bisjhintus.com/professional-walkway" class="footer-link ">
                                            Professional Walkway</a>
                                    </li>
                                    <li class="footer-list-item">
                                        <a href="https://bisjhintus.com/more#free-resources" class="footer-link"> Free
                                            resources</a>
                                    </li>
                                </ul>
                            </div>
                        </ul>

                        <div class="spacer links-footer"></div>
                    </div>
                </div>
            </div>
            <div data-w-id="5d3def44-2af0-a39e-d268-cb5e4a46cddd" class="links-block _3">
                <div data-w-id="5d3def44-2af0-a39e-d268-cb5e4a46cdde" class="footer-mobile-title">
                    <h3 class="footer-title">
                        Legal <span class="dropdown-icon-footer"></span>
                    </h3>
                </div>
                <div class="footer-mobile-content">
                    <div class="footer-content-links">
                        <ul role="list" class="list-footer w-list-unstyled">
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/user-guidelines" class="footer-link ">User Guidelines
                                </a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/terms-and-conditions" class="footer-link ">Terms and
                                    Conditions </a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/privacy-policy" class="footer-link ">Privacy
                                    Policy</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/refund-policy" class="footer-link ">Refund Policy &
                                    Cancellation Policy</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/subscription-policy" class="footer-link ">Subscription
                                    Policy</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/live-mentorships-guidelines" class="footer-link ">1:1
                                    Live mentorships guidelines</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/minor-child-safety-policy" class="footer-link ">Child
                                    safety policy or Minor Policy.</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/refferal-policy" class="footer-link ">Refferal
                                    Policy</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/B2B-terms-policies" class="footer-link ">B2B Terms &
                                    Policies</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://bisjhintus.com/coupon-policy" class="footer-link ">Coupon Policy</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://employerpolicy.bisjhintus.com" class="footer-link">Employer
                                    Policy</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://certificatepolicy.bisjhintus.com/" class="footer-link">Certificate
                                    Policy</a>
                            </li>
                            <li class="footer-list-item">
                                <a href="https://globalportalspolicy.bisjhintus.com/" class="footer-link">Global
                                    Portals Policy</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div data-w-id="5d3def44-2af0-a39e-d268-cb5e4a46ce05" class="footer-fine-print-wrapper">
            <div class="fine-print">

            </div>
        </div>
    </div>




    <div class="container-default-1209px w-container">
        <div class="footer-links-block">
            <div data-w-id="5d3def44-2af0-a39e-d268-cb5e4a46cda6" class="links-block footer-links" style="order:0">

                <br> <br> <br>
                <span style="font-size: 1rem;color: #000;">M/s BISJHINTUS PRIVATE LIMITED</span><br>
                <span style="font-size: 1rem;color: #000;">CIN: U80904TR2021PTC013885</span><br>
                <span style="font-size: 1rem;color: #000;">ISO:9001:2015, Certificate Number:
                    21IQGQ82</span><br><br><br>
                <span style="font-size: 1rem;color: #000;">All Rights Reserved | Copyright © BISJHINTUS | 2024</span>
            </div>
            <div class="brand links-block _2">

                <div class="footer-mobile-content ">
                    <div class="footer-content-links">

                        <div style="z-index:-1">
                            <a href="./startup_india_certificate.pdf"><img
                                    src="{{ asset('assets/images/startupIndia.png') }}" style="width:250px"></a>
                        </div>

                    </div>
                </div>
            </div>
            <div data-w-id="5d3def44-2af0-a39e-d268-cb5e4a46cddd" class="links-block _3">
                <div data-w-id="5d3def44-2af0-a39e-d268-cb5e4a46cdde" class="footer-mobile-title">
                    <h3 class="footer-title">
                        Contact<span class="dropdown-icon-footer"></span>
                    </h3>
                </div>
                <div class="footer-mobile-content">
                    <div class="footer-content-links" style="margin-bottom: 20px;">
                        <span><b>Registered Office</b><br>C/O Jhintu Baidya Adhikari,<br>
                            Ramakrishna Colony, Belonia,
                            <br>South Tripura, Tripura – 799155
                            <br>
                    </div>
                    <div class="footer-content-links" style="margin-bottom: 20px;">
                        <span><b>Corporate Office</b><br>
                            KUDCEMP Building, 2nd Floor,
                            <br>MCC Commercial Complex,
                            <br>Mallikatte, Kadri, Mangalore,
                            <br>Karnataka – 575002
                            <br>
                            <br>Ph: +91 9353383517
                            <br>Mail: adoreforgrowth@bisjhintus.com</span>
                    </div>
                </div>
            </div>
        </div>

        <div data-w-id="5d3def44-2af0-a39e-d268-cb5e4a46ce05" class="footer-fine-print-wrapper">
            <div class="fine-print">

            </div>

        </div>
    </div>
</footer>
