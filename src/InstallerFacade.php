<?php
# @Author: Anwar Jahid
# @Date:   2018-08-12T10:14:09+06:00
# @Email:  a.jahid@il.com
# @Filename: InstallerFacade.php
# @Last modified by:   Anwar Jahid
# @Last modified time: 2018-08-12T10:37:00+06:00
# @Copyright: anwar jahid



namespace Anwar\Installer;
use Illuminate\Support\Facades\Facade;

class InstallerFacade extends Facade {
  /**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() {
		return 'Installer';
	}
}
