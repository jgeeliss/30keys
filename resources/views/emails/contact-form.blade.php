<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <!-- this is a simple HTML that will be emailed to the admin -->
    <div>
        <div>
            <h2>New Contact Form Submission</h2>
        </div>
        <div>
            <div>
                <strong>From:</strong> {{ $senderName }}
            </div>
            <div>
                <strong>Email:</strong> <a href="mailto:{{ $senderEmail }}">{{ $senderEmail }}</a>
            </div>
            <div>
                <strong>Message:</strong>
            </div>
            <div>
                {{ $messageContent }}
            </div>
        </div>
    </div>
</body>
</html>
