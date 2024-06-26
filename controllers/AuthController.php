<?php
class AuthController extends Controller {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->model('User')->getUserByUsername($username);
            
            if ($user && ( $password == $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: /articles/index');
                exit();
            } else {
                $data['error'] = "Invalid credentials";
            }
        }

        $this->view('auth/login', $data ?? []);
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /auth/login');
        exit();
    }
}
?>
