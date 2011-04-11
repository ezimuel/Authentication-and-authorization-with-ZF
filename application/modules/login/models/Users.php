<?php
/**
 * Login_Model_Users
 *  
 * @author Enrico Zimuel (enrico@zimuel.it)
 */
class Login_Model_Users extends Zend_Db_Table_Abstract
{
    protected $_name = 'users';
    protected $_primary = 'username';
    
	protected $_referenceMap    = array(
        'Role' => array(
            'columns'           => 'id_role',
            'refTableClass'     => 'Roles',
            'refColumns'        => 'id'
        ));
        
    /**
     * Check if a username is a Ldap user
     * 
     * @param string $username
     * @return boolean
     */
    public function isLdapUser($username) {
    	if (empty($username)) {
    		return false;
    	}
    	$select= $this->select()->where('username = ?', $username)
    							->where('ldap = true');
    	$result= $this->fetchRow($select);						
		return !empty($result);		
    }
    /**
     * Get the role Id of a user
     * 
     * @param string $username
     * @return integer|boolean
     */
    public function getRoleId($username) {
    	if (empty($username)) {
    		return false;
    	}
    	$result= $this->find($username);
    	if (!empty($result)) {
    		return $result[0]['id_role'];
    	}
    	return false;
    }
}