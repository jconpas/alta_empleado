<?php
// Arrays simulados (más adelante se migrarán a BD)

// Provincias agrupadas por sede
$provincias = [
    // Centro
    1 => "Madrid",
    2 => "Toledo",
    3 => "Segovia",

    // Sur
    4 => "Sevilla",
    5 => "Málaga",
    6 => "Cádiz",

    // Norte
    7 => "Bilbao",
    8 => "Santander",
    9 => "Oviedo",

    // Levante
    10 => "Valencia",
    11 => "Alicante",
    12 => "Castellón"
];

// Sedes principales (cada una agrupa 3 provincias)
$sedes = [
    1 => ["nombre" => "Sede Centro", "provincia" => [1, 2, 3]],
    2 => ["nombre" => "Sede Sur", "provincia" => [4, 5, 6]],
    3 => ["nombre" => "Sede Norte", "provincia" => [7, 8, 9]],
    4 => ["nombre" => "Sede Levante", "provincia" => [10, 11, 12]],
];

// Departamentos
$departamentos = [
    1 => "RRHH",
    2 => "Desarrollo",
    3 => "Comercial",
    4 => "Marketing",
    5 => "Finanzas"
];
