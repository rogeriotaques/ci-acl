<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CI-ACL
 * Provides an Access Control List for Codeigniter  
 *
 * Licensed under MIT license:
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this 
 * software and associated documentation files (the "Software"), to deal in the Software 
 * without restriction, including without limitation the rights to use, copy, modify, merge, 
 * publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons 
 * to whom the Software is furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all copies or 
 * substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING 
 * BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND 
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, 
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, 
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @requires PHP5+
 * @author Rogério Taques (rogerio.taques@gmail.com)
 * @see https://github.com/rogeriotaques/ci-acl
 * @version 1.0
 * 
 */

/* ----------------------------------------------------------
 *
 * This file defines which path is public or not.
 *
 * The default structure must be:
 *
 * $acl['path/to/validate'] = array(
 *	'group_name_1' => 'boolean_value_to_allow_or_deny',
 *	'group_name_2' => 'boolean_value_to_allow_or_deny',
 *	...
 * );
 *
 * Use 'public' for public paths. I.e.:
 *
 * $acl['path/to/validate'] = array(
 *  'public'
 * );
 *
 * ---------------------------------------------------------- */


/* -----------------------------
 * YOU CAN CHANGE FROM HERE.
 * ----------------------------- */
$acl = array(

	/* WELCOME */

	'welcome/index' => array(
		'public'
	),

);

/* -----------------------------
 * YOU CAN CHANGE UP TO HERE.
 * ----------------------------- */

/* -----------------------------
 * DO NOT CHANGE THE CODE BELOW
 * ----------------------------- */
$config['acl'] = $acl;

/* End of file acl.php */
/* Location: ./application/config/acl.php */