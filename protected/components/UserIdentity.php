<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $record = Usuario::model()->findByPk($this->username);
        if ($record === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (trim($record->O_PASSWORD) !== trim($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->_id = $record->K_CEDULA;
            $this->getUserType();
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId() {
        return "adsfa";
    }

    public function getUserType() {
        $usuarios = Usuario::model()->findByPk($this->username);
        $rol = $usuarios->I_ROL;
        $rolVerificado;
        switch ($rol) {
            case "A":
                $admin = Administrador::model()->findByPk($this->username);
                if (count($admin) == 1) {
                    $rolVerificado = "Administrador";
                } else {
                    $rolVerificado = "";
                }
                break;
            case "S":
                if (Socio::model()->findByPk($this->username) == 1) {
                    if (Regular::model()->findByPk($this->username) == 1)
                        $rolVerificado = "Regular";
                    else if (Cortecia::model()->findByPk($this->username) == 1)
                        $rolVerificado = "Cortecia";
                    else
                        $rolVerificado = "";
                }else
                    $rolVerificado = "";

                break;
            default:
                $rolVerificado = "";
                break;
        }
        $this->setState("rol", $rolVerificado);
    }

}