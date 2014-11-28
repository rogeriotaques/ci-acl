<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

class Acl {
	
	private $_rules = array();
	private $_ci = null;
	
	function __construct()
	{
		$this->_ci =& get_instance();
		$this->_ci->config->load('acl');
		$this->_rules = $this->_ci->config->item('acl');
		
	} // construct

	/**
	 * Set new rules into ACL.
	 * 
	 * @param String $path - Required. A full path to be validated.
	 * @param Array $config - Required. An array with the path ACL settings. I.e: array('public') or array('group_1' => TRUE, 'group_N' => FALSE).
	 * @return void
	 */
	public function set($path, $config)
	{
		// if config is provided in a wrong format.
		if (!is_array($config))
		{
			die('Oops! Given config is not well formed!');
		}
		
		// set
		$this->_rules[$path] = $config;
	} // set
	
	/**
	 * Verify if a given path is allowed or not.
	 * 
	 * @param String $path - Required.
	 * @param String $group - Required. Group names. I.e.: group1,group2,group3,...
	 * @return Boolean
	 */
	public function is_allowed($path, $group)
	{	
		// declares a sub-function which will be used to 
		// clean all white-spaces and transforme elements into lower case.
		if (!function_exists("_remove_white_spaces"))
		{
			function _remove_white_spaces($str)
			{
				return strtolower(trim($str));
			}
		}
		
		// default result is 'not allowed'
		$result = FALSE;
		
		// if given path doesn't exists then, deny.
		// otherwise, validates it.
		if (isset($this->_rules[$path]))
		{
			// retrieve identified groups
			$groups = array_keys($this->_rules[$path]);
			$groups_to_test = explode(',', $group);
			
			array_walk($groups_to_test, "_remove_white_spaces");
			
			foreach ($groups_to_test as $g)
			{
				$result = (in_array($g, $groups) && $this->_rules[$path][$g]) ? TRUE : FALSE;
				if ($result) break;
			}
			
		} // isset($this->_rules[$path])

		return $result;			
	} // is_allowed

	/**
	 * Verify exclusively if the given path is public to read.
	 * @param String $path - Required.
	 * @return Boolean 
	 */
	public function is_public($path) 
	{
		return (isset($this->_rules[$path]) && isset($this->_rules[$path][0]) && strtolower($this->_rules[$path][0]) == 'public' ) ? TRUE : FALSE;
	} // is_public
	
} // class

/* End of file Acl.php */
/* Location: ./application/libraries/Acl.php */