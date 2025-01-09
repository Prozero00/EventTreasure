@extends('frontend.layouts.main')
@section('navAb','active')

@section('content')
<main>
  @session('error')
  <div class="alert alert-danger" role="alert">
    {{ $value }}
  </div>
  @endsession
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
  <div class="container-fluid py-5 pe-5">
    <div class="row align-items-center">
      <!-- Image Column -->
      <div class="col-md-5 text-center">
        <img src="../images/gambar.png" class="img-fluid" alt="Event Treasure Image" style="max-width: 700px; width: 100%; height: auto;">
      </div>
      <!-- Text Column -->
      <div class="col-md-7">
        <h3 class="fw-bold" style="font-size: 68px;">Event <span style="color: crimson;">Treasure</span></h3>
        <p class="fs-5 text-wrap" style="text-align: justify;color: #03045e;">
          Welcome to Treasure Website, your gateway to amazing events around the world! Discover unforgettable experiences, from epic concerts to vibrant cultural festivals. With every click, you’ll uncover new adventures tailored to your interests. Ready to embark on this journey? Explore, experience, and make lasting memories with Treasure Website!
        </p>
      </div>
    </div>
  </div>

  <div class="newest-event py-5 px-4">
    <h3 class="title">Newest <span>Events</span></h3>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="max-width: 30%; margin: auto;">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/event_1.jpg" class="d-block w-100 carousel-image" alt="Music Festival">
          <p>Music Festival</p>
        </div>
        <div class="carousel-item">
          <img src="images/event_2.jpg" class="d-block w-100 carousel-image" alt="Business Conference">
          <p>Business Conference</p>
        </div>
        <div class="carousel-item">
          <img src="images/event_3.png" class="d-block w-100 carousel-image" alt="Creative Workshop">
          <p>Creative Workshop</p>
        </div>
        <div class="carousel-item">
          <img src="images/event_4.jpg" class="d-block w-100 carousel-image" alt="Abstract Painting">
          <p>Abstract Painting</p>
        </div>
        <div class="carousel-item">
          <img src="images/event_5.jpg" class="d-block w-100 carousel-image" alt="Social Media Marketing Workshop">
          <p>Social Media Marketing Workshop</p>
        </div>
        <div class="carousel-item">
          <img src="images/event_6.jpg" class="d-block w-100 carousel-image" alt="Reggae Competition">
          <p>Reggae Competition</p>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>


  <!-- <section class="newest-event">
            <h3 class="title">Newest <span>Events</span></h3>
            <div class="carousel">
                <div class="carousel-track">

                    <div class="carousel-controls">
                        <button id="prev">◀</button>
                    </div>

                    <div class="carousel-item">
                        <img src="images/event_1.jpg" alt="Music Festival">
                        <p>Music Festival</p>
                    </div>

                    <div class="carousel-item">
                        <img src="images/event_2.jpg" alt="Business Conference">
                        <p>Business Conference</p>
                    </div>

                    <div class="carousel-item">
                        <img src="images/event_3.png" alt="Creative Workshop">
                        <p>Creative Workshop</p>
                    </div>

                    <div class="carousel-item">
                        <img src="images/event_4.jpg" alt="Abstract Painting">
                        <p>Abstract Painting</p>
                    </div>

                    <div class="carousel-item">
                        <img src="images/event_5.jpg"  alt="Social Media Marketing Workshop">
                        <p>Social Media Marketing Workshop</p>
                    </div>

                    <div class="carousel-item">
                        <img src="images/event_6.jpg" alt="Reggae Comprtition">
                        <p>Reggae Competition</p>
                    </div>
                </div>
            </div> -->


  <div style="height: 400px;margin-top: -100px;">
    <div class="row align-items-center">
      <!-- Text Column -->
      <div class="col-md-8" style="justify-content: left; 
  align-items: left;
  font-size: 18px;
  color: #03045e;margin-top: -200px;">
        <p class="offer">Enjoy a massive 50% discount when you shop using PayPal! Take advantage of this incredible deal and save big. Terms and conditions apply: valid for purchases over $50 and available until January 30th, 2025. Don’t miss this exclusive, limited-time offer—shop now and make the most of your savings!
        </p>
      </div>
      <!-- Image Column -->
      <div class="col-md-4 text-center">
        <img src="../images/discount.png" class="img-fluid" alt="Event Treasure Image" style="max-width: 100%; max-height: 80%;">
      </div>
    </div>
  </div>


  <div class="feedback-form py-5">
    <h2 class="text-center mb-4">Drop us a line!</h2>
    <form action="{{ route('message') }}" method="POST" class="container">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">Message:</label>
        <textarea id="message" name="message" class="form-control" rows="5" placeholder="Write your feedback here..." required></textarea>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary" style="max-width: 500px;">Submit</button>
      </div>
    </form>
  </div>
</main>
@endsection