<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 1</title>

  

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <script src="{{asset('js/bundle.min.js')}}" ></script>
    
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
   
  <!--mini slider -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
 <!-- slider for more items--> 


<style>
@import "http://nyplintranet-training.appspot.com/css/themes/nypl/main.css";
/* equal card height */
.row-equal > div[class*='col-'] {
    display: flex;
    flex: 1 0 auto;
}

.row-equal .card {
   width: 100%;
}

/* ensure equal card height inside carousel */
.carousel-inner>.row-equal.active, 
.carousel-inner>.row-equal.next, 
.carousel-inner>.row-equal.prev {
    display: flex;
}

/* prevent flicker during transition */
.carousel-inner>.row-equal.active.left, 
.carousel-inner>.row-equal.active.right {
    opacity: 0.5;
    display: flex;
}


/* control image height */
.card-img-top-250 {
    max-height: 250px;
    overflow:hidden;
}
</style>

<script>
(function($) {
    "use strict";

    // manual carousel controls
    $('.next').click(function(){ $('.carousel').carousel('next');return false; });
    $('.prev').click(function(){ $('.carousel').carousel('prev');return false; });
    
})(jQuery);
</script>
<!-- slider for more items -->


    <!-- Account page  -->
    <style>
      
      .form-control:focus {
          box-shadow: none;
          border-color: #BA68C8
      }

      .profile-button {
          background: rgb(99, 39, 120);
          box-shadow: none;
          border: none
      }

      .profile-button:hover {
          background: #682773
      }

      .profile-button:focus {
          background: #682773;
          box-shadow: none
      }

      .profile-button:active {
          background: #682773;
          box-shadow: none
      }

      .back:hover {
          color: #682773;
          cursor: pointer
      }

      .labels {
          font-size: 11px
      }

      .add-experience:hover {
          background: #BA68C8;
          color: #fff;
          cursor: pointer;
          border: solid 1px #BA68C8
      }
    </style>



</head>
<body>

<!-- navgation bar -->
@yield('navbar')
<!-- nav bar -->


<!-- header -->
@yield('header')
<!-- header -->


    <!--Contents -->
    @yield('contents')
    @yield('login')


<div class="container">
  <div class="row py-4">
    <div class="text-center" style="color: rgb(19, 19, 94); font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-weight: 900;">
      <h1>
        <p>We Are Available For You 24/7</p>
      </h1>
      </div>
    <div class="text-center mt-2" style="color: rgb(19, 19, 94);">
        <p>OUR ONLINE SUPPORT SERVICE IS ALWARYS 24HOURS</p>
    </div>
  </div>
</div>


<!--Address Map--> 
<div class="container">
      <p>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.007437618112!2d96.12766157432819!3d16.825987118736816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c194ca13fff6e3%3A0x1334ced7a53c5bbc!2sHledan%20Centre!5e0!3m2!1sen!2smm!4v1689013988499!5m2!1sen!2smm" width="1100" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </p>
</div>

<!--Footer-->
<div class="container">
      
      <div class="row">
        <div class="col p-3">
        <div class="d-flex justify-content-center">
          <ul class="list-group list-group-flush" style="width: 60%;">
            <li class="list-group-item ">
              <h3><i class="fa fa-home" style="color: blue;"></i>&nbsp;&nbsp; <strong>  Address </h3> </strong>
            </li>
            <li class="list-group-item">
               <i class="fa fa-building" style="color: red;"></i>&nbsp;&nbsp; Hledan Center
            </li>
            <li class="list-group-item">
              <i class="fa fa-map-marker" style="color: red;"></i>&nbsp;&nbsp; Kamayut Township, Yangon
            </li>
          </ul>
        </div>
        </div>

        <div class="col p-3">
        <div class="d-flex justify-content-center">
          <ul class="list-group list-group-flush" style="width: 60%;">
           
            <li class="list-group-item ">
              <h3><i class="fa fa-hand" style="color: blue;"></i>&nbsp;&nbsp; <strong>Contact </strong> </h3>
            </li>
            <li class="list-group-item">
              <i class="fa fa-phone" style="color: red;"></i>&nbsp;&nbsp; Phone No: 09-000000000
            </li>
            <li class="list-group-item">
              <i class="fa fa-envelope" style="color: red;"></i>&nbsp;&nbsp;  Email: companyname@gmail.com
            </li>
          </ul>
        </div>
        </div>

      </div>
    </div>
<!--Footer-->

    <!--copy rights-->
    <div class="container-fluid bg-dark text-white text-center p-2">
        Copy Rights &copy; All Rights Reserved. 2023
    </div>

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- User Slider -->
<script>
    $('.toggle-all').on('click', function() {
      $('#infinite_carousel .row').toggleClass('flex-nowrap');
      $('#infinite_carousel .control').toggleClass('d-none');
      $(this).html($('#infinite_carousel .row').hasClass('flex-nowrap') ? '<i class="fa fa-th" aria-hidden="true"></i> Show All' : '<i class="fa fa-chevron-right" aria-hidden="true"></i> Show Slider');
    });

    $('#infinite_carousel .fa-chevron-right').on('click', () => {
      let $infinite_carousel_row = $('#infinite_carousel .row');
      let $col = $infinite_carousel_row.find('.col:first');
      $infinite_carousel_row.append($col[0].outerHTML);
      $col.remove();
    });

    $('#infinite_carousel .fa-chevron-left').on('click', () => {
      let $infinite_carousel_row = $('#infinite_carousel .row');
      let $col = $infinite_carousel_row.find('.col:last');
      $infinite_carousel_row.prepend($col[0].outerHTML);
      $col.remove();
    });
</script>
    
  
</body>
</html>