<div class="px-4" style="background:#03045e;">
  <header class="d-flex flex-wrap py-3 mb-4 col border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <div class="d-flex align-items-center">
        <span class="fw-bold text-white fs-2">eve</span>
        <span class="fw-bold fs-2 gradient-text">ntr</span><span class="fw-bold fs-2" style="color:crimson">easure</span>
      </div>
    </a>

    <ul class="nav nav-pills">
      <li class="nav-item"><a href="/" class="nav-link text-white custom-hover fs-5">Home</a></li>
      <li class="nav-item"><a href="/event" class="nav-link text-white custom-hover fs-5">Events</a></li>

      @auth
      <!-- Show Logout Button if Authenticated -->
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="nav-link text-white btn text-center fs-5" style="background-color: crimson; border-radius: 30px;">Logout</button>
        </form>
      </li>
      @else
      <!-- Show Login and Register Buttons if Not Authenticated -->
      <li class="nav-item"><a href="/login" class="nav-link text-white custom-hover fs-5">Login</a></li>
      <li class="nav-item"><a href="/register" class="nav-link text-white btn text-center fs-5" style="background-color: crimson; border-radius: 30px;">Sign Up</a></li>
      @endauth
    </ul>
  </header>
</div>