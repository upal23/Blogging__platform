<?php
class User {
    // Session Storage
    private static $users = [
        'admin' => [
            'password' => 'admin123', // Plain text for simplicity
            'role' => 'admin',
            'bio' => 'Platform Admin'
        ]
    ];

    public static function authenticate($username, $password) {
        return isset(self::$users[$username]) && self::$users[$username]['password'] === $password;
    }

    public static function getUser($username) {
        return ['username' => $username] + self::$users[$username];
    }
    public static function register($username, $email, $password) {
        if (isset(self::$users[$username])) {
            return false;
        }
        
        self::$users[$username] = [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => 'user',
            'bio' => 'New user'
        ];
        return true;
    }
    public static function updateProfile($username, $data) {
        if (isset(self::$users[$username])) {
            self::$users[$username]['bio'] = $data['bio'] ?? '';
            self::$users[$username]['social'] = [
                'twitter' => $data['twitter'] ?? '',
                'facebook' => $data['facebook'] ?? ''
            ];
            return true;
        }
        return false;
    }
}
?>