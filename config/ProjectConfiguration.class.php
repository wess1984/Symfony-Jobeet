<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
  }

  public function save(Doctrine_Connection $conn = null)
  {
      if ($this->isNew() && !$this->getExpiresAt())
      {
          $now = $this->getCreatedAt() ? $this->getDateTimeObject('created_at')->format('U') : time();
          $this->setExpiresAt(date('Y-m-d H:i:s', $now + 86400 * sfConfig::get('app_active_days')));
      }

      return parent::save($conn);
  }
}
