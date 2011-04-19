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
    public function getParentRole($role) {
        $select= $this->select('r2.id as id');
        $select->from(array('r'=>'roles'))
               ->join(array('r2'=>'roles'),'r.id_parent=r2.id')
               ->where('r.id=?',$role);
        $record= $this->fetchRow($select);
        if (!empty($record['id'])) {
            return $record['id'];
        }
        return false;
    }
}