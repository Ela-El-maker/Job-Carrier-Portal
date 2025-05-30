<?php

namespace App\Services;

class Notify
{
    //Created Notification
    static function createdNotification()
    {
        return notyf()->addSuccess('Created Successfully');
    }
    // Updated Notification
    static function updatedNotification()
    {
        return notyf()->addSuccess('Updated Successfully');
    }
    // Deleted Notification
    static function deletedNotification()
    {
        return notyf()->addSuccess('Deleted Successfully');
    }

    static function errorNotification(string $error)
    {
        return notyf()->addError($error, 'Error!');
    }
    static function successNotification(string $success)
    {
        return notyf()->addSuccess($success,'Success!');

    }
}
