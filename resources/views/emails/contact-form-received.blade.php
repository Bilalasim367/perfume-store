<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background: #1a1510; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
        <h1 style="color: #B8A878; margin: 0;">New Contact Form Submission</h1>
    </div>

    <h2 style="color: #0B0B0F;">Customer Details</h2>
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="padding: 8px 0; font-weight: bold; width: 120px;">Name:</td>
            <td style="padding: 8px 0;">{{ $data['first_name'] }} {{ $data['last_name'] }}</td>
        </tr>
        <tr>
            <td style="padding: 8px 0; font-weight: bold;">Email:</td>
            <td style="padding: 8px 0;">{{ $data['email'] }}</td>
        </tr>
        <tr>
            <td style="padding: 8px 0; font-weight: bold;">Phone:</td>
            <td style="padding: 8px 0;">{{ $data['phone'] ?? 'Not provided' }}</td>
        </tr>
        <tr>
            <td style="padding: 8px 0; font-weight: bold;">Subject:</td>
            <td style="padding: 8px 0;">{{ $data['subject'] ?? 'General Inquiry' }}</td>
        </tr>
    </table>

    <h2 style="color: #0B0B0F; margin-top: 20px;">Message</h2>
    <div style="background: #f9f9f9; padding: 15px; border-radius: 8px; border-left: 4px solid #B8A878;">
        {{ $data['message'] }}
    </div>

    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; color: #666; font-size: 12px;">
        <p>This email was sent from the SAFARI perfume store contact form.</p>
    </div>
</body>
</html>