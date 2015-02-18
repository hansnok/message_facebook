<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * facebook configuration page
 *
 * @package    message_facebook
 * @copyright  2011 Lancaster University Network Services Limited
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
	$settings->add(new admin_setting_configtext('fbkAppNAME', 'App name', 'Nombre de la app', '', PARAM_RAW));
    $settings->add(new admin_setting_configtext('fbkAppID', 'App id', 'AppID que entrega facebook al crear una app', '', PARAM_RAW));
    $settings->add(new admin_setting_configtext('fbkScrID', 'App secret ID', 'Secret ID que entrega facebook al crear una app', '', PARAM_RAW));
    $settings->add(new admin_setting_configtext('fbkTkn', 'Token', 'Token para poder enviar notificaciones', '', PARAM_RAW));
    $settings->add(new admin_setting_configtext('fbkemail', 'E-mail', 'Correo electronico para ayuda de usuario', '', PARAM_RAW));
    $settings->add(new admin_setting_configtext('fbktutorialsN', 'Tutorials', 'Nombre de tutoriales de moodle, si no tienes página con tutoriales dejalo en blanco', '', PARAM_RAW));
    $settings->add(new admin_setting_configtext('fbktutorialsL', 'Tutorials', 'Link de tutoriales de moodle, si no tienes página con tutoriales dejalo en blanco', '', PARAM_RAW));
}