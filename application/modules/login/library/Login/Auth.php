<?php
/**
 * Login Auth
 * 
 * @author Enrico Zimuel (enrico@zimuel.it)
 */
class Login_Auth {
	
	private function __construct() {
		// private - should not be used
	}
	
	public static function _getAdapter($adapter,$options) {
		if (empty($adapter) || empty($options) || !is_array($options)) {
            return false;
        }
        if (!in_array($adapter,array('ldap','db'))) {
        	return false;
        }
		if (!array_key_exists('username',$options) ||  !array_key_exists('password',$options)) {
			return false;
		} 
		$username= $options['username'];
		$password= $options['password'];
        switch ($adapter) {
        	case 'ldap' :
        		$auth= new Zend_Auth_Adapter_Ldap($options['ldap'],$username,$password);
        		break;
        	case 'db' :
				$password=sha1($options['salt'].$password);
        		$auth= new Zend_Auth_Adapter_DbTable($options['db'],
        									    	 'users',
        											 'username',
        											 'password');
        		$auth->setIdentity($username)->setCredential($password);
        		break;
        }
        return $auth;
	}
}