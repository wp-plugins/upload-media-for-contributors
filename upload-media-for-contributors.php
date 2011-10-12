<?php

/*
Plugin Name: Upload Media For Contributors
Plugin URI: http://www.geekpress.fr/
Description: This plugin adds the ability to upload media for the contributors of your site.
Version: 1.0
Author: GeekPress
Author URI: http://www.geekpress.fr/

	Copyright 2011 Jonathan Buttigieg
	
	This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    
    You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

class Upload_Media_Contributors {
		
	function Upload_Media_Contributors()
	{
		add_action('plugins_loaded', array(&$this, 'plugins_loaded'));
	}
	
	
	/**
	 * method plugins_loaded
	 *
	 * This function is called when plugin is desactivated.
	 *
	 * @since 1.0
	**/
	function plugins_loaded() 
	{
		if ( current_user_can('contributor') && !current_user_can('upload_files') )
			add_action('admin_init', array(&$this, 'allow_upload_contributors'));	
	}
	
	
	/**
	 * method allow_upload_contributors
	 *
	 * This method adds the ability to upload media in articles for the contributors.
	 *
	 * @since 1.0
	**/
	function allow_upload_contributors() 
	{
		$contributor = get_role('contributor');
    	$contributor->add_cap('upload_files');	
	}
	
}
// Start this plugin once all other plugins are fully loaded
global $Upload_Media_Contributors; $Upload_Media_Contributors = new Upload_Media_Contributors();