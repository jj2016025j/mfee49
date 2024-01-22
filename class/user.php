<?php
class User
{
    private $username;
    private $account;
    private $password;
    private $iconData;
    private $iconType;
    private $created_at;
    public function __construct($account, $password, $username, $iconData, $iconType)
    {
        $this->account = $account;
        $this->password = $password;
        $this->username = $username;
        $this->iconData = $iconData;
        $this->iconType = $iconType;
        $this->created_at = new \DateTime();
    }
    function showinfo()
    {
        return "{$this->username} {$this->account} {$this->password}";
    }

    function getname()
    {
        return $this->username;
    }

    function getaccount()
    {
        return $this->account;
    }

    function getpassword()
    {
        return $this->password;
    }

    function changeusername($username)
    {
        $this->username = $username;
    }

    function getCreateTime()
    {
        return $this->created_at;
    }

    function setIconData()
    {
        return $this->iconData;
    }
    function setIconType()
    {
        return $this->iconType;
    }
}
