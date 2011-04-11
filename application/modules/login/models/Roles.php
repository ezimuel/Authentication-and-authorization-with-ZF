<?php
/**
 * Login_Model_Roles
 *  
 * @author Enrico Zimuel (enrico@zimuel.it)
 */
class Login_Model_Roles extends Zend_Db_Table_Abstract
{
    protected $_name = 'roles';
    protected $_primary = 'id';
    
    protected $_dependentTables = array('Users','Permissions');
    
    public function getRoles() {
    	return $this->fetchAll(null,'id');
    }
}