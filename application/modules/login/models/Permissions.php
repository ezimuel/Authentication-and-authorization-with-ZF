<?php

/**
 * Login_Model_Permissions
 *  
 * @author Enrico Zimuel (enrico@zimuel.it)
 */
class Login_Model_Permissions extends Zend_Db_Table_Abstract
{

    protected $_name = 'permissions';
    protected $_primary = 'id';
    protected $_referenceMap = array(
        'Role' => array(
            'columns' => 'id_role',
            'refTableClass' => 'Roles',
            'refColumns' => 'id'
        ),
        'Resource' => array(
            'columns' => 'id_resource',
            'refTableClass' => 'Resources',
            'refColumns' => 'id'
            ));

    /**
     * getPermissions
     * 
     * @param integer $role
     * @return array 
     */
    public function getPermissions($role)
    {
        $select = $this->getAdapter()->select();
        $select->from(array('p' => 'permissions'))
                ->join(array('r' => 'resources'), 'r.id=p.id_resource');
        if (!empty($role)) {
            $select->where('p.id_role=?', $role);
        }
        $stmt = $this->getAdapter()->query($select);
        return $stmt->fetchAll();
    }

}