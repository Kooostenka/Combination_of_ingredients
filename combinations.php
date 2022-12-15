<?php

$ingredients = ['сыр', 'ветчина', 'тесто', 'помидоры'];
$need_count =3; // Количество ингредиентов в заказе


$current_combination = array();
$results=array();
$r = build_combinations(0, $current_combination,0, $ingredients, $need_count, $results);

function build_combinations($ingredient_index, $current_combination, $combination_index, $ingredients, $need_count, &$results)
{
    if($combination_index !==0 && count($current_combination) !==0){
        if ($combination_index >= $need_count) {
            // рекурсия закончилась, выходим
            $results[] = $current_combination;
            return;
        }
    }

    if ($ingredient_index >= count($ingredients)) {
        // Ситуация когда в заказе требуется больше чем существует ингредиентов
        // Например, всего два ингредиента "ветчина" и "сыр", а заказ поступил на 5
        return;
    }

    for ($i=$ingredient_index; $i < count($ingredients); $i++) {
        $ingredient = $ingredients[$i];
        $current_combination[$combination_index] = $ingredient;

        build_combinations(
            $i + 1, // на каждой итерации сдвигаем начала массива,
            $current_combination, // каждый шаг итерации == ячейка в комбинации
            $combination_index + 1, // на каждом шаге итерации говорим в какой индекс класть ингредиент;
            $ingredients, $need_count, $results);

    }
    return $results;
}

print_r($r);
