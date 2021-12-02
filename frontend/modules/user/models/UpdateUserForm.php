<?php
namespace frontend\modules\user\models;


use Yii;
use yii\base\Model;
use frontend\models\User;
use common\models\UserData;
/**
 * Description of UpdateUserForm
 *
 * @author Iliya
 */
class UpdateUserForm  extends Model{
 
   
    const SCENARIO_REGISTER_3 = 'lk_user';
    const SCENARIO_REGISTER_4 = 'lk_user_password';
    
    public $username;
    public $email;
    public $password;
    public $user_fio;
    public $phone;
    public $repeatpassword;
    public $organization;
    public $url_site;
    public $city;
    public $type_opt;
    public $type_user;
    public $buyer;

    public $user_id;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'string', 'min' => 2, 'max' => 255],

//            ['email', 'trim'],
//            ['email', 'required'],
//            ['email', 'email'],
//            ['email', 'string', 'max' => 255],
//            ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'Такой E-mail уже используется'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['repeatpassword', 'compare', 'compareAttribute'=>'password', 'message'=>"Пароли не совпадают"],
            
            ['user_fio', 'required'],
            ['user_fio', 'string', 'max' => 400],
            
            ['phone', 'required'],
            ['phone', 'string', 'max' => 20],    
            
            ['organization', 'string', 'max' => 200],
            
            ['url_site', 'required'],
            ['url_site', 'url','defaultScheme' => 'http'],
            
            ['city', 'string', 'max' => 50],
            
            ['type_opt', 'integer'],
            
            [['type_user'], 'integer'],
            ['buyer', 'string'],
            
        ];
    }
    
    public function scenarios()
    {
        return [
//            self::SCENARIO_REGISTER_1 => ['username', 'password', 'user_fio', 'phone','repeatpassword'],
      
            self::SCENARIO_REGISTER_3 => ['user_fio', 'phone','email'],
            self::SCENARIO_REGISTER_4 => ['password', 'repeatpassword'],
        ];
    }
    
    public function attributeLabels() {
//        parent::attributes();
        return [
            'user_fio' => 'Ф.И.О',
            'phone' => 'Телефон',
            'email' => 'E-mail (Ваш логин)',
            'password' => 'Пароль',
            'organization' => 'Организация', 
            'url_site' => 'Ссылка на сайт',
        ];
    }
    


    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup($model)
    {
        if (!$this->validate()) {
            
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->username;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->status = 5;
        
      
        
        
        if($user->save()){
            $data = new UserData();
            $data->user_fio = $model['user_fio'];
            $data->user_id = $user->id;
            $data->phone = $model['phone'];
            $data->url_site = $model['url_site'] ;
            $data->type_user = $model['buyer'] == 'buyer-1' ? 1 : 2;
            $data->organization = $model['organization'];
            $data->city = $model['city'];
            $data->type_opt = $model['type_opt'];
            $data->save(false);
            return $user;
        }else{
            return null;
        }
        
        return $user->save() ? $user : null;
    }
    public function saveLkOpt($model)
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = User::find()->where(['id' => Yii::$app->user->identity->id])->limit(1)->one();
        $user->username = $this->username;
        $user->email = $this->username;
        
        if($user->save()){
            $data = UserData::find()->where(['user_id' => $user->id])->limit(1)->one();
            $data->user_fio = $model['user_fio'];
            $data->phone = $model['phone'];
            $data->url_site = $model['url_site'] ;
            $data->organization = $model['organization'];
            $data->city = $model['city'];
            $data->save(false);
            return true;
        }else{
            return false;
        }
    }
    
    public function saveLk($model){
        if (!$this->validate()) {
            print_r($this->errors);
            return false;
        }
        
        $user = User::find()->where(['id' => Yii::$app->user->identity->id])->limit(1)->one();
        $user->email = $this->email;

        //var_dump( $this->email);
        // die;
        
        if($user->save()){
            $data = UserData::find()->where(['user_id' => $user->id])->limit(1)->one();
            $data->user_fio = $model['user_fio'];
            $data->phone = $model['phone'];
            $data->email = $model['email'];
            $data->save(false);
            return true;
        }else{
            return null;
        }
        
        return $user->save() ? true : false;
    }
    public function saveLkP(){
        if (!$this->validate()) {
            return false;
        }
        
        $user = User::find()->where(['id' => Yii::$app->user->identity->id])->limit(1)->one();
        $user->setPassword($this->password);
        
        if($user->save()){
            return true;
        }else{
            return null;
        }
    }
}
