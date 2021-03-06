<?php 
require_once __DIR__ . '/src/GraphQL.php';
use GraphQL\GraphQL;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;
$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);
$query = $input['query'];

$queryType = new ObjectType([
    'name' => 'Query',
    'fields' => [
        'hello' => [
            'type' => Type::string(),
            'description' => 'Возвращает приветствие',
            'resolve' => function () {
                return 'Привет, GraphQL!';
            }
        ]
    ]
]);
?>