<?php
yii::$classMap['domain\consts\UserRoles'] = Yii::getAlias('@root/domain/consts/UserRoles.php');
yii::$classMap['infrastructure\repository\IUserRepository'] = Yii::getAlias('@root/infrastructure\repository\IUserRepository.php');
yii::$classMap['infrastructure\repository\sql\UserRepository'] = Yii::getAlias('@root/infrastructure\repository\sql\UserRepository.php');
yii::$classMap['domain\services\UserService'] = Yii::getAlias('@root/domain\services\UserService.php');