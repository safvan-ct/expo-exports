<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Booking Notification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f5f7f9;
            font-family: Arial, Helvetica, sans-serif;
            color: #333333;
        }

        .email-wrapper {
            width: 100%;
            padding: 30px 0;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .email-header {
            background-color: #38c172;
            padding: 20px 30px;
            color: #ffffff;
        }

        .brand-name {
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .email-body {
            padding: 30px;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .intro-text {
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .details-box {
            border-left: 4px solid #d9534f;
            background-color: #fdf3f2;
            padding: 15px 20px;
            margin-bottom: 25px;
        }

        .details-row {
            font-size: 14px;
            margin-bottom: 8px;
        }

        .details-row strong {
            color: #d9534f;
        }

        .cta-box {
            text-align: center;
            margin-top: 30px;
        }

        .cta-button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #38c172;
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            border-radius: 4px;
        }

        .email-footer {
            background-color: #f0f2f4;
            padding: 15px 30px;
            font-size: 12px;
            color: #777777;
            text-align: center;
        }

        .email-footer span {
            color: #38c172;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="email-container">

            <!-- Header -->
            <div class="email-header">
                <div class="brand-name">
                    {{ config('app.name') }}
                </div>
            </div>

            <!-- Body -->
            <div class="email-body">
                <div class="title">
                    New Booking Received
                </div>

                <div class="intro-text">
                    You have received a new booking request through your website.
                    Please review the details below and take the necessary action.
                </div>

                <table width="100%" cellpadding="0" cellspacing="0" class="details-box"
                    style="border-left:4px solid #d9534f;background-color:#fdf3f2;padding:15px 20px;font-size:14px;">
                    <tr>
                        <td width="140" style="padding:6px 0; color:#d9534f; font-weight:bold;">ID</td>
                        <td style="padding:6px 0;">{{ $booking['id'] }}</td>
                    </tr>
                    <tr>
                        <td width="140" style="padding:6px 0; color:#d9534f; font-weight:bold;">Name</td>
                        <td style="padding:6px 0;">{{ $booking['name'] }}</td>
                    </tr>

                    <tr>
                        <td style="padding:6px 0; color:#d9534f; font-weight:bold;">Email</td>
                        <td style="padding:6px 0;">
                            <a href="mailto:{{ $booking['email'] }}" style="color:#365aea; text-decoration:none;">
                                {{ $booking['email'] }}
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:6px 0; color:#d9534f; font-weight:bold;">Phone</td>
                        <td style="padding:6px 0;">
                            <a href="tel:{{ $booking['phone'] }}" style="color:#365aea; text-decoration:none;">
                                {{ formatUaePhone($booking['phone']) }}
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:6px 0; color:#d9534f; font-weight:bold;">Service</td>
                        <td style="padding:6px 0;">{{ $booking['message'] }}</td>
                    </tr>

                    <tr>
                        <td style="padding:6px 0; color:#d9534f; font-weight:bold;">Booking Date</td>
                        <td style="padding:6px 0;">
                            {{ \Carbon\Carbon::parse($booking['created_at'])->format('d M Y') }}
                        </td>
                    </tr>
                </table>

                <div class="cta-box">
                    <a href="{{ route('admin.dashboard') }}" class="cta-button">
                        View Booking Details
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="email-footer">
                This is an automated notification from
                <span>{{ config('app.name') }}</span><br>
                Please do not reply directly to this email.
            </div>

        </div>
    </div>
</body>

</html>
