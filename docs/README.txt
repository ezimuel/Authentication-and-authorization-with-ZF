README
======

This is an example of usage of the Zend_Auth and Zend_Acl classes of the
Zend Framework project. The example is built using a standard MVC application
in Zend Framework with a modules architecture. The authentication system is
provided with a login page that use a username and a password. The Zend_Auth works
on a DB adapter or an LDAP server depending on the user's profile information.
You can find the example database (db.sql) in the folder /docs of the project.
The authorization system uses implemented in this example is able to manage 
modules, controllers and actions using a special syntax: "module/controller/action".
This example supports the usage of a * character to specify a generic module, 
controller and action. That means you can provide a permission for a spefici
user's group based on the following syntax: "example/*/*", all the controllers and
actions of the example module.
In the example database we have two users: admin (pass: admin) and enrico (pass:
enrico). Admin is able to access to all the resources of the application and
enrico is able to access to all the resource of the home module except for the
action menu of the index controller.  


Requirement
===========

This implementation has been tested using Zend Framework 1.11.5 and Apache 2
with a virtual host configuration to point to the public folder of the project.


License
=======

This code is released under the GNU General Public License.
For information about this license: http://www.gnu.org/licenses/gpl-2.0.html

(C) Copyright 2011 by Enrico Zimuel - http://www.zimuel.it/blog
