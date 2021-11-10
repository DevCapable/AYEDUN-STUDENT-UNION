<link rel="icon" href="../../../../favicon.ico">
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
<link rel="stylesheet" href="{{ asset('widgEditor/css/widgEditor.css') }}" />

<style>
   

    #homename {
        font-family: Exotc350 Bd BT;
        font-size: 20px;
    }

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