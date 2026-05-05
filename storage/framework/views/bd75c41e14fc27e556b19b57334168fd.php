<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f7f6; padding: 30px; }
        .box { background: white; border-radius: 10px; padding: 30px; max-width: 500px; margin: auto; }
        h2 { color: #1565c0; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Hello, <?php echo e($receiverName); ?>!</h2>
        <p>This is a demo email sent from <strong>EnglishApp</strong>.</p>
        <p>Thank you for using our platform. Keep learning!</p>
        <hr>
        <small style="color:#999;">EnglishApp &mdash; Learn English Fast & Easy</small>
    </div>
</body>
</html>
<?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/mails/demo.blade.php ENDPATH**/ ?>