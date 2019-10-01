<?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        $cellPhone = "No phone";
        
        $name = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $cellPhone = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
        $msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
        
        $formError = array();
        
        if (is_numeric($name)) {
            
             $formError[] = "Name must not has numbers";
        }
        if (strlen($name) <= 3) {
            
            $formError[] = 'User name must be larger than <stronge>3</stronge>';
        }
        
        if (strlen($msg) < 10) {
            
            $formError[] = "Message can't be less than <stronge>10</stronge> charachters";
        }
        
        $headers = 'From: ' . $mail . '\r\n';
        $mailTo = 'faroukmothana@gmail.com';
        $subject = 'رسالة خاصة';
        $text = "You have received an e-mail from " . $name . " His number is" . $cellPhone . ".\n\n" . $msg;
        
        if (empty($formError)) {
            
            mail($mailTo, $subject, $text, $headers);
            
            $name = '';
            $mail = '';
            $cellPhone = '';
            $msg = '';
            
            $success = "<div class='alert alert-success'>لقد تم ارسال رسالتك بنجاح</div>";
            
        } else {
            
            $faild = "<div class='alert alert-danger'>لم يتم ارسال الرسالة بنجاح تأكد من تعبئة البيانات حسب البيات المقدم لك</div>";
        }
        
    
        
        
    }

?>


<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <title>راسـلــنـي</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styling.css">
    <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    
    <!-- start  form  -->
    
    <div class="container">
        <h1 class="text-center">راسـلــنـي</h1>
        <form class="con-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
             <?php if (isset($success)) { echo $success; } ?>
             <?php if (isset($faild)) { echo $faild; } ?>
            <div class="form-group">
                <input class="username form-control" type="text" name="username" placeholder="أدخل أسمك بالكامل" value="<?php if (isset($name)) { echo $name; } ?>" required />
                <i class="fa fa-user fa-fw"></i>
                <span class="as">*</span>
                <div class="alert alert-danger cus">
                    يجب أن يكون أسمك أكثر من  <stronge>3</stronge> حروف ولا يحتوى على ارقام</div>
            </div>
            <div class="form-group">
                <input class="email form-control" type="email" name="email" placeholder="أدخل بريدك الاكتروني" value="<?php if (isset($mail)) { echo $mail; } ?>" required />
                <i class="fa fa-envelope fa-fw"></i>
                <span class="as">*</span>
                <div class="alert alert-danger cus">
                    يجب ألا يكون حقل البريد الاكتروني <stronge>فارغاً</stronge>
                </div>
            </div>
            <div class="form-group">
                <input class="phone form-control" type="text" name="cellphone" placeholder="أدخل رقم هاتفك" value="<?php if (isset($cellPhone)) { echo $cellPhone; } ?>" required />
                <i class="fa fa-phone fa-fw"></i>
                <div class="alert alert-danger cus">يجب أن تتدخل رقم هاتفك ولا يحتوى على حروف</div>
            </div>
                <div class="form-group">
                <textarea class="message form-control" name="message" placeholder="رسالـتـــــــــــــــــك!" value="<?php if (isset($msg)) { echo $msg; } ?>" required ></textarea>
                <div class="alert alert-danger cus">
                        محتوى الرسالة يجب أن يكون أكثر من  <stronge>10</stronge> حروف
                </div>
                
            </div>
            <input class="btn btn-success" type="submit" value="أرسال"/>
            <i class="fa fa-send fa-fw send-icon"></i>
        </form>
    </div>
    
    <!-- end  form  -->
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/Scripting.js"></script>
</body>
</html>