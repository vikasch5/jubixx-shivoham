<style>
.blogs-section {
  background: #f8f9fa;
}

/* Card */
.blog-card {
  background: #fff;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 8px 20px rgba(0,0,0,0.08);
  transition: 0.3s;
  margin-bottom: 30px;
}

.blog-card:hover {
  transform: translateY(-5px);
}

/* Image */
.blog-img {
  height: 220px;
  overflow: hidden;
}

.blog-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: 0.4s;
}

.blog-card:hover img {
  transform: scale(1.05);
}

/* Content */
.blog-content {
  padding: 20px;
}

.blog-content h3 {
  font-size: 18px;
  margin-bottom: 10px;
  font-weight: 600;
}

.blog-content p {
  font-size: 14px;
  color: #666;
  margin-bottom: 15px;
}

/* Button */
.read-btn {
  display: inline-block;
  padding: 7px 16px;
  background: #2e7d65;
  color: #fff;
  border-radius: 4px;
  text-decoration: none;
  font-size: 13px;
}

.read-btn:hover {
  background: #256b56;
  color: #fff;
}

/* View all button */
.view-all-wrapper {
  margin-top: 20px;
}

.view-all-btn {
  padding: 10px 25px;
  border-radius: 25px;
  background: #2e7d65;
  color: #fff;
  text-decoration: none;
  display: inline-block;
}

.view-all-btn:hover {
  background: #256b56;
  color: #fff;
}
</style>

<section class="blogs-section">
  <div class="container">

    <!-- Section Heading -->
    <div class="row">
      <div class="col-md-12 text-center">
        <h2 class="text-uppercase line-bottom-double-line-centered mt-0">
          Our <span class="text-theme-colored">Latest Blogs</span>
        </h2>
      </div>
    </div>

    <!-- Blog Cards -->
    <div class="row">

      <!-- Blog 1 -->
      <div class="col-md-4 col-sm-6">
        <div class="blog-card">
          <div class="blog-img">
            <img src="images/ChatGPT-Image-Mar-6-2026-03_19_10-PM-768x512.webp" alt="">
          </div>
          <div class="blog-content">
            <h3>Guided Meditation for Better Sleep</h3>
            <p>With the modern pace of life, sleep is often an expense...</p>
            <a href="blog-details.php" class="read-btn">Read More</a>
          </div>
        </div>
      </div>

      <!-- Blog 2 -->
      <div class="col-md-4 col-sm-6">
        <div class="blog-card">
          <div class="blog-img">
            <img src="images/ChatGPT-Image-Feb-13-2026-02_46_07-PM-768x512.webp" alt="">
          </div>
          <div class="blog-content">
            <h3>What is a Vipassana Course?</h3>
            <p>Stress, anxiety, and mental fatigue have become common...</p>
            <a href="blog-details.php" class="read-btn">Read More</a>
          </div>
        </div>
      </div>

      <!-- Blog 3 -->
      <div class="col-md-4 col-sm-6">
        <div class="blog-card">
          <div class="blog-img">
            <img src="images/ChatGPT-Image-Feb-10-2026-02_31_03-PM-768x512.webp" alt="">
          </div>
          <div class="blog-content">
            <h3>Screens, Stress & School Pressure</h3>
            <p>The childhood experience has changed drastically...</p>
            <a href="blog-details.php" class="read-btn">Read More</a>
          </div>
        </div>
      </div>

    </div>

    <!-- View All Button (BOTTOM CENTER) -->
    <div class="row view-all-wrapper">
      <div class="col-md-12 text-center">
        <a href="blog.php" class="view-all-btn">
          View All Blogs
        </a>
      </div>
    </div>

  </div>
</section>