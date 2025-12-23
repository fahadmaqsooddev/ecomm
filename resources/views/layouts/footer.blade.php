<?php 
    use App\Models\Category;
    use App\Models\Brand;
    use App\Models\ContactDetail;
    use App\Models\Link;
    $categories=Category::orderBy('id','desc')->limit(7)->get();
    $brands=Brand::orderBy('id','desc')->get();
    $contactdetail=ContactDetail::first();
    $link=Link::first();

?>
<footer class="footer" role="contentinfo" id="footer">
    <div class="container">
        <article class="newsletter-foot" data-section-type="newsletterSubscription">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>  
        @endif

            <div class="row">
<div class="left-news col-sm-5 col-12">
  <h3 class="footer-info-heading">Sign up to newsletter</h3>
  <p>Get the latest updates on new products and upcoming sales</p>
</div>
<div class="col-lg-7 col-12">
  <form class="form" action="{{ route('newsletter') }}" method="post" novalidate>
    @csrf
      <fieldset class="form-fieldset">
          <!-- <input type="hidden" name="action" value="subscribe">
          <input type="hidden" name="nl_first_name" value="bc"> -->
          <div class="form-field">
              <label class="form-label is-srOnly" for="newsletter_email">Email Address</label>
              
              <div class="form-prefixPostfix wrap">
                  <input class="form-input"
                         id="newsletter_email"
                         name="email"
                         type="email"
                         value=""
                         placeholder="Your email address"
                         aria-describedby="alertBox-message-text"
                  >
                  <input class="button button--primary form-prefixPostfix-button--postfix"
                         type="submit" id="subscribe"
                         value="Subscribe"
                  >
              </div>
                @error('email', 'newsletter')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
          </div>
      </fieldset>
  </form>
  
</div>
</div>        </article>
    </div>
    <h2 class="footer-title-sr-only">Footer Start</h2>
    <div class="container">
        
        <section class="footer-info row">
            <div class="col-sm-4 col-12">
                <h3 class="footer-info-heading">about us<button type="button" class="toggle plus-button collapsed" data-toggle="collapse" data-target="#about"></button></h3>
                <ul class="footer-info-list collapse navbar-collapse" id="about">
                    <p>tend to repeat predefined chunks as necessary making..</p>
                        <article class="
                            footer-info-col--social"
                            data-section-type="footer-webPages">
                                <!-- <h3 class="footer-info-heading">Connect With Us</h3> -->
                                    <ul class="socialLinks socialLinks--alt">
            <li class="socialLinks-item icon--twitter">
                <a class="icon" href="{{ $link['twitter_link'] }}" rel="noopener">
                    <svg><use xlink:href="#icon-twitter" /></svg>
                </a>
            </li>
            <li class="socialLinks-item icon--facebook">
                <a class="icon" href="{{ $link['facebook_link'] }}" rel="noopener">
                    <svg><use xlink:href="#icon-facebook" /></svg>
                </a>
            </li>
            <li class="socialLinks-item icon--linkedin">
                <a class="icon" href="{{ $link['linkedin_link'] }}" rel="noopener">
                    <svg><use xlink:href="#icon-linkedin" /></svg>
                </a>
            </li>
            <li class="socialLinks-item icon--instagram">
                <a class="icon" href="{{ $link['instagram_link'] }}" rel="noopener">
                    <svg><use xlink:href="#icon-instagram" /></svg>
                </a>
            </li>
            <li class="socialLinks-item icon--youtube">
                <a class="icon" href="{{ $link['youtube_link'] }}" rel="noopener">
                    <svg><use xlink:href="#icon-youtube" /></svg>
                </a>
            </li>
    </ul>
                        </article>
                </ul>
            </div>
            <article class="col-sm-2 col-12" data-section-type="storeInfo">
                <h3 class="footer-info-heading">Info<button type="button" class="toggle plus-button collapsed" data-toggle="collapse" data-target="#foot-1"></button></h3>
                <ul class="footer-info-list collapse navbar-collapse" id="foot-1">
                    <img class="img-responsive pull-left" src="../cdn11.bigcommerce.com/s-2mjaftvnkq/product_images/uploaded_images/placed5a0.png?t=1608035375&amp;_ga=2.149649844.325315486.1608008892-1739159882.1608008892"><address>
                    {{ $contactdetail->address }}


                    </address>
                        <img class="img-responsive pull-left" src="../cdn11.bigcommerce.com/s-2mjaftvnkq/product_images/uploaded_images/phone-call4c9c.png?t=1608035374&amp;_ga=2.149649844.325315486.1608008892-1739159882.1608008892"><span class="foot-phone">{{ $contactdetail->phone }}</span>
                    
                </ul>
            </article>
            <article class="col-sm-2 col-12" data-section-type="footer-webPages">
                <h3 class="footer-info-heading">Navigate<button type="button" class="toggle plus-button collapsed" data-toggle="collapse" data-target="#foot-2"></button></h3>
                <ul class="footer-info-list collapse navbar-collapse" id="foot-2">
                        <li>
                            <a href="{{ route('about')}}">About us</a>
                        </li>
                        <li>
                            <a href="{{ route('services') }}">Shipping &amp; Returns</a>
                        </li>
                        <li>
                            <a href="{{ route('contactus') }}">Contact Us</a>
                        </li>
                        <li>
                            <a href="{{ route('blogs')}}">Blog</a>
                        </li>
                    <!-- <li>
                        <a href="sitemap.html">Sitemap</a>
                    </li> -->
                </ul>
            </article>

            <article class="col-sm-2 col-12" data-section-type="footer-categories">
                <h3 class="footer-info-heading">Categories<button type="button" class="toggle plus-button collapsed" data-toggle="collapse" data-target="#foot-3"></button></h3>
                <ul class="footer-info-list collapse navbar-collapse" id="foot-3">
                    @if($categories)
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route('category', ['id' => $category->id]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    @endif
                        
                       
                </ul>
            </article>

            <article class="col-sm-2 col-12" data-section-type="footer-brands">
                <h3 class="footer-info-heading">Popular Brands<button type="button" class="toggle plus-button collapsed" data-toggle="collapse" data-target="#foot-4"></button></h3>
                <ul class="footer-info-list collapse navbar-collapse" id="foot-4">
                @if($brands)
                    @foreach($brands as $b)
                        <li>
                            <a href="#">{{ $b->name }}</a>
                        </li>
                    @endforeach
                @endif
                </ul>
            </article>
        </section>
    </div>
    <div class="foot-copy">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-12">
                        <div class="footer-copyright d-inline-block">
                            <p class="powered-by">Powered by <a href="https://www.bigcommerce.com/?utm_source=merchant&amp;utm_medium=poweredbyBC" rel="nofollow">BigCommerce</a></p>
                        </div>
                        <div class="footer-copyright d-inline-block">
                            <p class="powered-by">&copy; 2024 martega </p>
                        </div>
                </div>
                <div class="col-sm-6 col-12 text-right">
                        <div class="footer-payment-icons">
        <svg class="footer-payment-icon"><use xlink:href="#icon-logo-discover"></use></svg>
        <svg class="footer-payment-icon"><use xlink:href="#icon-logo-mastercard"></use></svg>
        <svg class="footer-payment-icon"><use xlink:href="#icon-logo-paypal"></use></svg>
        <svg class="footer-payment-icon"><use xlink:href="#icon-logo-visa"></use></svg>
        <svg class="footer-payment-icon"><use xlink:href="#icon-logo-googlepay"></use></svg>
    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" id="scroll" title="Scroll to Top" style="display: inline;"><i class="fa fa-angle-up"></i></a>

</footer>