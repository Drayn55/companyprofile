<?php
$db = mysqli_connect('localhost', 'root', '', 'companyprofile');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function untuk sanitasi input
function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

// Function untuk cek CSRF token
function check_csrf_token($token) {
    if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
        $_SESSION['error_message'] = "Invalid CSRF token";
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }
}

// Function untuk cek rate limiting
function check_rate_limit($db, $ip_address) {
    $limit = 5; // Maximum number of requests
    $time_frame = '1 hour'; // Time frame for rate limiting
    $max_logs = 3; // Maximum number of logs to keep

    // Inisialisasi variabel request_count
    $request_count = 0;
    
    // Check the number of requests from the IP address within the time frame
    $query = "SELECT request_count FROM request_logs WHERE ip_address = ? AND request_time > (NOW() - INTERVAL $time_frame)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $ip_address);
    $stmt->execute();
    $stmt->bind_result($request_count);
    $stmt->fetch();
    $stmt->close();

    if ($request_count >= $limit) {
        $_SESSION['error_message'] = "Rate limit exceeded. Please try again later.";
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }

    // Update or insert the request log
    if ($request_count) {
        $query = "UPDATE request_logs SET request_count = request_count + 1 WHERE ip_address = ? AND request_time > (NOW() - INTERVAL $time_frame)";
    } else {
        $query = "INSERT INTO request_logs (ip_address, request_time, request_count) VALUES (?, NOW(), 1)";
    }
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $ip_address);
    $stmt->execute();
    $stmt->close();

    // Check the total number of logs and delete the oldest if necessary
    $query = "SELECT COUNT(*) FROM request_logs";
    $result = $db->query($query);
    $row = $result->fetch_row();
    $total_logs = $row[0];

    if ($total_logs > $max_logs) {
        $query = "DELETE FROM request_logs ORDER BY request_time ASC LIMIT " . ($total_logs - $max_logs);
        $db->query($query);
    }
}

// Generate CSRF token jika belum ada
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Jika form dikirim (tanpa AJAX, langsung dengan PHP)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check CSRF token
    check_csrf_token($_POST['csrf_token']);

    // Get the IP address of the client
    $ip_address = $_SERVER['REMOTE_ADDR'];
    
    // Check rate limiting
    check_rate_limit($db, $ip_address);

    // Ambil data dari form
    $nama = sanitize_input($_POST["nama"]);
    $komentar = sanitize_input($_POST["komentar"]);
    $parent_id = sanitize_input($_POST["parent_id"]);
    $post_id = sanitize_input($_POST["post_id"]);

    // Debugging: Tampilkan nilai input
    error_log("Nama: $nama, Komentar: $komentar, Parent ID: $parent_id, Post ID: $post_id");

    // Validasi input
    if (strlen($nama) > 100 || strlen($komentar) > 1000 || !is_numeric($parent_id) || !is_numeric($post_id)) {
        $_SESSION['error_message'] = "Invalid input";
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }

    // Set timezone Indonesia
    date_default_timezone_set('Asia/Jakarta');
    $tanggal_komen = date('Y-m-d H:i:s');

    // Insert ke database
    $query = "INSERT INTO tbl_komentar (nama, komentar, parent_id, berita_id, tanggal_komen) VALUES (?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    if ($stmt === false) {
        $_SESSION['error_message'] = "Prepare failed: " . $db->error;
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }
    $stmt->bind_param("ssiss", $nama, $komentar, $parent_id, $post_id, $tanggal_komen);
    $stmt->execute();

    // Redirect untuk refresh halaman agar komentar langsung muncul
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

// init output
$output = '';

// lakukan query select order by untuk mengurutkan komentar baru pada tbl_komentar
$query = "SELECT * FROM tbl_komentar WHERE parent_id = 0 AND berita_id = ? ORDER BY id DESC";
$stmt = $db->prepare($query);
if ($stmt === false) {
    die("Prepare failed: " . $db->error);
}
$stmt->bind_param("i", $berita->id_berita);
$stmt->execute();
$res = $stmt->get_result();

// looping data
while ($row = $res->fetch_assoc()) {

  // lakukan join output
  $output .= '
  <div class="comment">
    <div class="d-flex">
      <div class="comment-img"><i class="bi bi-person-circle" style="font-size:30px;"></i></div>
      <div>
        <h5><a href="">' . $row["nama"] . '</a> <a href="#" class="reply reply-btn" data-id="' . $row["id"] . '"><i class="bi bi-reply-fill"></i> Reply</a></h5>
        <time datetime="' . $row["tanggal_komen"] . '">' . $row["tanggal_komen"] . '</time>
        <p>' . $row["komentar"] . '</p>
      </div>
    </div>
  </div>
  ';

  $output .= ambil_reply($db, $row["id"]);
}

// function ambil_reply di gunakan untuk membalas komentar pengguna
function ambil_reply($db, $parent_id, $marginLeft = 30) {
  $output = '';
  $query = "SELECT * FROM tbl_komentar WHERE parent_id=? ORDER BY id ASC";
  $stmt = $db->prepare($query);
  if ($stmt === false) {
      die("Prepare failed: " . $db->error);
  }
  $stmt->bind_param("s", $parent_id);
  $stmt->execute();
  $res = $stmt->get_result();

  while ($row = $res->fetch_assoc()) {
      $output .= '
      <div class="comment comment-reply" style="margin-left:' . $marginLeft . 'px;">
          <div class="d-flex">
              <div class="comment-img"><i class="bi bi-person-circle" style="font-size:30px;"></i></div>
              <div>
                  <h5><a href="#">' . $row["nama"] . '</a> <a href="" class="reply reply-btn" data-id="' . $row["id"] . '"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                  <time datetime="' . $row["tanggal_komen"] . '">' . $row["tanggal_komen"] . '</time>
                  <p>' . $row["komentar"] . '</p>
              </div>
          </div>
      </div>
      ';
      $output .= ambil_reply($db, $row["id"], $marginLeft + 30);
  }

  return $output;
}

  // Query untuk menghitung jumlah komentar
  $query = "SELECT COUNT(*) as total_comments FROM tbl_komentar WHERE berita_id = ?";
  $stmt = $db->prepare($query);
  if ($stmt === false) {
      die("Prepare failed: " . $db->error);
  }
  $stmt->bind_param("i", $berita->id_berita);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $total_comments = $row['total_comments'];
  $stmt->close();

