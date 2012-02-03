<?php

/**
 * ModuleManagerInstall
 * Installer for the module_manager module
 *
 * @package		installer
 * @subpackage	module_manager
 *
 * @author	Frederik Heyninck <frederik@figure8.be>
 * @since		2.0
 */
class ModuleManagerInstaller extends ModuleInstaller
{
	/**
	 * Install the module
	 *
	 * @return	void
	 */
	public function install()
	{
		// add 'module_manager' as a module
		$this->addModule('module_manager');
		
		// import locale
		$this->importLocale(dirname(__FILE__) . '/data/locale.xml');

		// module rights
		$this->setModuleRights(1, 'module_manager');

		// action rights
		$this->setActionRights(1, 'module_manager', 'actions');
		$this->setActionRights(1, 'module_manager', 'add_action');
		$this->setActionRights(1, 'module_manager', 'delete');
		$this->setActionRights(1, 'module_manager', 'delete_action');
		$this->setActionRights(1, 'module_manager', 'edit');
		$this->setActionRights(1, 'module_manager', 'edit_action');
		$this->setActionRights(1, 'module_manager', 'modules');
		$this->setActionRights(1, 'module_manager', 'install');
		
		// set navigation
		$navigationModulesId = $this->setNavigation(null, 'Modules');
		$this->setNavigation($navigationModulesId, 'ModuleManager', 'module_manager/modules', array(
			'module_manager/add_action',
			'module_manager/edit_action',
			'module_manager/detail_module'
		));
	}


}

?>