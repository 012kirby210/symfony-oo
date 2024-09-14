<?php



class Container
{
    private ?PDO $pdo = null;
    private ?ShipLoader $shipLoader = null;
    private ?BattleManager $battleManager = null;
    public function __construct(private array $configuration)
    {}

    public function getPDO(): PDO
    {
        if ($this->pdo === null) {
            $this->pdo = new PDO($this->configuration['db_dsn'], $this->configuration['db_user'], $this->configuration['db_password']);
        }
        return $this->pdo;
    }

    public function getShipLoader(): ShipLoader
    {
        if (!$this->shipLoader) {
            $this->shipLoader = new ShipLoader($this->getPDO());
        }
        return $this->shipLoader;
    }

    public function getBattleManager(): BattleManager
    {
        if (!$this->battleManager) {
            $this->battleManager = new BattleManager();
        }
        return $this->battleManager;
    }
}