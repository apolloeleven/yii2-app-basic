<?php

namespace app\models\query;

use app\models\User;
use yii\db\ActiveQuery;

class UserQuery extends ActiveQuery
{
    /**
     * @param $id
     * @return $this
     * @author Saiat Kalbiev <kalbievich11@gmail.com>
     */
    public function byId($id){
        return $this->andWhere([User::tableName().'.id' => $id]);
    }
}