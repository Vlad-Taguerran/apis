<?php


namespace App\Controller;


use App\Connection;
use Core\Controller\Controller;
use Core\Model\Container;
use http\Header;
////////////////////////////////////
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class IndexController extends Controller
{

    public function index()
    {
        $this->render("home","layout");


    }

    public function sing_up()
    {
        $this->render('sing-up','layout');
    }

    public function user_save()
    {
        $nome  =   filter_var( $_POST['nome'],FILTER_SANITIZE_EMAIL);
        $email  =   filter_var( $_POST['email'],FILTER_SANITIZE_EMAIL);
        $senha  =   filter_var( md5( $_POST['senha']),FILTER_SANITIZE_STRING);

        $user = Container::getModel("Users");
        $user->__set('nome', $nome);
        $user->__set('email',$email);
        $user->__set('senha',$senha);
        $user->save();

        header("location: /");
    }

    public function auth()
    {


        $email  =   filter_var( $_POST['email'],FILTER_SANITIZE_EMAIL);
        $senha  =   filter_var( md5( $_POST['senha']),FILTER_SANITIZE_STRING);
        $login = Container::getModel("Users");
        $login->__set('email',$email);
        $login->__set('senha',$senha);
        $login->auth();

        if ($login->__get('id') !== ''  && $login->__get('email') !== ''){

            $res['id'] = $login->__get('id');
            $res['nome'] = $login->__get('nome');

            Header('Content-Type: application/json');
            echo json_encode($res);
        }else{
            echo 'Usuario não encontrado';
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('location: /');
    }

    public function recuperar()
    {
        $this->render('recuperar','layout');
    }

    public function recuperar_salvar()
    {
         $token = strval(bin2hex(random_bytes(8)));
         $rec = Container::getModel('Users');
         $rec->__set('email',$_POST['email']);
         $rec->__set('token',$token);
         $rec->token();

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'user@example.com';                     //SMTP username
            $mail->Password   = 'secret';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('adriano@gmail.com', 'Adriano');
            $mail->addAddress($this->__get('email'));     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'Click aqui para recuperar a senha: https:adriano/recuperar_salvar/'.$token;

            $mail->send();
            header('location: /');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}