?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="<?= base_url('home/#hero'); ?>">Home</a></li>
        <li><a href="<?= base_url('home/blog'); ?>">Blog</a></li>
        <li><?= $berita->judul_berita; ?></li>
      </ol>
      <h2><?= $berita->judul_berita; ?></h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Blog Single Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-8 entries">

          <div class="card entry entry-single">

            <div class="entry-img">
              <img src="<?= base_url('assets/img/berita/') . $berita->gambar_berita; ?>" alt="" class="img-responsive center-block d-block mx-auto">
            </div>

            <h2 class="entry-title">
              <a href=""><?= $berita->judul_berita; ?></a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a><?= $berita->nama; ?></a></li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><?= date('d-M-Y H:i', strtotime($berita->date_cretated)); ?></a></li>
                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a><?= $total_comments; ?> Comments</a></li>
              </ul>
            </div>

            <div class="entry-content">
              <p><?= $berita->isi_berita; ?></p>
            </div>

            <div class="entry-footer">
              <i class="bi bi-folder"></i>
              <ul class="cats">
                <li><a href="#">Business</a></li>
              </ul>

              <i class="bi bi-tags"></i>
              <ul class="tags">
                <?= $berita->keywords; ?>
              </ul>
            </div>

          </div><!-- End blog entry -->

          <div class="blog-author d-flex align-items-center">
            <img src="<?= base_url('assets/img/profile/' . $berita->image); ?>" class="rounded-circle float-left" alt="">
            <div>
              <h4><?= $berita->nama; ?></h4>
              <div class="social-links">
                <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
              </div>
              <p>
                Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
              </p>
            </div>
          </div><!-- End blog author bio -->

          <div class="blog-comments">
        <h4 class="comments-count">Comments</h4>
        <?= $output; ?>

        <div class="reply-form">
            <h4>Leave a Reply</h4>
            <p>Your email address will not be published. Required fields are marked * </p>
            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['error_message']; ?>
                </div>
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>
            <form method="post">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <input type="hidden" name="post_id" value="<?= $berita->id_berita; ?>">
                <div class="row">
                    <div class="col form-group">
                    <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required maxlength="100" placeholder="Enter your name">
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                    <label for="komentar" class="form-label">Komentar</label>
                    <textarea class="form-control" id="komentar" name="komentar" rows="3" required maxlength="1000" placeholder="Enter your comment"></textarea>
                    </div>
                </div>
                <input type="hidden" name="parent_id" id="parent_id" value="0">
                <button type="submit" class="btn btn-primary">Post Comment</button>
            </form>
        </div>
    </div><!-- End blog comments -->

        </div><!-- End blog entries list -->

        <div class="col-lg-4">

          <div class="sidebar">

            <h3 class="sidebar-title">Search</h3>
            <div class="sidebar-item search-form">
              <form action="">
                <input type="text">
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div><!-- End sidebar search formn-->

            <h3 class="sidebar-title">Categories</h3>
            <div class="sidebar-item categories">
              <ul>
                <?php foreach ($kategori as $key => $values) : ?>
                  <li><a href="#"><?= $values->nama_kategori; ?> <span>(25)</span></a></li>
                <?php endforeach; ?>
              </ul>
            </div><!-- End sidebar categories-->

            <h3 class="sidebar-title">Recent Posts</h3>
            <?php foreach ($lastst_berita as $key => $value) :
              // CEK KONDISI BERITA
              if ($value->status_berita == "Publish") : ?>
                <div class="sidebar-item recent-posts">
                  <div class="post-item clearfix">
                    <img src="<?= base_url('assets/img/berita/') . $value->gambar_berita; ?>" alt="">
                    <h4><a href="<?= base_url('home/detail/' . $value->slug_berita); ?>"><?= $value->judul_berita; ?></a></h4>
                    <time datetime="01-01-2020"><?= date('d-m-Y H:i', strtotime($value->date_cretated)); ?></time>
                  </div>
                </div><!-- End sidebar recent posts-->
              <?php endif; ?>
            <?php endforeach; ?>
            <!-- End sidebar recent posts-->

            <h3 class="sidebar-title">Tags</h3>
            <div class="sidebar-item tags">
              <ul>
                <li><a href="#">App</a></li>
                <li><a href="#">IT</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Mac</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Office</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">Smart</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
              </ul>
            </div><!-- End sidebar tags-->

          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

    </div>
  </section><!-- End Blog Single Section -->

</main><!-- End #main -->

<script>
    // event listener untuk reply
    document.querySelectorAll(".reply-btn").forEach(link => {
        link.addEventListener("click", function(event) {
            event.preventDefault(); 
            document.getElementById("parent_id").value = this.getAttribute("data-id");
            document.getElementById("nama").focus();

            // Scroll ke form dengan offset
            const element = document.getElementById("nama");
            const offset = 250; // Ubah nilai ini sesuai kebutuhan Anda
            const elementPosition = element.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - offset;

            window.scrollTo({
                top: offsetPosition,
                behavior: "smooth"
            });
        });
    });
</script>