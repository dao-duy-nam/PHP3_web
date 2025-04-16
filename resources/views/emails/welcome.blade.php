<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chào mừng bạn đến với hệ thống!</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; margin-top: 30px; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                    <tr>
                        <td style="background-color: #4CAF50; padding: 20px; text-align: center; color: #ffffff;">
                            <h1 style="margin: 0;">🎉 Chào mừng, {{ $user->name }}!</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 30px;">
                            <p style="font-size: 16px; line-height: 1.5;">
                                Cảm ơn bạn đã đăng ký tài khoản tại <strong>{{ config('app.name') }}</strong>. Chúng tôi rất vui mừng được chào đón bạn đến với cộng đồng của chúng tôi!
                            </p>

                            <p style="font-size: 16px; line-height: 1.5;">
                                Dưới đây là thông tin tài khoản của bạn:
                            </p>

                            <ul style="font-size: 16px; line-height: 1.6; padding-left: 20px;">
                                <li><strong>Họ tên:</strong> {{ $user->name }}</li>
                                <li><strong>Email:</strong> {{ $user->email }}</li>
                                <li><strong>Vai trò:</strong> {{ $user->role ?? 'Người dùng' }}</li>
                            </ul>

                            <p style="font-size: 16px; line-height: 1.5;">
                                Hãy đăng nhập để bắt đầu khám phá và sử dụng các tính năng của hệ thống.
                            </p>

                            <div style="text-align: center; margin: 30px 0;">
                                <a href="{{ url('/login') }}" style="background-color: #4CAF50; color: white; padding: 12px 25px; border-radius: 5px; text-decoration: none; font-size: 16px;">
                                    👉 Đăng nhập ngay
                                </a>
                            </div>

                            <p style="font-size: 14px; color: #666;">
                                Nếu bạn có bất kỳ câu hỏi nào, đừng ngần ngại liên hệ với chúng tôi qua email: <a href="mailto:support@yourdomain.com">support@yourdomain.com</a>.
                            </p>

                            <p style="font-size: 14px; color: #999; text-align: center; margin-top: 40px;">
                                &copy; {{ date('Y') }} {{ config('app.name') }}. Mọi quyền được bảo lưu.
                            </p>
                        </td>
                    </tr>
                </table>

                <p style="font-size: 12px; color: #999; margin-top: 20px;">
                    Bạn nhận được email này vì đã đăng ký tài khoản trên {{ config('app.name') }}.
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
