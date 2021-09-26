<?php
class DatabaseHandler
{
    // TODO: SELECT
    private string $serverAddress;
    private string $databaseName;
    private string $username;
    private string $password;

    public function __construct($serverAddress = NULL, $databaseName = NULL, $username = NULL,  $password = NULL,  $filePath = NULL)
    {
        if (!empty($filePath)) {
            $this->readJsonFileCredentialsToStrings($filePath, $serverAddress, $databaseName, $username, $password);
        }
        $this->updateCredentials($serverAddress, $databaseName, $username,  $password);
    }

    private function updateCredentials($serverAddress, $databaseName, $username,  $password)
    {
        $this->serverAddress = $serverAddress ?? $this->serverAddress;
        $this->databaseName = $databaseName ?? $this->databaseName;
        $this->username = $username ?? $this->username;
        $this->password = $password ?? $this->password;
    }

    private function ifAllCredentialsSet()
    {
        if (empty($this->serverAddress))
            return false;
        if (empty($this->databaseName))
            return false;
        if (empty($this->username))
            return false;
        if (empty($this->password))
            return false;
        return true;
    }

    #region databaseAuthenticationHelper
    private function readJsonFileCredentialsToStrings($filePath, $serverAddress, $databaseName, $username, $password)
    {
        $myConnectionCredentials = json_decode(file_get_contents($filePath));
        $serverAddress = $myConnectionCredentials->serverAddress;
        $databaseName = $myConnectionCredentials->databaseName;
        $username = $myConnectionCredentials->username;
        $password = $myConnectionCredentials->password;
        $this->updateCredentials($serverAddress, $databaseName, $username,  $password);
    }

    private function mySQLiConnect()
    {
        if (!$this->ifAllCredentialsSet())
            throw new Exception("Assign address, database, username and password before trying to connect", 1);
        mysqli_connect($this->serverAddress, $this->username, $this->password, $this->databaseName);
    }
    #endregion

    #region getters
    public function getServerAddress()
    {
        return $this->serverAddress;
    }

    public function getDatabaseName()
    {
        return $this->databaseName;
    }

    public function getUsername()
    {
        return $this->username;
    }
    #endregion

    #region setters
    public function setSreverAddress(string $serverAddress)
    {
        if (empty($serverAddress))
            throw new Exception("Error Processing Request", 1);
        $this->serverAddress = $serverAddress;
    }

    public function setDatabaseName(string $databaseName)
    {
        if (empty($databaseName))
            throw new Exception("Error Processing Request", 1);
        $this->databaseName = $databaseName;
    }

    public function setUsername(string $username)
    {
        if (empty($username))
            throw new Exception("Error Processing Request", 1);
        $this->username = $username;
    }

    public function setPassword(string $password)
    {
        if (empty($password))
            throw new Exception("Error Processing Request", 1);
        $this->password = $password;
    }
    #endregion

    #region 
    public function __toString()
    {
        return "ServerAddress: " . $this->serverAddress . PHP_EOL . "DatabaseName: " . $this->databaseName . PHP_EOL . "Username: " . $this->username . PHP_EOL . "Password: ****" . PHP_EOL;
    }
    #endregion
}
