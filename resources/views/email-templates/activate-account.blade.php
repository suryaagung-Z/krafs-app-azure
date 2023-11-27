<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <title>Krafs</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <style type="text/css">
      body{
      width: 650px;
      font-family: work-Sans, sans-serif;
      background-color: #f6f7fb;
      display: block;
      }
      a{
      text-decoration: none;
      }
      span {
      font-size: 14px;
      }
      p {
        font-size: 13px;
        line-height: 1.7;
        letter-spacing: 0.7px;
        margin-top: 0;
      }
      .text-center{
      text-align: center
      }
      h6 {
      font-size: 16px;
      margin: 0 0 18px 0;
      }
    </style>
  </head>
  <body style="margin: 30px auto;">
    <table style="width: 100%">
      <tbody>
        <tr>
          <td>
            <table style="background-color: #f6f7fb; width: 100%">
              <tbody>
                <tr>
                  <td>
                    <table style="width: 650px; margin: 0 auto; margin-bottom: 30px">
                      <tbody>
                        <tr>
                          <td><img src="{{ asset('assets/images/logo/logo.png') }}" alt=""></td>
                          <td style="text-align: right; color:#999"><span>Welcome, {{ $mailData['fullName'] }}</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <table style="width: 650px; margin: 0 auto; background-color: #fff; border-radius: 8px">
              <tbody>
                <tr>
                  <td style="padding: 30px"> 
                    <h6 style="font-weight: 600">Activate Your New Account</h6>
                    <p>Welcome to Krafs! You're just one step away from accessing your account. To get started, please activate your account by clicking the button below.</p>
                    <p style="text-align: center">
                      <a href="{{ route('sign-up.activate', ['id'=>$mailData['id'], 'code'=>$mailData['verificationCode']]) }}" 
                        style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px"
                        target="_blank"
                        >Activate Account</a>
                    </p>
                    <p>If you didn't request this, you can safely ignore this email.</p>
                    <p>Thank you for choosing Krafs. If you encounter any issues, feel free to contact our support team.</p>
                    <p style="margin-bottom: 0">
                      Best regards,<br>Krafs Coffee</p>
                  </td>
                </tr>
              </tbody>              
            </table>
            <table style="width: 650px; margin: 0 auto; margin-top: 30px">
              <tbody>       
                <tr style="text-align: center">
                  <td> 
                    {{-- <p style="color: #999; margin-bottom: 0">333 Woodland Rd. Baldwinsville, NY 13027</p>
                    <p style="color: #999; margin-bottom: 0">Don't Like These Emails?<a href="#" style="color: #7366ff">Unsubscribe</a></p> --}}
                    <p style="color: #999; margin-bottom: 0">Powered By Krafs</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>