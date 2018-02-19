<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Email Message</title>
</head>
<body>
  <div style="padding: 3px; background-color: #ffffff; margin-top: 5px;">
    <div style="width: 45%;">
      <div style="padding: 3px; background-color: #fefefe; margin-top: 5px;">
        From: {{ $email->from }}
      </div style="padding: 3px; background-color: #fefefe; margin-top: 5px;">
    </div>
    <div style="width: 45%;">
      <div style="padding: 3px; background-color: #fefefe; margin-top: 5px;">
        To: {{ $email->to }}
      </div style="padding: 3px; background-color: #fefefe; margin-top: 5px;">
    </div>
  </div>
  <div style="width: 100%;">
    <div style="padding: 3px; background-color: #fefefe; margin-top: 5px;">
      Subject: {{ $email->subject }}
    </div>
  </div>
  <div style="width: 100%;">
    <div>
      Message:
      <div style="padding: 3px; background-color: #fefefe; margin-top: 5px;">
        {{ $email->subject }}
      </div>

       Here is an image:

      <img src="{{ $message->embedData($qr, $qr) }}">
    </div>
  </div>
</body>
</html>