<?php

namespace App\Filters;
Use  Illuminate\Http\Request;
Use App\Filters\ApiFilter;

class InvoiceFilter extends ApiFilter{
//
  protected $safeParams = [//parametros por los que vamos  filtrar nuestros modelos  ej: nombre ,tipo,direccion cutomer
  'customerId' => ['eq'],
  'amount' => ['eq','gt','gte','lt','lte'],
  'status' => ['eq'],
  'billedDate' => ['eq','gt','gte','lt','lte'],
  'paidDate' => ['eq','gt','gte','lt','lte'],
  ];
  protected $columnMap = [//mapear columnas para como queemos que se fltren
   'customerId' => 'customer_id',//mapear
   'billesDate' => 'billed_dated',
   'paidDate' => 'paid_dated',
   ];
 
 
  protected $operatorMap = [//vamos a cear el mapeo de los operadores  ej equal -igual o mayor que menor que
 'eq' => '=',
 'lt' => '<',
 'lte' => '<=',
 'gt' => '>',
 'gte' => '>=',
 'ne' => '!='
  ];
  

}