<?php
class DatabaseHandler
{
    // TODO: SELECT
    private string $serverAddress;
    private string $databaseName;
    private string $username;
    private string $password;
    // temporary public
    public mysqli $myDatabaseConnection;

    public function __construct($filePath = NULL, $serverAddress = NULL, $databaseName = NULL, $username = NULL,  $password = NULL)
    {
        if (!empty($filePath) and !is_null($filePath))
        {
            $this->ReadJsonFileCredentialsToStrings($filePath);
        }
        else
        {
            $this->UpdateCredentials($serverAddress, $databaseName, $username,  $password);
        }
    }

    #region privateMethods
    private function UpdateCredentials($serverAddress, $databaseName, $username,  $password)
    {
        $this->serverAddress = $serverAddress ?? $this->serverAddress;
        $this->databaseName = $databaseName ?? $this->databaseName;
        $this->username = $username ?? $this->username;
        $this->password = $password ?? $this->password;
        $this->myDatabaseConnection = new mysqli($this->serverAddress, $this->username, $this->password, $this->databaseName);
    }

    private function IfAllCredentialsSet()
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

    private function ReadJsonFileCredentialsToStrings($filePath)
    {
        $myConnectionCredentials = json_decode(file_get_contents($filePath));
        $this->serverAddress = $myConnectionCredentials->serverAddress;
        $this->databaseName = $myConnectionCredentials->databaseName;
        $this->username = $myConnectionCredentials->username;
        $this->password = $myConnectionCredentials->password;
        $this->UpdateCredentials($this->serverAddress, $this->databaseName, $this->username,  $this->password);
    }
    #endregion databaseAuthenticationHelper

    #region databaseMethods
    // test purpose only
    public function GetTestTableData()
    {
        return $this->myDatabaseConnection->query("SELECT * FROM Test;");
    }
    #endregion databaseMethods
    #endregion privateMethods

    #region publicMethods
    #region getters
    public function GetServerAddress()
    {
        return $this->serverAddress;
    }

    public function GetDatabaseName()
    {
        return $this->databaseName;
    }

    public function GetUsername()
    {
        return $this->username;
    }
    #endregion

    #region setters
    public function SetServerAddress(string $serverAddress)
    {
        if (empty($serverAddress))
            throw new Exception('Empty value (or one that consists only of \t, \n, \r, \0, \x0B characters) is not allowed as a parameter for function ' . __METHOD__, 1);
        $this->serverAddress = $serverAddress;
    }

    public function SetDatabaseName(string $databaseName)
    {
        if (empty($databaseName))
            throw new Exception('Empty value (or one that consists only of \t, \n, \r, \0, \x0B characters) is not allowed as a parameter for function ' . __METHOD__, 1);
        $this->databaseName = $databaseName;
    }

    public function SetUsername(string $username)
    {
        $username = trim($username);
        if (empty($username))
            throw new Exception('Empty value (or one that consists only of \t, \n, \r, \0, \x0B characters) is not allowed as a parameter for function ' . __METHOD__, 1);
        $this->username = $username;
    }

    public function SetPassword(string $password)
    {
        if (empty($password))
            throw new Exception("Empty value is not allowed as a parameter for function " . __METHOD__, 1);
        $this->password = $password;
    }
    #endregion

    #region 
    public function __toString()
    {
        return "ServerAddress: " . $this->serverAddress . "<br>" . "DatabaseName: " . $this->databaseName . "<br>" . "Username: " . $this->username . "<br>" . "Password: ****" . "<br>";
    }
    #endregion
    #endregion publicMethods
}
