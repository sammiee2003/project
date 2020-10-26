<?php 
    include 'includes/header.php'; 
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

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <h3>Contact</h3>
                    
                    <?php session_start(); ?>
                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-primary" role="alert">
                            <!-- Bedankt voor uw bericht! -->
                        </div>
                    <?php endif; ?>

                    <form role="form" class="contact-form" action="data.php" method="post">


                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-warning"><?php echo $_SESSION['error']; ?></div>
                        <?php endif; ?>
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
                
            </div>
        </div>
                        </main>
        
    </body>

    <?php include 'includes/footer.php'?>
</html>