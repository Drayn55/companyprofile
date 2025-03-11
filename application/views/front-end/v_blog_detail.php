<?php
// Generate CSRF token jika belum ada
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
// Jika form dikirim (tanpa AJAX, langsung dengan PHP)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Cek CSRF token
  if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
      die("Invalid CSRF token");
  }

  // Ambil data dari form
  $nama = sanitize_input($_POST["nama"]);
  $komentar = sanitize_input($_POST["komentar"]);
  $parent_id = sanitize_input($_POST["parent_id"]);

  // Validasi input
  if (strlen($nama) > 100 || strlen($komentar) > 1000 || !is_numeric($parent_id)) {
      die("Invalid input");
  }

  // Set timezone Indonesia
  date_default_timezone_set('Asia/Jakarta');
  $tanggal_komen = date('Y-m-d H:i:s');

  // Insert ke database
  $query = "INSERT INTO tbl_komentar (nama, komentar, parent_id, tanggal_komen) VALUES (?, ?, ?, ?)";
  $stmt = $db->prepare($query);
  $stmt->bind_param("ssis", $nama, $komentar, $parent_id, $tanggal_komen);
  $stmt->execute();

  // Redirect untuk refresh halaman agar komentar langsung muncul
  header("Location: " . $_SERVER['REQUEST_URI']);
  exit();
}

// init output
$db = mysqli_connect('localhost', 'root', '', 'db_komentar');
$output = '';

// lakukan query select order by untuk mengurutkan komentar baru pada tbl_komentar
$query = "SELECT * FROM tbl_komentar WHERE parent_id = 0 ORDER BY id DESC";
$stmt = $db->prepare($query);
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
        <h5><a href="">' . $row["nama"] . '</a> <a href="#" class="reply reply-btn"><i class="bi bi-reply-fill"></i> Reply</a></h5>
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
                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a>12 Comments</a></li>
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
            <form method="post">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
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
