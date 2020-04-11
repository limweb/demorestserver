1. ลง composer
2. ลง php 5.6++

https://github.com/jacwright/RestServer

composer require jacwright/restserver
composer require symfony/var-dumper:v3.4.39
composer require illuminate/database:v5.3.23

https://github.com/illuminate/database

//auth
class JwtController extends BaseController
{

    public $member = null;

    public function authorize()
    {

        try {
            $token = $this->input->token;
            $jwt = new JwtService();
            $this->member = $jwt->verify($token);
            if($this->member){
                return true;
            } else {
                $this->server->setStatus(401);
                return false;
            }
        } catch (Exception $e) {
            $this->server->setStatus(401);
            return false;
        }
    }

}



//Exception
$this->server->setStatus($e->getCode());


openssl genrsa -out d:/private.key 2048
openssl rsa -in d:/private.key -out d:/public.key -pubout -outform PEM