dynamikaweb/yii2-uuid 
=====================
[![Latest Stable Version](https://img.shields.io/github/v/release/dynamikaweb/yii2-uuid)](https://github.com/dynamikaweb/yii2-uuid/releases )
[![Total Downloads](https://poser.pugx.org/dynamikaweb/yii2-uuid/downloads)](https://packagist.org/packages/dynamikaweb/yii2-uuid)
[![License](https://poser.pugx.org/dynamikaweb/yii2-uuid/license)](https://github.com/dynamikaweb/yii2-uuid/blob/master/LICENSE.txt)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/7af0de78a0514ab5bedb020f3749198d)](https://www.codacy.com/gh/dynamikaweb/yii2-uuid/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=dynamikaweb/yii2-uuid&amp;utm_campaign=Badge_Grade)
[![Build Test](https://scrutinizer-ci.com/g/dynamikaweb/yii2-uuid/badges/build.png?b=master)](https://scrutinizer-ci.com/g/dynamikaweb/yii2-uuid/)
[![Latest Unstable Version](https://poser.pugx.org/dynamikaweb/yii2-uuid/v/unstable)](https://github.com/dynamikaweb/yii2-uuid/find/master)

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```SHELL
$ composer require dynamikaweb/yii2-uuid "*"
```

or add

```JSON
"dynamikaweb/yii2-uuid": "*"
```

to the `require` section of your `composer.json` file.

## Database usage ##

### Create migration ###

```PHP
public function safeUp()
{
    $this->addColumn('sometable', 'uuid', 'uuid' => $this->binary(16)->unique()->notNull());
    $this->createIndex('sometable_uuid_idx', 'sometable', 'uuid');
    ...
}
```

## Model usage ##

### Validate ###

```PHP
use dynamikaweb\uuid\UuidValidator;
public function rules()
{
    return [
        [['uuid'], UuidValidator::classname(), 'on' => self::SCENARIO_SEARCH]
        ...
    ];
}
```

### Generate and save ###

```PHP
use dynamikaweb\uuid\Uuid;
public function beforeSave($insert)
{
    if (!parent::beforeSave($insert)) {
        return false;
    }

    if ($this->isNewRecord) {
        $this->setAttribute('uuid', Uuid::uuid4()->getBytes());
    }
    ...
}
```

### Formatting to string ###

```PHP
public function getUuidToString()
{
    if (is_resource($this->uuid)) {
        $this->uuid = stream_get_contents($this->uuid);
    }

    return Uuid::fromBytes($this->uuid)->toString();
}
```

## Controller usage ##

### View ###

```PHP
public function actionView($uuid)
{
    return $this->render('view', [
        'model' => $this->findModel($uuid)
    ]);
}
```

### Finding ###

```PHP
protected function findModel($uuid)
{
    try {
        $uuid = '\x'.bin2hex(Uuid::fromString($uuid)->getBytes());
    }
    catch (InvalidUuidStringException $e) {
        throw new HttpException(400, 'UUID invalid!');
    }
    if (($model = SomeModel::findOne(['uuid' => $uuid])) === null) {
        throw new HttpException(404, 'UUID not found!');
    } 
    
    return $model;
}
```

## View usage ##

### Form ##

```PHP
use dynamikaweb\uuid\UuidMask;

echo UuidMask::widget([
    'name' => 'uuid'
]);
```

### Active form ###

```PHP
echo $form->field($model, 'from_date')->widget(Uuid::className());
```
