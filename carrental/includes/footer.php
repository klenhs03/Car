<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Đã đăng ký nhận tin.');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Đăng ký nhận tin thành công.');</script>";
}
else 
{
echo "<script>alert('Có lỗi xảy ra. Vui lòng thử lại.');</script>";
}
}
}
?>

<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">
      
        <div class="col-md-6">
          <h6>Về Chúng Tôi</h6>
          <ul>
            <li><a href="page.php?type=aboutus">Về Chúng Tôi</a></li>
            <li><a href="page.php?type=faqs">Câu Hỏi Thường Gặp</a></li>
            <li><a href="page.php?type=privacy">Chính Sách Bảo Mật</a></li>
            <li><a href="page.php?type=terms">Điều Khoản Sử Dụng</a></li>
            <li><a href="admin/">Đăng Nhập Quản Trị</a></li>
          </ul>
        </div>
  
        <div class="col-md-3 col-sm-6">
          <h6>Đăng Ký Nhận Bản Tin</h6>
          <div class="newsletter-form">
            <form method="post">
              <div class="form-group">
                <input type="email" name="subscriberemail" class="form-control newsletter-input" required placeholder="Nhập Địa Chỉ Email" />
              </div>
              <button type="submit" name="emailsubscibe" class="btn btn-block">Đăng Ký <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </form>
            <p class="subscribed-text">*Chúng tôi gửi những ưu đãi hấp dẫn và tin tức ô tô mới nhất đến người dùng đã đăng ký mỗi tuần.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-push-6 text-right">
          <div class="footer_widget">
            <p>Kết Nối Với Chúng Tôi:</p>
            <ul>
              <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-md-pull-6">
          <p class="copy-right">Cổng Thông Tin Cho Thuê Xe.</p>
        </div>
      </div>
    </div>
  </div>
</footer>
