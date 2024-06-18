<?php

namespace App\Filters;
Use  Illuminate\Http\Request;
Use App\Filters\ApiFilter;

class CustomerFilter extends ApiFilter{
//
  protected $safeParams = [//parametros por los que vamos  filtrar nuestros modelos  ej: nombre ,tipo,direccion cutomer
  'name' => ['eq'],
  'type' => ['eq'],
  'email' => ['eq'],
  'address' => ['eq'],
  'city' => ['eq'],
  'state' => ['eq'],
  'postalCode' => ['eq','gt','lt']
  ];
  protected $columnMap = [//mapear columnas para como queemos que se fltren
   'postalCode' => 'postal_code',//mapear
   ];
 
 
  protected $operatorMap = [//vamos a cear el mapeo de los operadores  ej equal -igual o mayor que menor que
 'eq' => '=',
 'lt' => '<',
 'lte' => '<=',
 'gt' => '>',
 'gte' => '>='
  ];
  

}