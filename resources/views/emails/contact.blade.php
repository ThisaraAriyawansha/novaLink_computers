<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Arial, sans-serif; background-color: #f4f4f9; color: #333;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #f4f4f9; padding: 20px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="background-color:rgb(9, 58, 122); padding: 20px; text-align: center;">
                            <h1 style="color: #ffffff; font-size: 24px; margin: 10px 0;">New Contact Form Submission</h1>
                        </td>
                    </tr>
                    <!-- Content -->
                    <tr>
                        <td style="padding: 30px;">
                            <h2 style="font-size: 20px; color: #1a73e8; margin-bottom: 20px;">Customer Details</h2>
                            <table role="presentation" width="100%" style="font-size: 16px; line-height: 1.5;">
                                <tr>
                                    <td style="padding: 10px 0; font-weight: bold; width: 30%;">Name:</td>
                                    <td style="padding: 10px 0;">{{ $data['name'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0; font-weight: bold;">Email:</td>
                                    <td style="padding: 10px 0;"><a href="mailto:{{ $data['email'] }}" style="color: #1a73e8; text-decoration: none;">{{ $data['email'] }}</a></td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0; font-weight: bold;">Telephone:</td>
                                    <td style="padding: 10px 0;">{{ $data['tel'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0; font-weight: bold;">Subject:</td>
                                    <td style="padding: 10px 0;">{{ $data['subject'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0; font-weight: bold; vertical-align: top;">Message:</td>
                                    <td style="padding: 10px 0;">{{ $data['message'] }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8f9fa; padding: 20px; text-align: center; font-size: 14px; color: #666;">
                            <p style="margin: 0;">NovaLink Computers</p>

                            <p style="margin: 10px 0;">&copy; {{ date('Y') }} All Rights Reserved | NovaLink Computers.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>