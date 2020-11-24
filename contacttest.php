<?php 
    include 'includes/header.php'; 
    
    
    $message_send = false;
    
    if(isset($_POST['contact-email']) && $_POST['contact-email'] != ''){
        
        if(filter_var($_POST['contact-email'], FILTER_VALIDATE_EMAIL) ){
            
            $userName = $_POST['name'];
            $userEmail = $_POST['contact-email'];
            $subject = $_POST['subject'];
            $message = $_POST['msg'];
        
            $to = "samvandenbosch2003@gmail.com";
        
            $body = "";
        
            $body .= "From: ". $userName. "\r\n";
            $body .= "Email: ". $userEmail. "\r\n";
            $body .= "Message: ". $message. "\r\n";
        
            mail($to, $subject, $body);

            $message_send = TRUE;
        }
        
     
}

   

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contact us</title>
        <link rel="stylesheet"href="style/contacttest.css">
    </head>
    <body>
        <main>
        <div class="container">
        <?php 
        
        if($message_send):
        
        ?>
<h3> bedankt voor uw mail! We mailen u zo snel mogenlijk terug.</h3>

        <?php else:?>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <h3>Contact</h3>
                    <form class="contact-form" action="contacttest.php" method="POST">
                    <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" autocomplete="off" id="name" placeholder="Naam">
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <input type="email" class="form-control" name="contact-email" autocomplete="off" id="contact-email" placeholder="E-mail">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" autocomplete="off" id="subject" placeholder="onderwerp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <textarea class="form-control textarea" rows="3" name="msg" id="msg" placeholder="bericht"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-warning" id="send">Verstuur bericht</button>
                            </div>
                        </div>
                    </form>
                </div>
                        <?php endif;?>
            </div>
        </div>
    </main>
        
    </body>

    <?php include 'includes/footer.php'?>
</html>