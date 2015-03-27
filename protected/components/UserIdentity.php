<?php


class UserIdentity extends CUserIdentity
{
        private $_id;
	public function authenticate()
	{
                $username=strtolower($this->username);
                $user= SeSesionUsuario::model()->find('LOWER(cuenta)=?',array($username));
		if($user===null)
                    $this->errorCode=self::ERROR_USERNAME_INVALID;
                    else if(!$user->validatePassword($this->password))
                    $this->errorCode=self::ERROR_PASSWORD_INVALID;
                else
                {
                    $this->_id=$user->pk_id_usuario;
                    $personal = PerPersonal::model()->findByPk($user->fk_personal);

                    $this->setState('usuario',$user->pk_id_usuario);
                    $this->setState('tipo',$user->fk_tipo_cuenta);
                    $this->setState('cuenta',$user->cuenta);            
                    $this->setState('nombre',$personal->nombre_completo);
                    $this->setState('apellido',$personal->apellido_paterno);
                    $this->setState('foto',$personal->foto);                    

                    $this->errorCode=self::ERROR_NONE;
                }
        return $this->errorCode==self::ERROR_NONE;
	}
        
        public function getId()
    {
        return $this->_id;
    }
}