<?php

namespace App\Filters;
Use  Illuminate\Http\Request;

class ApiFilter{
//
  protected $safeParams = [];//parametros por los que vamos  filtrar nuestros modelos  ej: nombre ,tipo,direccion cutomer
  protected $columnMap = [];//mapear columnas para como queemos que se fltren
  protected $operatorMap = [];//vamos a cear el mapeo de los operadores  ej equal -igual o mayor que menor que


  public function transform(Request $request){ //clase principal
     $eloQuery = [];
     foreach($this->safeParams as $parm => $operators){
      $query = $request->query($parm);
      if(!isset($query)){
        Continue;
      }
      $column = $this->columnMap[$parm] ?? $parm;
      foreach ($operators as $operator) {
        if(isset($query[$operator])){//ir al array y cojer
          $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
        } 
      }
     }
     return $eloQuery;
  }

}