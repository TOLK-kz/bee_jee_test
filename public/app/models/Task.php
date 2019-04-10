<?php
/**
 * User: TOLK  Date: 07.04.19
 */

namespace App\Models;

include_once './app/zcore/DB.php';

use App\Zcore\DB;

class Task extends DB
{
    const STATUS_NEW = 0;
    const STATUS_EDIT = 10;
    const STATUS_COMPLETE = 20;

    //По хорошему нужно делать универсальную функцию по созданию полей из схемы
    public $id;
    public $username;
    public $email;
    public $text_ru;
    public $status;

    private $perPage = 3; //TODO remove to config

    public static function get($id)
    {
        try {
            $task = new self();
            $res = $task->selectOne("SELECT * FROM `tsk_data` WHERE id=".$id);

            if ($res) {
                $task = new self();
                $task->id = $res->id;
                $task->username = $res->username;
                $task->email = $res->email;
                $task->text_ru = $res->text_ru;
                $task->status = $res->status;
                return $task;
            }

            return null;
        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function all($fromPage = 1, $order_by = null)
    {
        $sql = "SELECT * FROM `tsk_data`";

        $orderAllow = ['username', 'email', 'status'];
        if (isset($order_by) && in_array($order_by, $orderAllow)) {
            $sql .= ' ORDER BY '.$order_by;
        }

        $offset = $this->perPage * ($fromPage - 1);
        $sql .= " LIMIT {$this->perPage} OFFSET $offset";

        return $this->select($sql);
    }

    public function save()
    {
        try {
            $sql = "INSERT INTO tsk_data (username, email, text_ru) VALUES (?,?,?)";
            return $this->pdo->prepare($sql)->execute([
                $this->username,
                $this->email,
                $this->text_ru
            ]);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function update()
    {
        try {
            $sql = "UPDATE tsk_data SET text_ru=?, status=? WHERE id=?";
            $this->pdo->prepare($sql)->execute([
                $this->text_ru, $this->status, $this->id
            ]);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function isDone()
    {
        return $this->status == self::STATUS_COMPLETE;
    }
}