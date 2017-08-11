<?php
/**
 * Created by PhpStorm.
 * User: liang
 * Date: 2017/3/8
 * Time: 13:34
 */

namespace App;

use App\AdminModel\Admin;
use App\AdminModel\Archive;
use Carbon\Carbon;

class Notification
{
    /**
     * 邮件发送通知提醒
     * @return array
     *
     */
    public  function Notificate(){
        $notifications=array();
        foreach (Admin::first()->unreadNotifications as $notification) {
            if (class_basename($notification->type)=='MailSendNotification'){
                $notifications[]=$notification->data[0];
            }

        }
        return $notifications;
    }

    /**
     * 文章发布通知提醒
     * @return array
     */
    public function ArticleNotificate(){
        $articlenotifications=array();
        foreach (auth('admin')->user()->unreadNotifications as $notification) {
            if (class_basename($notification->type)=='ArticlePublishedNofication'){
                $articlenotifications[]=$notification->data[0];
            }

        }
        return $articlenotifications;
    }

    /**
     * 所有通知
     * @return array
     *
     */
    function Allnotifications (){
        $allnotifications=array();
        foreach (auth('admin')->user()->unreadNotifications as $notification) {
                $allnotifications[]=$notification;
        }
       return $allnotifications;
    }

    /**
     * 任务进度提醒
     * @return array
     */
    public function taskNotification()
    {
        $articleUsers=array_unique(Archive::where('created_at','>',Carbon::today())->where('created_at','<',Carbon::now())->pluck('write')->toArray());
        $colorStyle=['aqua','green','blue','red','yellow'];
        $labelStyle=['label-danger','label-info','label-warning','label-success','label-primary','label-default'];
        $taskDatas=['articleUsers'=>$articleUsers,'colorStyle'=>$colorStyle,'labelStyle'=>$labelStyle];
        return $taskDatas;
    }
}