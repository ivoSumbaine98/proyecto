<?php

namespace App\Exports;

use App\Models\Jugador;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JugadoresExport implements FromCollection,WithHeadings{
    public function headings(): array {
        return ['Id','Nombre','Apellido','FechaDeNacimiento','Edad','Sexo','EquipoFavorito','OtroEquipo',
            'PosicionPreferida','Telefono','Direccion','Foto'];
    }
    public function collection() {
        $jugadores = DB::table('Jugadors')->select('Id','Nombre','Apellido','FechaDeNacimiento','Edad','Sexo',
            'EquipoFavorito','OtroEquipo','PosicionPreferida','Telefono','Direccion','Foto')->get();
        return $jugadores;
    }
}

