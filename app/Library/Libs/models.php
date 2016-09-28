<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 模型相关操作
 *-------------------------------------------------------------------------------
 * $FILE:models.php
 * $Author:zxs
 * $Dtime:2016/9/10
 ***********************************************************************************/

/**
 * @param $models
 * @param $keys
 * 获取模型中的某些值数据
 */
function getMetas($models, $keys = [], $isModel = false)
{
    $result = [];
    foreach ($models as $model) {
        if (!empty($keys)) {
            if (!array_key_exists($model->meta_key, $keys)) {
                continue 1;
            }
        }
        if ($isModel) {
            $model->meta_value = unserialize($model->meta_value);
            $result[$model->meta_key] = $model;
        } else {
            $result[$model->meta_key] = unserialize($model->meta_value);
        }
    }
    return $result;
}

/**
 * @param $title
 * @param $body
 * @param int $ownerId
 * @param int $senderId
 * 发送消息
 */
function sendMessage($title, $body, $ownerId = 0, $senderId = 0)
{
    if ($ownerId != 0) {
        return \App\Models\MessageModel::sendGlobalMessage($title, $body);
    }
    return \App\Models\MessageModel::sendPrivateMessage($ownerId, $title, $body, $senderId);
}


/**
 * @param $userId
 * 获取用户签到数据
 */
function getPast($model = null)
{
    $signInReward = getSignReward();
    $pass = [];
    if (empty($model)) {
        $pass['score'] = $signInReward[1];
        $pass['checked'] = '';
        $pass['days'] = 0;
        return $pass;
    }

    $d = ($model->days + 1) % 7;
    $pass['score'] = $signInReward[$d];
    $pass['days'] = $model->days;
    if ($model->updated_at > date('Y-m-d' . ' 00:00:00')) {
        $pass['checked'] = 'checked';
    } else {
        $pass['checked'] = '';
    }
    return $pass;

}
