<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace GbiliControllerPluginModule\Controller\Plugin;

/**
 *
 */
class ControllerEntityClassname extends \Zend\Mvc\Controller\Plugin\AbstractPlugin
{
    /**
     * Get the controller class name and create
     * an entity class name from it
     */
    public function __invoke()
    {
        return $this->getEntityClass(get_class($this->getController()));
    }

    public function getEntityClass($controllerClass)
    {
        $controllerClassNoTrailingController = substr($controllerClass, 0, -(strlen('Controller')));
        return preg_replace('#Controller#', 'Entity', $controllerClassNoTrailingController);
    }
}
