<?php
/**
 * Login_Model_Resources
 *  
 * @author Enrico Zimuel (enrico@zimuel.it)
 */
class Login_Model_Resources extends Zend_Db_Table_Abstract
{
    protected $_name = 'resources';
    protected $_primary = 'id';
    protected $_dependentTables = array('Permissions');

    /**
     * getResources
     *
     * @param integer $role
     * @return array
     */
    public function getResources($role) {
    	$select= $this->getAdapter()->select();
        $select->from(array('r'=>'resources'))
               ->join(array('p'=>'permissions'),'r.id=p.id_resource');
        if (!empty($role)) {       
        	$select->where('p.id_role=?',$role);
        }       
        $stmt= $this->getAdapter()->query($select);
    	return $stmt->fetchAll();
    }
    
}