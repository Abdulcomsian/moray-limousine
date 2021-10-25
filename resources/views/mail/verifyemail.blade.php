 <?php

    use Illuminate\Support\HtmlString; ?>
 <!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Debt Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        p{
            padding-left:50px;
        }
        .button {
          background-color: #bf9c60; /* Green */
          border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>

<body style=" margin:0px;
            font-family: 'Poppins', sans-serif;">
<section id="header" style="width: 50%;
            background: #bf9c60;
            text-align: center;
            margin:0 auto;

            ">
    <div class="header-content" style="text-align: center;">
      <img src="https://moray-limousines.de/images/moray-logo.png"/>
    </div>
</section>
<section id="payment-remainder">
    <div class="payment-remainder-content" style="
            width: 100%;
            background: #fff;
            padding:0px;
            border-radius: 56px;
            text-align: center;
            ">
        <h3 style="text-align:center;
            color: #bf9c60;">Hello!Thank you for signing up with us!.
        </h3>
        <center>
            <p>You're almost done! Please click here to complete your registration:</p>
            <p>
            <a class="button" style="color:white" href="https://moray-limousines.de/register/verify?email={{$email}}&expiration={{$expiredate}}&token={{$token}}">Complete Registration</a>
        </p>
        <div align="center"><table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:50.0%; background:#1f1f1f">
            <tbody>
                <tr>
                    <td style="padding:0cm 0cm 0cm 0cm"><p class="x_MsoNormal" align="center" style="text-align:center">
                        <span style="color:white; text-transform:uppercase">
                         <a href="https://www.facebook.com/moraylimousines" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="6">
                            <span style="color:white; text-decoration:none">
                                <span style="color:blue">
                                    <img data-imagetype="External" src="{{asset('images/facebook.png')}}" border="0" width="28" height="28" id="x_m_-728614054202185312_x0000_i1029" alt="Blacklane Facebook" style="width:.2916in; height:.2916in">
                                </span>
                            </span>
                         </a>
                        <a href="https://www.instagram.com/accounts/login/" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="7">
                            <span style="color:white; text-decoration:none">
                                <span style="color:blue">
                                    <img data-imagetype="External" src="{{asset('images/instagram.png')}}" border="0" width="28" height="28" id="x_m_-728614054202185312_x0000_i1028" alt="Blacklane Instagram" style="width:.2916in; height:.2916in">
                                </span>
                            </span>
                        </a>
                    </span><span style="text-transform:uppercase"><u></u><u></u></span></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
        <p class="x_MsoNormal" align="center" style="text-align:center"><span style="display:none"><u></u>&nbsp;<u></u></span></p>
        <div align="center">
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:50.0%; background:#1f1f1f">
                <tbody>
                    <tr>
                        <td id="x_m_-728614054202185312footerLinks" style="padding:11.25pt 15.0pt 12.0pt 15.0pt">
                            <h2 align="center" style="margin-bottom:9.75pt; text-align:center">
                                <span style="font-size:13.5pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:white">
                                    Moray Limousine<u></u><u></u>
                                </span>
                            </h2>
                            <p class="x_MsoNormal" align="center" style="text-align:center"><span style="color:white">
                                <a href="https://moray-limousines.de/service/details/3" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="10">
                                    <span style="font-size:9.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:white; text-decoration:none">Limousine service</span>
                                </a> | 
                                <a href="https://moray-limousines.de/service/details/4" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="11">
                                    <span style="font-size:9.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:white; text-decoration:none">Business Solutions
                                    </span>
                                </a> | 
                                <a href="https://moray-limousines.de/Faq" data-auth="NotApplicable" data-linkindex="12">
                                    <span style="font-size:9.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:white; text-decoration:none">FAQ / Hilfe
                                    </span>
                                </a> | 
                                <a href="https://moray-limousines.de/contact-us" data-linkindex="13"><span style="font-size:9.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:white; text-decoration:none">Contact Us
                                </span>
                                </a> | 
                                <a href="https://moray-limousines.de/about-us" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="14">
                                    <span style="font-size:9.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:white; text-decoration:none">About Us
                                    </span>
                                </a> <u></u><u></u></span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <p class="x_MsoNormal" align="center" style="text-align:center"><span style="display:none"><u></u>&nbsp;<u></u></span></p>
        <div align="center">
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:50.0%; background:#1f1f1f">
                <tbody>
                    <tr>
                        <td valign="top" id="x_m_-728614054202185312hotlines" style="padding:0cm 0cm 15.0pt 0cm">
                            <p align="center" style="text-align:center; line-height:18.0pt">
                                <b>
                                    <span style="font-size:9.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:white; letter-spacing:.7pt">Contact Us:<br>Mainzer Landstrasse 49<br>Moray Limousines<br>60329 Frankfurt am Main<br>+49 (0) 15906406598<u></u><u></u></span>
                                </b>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </center>
        <p>Have a great day,</p>
        <p>Thanks For Choosing Moray Limousine</p>
        <p>Regards,</p>

        <p>Moray Limousines</p>
    </div>
</section>
</body>
</html> -->
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <title>Document</title>
     <style>
         body {
             background-color: rgb(221, 221, 221);
             font-family: 'Roboto', sans-serif !important;
         }

         .main-container {

             width: 50%;
             margin: 0px 25%;
             background-color: white;
         }

         .black-lane img {
             width: 110px;
             height: auto;
             margin-top: 10px;
         }

         .black-lane {
             justify-content: center;
             align-items: center;
         }

         .driver img {
             height: 30%;
             width: 100%;
             /* padding-top: 5px; */

         }

         .main-text h1 {
             font-size: xx-large;

             margin: 15px 0;
             width: auto;

         }

         .main-text {
             margin: 0px 50px;

         }

         .link {
             color: #bf9c60;
         }


         .font {

             font-family: 'Roboto', sans-serif;
         }

         .footer-strip-1 {

             height: 30px;
             background-color: rgb(194, 194, 194);

         }

         .footer-strip-1 .img-div {

             height: 27px;
             width: 15%;
             margin: 0px 41%;
         }

         .footer-strip-1 img {
             height: 30px;
             width: 30px;
             margin: 0px 10px;
         }


         .footer-strip-2 {
             border: 3px solid orangered;
             height: 80px;
             background-color: rgb(0, 0, 0);
             margin-top: 10px;
         }

         .button {
             background-color: #bf9c60;
             /* Green */
             border: none;
             color: white;
             padding: 15px 32px;
             text-align: center;
             text-decoration: none;
             display: inline-block;
             font-size: 16px;
             margin: 4px 2px;
             cursor: pointer;
         }

         a {
             text-decoration: none;
         }
     </style>
 </head>

 <body>
     <div class="main-container">

         <div class="black-lane" style="background:#bf9c60 !important;">
             <center>
                 <img src="https://moray-limousines.de/images/moray-logo.png" alt="">
             </center>
         </div>

         <div class="driver">
             <img src="{{asset('images/drive.png')}}" alt="">
         </div>

         <div class="main-text">
             <h1 class="font">Thank you for your interest in Black Lane</h1>
             <p class="font">

                 Dear ,

                 We've reviewed your application and unfortunately cannot partner with you at this time because one of the following requirements was not met:
                 <br>
                 <br>
                 - All required documents must be complete and valid to prove full compliance with local regulations.
                 <br>
                 <br>
                 - Working knowledge of English is required to communicate both with guests and with us.
                 <br>
                 <br>
                 - At least one vehicle must be one of the models listed in our service class requirements for your city.
                 <br>
                 <br>
                 For an overview of what's required, take a look at our guide on <a class="link" href="https://www.google.com"> how to become a Blacklane service provider.</a> To ensure we provide all our guests with a safe, high-quality experience, all partners must meet these standards.
                 <br>
                 <br>
                 We encourage you to apply again in the future, and please feel free to contact us if you have any questions.
                 <br>
                 <br>
                 <br>
                 Best regards,
                 <br>
                 Partner Operations
             </p>
             <p style="text-align: center;">
                 <a class="button" style="color:white" href="https://moray-limousines.de/register/verify?email={{$email}}&expiration={{$expiredate}}&token={{$token}}">Complete Registration</a>
             </p>
         </div>
         <div align="center">
             <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%; background:#1f1f1f">
                 <tbody>
                     <tr>
                         <td id="x_m_-728614054202185312footerLinks" style="padding:11.25pt 15.0pt 0pt 15.0pt">
                             <h2 align="center" style="margin-bottom:9.75pt; text-align:center">
                                 <span style="font-size:13.5pt;   color:white">
                                     Moray Limousine<u></u><u></u>
                                 </span>
                             </h2>
                             <p class="x_MsoNormal" align="center" style="text-align:center"><span style="color:white">
                                     <a href="https://moray-limousines.de/service/details/3" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="10">
                                         <span style="font-size:9.0pt;   color:white; text-decoration:none">Limousine service</span>
                                     </a> |
                                     <a href="https://moray-limousines.de/service/details/4" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="11">
                                         <span style="font-size:9.0pt;   color:white; text-decoration:none">Business Solutions
                                         </span>
                                     </a> |
                                     <a href="https://moray-limousines.de/Faq" data-auth="NotApplicable" data-linkindex="12">
                                         <span style="font-size:9.0pt;   color:white; text-decoration:none">FAQ / Hilfe
                                         </span>
                                     </a> |
                                     <a href="https://moray-limousines.de/contact-us" data-linkindex="13"><span style="font-size:9.0pt;   color:white; text-decoration:none; ">Contact Us
                                         </span>
                                     </a> |
                                     <a href="https://moray-limousines.de/about-us" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="14">
                                         <span style="font-size:9.0pt;   color:white; text-decoration:none">About Us
                                         </span>
                                     </a> <u></u><u></u></span></p>
                         </td>
                     </tr>
                 </tbody>
             </table>
         </div>
         <div align="center">
             <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%; background:#1f1f1f">
                 <tbody>
                     <tr>
                         <td valign="top" id="x_m_-728614054202185312hotlines" style="padding:0cm 0cm 0pt 0cm">
                             <p align="center" style="text-align:center; line-height:18.0pt; margin-top: 10px;">

                                 <span style="font-size:9.0pt;   color:white; letter-spacing:.7pt; ">Contact Us:<br>Mainzer Landstrasse 49<br>Moray Limousines<br>60329 Frankfurt am Main<br>+49 (0) 15906406598<u></u><u></u></span>

                             </p>
                         </td>
                     </tr>
                 </tbody>
             </table>
         </div>
         <div align="center">
             <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%; background:#1f1f1f">
                 <tbody>
                     <tr>
                         <td style="padding:0cm 0cm 0cm 0cm">
                             <p class="x_MsoNormal" align="center" style="text-align:center">
                                 <span style="color:white; text-transform:uppercase">
                                     <a href="https://www.facebook.com/moraylimousines" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="6">
                                         <span style="color:white; text-decoration:none">
                                             <span style="color:blue">
                                                 <img data-imagetype="External" src="{{asset('images/facebook.png')}}" border="0" width="28" height="28" id="x_m_-728614054202185312_x0000_i1029" alt="Blacklane Facebook" style="width:.2916in; height:.2916in">
                                             </span>
                                         </span>
                                     </a>
                                     <a href="https://www.instagram.com/accounts/login/" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="7">
                                         <span style="color:white; text-decoration:none">
                                             <span style="color:blue">
                                                 <img data-imagetype="External" src="{{asset('images/instagram.png')}}" border="0" width="28" height="28" id="x_m_-728614054202185312_x0000_i1028" alt="Blacklane Instagram" style="width:.2916in; height:.2916in">
                                             </span>
                                         </span>
                                     </a>
                                 </span><span style="text-transform:uppercase"><u></u><u></u></span>
                             </p>
                         </td>
                     </tr>

                 </tbody>
             </table>
         </div>
     </div>
     </div>
     </div>
 </body>

 </html>