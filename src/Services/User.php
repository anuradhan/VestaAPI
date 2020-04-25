<?php

namespace VestaAPI\Services;

trait User
{
    /**
     * Registration User.
     *
     * @param $username
     * @param $password
     * @param $email
     * @param $package
     * @param $fistName
     * @param $lastName
     *
     * @return mixed
     */
    public function regUser($username, $password, $email, $package, $fistName, $lastName)
    {
        return $this->send('v-add-user', $username, $password, $email, $package, $fistName, $lastName);
    }

    /**
     * @param $password
     *
     * @return mixed
     */
    public function changeUserPassword($password)
    {
        return $this->send('v-change-user-password', $this->userName, $password);
    }

    /**
     * @param $email
     *
     * @return mixed
     */
    public function changeUserEmail($email)
    {
        return $this->send('v-change-user-contact', $this->userName, $email);
    }

    /**
     * List User Account.
     *
     * @return mixed
     */
    public function listUserAccount()
    {
        $this->returnCode = 'no';
        $answer = $this->send('v-list-user', $this->userName, 'json');
        $data = json_decode($answer, true);

        return $data;
    }

    /**
     * @return mixed
     */
    public function listUserLog()
    {
        $this->returnCode = 'no';
        $answer = $this->send('v-list-user-log', $this->userName, 'json');
        $data = json_decode($answer, true);

        return $data;
    }

    /**
     * List User Backups.
     *
     * @return mixed
     */
    public function listUserBackups()
    {
        $this->returnCode = 'no';
        $answer = $this->send('v-list-user-backups', $this->userName, 'json');
        $data = json_decode($answer, true);

        return $data;
    }

    /**
     * Delete backup user.
     *
     * @param $backup
     *
     * @return mixed
     */
    public function deleteUserBackup($backup)
    {
        return $this->send('v-delete-user-backup', $this->userName, $backup);
    }

    /**
     * Show Backup.
     *
     * @param $backup
     *
     * @return mixed
     */
    public function showUserBackup($backup)
    {
        $this->returnCode = 'no';
        $answer = $this->send('v-list-user-backup', $this->userName, $backup, 'json');
        $data = json_decode($answer, true);

        return $data;
    }

    /**
     * @param $arg
     *
     * @return mixed
     */
    public function restoreBackup($arg)
    {
        $backup = 'no';
        $web = 'no';
        $dns = 'no';
        $mail = 'no';
        $db = 'no';
        $cron = 'no';
        $udir = 'no';
        extract($arg, EXTR_OVERWRITE);

        return $this->send(
            'v-schedule-user-restore',
            $this->userName,
            $backup,
            $web,
            $dns,
            $mail,
            $db,
            $cron,
            $udir
        );
    }

    /**
     * @return mixed
     */
    public function deleteUser()
    {
        return $this->send('v-delete-user', $this->userName, 'no');
    }

    /**
     * @return mixed
     */
    public function suspendUser()
    {
        return $this->send('v-suspend-user', $this->userName, 'no');
    }

    /**
     * @return mixed
     */
    public function unsuspendUser()
    {
        return $this->send('v-unsuspend-user', $this->userName, 'no');
    }

    /**
     * @param $package
     *
     * @return mixed
     */
    public function changePackage($package)
    {
        return $this->send('v-suspend-user', $this->userName, $package);
    }

    /**
     * @return mixed
     */
    public function listUserPackages()
    {
        $this->returnCode = 'no';
        $answer = $this->send('v-list-user-packages', 'json');
        $data = json_decode($answer, true);

        return $data;
    }

    /**
     * @param $option
     *
     * @return mixed
     */
    public function getValue($option)
    {
        $this->returnCode = 'no';

        return $this->send('v-get-user-value', $this->userName, $option);
    }

    /**
     * @param string $ssh
     *
     * @return mixed
     */
    public function changeShell($ssh = 'nologin')
    {
        return $this->send('v-change-user-shell', $this->userName, $ssh);
    }

    /**
     * @return mixed
     */
    public function adminListUserAccount()
    {
        $this->returnCode = 'no';
        $answer = $this->send('v-list-user', $this->userName, 'json');
        $data = json_decode($answer, true);

        return $data;
    }

    /**
     * @return mixed
     */
    public function adminListUserPackages()
    {
        $this->returnCode = 'no';
        $answer = $this->send('v-list-user-packages', 'json');
        $data = json_decode($answer, true);

        return $data;
    }

    /**
     * @return mixed
     */
    public function adminListUserShell()
    {
        $this->returnCode = 'no';
        $answer = $this->send('v-list-sys-shells', 'json');
        $data = json_decode($answer, true);

        return $data;
    }
}
