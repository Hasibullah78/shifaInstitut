@include('body.head')

<body data-spy="scroll" data-bs-target=".navbar" data-offset="50">


    <!-- Start [ nav meu ] -->
    @include('body.nav')
    <!-- End [ nav menu ] -->
    <!--Start [ main ] -->
    @include('body.header')

    <!--End [ main ] -->

    {{-- @include('body.departments')     --}}
    <section class="head-features">
        <div class="container" id="depart">
               <div class="card">
                <div class="card-header" style="text-align: center">
                   <h3 style="color: rgb(68, 125, 247)"> All Departments</h3>
                </div>
               </div>
            <div class="row">
                @foreach ($deps as $dep)
                <div class="col-sm-4">
                    <div class="feature-head">
                <div class="card"">
                    <div class="card-header" style="background-color: rgb(68, 125, 247) ; text-align: center">
                        <h5 >
                        {{ $dep->name }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <strong id="center">{{ $dep->description }}</strong>
                    </div>
                </div>
                    </div>
                </div>
                {{-- <div class="col-sm-4">
                    <div class="feature-head">
                        <h3>{{ $dep->name }}</h3>
                        <h5>{{ $dep->description }}</h5>
                    </div>
                </div> --}}

            @endforeach

            </div>
        </div>
    </section>


   {{-- @include('body.teachers')     --}}
   <section class="features" id="features" >
    <div class="container" id="team">
        <div class="card">
            <div class="card-header" style="text-align: center">
               <h3 style="color: rgb(68, 125, 247)"> Our Team</h3>
            </div>
           </div>
        <div class="row">

            @foreach ($techs as $tech)
            <div class="card col-md-3">
                <img height="260px" class="card-img-top" src="{{ asset($tech->image) }}" alt="Card image">
                <div class="card-body" style="text-align: center">
                  <h5 class="card-title">{{ $tech->name }}</h5>
                  {{-- <h5 class="card-text">{{ $tech->postition }}</h5> --}}
                  {{-- <a href="{{ url('view/profile'.$tech->id) }}" class="btn btn-primary">See Profile</a> --}}
                </div>
              </div>


              @endforeach
        </div>
    </div>
</section>
<section>
    <div class="container" id="establishment">
        <div class="card">
            <div class="card-header" style="text-align: center">
                <h3 style="color: rgb(68, 125, 247)"> Establishment</h3>
             </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document.
                            To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries.
                            Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme.
                            Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign.
                            Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device.

                            </p>
                    </div>
                    <div class="col-md-6">
                        <p>Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document.
                            To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries.
                            Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme.
                            Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign.
                            Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device.

                            </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

   {{-- @include('body.gallary')     --}}
   <section class="version" id="version">
    <div class="container-fluid" id="gallary">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="card">
                    <div class="card-header" style="text-align: center" >
                        <h3 style="color: rgb(68, 125, 247)"> Our Gallary</h3>
                     </div>
                </div>
            </div>
        </div>
        <!-- Light Demos -->
        {{-- @foreach ($gallaries as $gallary) --}}


        <div class="row">

            @foreach ($gallaries as $tech)
            <div class="card col-md-3">
                <img height="260px" class="card-img-top" src="{{ asset($tech->gallary_image) }}" alt="Card image">
                <div class="card-body" style="text-align: center">
                  {{-- <h5 class="card-title">{{ $tech->name }}</h5> --}}
                  {{-- <h5 class="card-text">{{ $tech->postition }}</h5> --}}
                  {{-- <a href="{{ url('view/profile'.$tech->id) }}" class="btn btn-primary">See Profile</a> --}}
                </div>
              </div>


              @endforeach
        </div>
        <hr />
    </div>
</section>


    {{-- <section id="buy-now" class="jarallax" data-jarallax='{"speed": 0.2}'
        style="background-image: url(assets/front/images/home-bg.jpg);">
        <div class="bg-layer"></div>
        <div class="container buy-now">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="buy-text">Limited offer 30% off</h3>
                    <p>6 month Support & Landing page Included</p>
                </div>
                <div class="col-sm-4 text-center">
                    <a class="btn btn-lg btn-primary btn-buy navbar-btn call-to-action buy_btn"
                        href="https://codedthemes.com/item/gradient-able-admin-template/" target="_blank">BUY NOW</a>
                </div>
            </div>
        </div>
    </section> --}}
    <!--Start [ client says ] -->
    {{-- @include('body.sidebar')            --}}
    <!--End [ client says ] -->
    <!--Start [ client says ] -->
   @include('body.footer')
    <!--End [ client says ] -->
    <!-- Required js -->

    <script src="{{ asset('frontend/assets/js/plugins/bootstrap.min.js') }}"></script>
    <!-- Typing js -->
    <script src="{{ asset('frontend/assets/front/js/typed.min.js') }}"></script>
    <!-- Jarallax js -->
    <script src="{{ asset('frontend/assets/front/js/jarallax.min.js') }}"></script>
    <!-- Script js -->
    <script src="{{ asset('frontend/assets/front/js/script.js') }}"></script>
