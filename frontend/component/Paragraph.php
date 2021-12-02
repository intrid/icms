<?php

namespace frontend\component;

/**
 * Формирует оглавление по h2 и h3 в тексте
 */
class Paragraph
{

    /**
     * Формирование оглавления в тексте и вывод
     */
    public static function viewParagraphsAndText($text)
    {
        // Поиск всех тегов h, запись их в массив $items
        preg_match_all("/(<h\d.*?>(.*?)<\/h\d>)/i", $text, $items);

        //  В $items[1] текст с тегами, в $items[2] без тегов
        if (!empty($items[2]) && (count($items[2]) > 1)) {
            echo '<div class="texts-list">';
            echo '<p class="ogg">Оглавление:</p>';
            foreach ($items[1] as $i => $row) {
                if (strripos($row, 'h2')) {
                    echo '<p class="menu-ogg"><a href="#tag-' . ++$i . '">' . $items[2][$i - 1] . '</a></p>';
                } elseif (strripos($row, 'h3')) {
                    echo '<p class="sub-menu-ogg"><a  href="#tag-' . ++$i . '">' . $items[2][$i - 1] . '</a></p>';
                }
            }
            echo '</div>';
        }

        // Добавление тегам h в тексте id для перехода по ним
        if (!empty($items[0])) {
            foreach ($items[0] as $i => $row) {
                $text = str_replace($row, '<div id="tag-' . ++$i . '"></div>' . $row, $text);
            }
        }

        // Вывод всего текста после оглавления
        echo $text;
    }
}
