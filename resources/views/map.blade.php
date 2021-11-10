<!DOCTYPE html>
<html>

<head>
    <title>Ayedun map</title>
    @include('layouts.styles')
    <style>
        section.map {
            margin-bottom: ;
        }

        section.map #map {
            height: 450px;
        }
    </style>
</head>

<body style="padding-top: 17px">
    @include('layouts.header')
    <div class="container">
        <section class="map">
            <div class="container" style="padding-top: 90px;">
                <div class="row">
                    <div class="col-md-12">
                        <div id="map">
                            <!-- How to change your own map point
                1. Go to Google Maps
                2. Click on your location point
                3. Click "Share" and choose "Embed map" tab
                4. Copy only URL and paste it within the src="" field below
            -->
    
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15801.732133670313!2d5.097898166249932!3d8.05723415315975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10481efe69a9c42f%3A0x7ea5e69fd56283bf!2sAyedun%2C%20Ekan%20Meje!5e0!3m2!1sen!2sng!4v1611004874746!5m2!1sen!2sng"
                                width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
    
                        </div>
                    </div>
                </div>
                <button class="btn btn-info" style="float: right; background-color: #4CAF50;
                                                          color: white;
                                                          padding: 14px 20px;
                                                          margin: 8px 0;
                                                          border: none;
                                                          cursor: pointer;
                                                          width: 100%;"> <a style="text-decoration: none; color: #fff; "
                        href={{ url('user/home') }}>GO HOME</a></button>
            </div> 
            
        </section>
    </div>
   
 	@include('layouts.scripts')
</body>

</html>