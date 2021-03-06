<?php
Yii::setAlias('@root', dirname(dirname(__DIR__)));
Yii::setAlias('@domain', dirname(dirname(__DIR__)) . '/domain');
Yii::setAlias('@infrastructure', dirname(dirname(__DIR__)) . '/infrastructure');
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

Yii::$container->set(\infrastructure\repository\IUserRepository::class, \infrastructure\repository\sql\UserRepository::class);
Yii::$container->set(\infrastructure\repository\IPartRepository::class, \infrastructure\repository\sql\PartRepository::class);
Yii::$container->set(\infrastructure\repository\IBasketRepository::class, \infrastructure\repository\sql\BasketRepository::class);
