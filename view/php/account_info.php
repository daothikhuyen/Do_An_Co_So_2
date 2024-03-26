
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="shortcut icon" type="image/png" href="../../image/banner/logo.jpg"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=Fira+Sans:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&family=Uchen&family=Ysabeau:wght@200;300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../html/css/header.css">
<link rel="stylesheet" href="../../html/css/cart.css">
<link rel="stylesheet" href="../../html/css/order.css">
<link rel="stylesheet" href="../../html/css/footer.css">
<title>Title</title>
</head>

    <?php include 'header.php' ?>

    <!-- Home -->
    <section  id="order_session">
        <div class="container-lg container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="order_left_info col-md-3 text-black container">
                    <div class="Home_Info" style="background-color: #eee;">
                        <h6>
                            <span> 
                                <a href="home.html" class="text-decoration-none" style="color: #7d6445;"></span><i class="fa-solid fa-house"></i> Home</a>
                            </span>
                            <span>
                                <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#808089" fill-rule="evenodd" clip-rule="evenodd" d="M0.646447 0.646447C0.841709 0.451184 1.15829 0.451184 1.35355 0.646447L6.35355 5.64645C6.54882 5.84171 6.54882 6.15829 6.35355 6.35355L1.35355 11.3536C1.15829 11.5488 0.841709 11.5488 0.646447 11.3536C0.451184 11.1583 0.451184 10.8417 0.646447 10.6464L5.29289 6L0.646447 1.35355C0.451184 1.15829 0.451184 0.841709 0.646447 0.646447Z"></path>
                                </svg>
                            </span>
                            <span>
                                Account Information
                            </span>
                        </h6>
                    </div>
                    <div class="Home_Info mt-2 active" onclick="home_change()">
                        <a href="">
                            <span><i class="fa-solid fa-user"></i></span>
                            <span>Your account</span>
                        </a>
                    </div>
                    <div class="Home_Info mt-2 "  onclick="home_change()">
                        <a href="order.php">
                            <span>
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13 12h7v1.5h-7zm0-2.5h7V11h-7zm0 5h7V16h-7zM21 4H3c-1.1 0-2 .9-2 2v13c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 15h-9V6h9v13z"></path>
                                </svg>
                            </span>
                            <span>Order Management</span>
                        </a>
                    </div>
                    
                    <div class="Home_Info mt-2" onclick="home_change()">
                        <a href="#">
                            <span><i class="fa-solid fa-tags"></i></span>
                            <span>Discount code</span>
                        </a>
                    </div>
                </div>
                <div class="cart_01 col-md-9">
                    <div class="container">
                        <div class="row ">
                            <!-- <h5>Your Orders</h5>     -->
                        </div> 
                        
                        <section class="session_order account_info ">
                            <form action="../../controler/update_user.php?update_user" enctype="multipart/form-data" method="post">
                                <?php 
                                    $user = new User();
                                    $request_info_user = $user->select_query('id',$userData['id'],'select');
                                    while($row = mysqli_fetch_array($request_info_user)){ ?>
                                <div class="row">
                                    <div class="col-lg-7 border-end pe-5">

                                        <div class="row">
                                            <div class="col-lg-3 d-flex justify-content-start">
                                                <div class="">
                                                    <input type="hidden" name="id" id="" value = "<?= $row['id'] ?>">
                                                    <div class="upload upload_seting">
                                                        <img src="../../image/avatar/<?= $row['avatar'] ?>" id="image_setting" name="image_setting" alt="">

                                                        <div class="rightRound rightRound_setting" id="upload">
                                                        <input type="file" name="fileImg_comment" id="fileImg_comment" accept=".jpg, .jpeg, .png">
                                                            <i class="fa fa-solid fa-camera" ></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="account_info_setting  w-100">
                                                    <div class="d-flex justify-content-between w-100">
                                                        <label for="" class="fw-bold">Username</label>
                                                        <input type="text" name="username" id="" value="<?= $row['username'] ?>">
                                                    </div>
                                                    <div class="d-flex justify-content-between w-100">
                                                        <label class="fw-bold" for="">Adress</label>
                                                        <input type="text" name="address" id="" value="<?= !empty($row['adress'])?$row['adress']:'' ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gender_setting d-flex justify-content-between p-3" style="color: #7d6445;">
                                            <div>
                                                <label for="" class="fw-bold">Gender</label>
                                            </div>
                                            <div>
                                                <input type="radio" name="gender" id="gender" value="male" <?php echo ($row['gender'] == 'male') ? 'checked' : '' ?>>
                                                <label for="">Male</label>
                                                <input type="radio" name="gender" id="" value="female" <?= $row['gender'] == 'female'?'checked':'' ?>>
                                                <label for="">Female</label>
                                                <input type="radio" name="gender" id="" value="other" <?php echo ($row['gender'] == 'other') ? 'checked' : '' ?>>
                                                <label for="">Other</label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between w-100">
                                            <label for="" style="color: #7d6445; font-weight: bold;"> Nationality</label>
                                            <input type="text" class=" border p-1 rounded-3" name="Nationality" id="" value="<?= !empty($row['Nationality'])?$row['Nationality']:'' ?>" style="width: 240px;">
                                        </div>
                                        <div class="Setting_Save_Btn w-100 d-sm-none d-lg-block">
                                            <button type="submit" name="setting_save_btn">Save Changes</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <h6 class="fw-bold py-2" style="color: #b15050;">Phone Number And E-mail</h6>
                                        <div class="account_info_setting w-100">
                                            <div class="d-flex justify-content-between w-100">
                                                <label for="" class="fw-bold"><i class="fa-regular fa-envelope"></i> E-mail</label>
                                                <input type="text" name="email" id="" value="<?= !empty($row['email'])?$row['email']:'' ?>">
                                            </div>
                                            <div class="d-flex justify-content-between w-100">
                                                <label class="fw-bold" for=""><i class="fa-solid fa-phone"></i> Phone </label>
                                                <input type="text" name="phone" id="" value="<?= !empty($row['phone_number'])?$row['phone_number']:'(+84)' ?>">
                                            </div>
                                            <div class="Setting_Save_Btn w-100 d-lg-none d-sm-block">
                                            <button type="submit" name="setting_save_btn">Save Changes</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </form>
                        </section>
                        <!-- kết thúc session order -->
                    </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>
<!-- under_menu -->
