<!DOCTYPE html>
<html>
<head>
    <title>AYEDUN STUDENTS' UNION</title>
    <style>
    
        #twitter,
        #facebook,
        #linkedin,
        #google {
            background-color: #205d7a;
            color: #fff;
            width: 40px;
            height: 40px;
            top: 52px;
            border-radius: 40px;
            font-size: 25px;
            text-align: center;
            margin-right: 0px;
            padding-top: 02%;
            transition: all 0.2s eas-in-out;
        }
    
        #facebook:hover,
        #twitter:hover,
        #linkedin:hover,
        #google:hover {
            opacity: .7;
    
    
        }
    
        #twitter {
            background-color: #00aced;
    
        }
    
        #google {
            background-color: #dd4b39;
    
        }
    
        #facebook {
            background-color: #3b5998;
    
        }
    
        #linkedin {
            background-color: #007bb6;
    
        }
    
        #dropdown {
            background-color: #1f2e2e;
            color: #fff;
            border-bottom: 1px dotted #fff;
        }
    
        #dropdown:hover {
            color: #1affd1;
        }
    
        /* MY SIDEBAR*/
        #mySidenav a {
            position: fixed;
            left: -80px;
            transition: 0.3s;
            padding: 15px;
            padding-right: 20px;
            padding-left: 2px;
            z-index: 1;
            width: 100px;
            text-decoration: none;
            font-size: 20px;
            color: white;
            border-radius: 0 5px 5px 0;
        }
    
        #mySidenav a:hover {
            left: 0;
        }
    
        #about {
            top: 140px;
            background-color: #4CAF50;
        }
    
        #map {
            top: 200px;
            background-color: #2196F3;
        }
        #developer {
            top: 260px;
            background-color: #f44336;
        }
    
        ul {
            display: inline-flex;
            list-style: none;
            color: #fff;
            margin: 0px;
        
        }
        
        
        #twitterb, #facebookb, #linkedinb, #googleb {
            background-color:#205d7a;
            color: #fff;
            width: 40px;
            height: 40px;
            top: 50px;
            border-radius: 40px;
            font-size: 25px;
            text-align: center;
            margin-right: 0px;
            padding-top: 15%;
            transition: all 0.2s eas-in-out;       
        }
        #googleb:hover , #twitterb:hover , #linkedinb:hover , #facebookb:hover {
            color: red; background-color: #33ff77;
        }
    </style>
</head>
<body>
    <h3>{{ $details['title'] }}</h3>
    <p>{{ $details['message'] }}</p>
    <br>
    <br>

    <h4>Kindly Click on this link https://www.ayedunstudentsunion.com to register, ignore if already registered</h4>
    <p>You can contact us through addresses below</p>
    <p>contactus@ayedunstudentsunion.com</p>
    <p>ayedunstudentunion4web@gmail.com</p>
    <p>Greate ASU!!!</p>
    <footer style="background-color: #ccffe6;">
        <div class="container" >
            <div class="row">
                <div class="col-md-4">
                    <strong>Copyright &copy; {{ now()->year }} <a href="https://www.ayedunstudentsunion.com">Ayedun Students' Union</a>. <br></strong>
                    All rights reserved.
                    <div class="float-right d-none d-sm-inline-block">
                      <b>Version</b> 4.1.0
                    </div>
                </div>
                <div class="col-md-4">
                    <ul >
                        <li class="nav-item"><a class="nav-link" href="https://twitter.com/MrCapable22"><i id="twitterb" class="fab fa-twitter"></i></a></li>
    
                <li class="nav-item"><a class="nav-link" href="https://web.facebook.com/abdulrasaqolawale.olabode/about_details "><i id="facebookb"class="fab fa-facebook"></i></a></li>
                
                <li class="nav-item"><a class="nav-link" href="https://www.linkedin.com/in/dada-abdulrasaq-3b20871a2/"><i id="linkedinb" class="fab fa-linkedin"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="http/www.google.com/ honcapable@gmail.com"><i id="googleb" class="fab fa-google-plus"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <strong><a href="https://web.facebook.com/abdulrasaqolawale.olabode/about_details">Powered by: CapeTech Informations Commucications Limited</a>. <br></strong>
                   
                    <div class="float-right d-none d-sm-inline-block">  <i class="fa fa-phone"></i> 08162291993.
                </div>
            </div>
        </div>
    </footer>
</body>
</html>









