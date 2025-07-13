 <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

<div class="hero-container">
  <video id="myVideo" class="video-background" autoplay loop playsinline>
    <source src="assets/img/education/OmSai.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>


<script>
/*  // Ensure sound plays after user interaction
  document.addEventListener('click', function () {
    const video = document.getElementById('myVideo');
    video.muted = false;
    video.play();
  });*/
</script>
<script>
  function enableVideo() {
    const video = document.getElementById('myVideo');
    video.muted = false;
    video.play();
    // Optional: remove event listener after first interaction
    document.removeEventListener('click', enableVideo);
  }

  // Wait for first user interaction
  document.addEventListener('click', enableVideo);
</script>

        <div class="overlay"></div>
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-7" data-aos="zoom-out" data-aos-delay="100">
              <div class="hero-content" style="color:#CF6">
                <h1 style="color:#FFF; font-size:28px">Shiridi Sai Trust Raghavendra Colony Welfare Society, Nalgonda</h1>
                <p>Devoted towards teachings of Saibaba "Sabka Malik Ek" and providing amenities to Sai devotees who are visiting of this Temple..</p>
                <div class="cta-buttons">
                  <a href="login.php" class="btn btn-warning">Start Your Donation</a>
                  <a href="about_us.php" class="btn btn-info">Discover Programs</a>
                </div>
              </div>
            </div>
            <div class="col-lg-5" data-aos="zoom-out" data-aos-delay="200">
              <div class="stats-card">
                <div class="stats-header">
                  <h3>Temple Details</h3>
                  <div class="decoration-line"></div>
                </div>
                <div class="stats-grid">
                  <div class="stat-item">
                    <div class="stat-icon">
                      <i class="bi bi-person-video2"></i>
                    </div>
                    <div class="stat-content">
                      <h4>98%</h4>
                      <p>Devotee Donors</p>
                    </div>
                  </div>
                  <div class="stat-item">
                    <div class="stat-icon">
                      <i class="bi bi-airplane"></i>
                    </div>
                    <div class="stat-content">
                      <h4>25+</h4>
                      <p>International Devotees</p>
                    </div>
                  </div>
                  <div class="stat-item">
                    <div class="stat-icon">
                      <i class="bi bi-slack"></i>
                    </div>
                    <div class="stat-content">
                      <h4>15+</h4>
                      <p>Pooja, Aarthi, Seva...</p>
                    </div>
                  </div>
                  <div class="stat-item">
                    <div class="stat-icon">
                      <i class="bi bi-building"></i>
                    </div>
                    <div class="stat-content">
                      <h4>120+</h4>
                      <p>Social Services</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

     <!--  <div class="event-ticker">
        <div class="container">
          <div class="row gy-4">
            <div class="col-md-6 col-xl-4 col-12 ticker-item">
              <span class="date">NOV 15</span>
              <span class="title">Open House Day</span>
              <a href="#" class="btn-register">Register</a>
            </div>
            <div class="col-md-6 col-12 col-xl-4  ticker-item">
              <span class="date">DEC 5</span>
              <span class="title">Application Workshop</span>
              <a href="#" class="btn-register">Register</a>
            </div>
            <div class="col-md-6 col-12 col-xl-4 ticker-item">
              <span class="date">JAN 10</span>
              <span class="title">International Student Orientation</span>
              <a href="login.php" class="btn-register">Register</a>
            </div>
          </div>
        </div>
      </div>-->

    </section><!-- /Hero Section -->