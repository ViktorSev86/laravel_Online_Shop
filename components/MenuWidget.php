<?php

namespace app\components;

use yii\base\Widget;

// Виджет левого бокового меню
class MenuWidget extends Widget
{

    public $tpl; // Свойство шаблон: чтобы виджет стал универсальным и смог работать более, чем с одним шаблоном (например не только в пользовательской части, но и в админовской части, где вид (шаблон) меню может быть другим)
    public $ul_class; // Свойство - css-класс, который мы присвоим меню (например внешний вид (то есть css-стили) в пользовательской и админовской части может отличаться)
    public $data; // В это свойство будем получать массив всех категорий из таблицы в БД
    public $tree; // В этом свойстве мы будем формировать полученных категорий дерево, используя специальный метод
    public $menuHtml; // В этом свойстве будет готовая вёрстка нашего меню, которую будет возвращать метод run

    public function init()
    {
        parent::init();
        // Производим нормализацию свойств 
        if($this->ul_class === null) {
            $this->ul_class = 'menu'; // Если класс не передан, устанавливаем класс по-умолчанию
        }
        if($this->tpl === null) {
            $this->tpl = 'menu'; // Если шаблон не передан, задаём шаблон по-умолчанию
        }
        $this->tpl .= '.php'; // Добавляем расширение к имени шаблона

    }

    public function run()
    {
        return $this->tpl;
    }

}